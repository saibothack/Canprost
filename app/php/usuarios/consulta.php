<?php
header("Content-Type: application/json");	
	
include '../../../config.php';
include '../opendb.php';

$sql = "SELECT ID_HOSPITAL as id, HOSPITAL as sHospital, TELEFONO as sTelefono, FECHA_INICIO as sFechaRegistro FROM cantprosdb.C_HOSPITALES WHERE ESTATUS = 1;";

$registros = mysqli_query($conexion,$sql);
$error = mysqli_error($conexion);
$num_rows = mysql_numrows($result);

print ($num_rows);

$rows = array();
while($row = mysqli_fetch_assoc($registros)) {
	$rows[] = $row;
}

$data = array(
	"current" 	=> 1,
	"rowCount"	=> 10,
	"rows" => array($rows),
	"total" => $num_rows
);

echo json_encode($data);

include '../closedb.php';
?>