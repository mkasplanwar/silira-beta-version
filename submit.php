<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Laporan SILIRA</title>
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

        .response-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .btn-back {
            background-color: #007bff;
            color: #fff;
            margin-top: 20px;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="response-container">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $kategori_laporan = $_POST['kategori_laporan'];
                $nama_pelapor = $_POST['nama_pelapor'];
                $nim_nip = $_POST['nim_nip'];
                $jurusan_instansi = $_POST['jurusan_instansi'];
                $no_wa = $_POST['no_wa'];
                $judul_laporan = $_POST['judul_laporan'];
                $isi_laporan = $_POST['isi_laporan'];

                $sql = "INSERT INTO reports (kategori_laporan, nama_pelapor, nim_nip, jurusan_instansi, no_wa, judul_laporan, isi_laporan)
                        VALUES ('$kategori_laporan', '$nama_pelapor', '$nim_nip', '$jurusan_instansi', '$no_wa', '$judul_laporan', '$isi_laporan')";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success' role='alert'>
                            Terima kasih telah melapor! Laporan Anda berhasil disimpan.
                          </div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                            Terjadi kesalahan: " . htmlspecialchars($conn->error) . "
                          </div>";
                }

                $conn->close();
            }
            ?>
            <a href="index.php" class="btn btn-back">Kembali ke Halaman Utama</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
