<?php
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style></style>
</head>
<body>
<h2>Daftar Petugas</h2>
<?php
include "../config.php";
?>
<a href="form.php" class="btn btn-info mb-3">[+] Tambah Data</a>
<table class="table">
  <thead class="table-primary">
      <tr>
      <th>No.</th>
<th>Nama petugas</th>
<th >username</th>
<th >password</th>
<th >telp</th>
<th >level</th>
<th >Aksi</th>
      </tr>
    </thead>
    
    <tbody>
      <tr>
        
        <?php
include "../config.php";

$sql="select * from petugas";
$result=mysqli_query($koneksi,$sql);
$no=1;
while($data=mysqli_fetch_array($result))
{
?>
        <td scope="row"><?= $no ?></td>
        
        <td><?= $data['nama_petugas'] ?></td>
<td><?= $data['username']?></td>
<td><?= $data['password'] ?></td>
<td><?= $data['nomor_telpon'] ?></td>
<td><?= $data['level'] ?></td>

<td align="center" width="80px">
<a href="edit.php?id=<?= $data['petugas_id']
?>" class="btn btn-info mb-1">Ubah</a>
<a href="delete.php?id=<?=$data['petugas_id'] ?>" 
	onclick="return confirm('Apakah Anda Yakin data pengaduan <?= $data['nama_petugas'] ?> akan dihapus?')" class="btn btn-danger">Hapus</a>
      </tr>
      <?php
$no++;
}
?>
    </tbody>
    <td colspan="8"></td>
</table>
<br>
