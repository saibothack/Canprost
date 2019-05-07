<?php
session_start(); 
header("Content-Type: application/json");	
	
include '../../../config.php';
include '../opendb.php';

$iHospital = (int)$_REQUEST['idRegistro'];

$sql = "UPDATE `cantprosdb`.`C_HOSPITALES`
		SET ESTATUS = 0, `USUARIO_FINAL` = {$_SESSION['ID_USUARIO']} , `FECHA_FINAL` = NOW() WHERE `ID_HOSPITAL` = {$iHospital};";

mysqli_query($conexion,$sql);
$error = mysqli_error($conexion);

$response = array();
if (!$error) {
    $response = array(
        'status' => true,
        'message' => 'Success'
    );
}else {
    $response = array(
        'status' => false,
        'message' => $error
    );
}

echo json_encode($response);

include '../closedb.php';
?>