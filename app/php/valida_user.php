<?php
session_start();

require_once('../../config.php');
require_once('opendb.php');


//$sql = "SELECT ID_USUARIO, CONCAT(CUUSUARIO, ' ', CUAPELLIDOS) AS NOMBRE FROM cantprosdb.C_USUARIOS WHERE CUEMAIL = '$_POST[usuario]' AND CUPASS = '$_POST[pass]' AND CUUSUARIO_AUTORIZADO = 1;";
$sql = "SELECT ID_USUARIO, TIPO, CONCAT(CUUSUARIO, ' ', CUAPELLIDOS) AS NOMBRE, hospital FROM cantprosdb.C_USUARIOS inner join cantprosdb.C_HOSPITALES ON C_USUARIOS.CUHOSPITAL = C_HOSPITALES.ID_HOSPITAL WHERE CUEMAIL = '$_POST[usuario]' AND CUPASS = '$_POST[pass]' AND CUUSUARIO_AUTORIZADO = 1;";


$registros = mysqli_query($conexion,$sql);
$error = mysqli_error($conexion);

if ($error <> "") {
	print($error);
} else {
	
	while ($row=mysqli_fetch_array($registros))
	{
		$_SESSION["ID_USUARIO"] = $row['ID_USUARIO'];
		$_SESSION["HOSPITAL"] = $row['hospital'];
		$_SESSION["NOMBRE"] = $row['NOMBRE'];
		$_SESSION["TIPO"] = $row['TIPO'];
	}
	//mysql_free_result($result);

	//print($_SESSION["HOSPITAL"]);
	//print($_SESSION["NOMBRE"]);
	
	if ($_SESSION["ID_USUARIO"] != "") {
		//echo 'home';
		header('Location: ../../home.php');
		//echo "<script type='text/javascript'>window.location.href = '../../home.php';</script>";
	} else {
		//echo 'index';
		echo 'index';

		header('Location: ../../index.html'); 
		//echo "<script type='text/javascript'>window.location.href = '../../index.html';</script>";
	}
}

/*session_start();

include '../../config.php';
include 'opendb.php';

$sql = "SELECT ID_USUARIO, CONCAT(CUUSUARIO, ' ', CUAPELLIDOS) AS NOMBRE FROM cantprostdbC_USUARIOS WHERE CUEMAIL = '$_POST[usuario]' AND CUPASS = '$_POST[pass]' AND CUUSUARIO_AUTORIZADO = 1;";

$registros = mysqli_query($conexion,$sql);
$error = mysqli_error($conexion);

if ($error <> "") {
	print($error);
} else {
	echo 'home';
	while ($row=mysqli_fetch_array($registros))
	{
		$_SESSION["ID_USUARIO"] = $row['ID_USUARIO'];
		$_SESSION["NOMBRE"] = $row['NOMBRE'];
	}
	mysql_free_result($result);

	print($_SESSION["ID_USUARIO"]);
	print($_SESSION["NOMBRE"]);


	
	if ($_SESSION["ID_USUARIO"] != "") {
		echo 'home';
		header('Location: ../../home.php'); 
	} else {
		echo 'index';
		header('Location: ../../index.html'); 
	}
}*/
	
include 'closedb.php';
?>
