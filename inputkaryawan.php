<?php
session_start();
if (!isset($_SESSION['status'])) {
    header("login.php");
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" id=""></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" id=""></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" id=""></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <input type="radio" name="jk" value="l">Laki-Laki
                <input type="radio" name="jk" value="p">Perempuan
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea name="alamat" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>No hp</td>
            <td><input type="text" name="no_hp" id=""></td>
        </tr>
        <tr>
            <td><input type="submit" value="SIMPAN" name="simpan"></td>
        </tr>
    </table>
</form>
<?php

if (isset($_POST['simpan'])) {
   
    $nama = $_POST['nama'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $level = "user";
    $no_hp = $_POST['no_hp'];

    include "konek.php";
    
    $query = mysqli_query($koneksi,"INSERT INTO karyawan VALUES('','$nama','$email','$password','$jk','$alamat','$level','$no_hp')");
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "Data Berhasil Disimpan";
    }else {
        echo "Data Gagal Disimpan";
    }
}
?>
<a href="tampilan.php">Kembali ke Halaman</a>