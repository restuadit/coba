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
            <td>Upload Profil</td>
            <td><input type="file" name="foto_pribadi" id=""></td>
        </tr><br>
        <tr>
            <td class="fw-semibold">Nama</td>
            <td><input class="form-control" type="text" name="nama" placeholder="INPUT NAMA ANDA" aria-label=".form-control-lg example"></td>
        </tr>
        <tr>
            <td class="fw-semibold">Email</td>
            <td><input class="form-control " type="email"  name="email" placeholder="contoh@gmail.com" aria-label=".form-control-lg example"></td>
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
                <img src="cwo.png" alt="image" height="25" widht="25">

                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" name="flexRadioDefault" id="flexRadioDefault2" value="p" >
                <label class="form-check-label" for="flexRadioDefault2">
                <img src="cwe.png" alt="image" height="25" widht="25">
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
            <td>Upload Foto KTP</td>
            <td><input type="file" name="foto_ktp" id=""></td>
        </tr>
        <tr>
            <td>Upload Foto KK</td>
            <td><input type="file" name="foto_kk" id=""></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit" name="simpan">SIMPAN</button></td>
        </tr>
</div>
</form>
<?php
    include "koneksi.php";
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