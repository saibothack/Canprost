<?php
header("Content-Type: application/json");	
	
include '../../../config.php';
include '../opendb.php';

$idRegistro= $_REQUEST["id"];
//$sql = "SELECT C_REGISTROS.*, C_CIRUGIA.*,C_METASTASIS.*,C_PROGRESION.*,C_RADIOTERAPIA.*,C_SIN_TRATAMIENTO.* FROM cantprosdb.C_REGISTROS left join cantprosdb.C_CIRUGIA on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_CIRUGIA.ID_REGISTRO left join cantprosdb.C_METASTASIS on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_METASTASIS.ID_REGISTRO left join cantprosdb.C_PROGRESION on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_PROGRESION.ID_REGISTRO left join cantprosdb.C_RADIOTERAPIA on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_RADIOTERAPIA.ID_REGISTRO left join cantprosdb.C_SIN_TRATAMIENTO on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_SIN_TRATAMIENTO.ID_REGISTRO WHERE C_REGISTROS.ID_REGISTRO = $idRegistro;";
$sql="SELECT C_DIAG_DESCONOCIDO.CR_TIPO_DIAG AS VALOR,  'form_diagnostico5.chk' AS propiedad
FROM cantprosdb.C_DIAG_DESCONOCIDO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_RELACION_REGISTROS.ID_OPCION_CAMPO AS valor, CONCAT(  'campo_', C_RELACION_REGISTROS.ID_TIPO_CAMPO ) AS PROPIEDAD
FROM cantprosdb.C_RELACION_REGISTROS
WHERE ID_REGISTRO =$idRegistro
AND TIPO_RELACION =1
UNION ALL SELECT GROUP_CONCAT( C_RELACION_REGISTROS.ID_OPCION_CAMPO
SEPARATOR  ',' ) AS valor, CONCAT(  'campo_', C_RELACION_REGISTROS.ID_TIPO_CAMPO ) AS PROPIEDAD
FROM cantprosdb.C_RELACION_REGISTROS
WHERE ID_REGISTRO =$idRegistro
AND TIPO_RELACION =2
GROUP BY ID_TIPO_CAMPO
;";
//print($sql);
$registros = mysqli_query($conexion,$sql);
$error = mysqli_error($conexion);


$rows = array();
while($row = mysqli_fetch_assoc($registros)) {
	$rows[] = $row;
}


echo json_encode($rows);

include '../closedb.php';
?>