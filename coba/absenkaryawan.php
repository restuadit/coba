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
               <input class="form-control me-2" type="search" placeholder="Search" name="txtcari" aria-label="Search">
               <button class="btn btn-outline-success bg-light" type="submit" name="cari"><i
                     class="bi bi-search"></i></button>
            </form>
         </div>
      </div>
   </nav>
   <div class="d-flex">
      <ul class="nav flex-column bg-primary" style="width: 10%; height: 1000px;">
         <li class="nav-item">
            <a class="nav-link link-light pt-5" aria-current="page" href="home.php">Home</a>
         </li>
         <li class="nav-item">
            <a class="nav-link link-light" href="karyawan.php">Karyawan</a>
         </li>
         <li class="nav-item">
            <a class="nav-link active link-light" href="absenkaryawan.php">Absen Karyawan</a>
         </li>
         <li class="nav-item">
            <a class="nav-link link-light" style="padding-top: 180px;"" href=" #">_________</a>
         </li>
         <li class="nav-item">
            <a class="nav-link link-light " href="logut.php"><i class="bi bi-box-arrow-left"></i>Logout</a>
         </li>
      </ul>
      <div class="ms-3 mt-5" style="possition:absolute">
         <h6>jika ada yang tidak masuk silakan isi disini!!</h6>
         <form action="" method="post">
            <select name="nama" class="form-select" style="width:200px;" aria-label=" Default select example">
               <option selected>Plih Karyawan</option>
               <?php
            include "konek.php";
            $query = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE level='user'");
            while ($data = mysqli_fetch_array($query)) {
               ?>
               <option value="<?=$data['id']?>"><?=$data['nama']?></option>
               <?php
            }
            ?>

            </select>
            <input class=" mt-2 form-control" style="width:200px;" type="datetime-local" name="waktu">
            <div class="form-check mt-2">
               <input class="form-check-input" type="radio" name="jk" name="flexRadioDefault" id="flexRadioDefault1"
                  value="sakit">
               <label class="form-check-label" for="flexRadioDefault1">
                  Sakit
               </label>
            </div>
            <div class="form-check">
               <input class="form-check-input" type="radio" name="jk" name="flexRadioDefault" id="flexRadioDefault2"
                  value="izin">
               <label class="form-check-label" for="flexRadioDefault2">
                  Izin
               </label>
            </div>
            <div class="form-check">
               <input class="form-check-input" type="radio" name="jk" name="flexRadioDefault" id="flexRadioDefault2"
                  value="tanpa keterangan">
               <label class="form-check-label" for="flexRadioDefault2">
                  Tanpa Keterangan
               </label>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary mt-2"
               style="height:40px; possition:absolue; margin-left:100px">
               Simpan</button>
         </form>
         <?php
      if (isset($_POST['simpan'])) {
         include "konek.php";
         $id = $_POST['nama'];
         $masuk = $_POST['waktu'];
         $ket = $_POST['jk'];

         $query = mysqli_query($koneksi, "INSERT INTO absenmasuk VALUES('','$id','$masuk','$ket')");
         if (mysqli_affected_rows($koneksi) > 0) {
            $query = mysqli_query($koneksi, "INSERT INTO absenpulang VALUES('','$id','$masuk','$ket')");
               if (mysqli_affected_rows($koneksi) > 0) {
                  echo "Data Berhasil Disimpan";
                  }else {
                  echo"Data Gagal Disimpan";
                  }
               }else {
               echo"Data Gagal Disimpan";
               }
        
      }
         ?>
      </div>
      <div class="overflow-auto mt-5 ms-4" style="width:380px; height:500px;">
         <button type="button" class="btn btn-warning mt-5"
            style=" color:white; height:40px; possition:absolue; margin-left:100px">
            ABSEN MASUK</button>



         <table class="table table-success table-striped"
            style="width:350px;text-align:center; possition:absolue; margin-top:px; margin-left:px; possition:absolute;">

            <tr>
               <th>NO</th>
               <th>NAMA</th>
               <th>MASUK</th>
               <th>KETERANGAN</th>

            </tr>
            <?php
            if (isset($_POST['cari'])) {
               include "konek.php";
               $cari = $_POST['txtcari'];
               $query = mysqli_query($koneksi, "SELECT * FROM karyawan INNER JOIN absenmasuk ON karyawan.id=absenmasuk.id_karyawan WHERE karyawan.nama like '%".$cari."%' ORDER BY absenmasuk.id DESC");
            }else {
               include "konek.php";
               $query = mysqli_query($koneksi, "SELECT * FROM karyawan INNER JOIN absenmasuk ON karyawan.id=absenmasuk.id_karyawan ORDER BY absenmasuk.id DESC");
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
      <div class="overflow-auto mt-5 ms-5" style="width:380px; height:500px;">
         <button type="button" class="btn btn-warning mt-5"
            style=" color:white; height:40px; possition:absolue; margin-left:100px">
            ABSEN PULANG</button>



         <table class="table table-success table-striped"
            style="width:350px;text-align:center; possition:absolue; margin-top:px; margin-left:px; possition:absolute;">

            <tr>
               <th>NO</th>
               <th>NAMA</th>
               <th>PULANG</th>
               <th>KETERANGAN</th>

            </tr>
            <?php
         if (isset($_POST['cari'])) {
            include "konek.php";
            $cari = $_POST['txtcari'];
            $query = mysqli_query($koneksi, "SELECT * FROM karyawan INNER JOIN absenpulang ON karyawan.id=absenpulang.id_karyawan WHERE karyawan.nama like '%".$cari."%' ORDER BY absenpulang.id DESC");
         }else {
            include "konek.php";
            $query = mysqli_query($koneksi, "SELECT * FROM karyawan INNER JOIN absenpulang ON karyawan.id=absenpulang.id_karyawan ORDER BY absenpulang.id DESC");
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

   <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>