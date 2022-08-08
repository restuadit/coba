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
            <a class="nav-link active link-light" href="karyawan.php">Karyawan</a>
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

      <button type="button" class="btn btn-primary mt-5" style="height:40px; possition:absolue; margin-left:100px"><a
            href="inputkaryawan.php" class="link-light">input</a></button>
      <table class="table table-success table-striped "
         style="width:200px; height: 100px; text-align:center; possition:absolue; margin-top:100px; margin-left:-140px;">

         <tr>
            <th>NO</th>
            <th>FOTO PRIBADI</th>
            <th>NAMA</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>JK</th>
            <th>ALAMAT</th>
            <th>LEVEL</th>
            <th>NO HP</th>
            <th>FOTO KTP</th>
            <th>FOTO KK</th>
            <th colspan="2">AKSI</th>

         </tr>
         <?php
         if (isset($_POST['cari'])) {
            include "konek.php";
            $cari = $_POST['txtcari'];
            $query = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nama like '%".$cari."%'");
         }else {
            include "konek.php";
            $query = mysqli_query($koneksi, "SELECT * FROM karyawan");
         }
         $no = 1;
         while ($data = mysqli_fetch_array($query)) {
            ?>
         <tr>
            <td><?=$no++?></td>
            <td><img src="img/profil/<?=$data['foto_pribadi']?>" height="50px" width="50px"></td>
            <td><?=$data['nama']?></td>
            <td><?=$data['email']?></td>
            <td><?=$data['password']?></td>
            <td><?=$data['jk']?></td>
            <td><?=$data['alamat']?></td>
            <td><?=$data['level']?></td>
            <td><?=$data['no_hp']?></td>
            <td><img src="img/ktp/<?=$data['foto_ktp']?>" height="50px" width="50px"></td>
            <td><img src="img/kk/<?=$data['foto_kk']?>" height="50px" width="50px"></td>

            <td><a href="editkaryawan.php?id=<?=$data['id']?>">edit</a></td>
            <td><a href="hapuskaryawan.php?id=<?=$data['id']?>">hapus</a></td>
         </tr>
         <?php
         }
      ?>
      </table>
   </div>
   <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>