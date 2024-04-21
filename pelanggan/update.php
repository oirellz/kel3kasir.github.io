<?php
if(isset($_POST['save'])){
$id=$_POST['id'];
$np=$_POST['np'];
$un=$_POST['un'];
$sp=$_POST['sp'];
include "../config.php";
$sqle="update pelanggan set pelanggan_id='$id',
nama_pelanggan='$np', alamat='$un', nomor _telpon='$sp' where
pelanggan_id='$id'";
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