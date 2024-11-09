<?php
include 'db.php';

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reports.xls");
header("Pragma: no-cache");
header("Expires: 0");

$output = "";

$output .= "
<table border='1'>
    <tr>
        <th>Kategori</th>
        <th>Nama Pelapor</th>
        <th>NIM/NIP</th>
        <th>Jurusan/Instansi</th>
        <th>No WA</th>
        <th>Judul Laporan</th>
        <th>Isi Laporan</th>
        <th>Waktu Laporan</th>
    </tr>
";

$sql = "SELECT * FROM reports";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $output .= "
            <tr>
                <td>{$row['kategori_laporan']}</td>
                <td>{$row['nama_pelapor']}</td>
                <td>{$row['nim_nip']}</td>
                <td>{$row['jurusan_instansi']}</td>
                <td>{$row['no_wa']}</td>
                <td>{$row['judul_laporan']}</td>
                <td>{$row['isi_laporan']}</td>
                <td>{$row['waktu_laporan']}</td>
            </tr>
        ";
    }
}

$output .= "</table>";
echo $output;
?>
