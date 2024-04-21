<?php 
session_start();
$id=$_SESSION['id'];
$tot=$_POST['tot'];
$bayar=$_POST['bayar'];
include "config.php";
$sqls="update penjualan set total_harga='$tot' where penjualan_id='$id'";
$simpan=mysqli_query($koneksi,$sqls);
$_SESSION['tot']=$tot;
$_SESSION['byr']=$bayar;
$kembali=$bayar-$tot;
$_SESSION['kembali']=$kembali;
?>
<meta http-equiv="refresh" content="1;url=detail.php?save=1">