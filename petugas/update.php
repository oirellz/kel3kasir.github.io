<?php
if(isset($_POST['save'])){
$id=$_POST['id'];
$np=$_POST['np'];
$un=$_POST['un'];
$hp=$_POST['hp'];
$sp=$_POST['sp'];
$lv=$_POST['lv'];
include "../config.php";
$sqle="update petugas set petugas_id='$id',
nama_petugas='$np', username='$un', password='$hp', nomor_telpon='$sp', level='$lv' where
petugas_id='$id'";
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