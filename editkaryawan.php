<?php
include "konek.php";

if (isset($_POST['update'])) {
    $idk  = $_POST['id'];
    $nama = $_POST['nama'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];


    mysqli_query($koneksi,"UPDATE karyawan SET nama='$nama', email='$email', password='$password', jk='$jk',alamat=' $alamat',no_hp='$no_hp' WHERE id = $idk");
}
if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE id= '$id'");
    $data =mysqli_fetch_array($query);
}
?>
<title> UPDATE</title>
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<form action="" method="post" enctype="multipart/form-data" class="align-text-bottom">
<h4 class="fw-bold">EDIT KARYAWAN</h4>
<div class="container mb-4">
    
        <tr>
            <td class="fw-semibold ">ID</td>
            <td><input class="form-control" type="text" name="id" value="<?= $data['id']?>"readonly  aria-label=".form-control-lg example"></td>
        </tr>
        <tr>
            <td class="fw-semibold">Nama</td>
            <td><input class="form-control" type="text" name="nama"  value="<?= $data['nama']?>" aria-label=".form-control-lg example"></td>
        </tr>
        <tr>
            <td class="fw-semibold">Email</td>
            <td><input class="form-control " type="email"  name="email" value="<?= $data['email']?>" aria-label=".form-control-lg example"></td>
        </tr>
        <tr>
            <td class="fw-semibold">password</td>
            <td><input class="form-control" type="password" name="password" value="<?= $data['password']?>" aria-label=".form-control-lg example"></td>
        </tr>
        <tr>
            <?php
            if ($data['jk']=='l') {
                $l = 'checked';
             }else {
                 $l ='';
             }
             if ($data['jk']=='p') {
                 $p = 'checked';
              }else {
                  $p ='';
              }
             
            ?>
            <td class="fw-semibold">Jenis Kelamin</td>
            <td>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" value="l" <?= $l ?> name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Laki-Laki
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" value="p" <?= $p ?> name="flexRadioDefault" id="flexRadioDefault2" >
                <label class="form-check-label" for="flexRadioDefault2">
                    Perempuan
                </label>
            </td>
        </tr>
        <tr>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"><?= $data['alamat']?></textarea>
        </div>
        </tr>
        <tr>
            <td class="fw-semibold">No Hp</td>
            <td><input class="form-control" type="text" name="no_hp" value="<?= $data['no_hp']?>" aria-label=".form-control-lg example" ></td>

        </tr>
        <tr>
            <td colspan=2 align="right">
            <button class="btn btn-primary" type="submit" value="UPDATE" name="update">UPDATE</button>
            </td>
        </tr>
        </form>
        <a href="tampilan.php">Kembali ke Halaman</a>
</div>