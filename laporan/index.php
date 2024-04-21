<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<html lang="en">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style></style>
</head>
<body>
	<?php
$id=$_GET['id'];
$_SESSION['nama']=$id;
	?>
<form method="POST" action="harian.php?id=<?php echo $_SESSION['nama'] ?>" target="lap" class="form-report">
	<h2>Laporan Harian</h2>
	<select class="form-select" aria-label="Default select example" name="tgl" size="1">
		<option value="1">Tgl</option>
		<?php
		for($a=1;$a<=31;$a++){
		?>
		<option value="<?= $a ?>"><?= $a ?></option>
		<?php	
		} 
		?>
	</select>
	<br>
	<select class="form-select" aria-label="Default select example" name="bln" size="1">
		<option value="1">Bln</option>
		<?php
		for($b=1;$b<=12;$b++){
		?>
		<option value="<?= $b ?>"><?= $b ?></option>
		<?php	
		} 
		?>
	</select>
	<br>
	<select class="form-select" aria-label="Default select example" name="thn" size="1">
		<option value="1">Thn</option>
		<?php
		$thnskr=date("Y");
		$mulai=$thnskr-6;
		for($c=$mulai;$c<=$thnskr;$c++){
		?>
		<option value="<?= $c ?>"><?= $c ?></option>
		<?php	
		} 
		?>
	</select>
	<input class="btn btn-info m-1" type="submit" name="tglproses" value="OK" style="padding:5px 10px; margin:2px">
</form>
<hr>
<form method="POST" action="bulanan.php?id=<?php echo $_SESSION['nama'] ?>" target="lap" class="form-report">
	<h2>Laporan Bulanan</h2>
	<select class="form-select" aria-label="Default select example" name="bln" size="1">
		<option value="1">Bln</option>
		<?php
		for($b=1;$b<=12;$b++){
		?>
		<option value="<?= $b ?>"><?= $b ?></option>
		<?php	
		} 
		?>
	</select>
	<br>
	<select class="form-select" aria-label="Default select example" name="thn" size="1">
		<option value="1">Thn</option>
		<?php
		$thnskr=date("Y");
		$mulai=$thnskr-6;
		for($c=$mulai;$c<=$thnskr;$c++){
		?>
		<option value="<?= $c ?>"><?= $c ?></option>
		<?php	
		} 
		?>
	</select>
	<input class="btn btn-info m-1" type="submit" name="tglproses" value="OK" style="padding:5px 10px; margin:2px">
	<br>
</form><hr>
<button class="btn-print btn btn-info m-1" type="button" onclick="frames['lap'].print();">
Print</button>
<hr>
<iframe name="lap" frameborder="0" width="100%" height="500px"></iframe>

</body>
</html>