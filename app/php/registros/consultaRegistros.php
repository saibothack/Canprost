<?php
session_start();
header("Content-Type: application/json");	
	
include '../../../config.php';
include '../opendb.php';
include '../funciones.php';

$current = $_REQUEST["current"];
$rowcount = $_REQUEST["rowCount"];
$search = $_REQUEST["searchPhrase"];

$inicia = (($current - 1) *  $rowcount);

if ($search) {
	if ($_SESSION["TIPO"] == 1) {
		$sql = "select r.ID_REGISTRO as id, 	CONCAT(IFNULL(CONCAT(r.CRNOMBRE,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_PATERNO,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_MATERNO,' '),' ')) AS nombre, r.CRNUMERO_REGISTRO, DATE_FORMAT(r.CRFECHA_INICIO, '%d/%m/%Y') as sFechaRegistro, h.HOSPITAL as sNombreHospital from cantprosdb.C_REGISTROS r inner join cantprosdb.C_USUARIOS u on u.ID_USUARIO=r.CRUSUARIO_INICIO inner join cantprosdb.C_HOSPITALES h on h.ID_HOSPITAL=u.CUHOSPITAL WHERE CONCAT(IFNULL(CONCAT(r.CRNOMBRE,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_PATERNO,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_MATERNO,' '),' '))  LIKE '%{$search}%' ;";
	
		$sqlcount = "SELECT COUNT(*) as cuenta from cantprosdb.C_REGISTROS r inner join cantprosdb.C_USUARIOS u on u.ID_USUARIO=r.CRUSUARIO_INICIO inner join cantprosdb.C_HOSPITALES h on h.ID_HOSPITAL=u.CUHOSPITAL WHERE CONCAT(IFNULL(CONCAT(r.CRNOMBRE,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_PATERNO,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_MATERNO,' '),' '))  LIKE '%{$search}%';";	
	} else {
		$sql = "select r.ID_REGISTRO as id, 	CONCAT(IFNULL(CONCAT(r.CRNOMBRE,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_PATERNO,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_MATERNO,' '),' ')) AS nombre, r.CRNUMERO_REGISTRO, DATE_FORMAT(r.CRFECHA_INICIO, '%d/%m/%Y') as sFechaRegistro, h.HOSPITAL as sNombreHospital from cantprosdb.C_REGISTROS r inner join cantprosdb.C_USUARIOS u on u.ID_USUARIO=r.CRUSUARIO_INICIO inner join cantprosdb.C_HOSPITALES h on h.ID_HOSPITAL=u.CUHOSPITAL WHERE CONCAT(IFNULL(CONCAT(r.CRNOMBRE,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_PATERNO,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_MATERNO,' '),' '))  LIKE '%{$search}%' AND u.ID_USUARIO = {$_SESSION["ID_USUARIO"]};";
	
		$sqlcount = "SELECT COUNT(*) as cuenta from cantprosdb.C_REGISTROS r inner join cantprosdb.C_USUARIOS u on u.ID_USUARIO=r.CRUSUARIO_INICIO inner join cantprosdb.C_HOSPITALES h on h.ID_HOSPITAL=u.CUHOSPITAL WHERE CONCAT(IFNULL(CONCAT(r.CRNOMBRE,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_PATERNO,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_MATERNO,' '),' '))  LIKE '%{$search}%' AND u.ID_USUARIO = {$_SESSION["ID_USUARIO"]};";	
	}
} else {
	if ($_SESSION["TIPO"] == 1) { 
		$sql = "select r.ID_REGISTRO as id, CONCAT(IFNULL(CONCAT(r.CRNOMBRE,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_PATERNO,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_MATERNO,' '),' ')) AS nombre, r.CRNUMERO_REGISTRO, DATE_FORMAT(r.CRFECHA_INICIO, '%d/%m/%Y') as sFechaRegistro, h.HOSPITAL as sNombreHospital from cantprosdb.C_REGISTROS r inner join cantprosdb.C_USUARIOS u on u.ID_USUARIO=r.CRUSUARIO_INICIO inner join cantprosdb.C_HOSPITALES h on h.ID_HOSPITAL=u.CUHOSPITAL ";
		
		$sqlcount = "SELECT COUNT(*) as cuenta from cantprosdb.C_REGISTROS r inner join cantprosdb.C_USUARIOS u on u.ID_USUARIO=r.CRUSUARIO_INICIO inner join cantprosdb.C_HOSPITALES h on h.ID_HOSPITAL=u.CUHOSPITAL;";
	} else {
		$sql = "select r.ID_REGISTRO as id, CONCAT(IFNULL(CONCAT(r.CRNOMBRE,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_PATERNO,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_MATERNO,' '),' ')) AS nombre, r.CRNUMERO_REGISTRO, DATE_FORMAT(r.CRFECHA_INICIO, '%d/%m/%Y') as sFechaRegistro, h.HOSPITAL as sNombreHospital from cantprosdb.C_REGISTROS r inner join cantprosdb.C_USUARIOS u on u.ID_USUARIO=r.CRUSUARIO_INICIO inner join cantprosdb.C_HOSPITALES h on h.ID_HOSPITAL=u.CUHOSPITAL WHERE u.ID_USUARIO = {$_SESSION["ID_USUARIO"]} ";
		
		$sqlcount = "SELECT COUNT(*) as cuenta from cantprosdb.C_REGISTROS r inner join cantprosdb.C_USUARIOS u on u.ID_USUARIO=r.CRUSUARIO_INICIO inner join cantprosdb.C_HOSPITALES h on h.ID_HOSPITAL=u.CUHOSPITAL WHERE u.ID_USUARIO = {$_SESSION["ID_USUARIO"]};";
	}
}

if($rowcount != "-1") {
	$sql = $sql . "LIMIT {$inicia}, {$rowcount};";
}


$registros = mysqli_query($conexion,$sqlcount);
$error = mysqli_error($conexion);
$count = 0;
while($row = mysqli_fetch_assoc($registros)) {
	$count = $row["cuenta"];
}

$registros = mysqli_query($conexion,$sql);
$error = mysqli_error($conexion);


$rows = array();
while($row = mysqli_fetch_assoc($registros)) {
	$rows[] = $row;
}

$data = array(
	"current" 	=> (int)$current,
	"rowCount"	=> (int)$rowcount,
	"rows" => array($rows),
	"total" => $count
);

echo jsonformat($data);


include '../closedb.php';
?>