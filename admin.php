<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SILIRA Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            color: #343a40;
        }

        .container {
            margin-top: 50px;
        }

        .table-container {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .table thead th {
            background-color: #007bff;
            color: #fff;
            text-align: center;
        }

        .table tbody td {
            text-align: center;
        }

        .btn-export {
            background-color: #28a745;
            color: #fff;
            margin-bottom: 20px;
        }

        .btn-export:hover {
            background-color: #218838;
        }

        .no-reports {
            text-align: center;
            margin-top: 20px;
            font-size: 1.2rem;
            color: #6c757d;
        }

        .btn-edit, .btn-delete {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Admin Dashboard - Laporan SILIRA</h1>

        <!-- Form Pencarian -->
        <div class="row mb-4">
            <div class="col-md-8">
                <form method="GET" action="">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="search" placeholder="Cari laporan...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <select name="month" class="form-control">
                            <option value="">Pilih Bulan</option>
                            <?php
                            // Menampilkan semua bulan
                            for ($m = 1; $m <= 12; $m++) {
                                $monthName = date("F", mktime(0, 0, 0, $m, 1, date("Y")));
                                echo "<option value='$m'>$monthName</option>";
                            }
                            ?>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit">Filter Bulan</button>
                        </div>
                    </div>
                    <div class="input-group">
                        <select name="category" class="form-control">
                            <option value="">Pilih Kategori</option>
                            <?php
                            // Mengambil kategori unik dari database
                            $categoryResult = $conn->query("SELECT DISTINCT kategori_laporan FROM reports");
                            if ($categoryResult->num_rows > 0) {
                                while ($categoryRow = $categoryResult->fetch_assoc()) {
                                    echo "<option value='" . htmlspecialchars($categoryRow['kategori_laporan']) . "'>" . htmlspecialchars($categoryRow['kategori_laporan']) . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit">Filter Kategori</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-right">
                <a href="export.php" class="btn btn-export" aria-label="Export to Excel">Export to Excel</a>
            </div>
        </div>

        <!-- Tabel Laporan -->
        <div class="table-container">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Nama Pelapor</th>
                        <th>NIM/NIP</th>
                        <th>Jurusan/Instansi</th>
                        <th>No WA</th>
                        <th>Judul</th>
                        <th>Isi Laporan</th>
                        <th>Waktu Laporan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Filter pencarian, filter bulan, dan filter kategori
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $month = isset($_GET['month']) ? $_GET['month'] : '';
                    $category = isset($_GET['category']) ? $_GET['category'] : '';

                    $sql = "SELECT * FROM reports WHERE 1=1";

                    // Menambahkan filter pencarian
                    if ($search != '') {
                        $sql .= " AND (kategori_laporan LIKE '%$search%' OR nama_pelapor LIKE '%$search%' OR judul_laporan LIKE '%$search%' OR isi_laporan LIKE '%$search%')";
                    }

                    // Menambahkan filter bulan
                    if ($month != '') {
                        $sql .= " AND MONTH(waktu_laporan) = $month";
                    }

                    // Menambahkan filter kategori
                    if ($category != '') {
                        $sql .= " AND kategori_laporan = '$category'";
                    }

                    $sql .= " ORDER BY waktu_laporan DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row['kategori_laporan']) . "</td>
                                    <td>" . htmlspecialchars($row['nama_pelapor']) . "</td>
                                    <td>" . htmlspecialchars($row['nim_nip']) . "</td>
                                    <td>" . htmlspecialchars($row['jurusan_instansi']) . "</td>
                                    <td>" . htmlspecialchars($row['no_wa']) . "</td>
                                    <td>" . htmlspecialchars($row['judul_laporan']) . "</td>
                                    <td>" . htmlspecialchars($row['isi_laporan']) . "</td>
                                    <td>" . date("d-m-Y H:i:s", strtotime($row['waktu_laporan'])) . "</td>
                                    <td>
                                        <a href='edit_laporan.php?id={$row['id']}' class='btn btn-warning btn-sm btn-edit' aria-label='Edit Laporan'>Edit</a>
                                        <a href='delete_laporan.php?id={$row['id']}' class='btn btn-danger btn-sm btn-delete' aria-label='Hapus Laporan' onclick='return confirm(\"Apakah Anda yakin ingin menghapus laporan ini?\");'>Hapus</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='no-reports'>No reports found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
