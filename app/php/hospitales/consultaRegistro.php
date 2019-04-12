<?php
header("Content-Type: application/json");	
	
include '../../../config.php';
include '../opendb.php';
include '../funciones.php';

$idRegistro = (int)$_REQUEST["idRegistro"];

$sql = "SELECT HOSPITAL as sHospital, SECTOR as iSector, NIVEL_HOSPITAL as iNivel, DIRECCION as sDireccion, COLONIA as sColonia, CIUDAD as sCiudad, ESTADO as sEstado, CP as sCp, TELEFONO as sTelefono, TIPO_TEL as iTipoTel, EMAIL as sEmail, OBSEVACIONES as sObservaciones FROM cantprosdb.C_HOSPITALES WHERE ESTATUS = 1 AND ID_HOSPITAL = {$idRegistro};";

$registros = mysqli_query($conexion,$sql);
$error = mysqli_error($conexion);
print($error);

$rows = array();
while($row = mysqli_fetch_assoc($registros)) {
	$rows[] = $row;
}

echo json_encode($rows);
	
?>