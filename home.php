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
    <title> HOME</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <!-- navbar -->
      <div class="c">
            <nav>
                <ul>
                    <li><img src="login.png" alt="image" height="100" widht="100"></li>
                </ul>
                <nav>
                    <h1>ADMIN</h1>
                    <ul>
                        <li> <a href="#">HOME</a></li>
                        <!-- <li><a href="tampilankategori.php">Tampilan Kategori</a></li>
                        <li><a href="tampilanpembeli.php">Tampilan Pembeli</a></li>
                        <li><a href="tampilanpetugas.php">Tampilan Petugas</a></li> -->
                        <li><a href="logut.php">LOGOUT</a></li>
                    </ul>
                </nav>
            </nav>
      </div>
      <!-- --------- -->
      <button class="btn btn-primary" type="submit">Button</button>


      <!-- --table-- -->
      <!-- ---------- -->
     <script src="bootstrap/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>