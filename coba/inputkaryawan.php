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
            <form class="d-flex ms-auto" role="search">
               <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success bg-light" type="submit"><i class="bi bi-search"></i></button>
            </form>
         </div>
      </div>
   </nav>
   <div class="d-flex">
      <ul class="nav flex-column bg-primary" style="width: 10%; height: 1000px;">
         <li class="nav-item">
            <a class="nav-link link-light pt-5" aria-current="page" href="#">Home</a>
         </li>
         <li class="nav-item">
            <a class="nav-link active link-light" href="karyawan.php">Karyawan</a>
         </li>
         <li class="nav-item">
            <a class="nav-link link-light" style="padding-top: 180px;"" href=" #">_________</a>
         </li>
      </ul>

      <?php
session_start();
if (!isset($_SESSION['status'])) {
    header("login.php");
}
?>
      <title>INPUT KARYAWAN</title>
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <form action="" method="post" enctype="multipart/form-data" class="align-text-bottom">
         <h4 class="fw-bold">INPUT KARYAWAN</h4>
         <div class="container mb-4">
            <tr>
               <div class="mb-3">
                  <label for="formFile" class="form-label">Upload Profil</label>
                  <input class="form-control" type="file" name="foto_pribadi" id="formFile">
               </div>
            </tr>

            <tr>
               <td class="fw-semibold">Nama</td>
               <td><input class="form-control" type="text" name="nama" placeholder="INPUT NAMA ANDA"
                     aria-label=".form-control-lg example"></td>
            </tr>
            <tr>
               <td class="fw-semibold">Email</td>
               <td><input class="form-control " type="email" name="email" placeholder="contoh@gmail.com"
                     aria-label=".form-control-lg example"></td>
            </tr>
            <tr>
               <td class="fw-semibold">Password</td>
               <td><input class="form-control" type="password" name="password" placeholder="INPUT PASSWORD ANDA"
                     aria-label=".form-control-lg example"></td>
            </tr>
            <tr>
               <td class="fw-semibold">Jenis Kelamin</td>
               <td>
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="jk" name="flexRadioDefault"
                        id="flexRadioDefault1" value="l">
                     <label class="form-check-label" for="flexRadioDefault1">
                        Laki-laki

                     </label>
                  </div>
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="jk" name="flexRadioDefault"
                        id="flexRadioDefault2" value="p">
                     <label class="form-check-label" for="flexRadioDefault2">
                        Perempuan
                     </label>
               </td>
            </tr>
            <tr>
               <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
               </div>
            </tr>

            <tr>
               <td class="fw-semibold">No hp</td><br>
               <td><input class="form-control" type="text" name="no_hp" placeholder="INPUT NOMOR HP ANDA"
                     aria-label=".form-control-lg example"></td>
            </tr>
            <tr>
               <div class="mb-3">
                  <label for="formFile" class="form-label">Upload Foto KTP</label>
                  <input class="form-control" type="file" name="foto_ktp" id="formFile">
               </div>
            </tr>
            <tr>
               <div class="mb-3">
                  <label for="formFile" class="form-label">Upload Foto KK</label>
                  <input class="form-control" type="file" name="foto_kk" id="formFile">
               </div>
            </tr>
            <tr>
               <td><button class="btn btn-primary" type="submit" name="simpan">SIMPAN</button></td>
            </tr>
         </div>
      </form>
      <?php
    include "konek.php";
    if (isset($_POST['simpan'])) {
     
    $nama = $_POST['nama'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $level ='user';
    $no_hp = $_POST['no_hp'];
 
     $gambar1 = $_FILES['foto_pribadi']['name'];
     $size1 = $_FILES['foto_pribadi']['size'];
     $directori1 = 'img/profil/'.$gambar1;

     $gambar2 = $_FILES['foto_ktp']['name'];
     $size2 = $_FILES['foto_ktp']['size'];
     $directori2 = 'img/ktp/'.$gambar2;

     $gambar3 = $_FILES['foto_kk']['name'];
     $size3 = $_FILES['foto_kk']['size'];
     $directori3 = 'img/kk/'.$gambar3;
 
     
 
     
     if (is_uploaded_file($_FILES['foto_pribadi']['tmp_name'])) {
 
         if ($size1 >= 3000000) {
             echo "File terlalu besar";
         }else{
             if (move_uploaded_file($_FILES['foto_pribadi']['tmp_name'],$directori1)) {
                if (is_uploaded_file($_FILES['foto_ktp']['tmp_name'])) {
 
                    if ($size2 >= 3000000) {
                        echo "File terlalu besar";
                    }else{
                        if (move_uploaded_file($_FILES['foto_ktp']['tmp_name'],$directori2)) {
                            if (is_uploaded_file($_FILES['foto_kk']['tmp_name'])) {
 
                                if ($size3 >= 3000000) {
                                    echo "File terlalu besar";
                                }else{
                                    if (move_uploaded_file($_FILES['foto_kk']['tmp_name'],$directori3)) {
                                    $query = mysqli_query($koneksi,"INSERT INTO karyawan VALUES ('','$gambar1','$nama','$email','$password','$jk','$alamat','$level','$no_hp','$gambar2','$gambar3')"); 
                                    }
                                }
                            }else {
                                $query = mysqli_query($koneksi,"INSERT INTO karyawan VALUES ('','','$nama','$email','$password','$jk','$alamat','$level','$no_hp','','')"); 
                            }  
                        }
                    }
                }else {
                    $query = mysqli_query($koneksi,"INSERT INTO karyawan VALUES ('','','$nama','$email','$password','$jk','$alamat','$level','$no_hp','','')"); 
                }   
             }
         }
     }else {
         $query = mysqli_query($koneksi,"INSERT INTO karyawan VALUES ('','','$nama','$email','$password','$jk','$alamat','$level','$no_hp','','')"); 
     }  
     
         if (mysqli_affected_rows($koneksi) > 0) {
         echo "Data Berhasil Disimpan";
         }else {
         echo"Data Gagal Disimpan";
         }
     
     }
 
 ?>
      <a href="home.php">Kembali ke Halaman</a>

   </div>
   <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>