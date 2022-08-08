<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>LOGIN</title>
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <div class="container">
      <div class="box">
         <div class="row contentform">
            <div class="col-sm-12 col-md-6 col-lg-6"></div>
            <img src="r.png" alt="" class="img-fluid">
         </div>

         <div class="col-sm-12 col-md-6 col-lg-6">
            <h3 class="text-center mb-5">LOGIN </h3>
            <form class="mb-3" action="" method="post">
               <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">nama</label>
                  <input placeholder="masukan nama anda" autocomplete="off" type="email" name="nama"
                     class="form-control" id="exampleInputnama">
               </div>
               <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input placeholder="masukan password anda" type="password" name="password" class="form-control"
                     id="exampleInputPassword1">
               </div>
               <div class="mb-3 form-check">
                  <input name="password" type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Ingatkan saya</label>
               </div>
               <button type="submit" name="login" class="btn btn-primary w-100">LOGIN</button>

               <?php
if (isset($_POST['login'])) {
    
    include "konek.php";

    $username=mysqli_real_escape_string($koneksi,$_POST['nama']);
    $password=$_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM  karyawan WHERE email='$username' AND password='$password'");
    $data = mysqli_fetch_array($query);
    if (mysqli_num_rows($query)>0) {
        if ($data['level']=='admin') {
            header("location:home.php");
            $_SESSION['status'] = "berhasil";
            $_SESSION['nama'] = $data;
        }else {
            header("location:profil.php");
            $_SESSION['status'] = "berhasil";
            $_SESSION['nama'] = $data;
        }
        
    }else {
        echo"Login Anda Gagal";
    }
}
?>
            </form>

         </div>
      </div>
   </div>
   </div>
   <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>