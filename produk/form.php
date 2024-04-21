<!DOCTYPE html>
<html>
<head>
<title>Input Data Petugas</title>
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
<form method="POST" action="simpan.php">
    <h2> Input Data Produk</h2>
<fieldset>
    <legend>Formulir Petugas</legend>
<hr>
<table width="100%">
<tr>
<td>Kode Produk</td>
<td><input type="text" name="kp"></td>
</tr>
<tr>
<td>Nama Produk</td>
<td><input type="text" name="np"></td>
</tr>
<tr>
<td>harga</td>
<td><input type="text" name="un"></td>
</tr>
<tr>
<td>stok</td>
<td><input type="text" name="sp"></td>
</tr>
</table>
<hr>
<p align="right">
<input type="submit" name="save" value="Simpan"
class="simpan">
<a href="index.php" class="batal">Batal</a>
</p>
</form>
</body>
</html>