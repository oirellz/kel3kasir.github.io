<!DOCTYPE html>
<html>
<head>
<title>Edit Data Petugas</title>
<style>
form{
width:350px;
padding:20px;
margin:20px auto;
box-shadow: 0 0 10px 0 #333;
border-radius:20px;
font:14px "Tahoma";
}
input[type="text"], input[type="number"]{
width:230px;
padding:5px;
}
.simpan{
background: blue;
color:white;
border-radius: 20px;
border:none;
text-decoration: none;
padding:10px 20px;
}
.batal{
background: red;
color:white;
border-radius: 20px;
border:none;
text-decoration: none;
padding:10px 20px;
}
</style>
</head>
<body>
<?php
$id=$_GET['id'];
include "../config.php";
$sql="select * from petugas where petugas_id='$id'";
$result=mysqli_query($koneksi,$sql);
$data=mysqli_fetch_array($result);
?>
<form method="POST" action="update.php">
<h2>Edit Data Petugas</h2>
<hr>
<table width="100%">
<tr>
<td>Nama Petugas</td>
<td><input type="hidden" name="id" value="<?=
$data['petugas_id'] ?>"><input type="text" name="np" value="<?=
$data['nama_petugas'] ?>"></td>
</tr>
<tr>
<td>Username</td>
<td><input type="text" name="un" value="<?=
$data['username'] ?>"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="hp" value="<?=
$data['password'] ?>"></td>
</tr>
<tr>
<td>No Telp</td>
<td><input type="text" name="sp" value="<?=
$data['nomor_telpon'] ?>"></td>
</tr>
<tr>
<td>level</td>
<td>
    <select name="lv">
    <option value="admin">Pilih Level</option>
        <option value="admin">admin</option>
        <option value="petugas">petugas</option>
    </select>
</td>
</tr>
</table>
<hr>
<p align="right">
<input type="submit" name="save" value="Update"
class="simpan">
<a href="index.php" class="batal">Batal</a>
</p>
</form>
</body>
</html>