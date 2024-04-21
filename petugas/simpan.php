<?php
if(isset($_POST['save'])){
$np=$_POST['np'];
$un=$_POST['un'];
$hp=$_POST['hp'];
$sp=$_POST['sp'];
$lv=$_POST['lv'];
include "../config.php";
$sqls="insert into petugas (petugas_id, nama_petugas, username, password, nomor_telpon, level) values (null, '$np', '$un', '$hp','$sp', '$lv')";
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