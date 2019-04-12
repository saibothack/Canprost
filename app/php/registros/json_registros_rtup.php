<?php
header("Content-Type: application/json");	
	
include '../../../config.php';
include '../opendb.php';

$idRegistro= $_REQUEST["id"];
//$sql = "SELECT C_REGISTROS.*, C_CIRUGIA.*,C_METASTASIS.*,C_PROGRESION.*,C_RADIOTERAPIA.*,C_SIN_TRATAMIENTO.* FROM cantprosdb.C_REGISTROS left join cantprosdb.C_CIRUGIA on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_CIRUGIA.ID_REGISTRO left join cantprosdb.C_METASTASIS on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_METASTASIS.ID_REGISTRO left join cantprosdb.C_PROGRESION on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_PROGRESION.ID_REGISTRO left join cantprosdb.C_RADIOTERAPIA on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_RADIOTERAPIA.ID_REGISTRO left join cantprosdb.C_SIN_TRATAMIENTO on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_SIN_TRATAMIENTO.ID_REGISTRO WHERE C_REGISTROS.ID_REGISTRO = $idRegistro;";
$sql="SELECT C_DIAG_RTUP.C_RTUP AS VALOR,  'form_diagnostico6.dRTUP' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_OTRORHP AS VALOR,  'form_diagnostico6.sOtroRHP' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_GLEASON1 AS VALOR,  'form_diagnostico6.iGleason1' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_GLEASON2 AS VALOR,  'form_diagnostico6.iGleason2' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_APE_TOTAL AS VALOR,  'form_diagnostico6.iAPETotal' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_APE_LIBRE AS VALOR,  'form_diagnostico6.iAPELibre' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_DESCONOCIDO AS VALOR,  'form_diagnostico6.sDesconocido' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_OTROSMARCADORES AS VALOR,  'form_diagnostico6.sOtrosMarcadores' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_ESTUDIOIMAGEN AS VALOR,  'form_diagnostico6.sEstudiosImagen' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_OTRO_MARCADOR AS VALOR,  'form_diagnostico6.sOtroMarcador' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_OTRO_TAC AS VALOR,  'form_diagnostico6.sOtroTac' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_OTRO_RMI AS VALOR,  'form_diagnostico6.sOtroRMI' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_OTRO_PET AS VALOR,  'form_diagnostico6.sOtroPET' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_OTRO_GGO AS VALOR,  'form_diagnostico6.sOtroGGO' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_VIGILANCIA_ACTIVA AS VALOR,  'form_diagnostico6.sVigilanciaActiva' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_PROGRESION_VIGILANCIA AS VALOR,  'form_diagnostico6.sProgresion' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_DIFERIDO AS VALOR,  'form_diagnostico6.sDiferido' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_NUMERO_LESIONES AS VALOR,  'form_diagnostico6.sNumeroLesiones' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CDR_date_RTUP AS VALOR,  'form_diagnostico6.fechaRTUP' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_GLEASONSUMA AS VALOR,  'form_diagnostico6.iGleasonsuma' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_RTUP.CR_GLEASON_DESCONOCIDO AS VALOR,  'form_diagnostico6.iGleasondesconocido' AS propiedad
FROM cantprosdb.C_DIAG_RTUP
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