<?php
$id=$_GET['id'];
include "config.php";
$dtl =mysqli_query($koneksi, "SELECT * FROM detail_penjualan where kode = '$id'");
$show = mysqli_fetch_array($dtl);
$produk =mysqli_query($koneksi, "SELECT * FROM produk where kode = '$id'");
$show2 = mysqli_fetch_array($produk);
$st = $show2['stok']+$show['jumlah_produk'];
$update =mysqli_query($koneksi, "update produk set stok='$st' where kode = '$id'");
$sqld="delete from detail_penjualan where kode='$id'";
$hapus=mysqli_query($koneksi,$sqld);
if($hapus){
echo "<script>alert('Data Berhasil Di
Hapus')</script>";
}else{
echo "<script>alert('Data Gagal Di Hapus')
</script>";
}
?>
<meta http-equiv="refresh" content="1;url=detail.php">