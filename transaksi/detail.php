<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style></style>
</head>
<body>
<?php
include "config.php";
date_default_timezone_set('Asia/Jakarta');
		if (isset($_POST['simpan'])) {
			$hp =$_POST['hp'];
			$tgl =$_POST['tgl'];
			$data_user =mysqli_query($koneksi, "SELECT * FROM pelanggan where nomor_telpon = '$hp'");
			$r = mysqli_fetch_array($data_user);
            
			$telp =$r['nomor_telpon'];
			$id= $r['pelanggan_id'];
            $nama = $r['nama_pelanggan'];
            $insert=mysqli_query($koneksi, "insert into penjualan (penjualan_id, tanggal_penjualan,
            pelanggan_id) values (null, '$tgl', '$id')");
			if($hp==$telp){
				$_SESSION['pelanggan_id'] = $id;
                $_SESSION['nama_pelanggan'] = $nama;
                $_SESSION['nomor_telpon'] = $telp;
            }else{
                echo 'gagal';
            }
        }
        ?>
<hr>
<?php
		$sql="select * from penjualan ORDER BY penjualan_id DESC";
$result=mysqli_query($koneksi,$sql);
$data=mysqli_fetch_assoc($result);
$_SESSION['id']=$data['penjualan_id'];

		?>

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $data['penjualan_id'] ?>">
            <label for="ip">Id Pelanggan</label>
        <input type="text" name="id_pelanggan" value="<?php echo $_SESSION['pelanggan_id'] ?>" id="ip">
        <br>
        <label for="np">Nama Pelanggan</label>
        <input type="text" name="nama" value="<?php echo $_SESSION['nama_pelanggan'] ?>" id="np">
        <br>
        <label for="hp">Nomor Telepon</label>
        <input type="text" name="telp" value="<?php echo $_SESSION['nomor_telpon'] ?>" id="hp">
        <br>
        <label for="n">Nama Petugas</label>
        <input type="text" name="petugas" value="<?php echo $_SESSION['nama_petugas'] ?>" id="n">
        <br>
        <label for="tg">Tanggal</label>
        <input type="text" name="tgl" value="<?php echo date('d-m-Y'); ?>" id="tg">
        <br>
        <label for="kd">Kode Produk</label>
        <select name="kd" id="kd">
        <?php
        $sel=mysqli_query($koneksi, "select * from produk");
        while($pr=mysqli_fetch_array($sel))
        {
        ?>
        <option value="<?= $pr['kode'] ?>"><?= $pr['kode'] ?> | <?= $pr['nama_produk'] ?> | Rp.<?= $pr['harga'] ?> </option>
            <?php
        }
        ?>
        </select>
        <br>
        <label for="jm">Jumlah Produk</label>
        <input type="number" name="jm" value="1" id="jm">
        <br>
        <input type="submit" class="btn btn-info mb-1" name="save" value="save">
        </form>
        <hr>
<table border="1">

<?php
if(isset($_POST['save'])){
    $id=$_POST['id'];
$tgl=$_POST['tgl'];
$pelid=$_POST['id_pelanggan'];
$petugas=$_POST['petugas'];
$kd=$_POST['kd'];
$produk =mysqli_query($koneksi, "SELECT * FROM produk where kode = '$kd'");
$show = mysqli_fetch_array($produk);
$jm=$_POST['jm'];
$sub=$_POST['jm'] * $show['harga'];
$nabar= $show['nama_produk'];
$stk=$show['stok']-$jm;
$del=mysqli_query($koneksi,"update produk set stok='$stk' where kode = '$kd'");
$insert=mysqli_query($koneksi,"insert into detail_penjualan (detail_id, penjualan_id, kode, jumlah_produk, subtotal) values('null', '$id', '$kd', '$jm', '$sub')");
$jual =mysqli_query($koneksi, "select detail_penjualan.kode, produk.nama_produk, produk.harga, detail_penjualan.jumlah_produk, produk.harga * detail_penjualan.jumlah_produk as subtot from detail_penjualan, produk where produk.kode=detail_penjualan.kode and detail_penjualan.penjualan_id='$id'");

$no=1;
    $tot=0;
while($detail = mysqli_fetch_array($jual)){
    
?>


<table class="table">
    
    <tr>
        <td><?= $no ?></td>
        <td><?= $detail['kode'] ?></td>
        <td><?= $detail['nama_produk'] ?></td>
        <td><?= $detail['jumlah_produk'] ?></td>
        <td><?= $detail['subtot'] ?></td>
        <td align="center" width="70px">
        <a href="keranjang-del.php?id=<?=$detail['kode'] ?>" 
	onclick="return confirm('Apakah Anda Yakin data transaksi <?= $detail['nama_produk'] ?> akan dihapus?')" class="btn btn-danger">Del</a>
</td>
    </tr>
    
    <?php 
    $no++;
    $tot=$tot+$detail['subtot'];
}
?>
<tr>
    <td colspan="4">Total Harga</td>
    <td><?= $tot ?></td>
</tr>
</table>

<form method="POST" action="hitung.php">
total harga : <input type="hidden" name="tot" value="<?= $tot ?>"><?= $tot ?><br>
bayar : <input type="number" name="bayar">
<input type="submit" name="save" value="OK">	
</form>
<?php
}
?>
<?php 
if(isset($_GET['save'])) {
	// code...

$total_harga=$_SESSION['tot'];
$bayar=$_SESSION['byr'];
$kembali=$_SESSION['kembali'];
?>
<br>
<tr>
<td>total harga : <?= $total_harga ?></td><br>
</tr>
bayar : <?= $bayar ?><br>
kembali : <?= $kembali ?><br>
<br>
<a href="tampil_transaksi.php" margin-bottom="20px"class="btn btn-info">selesai</a>
<?php } ?>
</body>
</html>