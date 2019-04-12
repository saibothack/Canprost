<?php
header("Content-Type: application/json");	
	
include '../../../config.php';
include '../opendb.php';

$idRegistro= $_REQUEST["id"];
//$sql = "SELECT C_REGISTROS.*, C_CIRUGIA.*,C_METASTASIS.*,C_PROGRESION.*,C_RADIOTERAPIA.*,C_SIN_TRATAMIENTO.* FROM cantprosdb.C_REGISTROS left join cantprosdb.C_CIRUGIA on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_CIRUGIA.ID_REGISTRO left join cantprosdb.C_METASTASIS on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_METASTASIS.ID_REGISTRO left join cantprosdb.C_PROGRESION on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_PROGRESION.ID_REGISTRO left join cantprosdb.C_RADIOTERAPIA on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_RADIOTERAPIA.ID_REGISTRO left join cantprosdb.C_SIN_TRATAMIENTO on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_SIN_TRATAMIENTO.ID_REGISTRO WHERE C_REGISTROS.ID_REGISTRO = $idRegistro;";
$sql="SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_FECHA_BIOPSIA AS VALOR,  'form_diagnostico2.dBiopsia' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_OTRORHP AS VALOR,  'form_diagnostico2.sOtroRHP' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_GLEASON1 AS VALOR,  'form_diagnostico2.iGleason1' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_GLEASON2 AS VALOR,  'form_diagnostico2.iGleason2' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_APE_TOTAL AS VALOR,  'form_diagnostico2.iAPETotal' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_APE_LIBRE AS VALOR,  'form_diagnostico2.iAPELibre' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_DESCONOCIDO AS VALOR,  'form_diagnostico2.sDesconocido' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_ESTUDIOIMAGEN AS VALOR,  'form_diagnostico2.sEstudiosImagen' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_OTRO_TAC AS VALOR,  'form_diagnostico2.sOtroTac' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_OTRO_RMI AS VALOR,  'form_diagnostico2.sOtroRMI' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_OTRO_PET AS VALOR,  'form_diagnostico2.sOtroPET' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_OTRO_GGO AS VALOR,  'form_diagnostico2.sOtroGGO' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_VIGILANCIA_ACTIVA AS VALOR,  'form_diagnostico2.sVigilanciaActiva' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_PROGRESION_VIGILANCIA AS VALOR,  'form_diagnostico2.sProgresion' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_DIFERIDO AS VALOR,  'form_diagnostico2.sDiferido' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_NUMERO_LESIONES AS VALOR,  'form_diagnostico2.sNumeroLesiones' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_GLEASONSUMA AS VALOR,  'form_diagnostico2.iGleasonsuma' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
WHERE id_registro =$idRegistro
UNION ALL SELECT C_DIAG_BIOPSIA_OTRO_SITIO.CR_GLEASON_DESCONOCIDO AS VALOR,  'form_diagnostico2.iGleasondesconocido' AS propiedad
FROM cantprosdb.C_DIAG_BIOPSIA_OTRO_SITIO
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