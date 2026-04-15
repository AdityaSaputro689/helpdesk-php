<?php
require_once "./config/db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $laporan = $_POST['laporan'];

    echo "<div style='color: green;'>
            <b>Sukses!</b> 
            Laporan dari 
            <b>$nama</b> 
            telah diterima: 
            <i>$laporan</i><hr>
        </div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengaduan - Helpdesk</title>
</head>
<body>
    <h1>Kirim Laporan Pengaduan</h1>
    <form method="post">
        <label for="nama">Nama Anda: </label>
        <input type="text" name="nama" id="" placeholder="Masukkan nama..."><br><br>

        <label for="laporan">Isi Laporan: </label>
        <textarea name="laporan" id="" placeholder="Tulis kendala Anda di sini..."></textarea><br><br>

        <button type="submit">Kirim Sekarang</button>
    </form>
</body>
</html>