<?php

if (isset($_GET['id'])) {
   include "konek.php";

   $id = $_GET['id'];
   $query = mysqli_query($koneksi,"DELETE FROM karyawan WHERE id = '$id'");
   if (mysqli_affected_rows($koneksi) > 0) {
       echo "Data Sudah Dihapus";
   }else {
       echo "Data Gagal Dihapus";
   }
}

?>
<a href="#">Kembali ke Halaman</a