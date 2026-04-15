<?php
require_once "./config/db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $laporan = $_POST['laporan'];

    $query = "INSERT INTO pengaduan (nama, laporan) VALUES ('$nama', '$laporan')";
    $run = mysqli_query($koneksi, $query);

    if ($run) {
        echo "<div style='color: green;'>
            <b>Sukses!</b> 
            Laporan berhasil disimpan ke database
            <hr>
        </div>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

$ambil_data = mysqli_query($koneksi, "SELECT * FROM pengaduan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengaduan - Helpdesk</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Kirim Laporan Pengaduan</h1>
    <form method="post">
        <label for="nama">Nama Anda: </label>
        <input type="text" name="nama" id="" placeholder="Masukkan nama..." required><br><br>

        <label for="laporan">Isi Laporan: </label>
        <textarea name="laporan" id="" placeholder="Tulis kendala Anda di sini..." required></textarea><br><br>

        <button type="submit">Kirim Sekarang</button>
    </form>

    <hr>
    <h2>Daftar Laporan Masuk</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Pelapor</th>
            <th>Isi Laporan</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($ambil_data)) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['laporan'] ?></td>
            <td><a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus laporan ini?')">Hapus</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>