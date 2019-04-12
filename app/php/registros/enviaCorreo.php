<?php
header("Content-Type: application/json");	
session_start(); 
include '../../../config.php';
include '../opendb.php';

$subject = $_REQUEST["subject"];
$msg = $_REQUEST["cuerpo"];
$msg = wordwrap($msg,70);

$sqlquery = "SELECT cuemail as email FROM cantprosdb.C_USUARIOS WHERE ID_USUARIO = $_REQUEST[id];";

$registros = mysqli_query($conexion,$sqlquery);
$error = mysqli_error($conexion);
$correo = "";
while($row = mysqli_fetch_assoc($registros)) {
	$correo = $row["email"];
}

$response = array();

mail($correo,$subject,$msg);
$response = array(
	'status' => true,
	'message' => 'Success'
);

echo json_encode($response);

include '../closedb.php';
?>