<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SILIRA - Main Menu</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="index.php#formLaporan">Lapor Aspirasi/Pengaduan</a></li>
                <li><a href="admin.php">Dashboard Admin</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="welcome-section">
            <h1>Selamat Datang di SILIRA</h1>
            <p>Sistem Integrasi Layanan Interaksi dan Respon Aspirasi (SILIRA)</p>
            <p>Fakultas Dakwah dan Ilmu Komunikasi</p>
            <!-- <p>Gunakan menu di atas untuk mengakses layanan yang tersedia.</p> -->
        </section>

        <section id="formLaporan">
            <h2>Kirim Laporan Anda</h2>
            <form action="submit.php" method="POST" id="reportForm">
                <label for="kategori">Kategori Laporan:</label>
                <select name="kategori_laporan" id="kategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Aspirasi">Aspirasi</option>
                    <option value="Pengaduan">Pengaduan</option>
                </select>

                <label for="nama">Nama Pelapor:</label>
                <input type="text" id="nama" name="nama_pelapor" required>

                <label for="nimnip">NIM/NIP:</label>
                <input type="text" id="nimnip" name="nim_nip" required>

                <label for="jurusan">Jurusan/Instansi Pelapor:</label>
                <input type="text" id="jurusan" name="jurusan_instansi">

                <label for="nowa">No WA Pelapor:</label>
                <input type="tel" id="nowa" name="no_wa" required>

                <label for="judul">Judul Laporan:</label>
                <input type="text" id="judul" name="judul_laporan" required>

                <label for="isi">Isi Laporan (max 1000 karakter):</label>
                <textarea id="isi" name="isi_laporan" maxlength="1000" required></textarea>

                <button type="submit">Submit Laporan</button>
            </form>
        </section>
    </main>

    <!-- Pop-up Modal -->
    <div id="popupModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Data telah disimpan!</p>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 SILIRA - Sistem Integrasi Layanan Interaksi dan Respon Aspirasi.</p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>
