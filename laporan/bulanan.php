<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Petugas</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php  
$bln = $_POST['bln'];
$thn = $_POST['thn'];
if($bln < 10) {
    $blns = "0".$bln;
} else {
    $blns = $bln;
}
$bulan = $thn."-".$blns;
?>
<h2>Laporan Bulanan Pretty Collection <?= $bulan ?></h2>
<?php
include "config.php";
?>
<table class="table table-bordered">
  <thead class="table-primary">
<tr>
<th width="30px">No</th>
<th>Id</th>
<th>Tanggal Penjualan</th>
<th>Nama Pelanggan</th>
<th>Total Harga</th>
</tr>
</thead>
<tbody>
<?php
date_default_timezone_set('Asia/Jakarta');
$nama=$_GET['id'];
$sql = "SELECT * FROM penjualan WHERE tanggal_penjualan LIKE '$bulan%' ORDER BY penjualan_id";
$result = mysqli_query($koneksi, $sql);
$no = 1;
$tot = 0;
while($data = mysqli_fetch_array($result)) {
    $pelanggan_id = $data['pelanggan_id'];
    $pel = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE pelanggan_id='$pelanggan_id'");
    $pelanggan = mysqli_fetch_array($pel);
?>
<tr>
<td><?= $no ?>.</td>
<td><?= $data['penjualan_id'] ?></td>
<td><?= $data['tanggal_penjualan'] ?></td>
<td><?= $pelanggan['nama_pelanggan'] ?></td>
<td><?= number_format($data['total_harga'],0 , ',', '.') ?></td>
</tr>
<?php
$no++;
$tot = $tot + $data['total_harga'];
$tgl = $data['tanggal_penjualan'];
}
?>
</tbody>
<tfoot>
<tr>
<td colspan="4">Total :</td>
<td><?= number_format($tot, 0, ',', '.') ?></td>
</tr>
</tfoot>
</table>
<p align="right">
	Majalengka,<?php echo date('Y-m-d') ?><br>Petugas <br><br><br>
	<?= $nama ?>
</p>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
