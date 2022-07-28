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

<form action="" method="post">
    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" name="id" id="" value="<?= $data['id']?>"readonly></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" id="" value="<?= $data['nama']?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" id="" value="<?= $data['email']?>"></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="text" name="password" id="" value="<?= $data['password']?>"></td>
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
            <td>Jenis Kelamin</td>
            <td>
            <input type="radio" name="jk" value="l" <?= $l ?>>Laki-laki
            <input type="radio" name="jk" value="p" <?= $p ?>>perempuan
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea name="alamat" id="" cols="30" rows="10"><?= $data['alamat']?></textarea></td>
        </tr>
        <tr>
            <td>No Hp</td>
            <td><input type="text" name="no_hp" id="" value="<?= $data['no_hp']?>"></td>
        </tr>
        <tr>
    <td colspan=2 align="right">
        <input type="submit" value="UPDATE" name="update">
    </td>
</tr>
    </table>
</form>
<a href="tampilan.php">Kembali ke Halaman</a>