<html>
<head>
<meta name="vieport" content="width=device-width,
initial-scale=1.0">
<title>Daftar Petugas</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style></style>
</head>
<body>
<h2>Daftar Transaksi</h2>
<?php
include "config.php";
?>
<a href="form_transaksi.php" class="btn btn-info mb-3">[+] Tambah Transaksi</a>
<table class="table">
  <thead class="table-primary">
<tr>
<th width="30px">No</th>
<th>Id</th>
<th>Tanggal Penjualan</th>
<th>Total Harga</th>
<th>Pelanggan Id</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$sql="select * from penjualan";
$result=mysqli_query($koneksi,$sql);
$no=1;
while($data=mysqli_fetch_array($result))
{
?>
<td><?= $no ?>.</td>
<td><?= $data['penjualan_id'] ?></td>
<td><?= $data['tanggal_penjualan'] ?></td>
<td><?= $data['total_harga'] ?></td>
<td><?= $data['pelanggan_id'] ?></td>
<td align="center" width="80px">
<a onclick="window.open('nota.php?id=<?=$data['penjualan_id'] ?>','nama window','width=1000,height=500,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no,resizable=yes,copyhistory=no')" class="btn btn-info mb-1">Nota</a>
<a href="detail.php?id=<?= $data['penjualan_id']?>" class="edit"></a>
</td>
</tr>
<?php
$no++;
}
?>
</tbody>
<tfoot>
<tr>
<td colspan="8">
<!-- Untuk nomor Halaman -->
</td>
</tr>
</tfoot>
</table>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>