<?php
if(isset($_POST['save'])){
$kp=$_POST['kp'];
$np=$_POST['np'];
$un=$_POST['un'];
$sp=$_POST['sp'];
include "../config.php";
$sqls="insert into produk (produk_id, kode, nama_produk, harga, stok) values (null, '$kp', '$np', '$un','$sp')";
$simpan=mysqli_query($koneksi,$sqls);
if($simpan){
echo "<script>alert('Data Berhasil
Disimpan')</script>";
}else{
echo "<script>alert('Data Gagal Disimpan')</script>";
}
}
?>
<meta http-equiv="refresh" content="1;url=index.php">