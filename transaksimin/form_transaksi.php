<!DOCTYPE html>
<html>
<head>
<title>Input Data Petugas</title>
<style>
    form{
width:350px;
padding:20px;
margin:20px auto;
box-shadow: 0 0 10px 0 #333;
border-radius:20px;
font:14px "Tahoma";
}
input[type="text"], input[type="number"]{
width:230px;
padding:5px;
}
.simpan{
background: blue;
color:white;
border-radius: 20px;
border:none;
text-decoration: none;
padding:10px 20px;
}
.batal{
background: red;
color:white;
border-radius: 20px;
border:none;
text-decoration: none;
padding:10px 20px;
}
</style>
</head>
<body>
<form method="POST" action="detail.php">
<h2>Input Data Transaksi</h2>
<?php 
date_default_timezone_set('Asia/Jakarta');
?>
<hr>
<table width="100%">
<tr>
<td>No Hp</td>
<td>
<input list="nomor_telpon" id="hp" name="hp" autocomplete="off" required placeholder="Nomor Pelanggan" class="form-control me-2" />
<datalist id="nomor_telpon">
<?php  
include "../config.php";
$sqlp="select * from pelanggan";
$resp=mysqli_query($koneksi,$sqlp);
while($dt=mysqli_fetch_array($resp)){
?>
<option value="<?= $dt['nomor_telpon'] ?>"><?= $dt['nama_pelanggan'] ?> | <?= $dt['pelanggan_id'] ?></option>
<?php
}
?>
</datalist></td>
</tr>
<tr>
<td>Tanggal Penjualan</td>
<td><input type="text" name="tgl" value="<?php echo date('Y-m-d') ?>"></td>
</tr>
</table>
<hr>
<p align="right">
<input type="submit" name="simpan" value="Simpan"
class="simpan">
<a href="tampil_transaksi.php" class="batal">Batal</a>
</p>
</form>
</body>
</html>