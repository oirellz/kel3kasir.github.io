<?php
if(isset($_POST['save'])){
$np=$_POST['np'];
$un=$_POST['un'];
$sp=$_POST['sp'];

include "../config.php";
$sqls="insert into pelanggan (pelanggan_id, nama_pelanggan, alamat,  nomor_telpon) values (null, '$np', '$un', '$sp')";
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