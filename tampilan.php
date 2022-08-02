<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<body style="align-item">
   <table class="table table-success table-striped " style="width:100px; text-align:center;">
      <tr>
         <th>NO</th>
         <th>Profil</th>
         <th>NAMA</th>
         <th>EMAIL</th>
         <th>PASSWORD</th>
         <th>JENIS KELAMIN</th>
         <th>ALAMAT</th>
         <th>LEVEL</th>
         <th>NO HP</th>
         <th>Foto ktp</th>
         <th>Foto kk</th>
         <th>Edit</th>
         <th>Hapus</th>
      </tr>
      <?php
         include "koneksi.php";
         $no = 1;
         $query = mysqli_query($koneksi, "SELECT * FROM karyawan");
         while ($data = mysqli_fetch_array($query)) {
            ?>
               <tr>
                  <td><?=$no++?></td>

                  <td><img src="img/profil/<?= $data['foto_pribadi']?>"width="50" height="50"></td>
                  <td><?=$data['nama']?></td>
                  <td><?=$data['email']?></td>
                  <td><?=$data['password']?></td>
                  <td><?= ($data['jk'] =='l')?'Laki-Laki' : 'Perempuan' ?></td>
                  <td><?=$data['alamat']?></td>
                  <td><?=$data['level']?></td>
                  <td><?=$data['no_hp']?></td>
                  <td><img src="img/ktp/<?= $data['foto_ktp']?>"width="50" height="50"></td>
                  <td><img src="img/kk/<?= $data['foto_kk']?>"width="50" height="50"></td>
                  <td><a href="editkaryawan.php?id=<?= $data['id']?>"><img src="iconE.png" alt="image" height="25" widht="25"></a> </td>
                  <td><a href="hapus.php?id=<?= $data['id']?>"><img src="iconH.png" alt="image" height="25" widht="25"></a></td>
               </tr>
            <?php
         }
      ?>
   </table>
   <a href="inputkaryawan.php">tambah data</a>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>