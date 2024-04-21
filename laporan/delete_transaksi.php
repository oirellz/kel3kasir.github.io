<?php
$id=$_GET['id'];
include "config.php";
$sqld="delete from detail_penjualan where penjualan_id='$id'";
$del="delete from penjualan where penjualan_id='$id'";
$hapus=mysqli_query($koneksi,$sqld);
$delete=mysqli_query($koneksi,$del);

if($hapus){
echo "<script>alert('Data Berhasil Di
Hapus')</script>";
}else{
echo "<script>alert('Data Gagal Di Hapus')
</script>";
}
?>
<meta http-equiv="refresh" content="1;url=index.php">