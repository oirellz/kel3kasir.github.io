<?php
if(isset($_POST['save'])){
$id=$_POST['id'];
$kp=$_POST['kp'];
$np=$_POST['np'];
$un=$_POST['un'];
$sp=$_POST['sp'];
include "../config.php";
$sqle="update produk set produk_id='$id', kode='$kp',
nama_produk='$np', harga='$un', stok='$sp' where
produk_id='$id'";
$simpan=mysqli_query($koneksi,$sqle);
if($simpan){
echo "<script>alert('Data Berhasil Di
Edit')</script>";
}else{
echo "<script>alert('Data Gagal Di Edit')</script>";
}
}
?>
<meta http-equiv="refresh" content="1;url=index.php">