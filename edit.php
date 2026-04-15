<?php
require_once './config/db_conn.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id='$id'");
$row = mysqli_fetch_array($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $laporan = $_POST['laporan'];

    $update = "UPDATE pengaduan SET nama='$nama', laporan='$laporan' WHERE id='$id'";
    $run = mysqli_query($koneksi, $update);

    if ($run) {
        header("location:index.php");
    }
}
?>

<h2>Edit Laporan</h2>
<form method="POST">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br><br>
    <label>Laporan:</label><br>
    <textarea name="laporan"><?php echo $row['laporan']; ?></textarea><br><br>
    <button type="submit">Simpan Perubahan</button>
    <a href="index.php">Batal</a>
</form>