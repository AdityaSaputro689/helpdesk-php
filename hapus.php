<?php
require_once 'config/db_conn.php';

$id = $_GET['id'];

$query = "DELETE FROM pengaduan WHERE id = '$id'";
$run = mysqli_query($koneksi, $query);

if ($run) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>