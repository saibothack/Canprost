<?php
	include 'config.php';
	include 'opendb.php';
	$myText = (string)$conn;
	print("asdf");
	print($myText);

	$sql = "SELECT `COMPLETO` FROM `C_PACIENTES`";
	$registros=mysqli_query($conn,$sql) or die("Problemas en el select:".mysqli_error($conn));

	echo($registros);

	include 'closedb.php';
?>