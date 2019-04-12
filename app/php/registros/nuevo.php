<?php
header("Content-Type: application/json");	
	
include '../../../config.php';
include '../opendb.php';


$sNombre = (string)$_REQUEST[sNombres];
$sApPaterno = (string)$_REQUEST[sApellidoPaterno];
$sApMaterno = (string)$_REQUEST[sApellidoMaterno];
$dDate = ((string)$_REQUEST[dNacimiento]);
$sRfc = ((string)$_REQUEST[sRFC]);

if ($_REQUEST[iHospital] <> "") {
	
} else {
	$sql = "INSERT INTO `cantprosdb`.`C_REGISTROS` (`CRNOMBRE`, `CRAPELLIDO_PATERNO`,`CRAPELLIDO_MATERNO`, `CRFECHA_NACIMIENTO`, `CRRFC`, `CRUSUARIO_INICIO`) VALUES ('{$sNombre}','{$sApPaterno}','{$sApMaterno}','{$dDate}','{$sRfc}','{$_SESSION["ID_USUARIO"]}')";
    //se carga la sesion del RFC para poder asignarla al usuario
    $_SESSION[rfc] = $sRfc;
}

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

header('Location: ../../registros/agregar.html'); 
include '../closedb.php';
?>