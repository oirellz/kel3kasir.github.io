<?php
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style></style>
</head>
<body>
<h2>Daftar Produk</h2>
<?php
include "../config.php";
?>
<table class="table">
    <thead class="table-primary">
      <tr>
      <th>NO</th>
      <th>Kode Produk</th>
<th>Nama produk</th>
<th >Harga</th>
<th >Stok</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
include "../config.php";

$sql="select * from produk";
$result=mysqli_query($koneksi,$sql);
$no=1;
while($data=mysqli_fetch_array($result))
{
?>
        <th scope="row"><?= $no ?></th>
        <td><?= $data['kode'] ?></td>
        <td><?= $data['nama_produk'] ?></td>
<td><?= $data['harga']?></td>
<td><?= $data['stok'] ?></td>

</tr>
      <?php
$no++;
}
?>
    </tbody>
    <td colspan="5"></td>
</table>
<br>
