<?php
session_start();
if (!isset($_SESSION['status'])) {
   header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<body>


   <nav class="navbar navbar-expand-lg bg-primary">
      <div class="container-fluid">
         <img src="img/logo1.png" style="height: 60px;">
         <a class="navbar-brand link-light" href="#">Radar Tasikmalaya</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
            <form method="post" class="d-flex ms-auto" role="search">
               <input class="form-control me-2" type="search" name="txtcari" placeholder="Periksa Jumlah Hadir"
                  aria-label="Search">
               <button class="btn btn-outline-success bg-light" name="cari" type="submit"><i
                     class="bi bi-search"></i></button>
            </form>
         </div>
      </div>

   </nav>
   <div class="d-flex">
      <ul class="nav flex-column bg-primary" style="width: 10%; height: 1000px;">
         <li class="nav-item">
            <a class="nav-link active link-light pt-5" aria-current="page" href="profil.php">Profil</a>
         </li>
         <li class="nav-item">
            <a class="nav-link link-light" href="absenan.php">Absen</a>
         </li>
         <li class="nav-item">
            <a class="nav-link link-light" style="padding-top: 180px;"" href=" #">_________</a>
         </li>
         <li class="nav-item">
            <a class="nav-link link-light " href="logut.php"><i class="bi bi-box-arrow-left"></i>Logout</a>
         </li>
      </ul>

      <?php
      include "konek.php";
      $id = $_SESSION['nama']['id'];
      $query = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id='$id'");
      $data = mysqli_fetch_array($query);
      ?>
      <div class="m-5" style="text-align:center;">
         <h3 class="m-5 bg-warning rounded px-5" style="color:white;">Absen Harian</h3>
         <table class="table table-striped">
            <tr>
               <th>Nama</th>
               <th>Absen</th>
            </tr>
            <tr>
               <form action="" method="post">
                  <td><?=$data['nama']?></td>
                  <?php
                  $query2 = mysqli_query($koneksi,"SELECT * FROM absenmasuk WHERE id_karyawan='$id' AND DATE_FORMAT(absenmasuk.masuk, '%Y-%m-%d')");
                  if (mysqli_num_rows($query2)>0) {
                     $query3 = mysqli_query($koneksi,"SELECT * FROM absenpulang WHERE id_karyawan='$id' AND DATE_FORMAT(absenpulang.pulang, '%Y-%m-%d')");
                     if (mysqli_num_rows($query3)>0) {
                     ?>
                  <td><input type="button" value="Sudah Absen"></td>
                  <?php
                     }else {
                     ?>
                  <td><input type="submit" value="Absen Pulang" name="simpan2"></td>
                  <?php
                  }
                  ?>

                  <?php
                  }else {
                     ?>
                  <td><input type="submit" value="Absen Masuk" name="simpan"></td>
                  <?php
                  }
                  ?>
               </form>
            </tr>
         </table>

         <?php
         if (isset($_POST['simpan'])) {
            $url=$_SERVER['REQUEST_URI'];
            header("Refresh: 0.01; URL=$url");
            include "konek.php";
            $id = $data['id'];
            date_default_timezone_set('Asia/Jakarta');
            $jam = date('Y-m-d G:i:s');
            $ket = 'hadir';
            $query = mysqli_query($koneksi, "INSERT INTO absenmasuk VALUES('','$id','$jam','$ket')");
            if (mysqli_affected_rows($koneksi) > 0) {
               echo "Data Berhasil Disimpan";
               }else {
               echo"Data Gagal Disimpan";
               }
         }
         if (isset($_POST['simpan2'])) {
            $url=$_SERVER['REQUEST_URI'];
            header("Refresh: 0.01; URL=$url");
            include "konek.php";
            $id = $data['id'];
            date_default_timezone_set('Asia/Jakarta');
            $jam = date('Y-m-d G:i:s');
            $ket = 'hadir';
            $query = mysqli_query($koneksi, "INSERT INTO absenpulang VALUES('','$id','$jam','$ket')");
            if (mysqli_affected_rows($koneksi) > 0) {
               echo "Data Berhasil Disimpan";
               }else {
               echo"Data Gagal Disimpan";
               }
         }

         
         ?>


      </div>
      <div class="">
         <div class="overflow-auto mt-3 ms-2" style="width:340px; height:500px;">
            <h5 class="m-2 bg-warning rounded px-3" style="color:white; width:170px;">Absensi Masuk</h5>

            <table class="table table-striped">
               <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Masuk</th>
                  <th>Keterangan</th>
               </tr>
               <?php
            
            if (isset($_POST['cari'])) {
               include "konek.php";
               $cari = $_POST['txtcari'];
               $query = mysqli_query($koneksi, "SELECT * FROM karyawan INNER JOIN absenmasuk ON karyawan.id=absenmasuk.id_karyawan WHERE absenmasuk.keterangan like '%".$cari."%' AND karyawan.id='$id' ORDER BY absenmasuk.id DESC");
            }else {
               include "konek.php";
               $query = mysqli_query($koneksi, "SELECT * FROM karyawan INNER JOIN absenmasuk ON karyawan.id=absenmasuk.id_karyawan WHERE karyawan.id='$id' ORDER BY absenmasuk.id DESC");
            }
         $no = 1;
         while ($data = mysqli_fetch_array($query)) {
            ?>
               <tr>
                  <td><?=$no++?></td>
                  <td><?=$data['nama']?></td>
                  <td><?=$data['masuk']?></td>
                  <td><?=$data['keterangan']?></td>
               </tr>


               <?php
            }
            ?>
            </table>
         </div>
      </div>
      <div class="">
         <div class="overflow-auto mt-3 ms-4" style="width:340px; height:500px;">
            <h5 class="m-2 bg-warning rounded px-3" style="color:white; width:180px;">Absensi Pulang</h5>

            <table class="table table-striped">
               <tr>
                  <th>No</th>

                  <th>Nama</th>
                  <th>Masuk</th>
                  <th>Keterangan</th>
               </tr>
               <?php
            
            if (isset($_POST['cari'])) {
               include "konek.php";
               $cari = $_POST['txtcari'];
               $query = mysqli_query($koneksi, "SELECT * FROM karyawan INNER JOIN absenpulang ON karyawan.id=absenpulang.id_karyawan WHERE karyawan.id='$id' AND absenpulang.keterangan like '%".$cari."%' ORDER BY absenpulang.id DESC");
            }else {
               include "konek.php";
               $query = mysqli_query($koneksi, "SELECT * FROM karyawan INNER JOIN absenpulang ON karyawan.id=absenpulang.id_karyawan WHERE karyawan.id='$id' ORDER BY absenpulang.id DESC");
            }
         $no = 1;
         while ($data = mysqli_fetch_array($query)) {
            ?>
               <tr>
                  <td><?=$no++?></td>
                  <td><?=$data['nama']?></td>
                  <td><?=$data['pulang']?></td>
                  <td><?=$data['keterangan']?></td>
               </tr>


               <?php
            }
            ?>
            </table>
         </div>
      </div>
   </div>
   <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>