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
         <a class="navbar-brand link-light me-auto" href="#">Radar Tasikmalaya</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

      </div>
      </div>

   </nav>
   <div class="d-flex">
      <ul class="nav flex-column bg-primary" style="width: 10%; height: 1000px;">
         <li class="nav-item">
            <a class="nav-link active link-light pt-5" aria-current="page" href="#">Profil</a>
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
      <div class="m-5">
         <?php
         include "konek.php";
         $id = $_SESSION['nama']['id'];
         $query = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id='$id'");
         $data = mysqli_fetch_array($query);
         ?>
         <div class="m-5" style="text-align:center;">
            <h3 class="bg-warning rounded" style="color:white;">Profilku</h3>
            <table>
               <tr>
                  <td colspan="2"><img src="img/profil/<?=$data['foto_pribadi']?>" height="100px" width="100px"></td>
               </tr>
               <tr>
                  <th>Nama</th>
                  <td>:<?=$data['nama']?></td>
               </tr>
               <tr>
                  <th>Jenis Kelamin</th>
                  <?php
                  if($data['jk']=='l'){
                     $jk = "Laki-laki";
                  }else {
                     $jk = "Perempuan";
                  }
                  ?>
                  <td>:<?=$jk?></td>
               </tr>
               <tr>
                  <th>Alamat</th>
                  <td>:<?=$data['alamat']?></td>
               </tr>
               <tr>
                  <th>No HP</th>
                  <td>:<?=$data['no_hp']?></td>
               </tr>
               <tr>
                  <td colspan="2">
                     <button class="btn btn-light link-light" type="submit" name="update">
                        <a href="editkaryawan.php?id=<?=$data['id']?>">Edit Profil</a>
                     </button>
                  </td>
               </tr>

            </table>
            <?php
            date_default_timezone_set('Asia/Jakarta');
            $jam = date(' Y-m-d G:i:s');
            echo $jam;
            ?>
         </div>
      </div>
   </div>
   <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>