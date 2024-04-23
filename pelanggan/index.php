<?php
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style></style>
</head>
<body>
<h2>Daftar Pelanggan</h2>
<?php
include "../config.php";
?>
<a href="form.php" class="btn btn-info mb-3">[+] Tambah Data</a>
<table class="table">
  <thead class="table-primary">
    <thead>
      <tr>
      <th>NO</th>
<th>nama pelanggan</th>
<th >alamat</th>
<th >nomor telepon</th>
<th >Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
include "../config.php";

$sql="select * from pelanggan";
$result=mysqli_query($koneksi,$sql);
$no=1;
while($data=mysqli_fetch_array($result))
{
?>
        <th scope="row"><?= $no ?></th>
        <td><?= $data['nama_pelanggan'] ?></td>
        <td><?= $data['alamat'] ?></td>
        <td><?= $data['nomor_telpon'] ?></td>

<td >
<a href="edit.php?id=<?= $data['pelanggan_id']
?>" class="btn btn-info mb-1">Ubah</a>
<a href="delete.php?id=<?=$data['pelanggan_id'] ?>" 
	onclick="return confirm('Apakah Anda Yakin data pelanggan <?= $data['nama_pelanggan'] ?> akan dihapus?')" class="btn btn-danger">Hapus</a>
      </tr>
      <?php
$no++;
}
?>
    </tbody>
    <td colspan="6"></td>
</table>
<br>