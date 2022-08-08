<?php
session_start();
if (!isset($_SESSION['status'])) {
   header("location:login.php");
}

if (isset($_GET['id'])) {
include "konek.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi,"DELETE FROM karyawan WHERE id = '$id'");
if (mysqli_affected_rows($koneksi) > 0) {
header("location:karyawan.php");
}else {
echo "Data Gagal Dihapus";
}
}

?>
<a href="#">Kembali ke Halaman</a>