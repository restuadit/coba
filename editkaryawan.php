<?php
include "koneksi3.php";

if (isset($_POST['update'])) {

    $kg = $_POST['kd_guru'];
    $ng = $_POST['nama_guru'];
    $mp = $_POST['matapel'];
    $lp = $_POST['lama_pel'];
    $jk = $_POST['jk'];

    mysqli_query($koneksi2,"UPDATE guru SET nama_guru='$ng', matapel='$mp', lama_pel='$lp', jk='$jk' WHERE kd_guru = $kg");
}
if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $query = mysqli_query($koneksi2,"SELECT * FROM guru WHERE kd_guru= '$id'");
    $data =mysqli_fetch_array($query);
}
?>

<form action="" method="post">
    <table>
        <tr>
            <td>Kode Guru</td>
            <td><input type="text" name="kd_guru" id="" value="<?= $data['kd_guru']?>"readonly></td>
        </tr>
        <tr>
            <td>Nama Guru</td>
            <td><input type="text" name="nama_guru" id="" value="<?= $data['nama_guru']?>"></td>
        </tr>
        <tr>
            <td>Mata Pelajaran</td>
            <td><input type="text" name="matapel" id="" value="<?= $data['matapel']?>"></td>
        </tr>
        <tr>
            <td>Lama Pelajaran</td>
            <td><input type="text" name="lama_pel" id="" value="<?= $data['lama_pel']?>"></td>
        </tr>
        <tr>
            <?php
            if ($data['jk']=='L') {
                $l = 'checked';
             }else {
                 $l ='';
             }
             if ($data['jk']=='P') {
                 $p = 'checked';
              }else {
                  $p ='';
              }
             
            ?>
            <td>Jenis Barang</td>
            <td>
            <input type="radio" name="jk" value="L" <?= $l ?>>Laki-laki
            <input type="radio" name="jk" value="P" <?= $p ?>>perempuan
            </td>
        </tr>
        <tr>
    <td colspan=2 align="right">
        <input type="submit" value="UPDATE" name="update">
    </td>
</tr>
    </table>
</form>
<a href="tampilanguru.php">Kembali ke Halaman</a>