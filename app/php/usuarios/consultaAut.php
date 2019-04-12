<?php
header("Content-Type: application/json");	
	
include '../../../config.php';
include '../opendb.php';
include '../funciones.php';

$current = $_REQUEST["current"];
$rowcount = $_REQUEST["rowCount"];
$search = $_REQUEST["searchPhrase"];
//$current = $_REQUEST["current"];

$inicia = (($current - 1) *  $rowcount);

if ($search) {
	$sql = "SELECT ID_usuario as id, CONCAT(CUUSUARIO,  ' ', CUAPELLIDOS) as nombre, cuemail as email, DATE_FORMAT(cufecha_inicio, '%d/%m/%Y') as sFechaRegistro FROM
	cantprosdb.C_USUARIOS WHERE CUESTATUS = 1 AND cuusuario LIKE '%{$search}%';";
	$sqlcount = "SELECT COUNT(*) as cuenta FROM C_USUARIOS WHERE CUESTATUS = 1 AND cuusuario LIKE '%{$search}%';";
} else {
	$sql = "SELECT ID_usuario as id, CONCAT(CUUSUARIO,  ' ', CUAPELLIDOS) as nombre, cuemail as email, DATE_FORMAT(cufecha_inicio, '%d/%m/%Y') as sFechaRegistro FROM cantprosdb.C_USUARIOS WHERE CUESTATUS = 1 LIMIT {$inicia}, {$rowcount};";
	$sqlcount = "SELECT COUNT(*) as cuenta FROM C_USUARIOS WHERE CUESTATUS = 1;";
}

//print($sql);

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