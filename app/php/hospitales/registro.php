<?php
header("Content-Type: application/json");	
	
include '../../../config.php';
include '../opendb.php';

$iHospital = (int)$_REQUEST['iHospital'];
$sHospital = htmlentities((string)$_REQUEST['hospital']);
$iSector = (int)$_REQUEST['sector'];
$iNivel = (int)$_REQUEST['nivel'];
$sDireccion = htmlentities((string)$_REQUEST['direccion']);
$sColonia = htmlentities((string)$_REQUEST['colonia']);
$sCiudad = htmlentities((string)$_REQUEST['ciudad']);
$sEstado = htmlentities((string)$_REQUEST['estado']);
$sCp = htmlentities((string)$_REQUEST['cp']);
$sTelefono = htmlentities((string)$_REQUEST['telefono']);
$iTipoTel = (int)$_REQUEST['tipotel'];
$sEmail = htmlentities((string)$_REQUEST['email']);
$sObservaciones = htmlentities((string)$_REQUEST['observaciones']);

if ($_REQUEST['iHospital'] <> "") {
	$sql = "UPDATE `cantprosdb`.`C_HOSPITALES`
			SET
			`HOSPITAL` = '{$sHospital}',
			`SECTOR` = {$iSector},
			`NIVEL_HOSPITAL` = {$iNivel},
			`DIRECCION` = '{$sDireccion}',
			`COLONIA` = '{$sColonia}',
			`CIUDAD` = '{$sCiudad}',
			`ESTADO` = '{$sEstado}',
			`CP` = '{$sCp}',
			`TELEFONO` = '{$sTelefono}',
			`TIPO_TEL` = {$iTipoTel},
			`EMAIL` = '{$sEmail}',
			`OBSEVACIONES` = '{$sObservaciones}'
			WHERE `ID_HOSPITAL` = {$iHospital};
			";
} else {
	$sql = "INSERT INTO `C_HOSPITALES` (`HOSPITAL`, `SECTOR`, `NIVEL_HOSPITAL`, `DIRECCION`, `COLONIA`, `CIUDAD`, `ESTADO`, `CP`, `TELEFONO`, `TIPO_TEL`, `EMAIL`, `OBSEVACIONES`) VALUES  ('{$sHospital}', '{$iSector}', '{$iNivel}', '{$sDireccion}', '{$sColonia}', '{$sCiudad}', '{$sEstado}', '{$sCp}', '{$sTelefono}', '{$iTipoTel}', '{$sEmail}', '{$sObservaciones}');";
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

include '../closedb.php';
?>