<?php
session_start();
if (!isset($_SESSION['status'])) {
    header("login.php");
}
?>
<title>INPUT KARYAWAN</title>
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<form action="" method="post" enctype="multipart/form-data" class="align-text-bottom">
<h4 class="fw-bold">INPUT KARYAWAN</h4>
<div class="container mb-4">
        <tr>
            <td class="fw-semibold">Nama</td>
            <td><input class="form-control" type="text" name="nama" placeholder="INPUT NAMA ANDA" aria-label=".form-control-lg example"></td>
        </tr>
        <tr>
            <td class="fw-semibold">Email</td>
            <td><input class="form-control " type="email"  name="email" placeholder="INPUT EMAIL ANDA" aria-label=".form-control-lg example"></td>
        </tr>
        <tr>
            <td class="fw-semibold">Password</td>
            <td><input class="form-control" type="password" name="password"placeholder="INPUT PASSWORD ANDA" aria-label=".form-control-lg example"></td>
        </tr>
        <tr>
            <td class="fw-semibold">Jenis Kelamin</td> 
            <td>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jk"  name="flexRadioDefault" id="flexRadioDefault1"value="l">
                <label class="form-check-label" for="flexRadioDefault1">
                    Laki-Laki
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" name="flexRadioDefault" id="flexRadioDefault2" value="p" >
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
            <td><input class="form-control" type="text" name="no_hp" placeholder="INPUT NOMOR HP ANDA" aria-label=".form-control-lg example"></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit" name="simpan">SIMPAN</button></td>
        </tr>
</div>
</form>
<?php

if (isset($_POST['simpan'])) {
   
    $nama = $_POST['nama'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    include "konek.php";
    
    $query = mysqli_query($koneksi,"INSERT INTO karyawan VALUES('','$nama','$email','$password','$jk','$alamat','$no_hp')");
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "Data Berhasil Disimpan";
    }else {
        echo "Data Gagal Disimpan";
    }
}
?>
<a href="home.php">Kembali ke Halaman</a>