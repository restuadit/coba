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
            <a class="nav-link active link-light pt-5" aria-current="page" href="#">Home</a>
         </li>
         <li class="nav-item">
            <a class="nav-link link-light" href="karyawan.php">Karyawan</a>
         </li>
         <li class="nav-item">
            <a class="nav-link link-light" href="absenkaryawan.php">Absen Karyawan</a>
         </li>
         <li class="nav-item">
            <a class="nav-link link-light" style="padding-top: 180px;"" href=" #">_________</a>
         </li>
         <li class="nav-item">
            <a class="nav-link link-light " href="logut.php"><i class="bi bi-box-arrow-left"></i>Logout</a>
         </li>
      </ul>
      <div id="carouselExampleControls" class="carousel slide" style="margin-top:50px; margin-left:100px"
         data-bs-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img src="img/1.jpg" class="d-block w-75" alt="...">
            </div>
            <div class="carousel-item">
               <img src="img/2.jpg" class="d-block w-75" alt="...">
            </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
         </button>
      </div>
   </div>
   <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>