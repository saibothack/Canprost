<?php
header("Content-Type: application/json");	
	
include '../../../config.php';
include '../opendb.php';

$idRegistro= $_REQUEST["id"];
//$sql = "SELECT C_REGISTROS.*, C_CIRUGIA.*,C_METASTASIS.*,C_PROGRESION.*,C_RADIOTERAPIA.*,C_SIN_TRATAMIENTO.* FROM cantprosdb.C_REGISTROS left join cantprosdb.C_CIRUGIA on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_CIRUGIA.ID_REGISTRO left join cantprosdb.C_METASTASIS on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_METASTASIS.ID_REGISTRO left join cantprosdb.C_PROGRESION on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_PROGRESION.ID_REGISTRO left join cantprosdb.C_RADIOTERAPIA on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_RADIOTERAPIA.ID_REGISTRO left join cantprosdb.C_SIN_TRATAMIENTO on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_SIN_TRATAMIENTO.ID_REGISTRO WHERE C_REGISTROS.ID_REGISTRO = $idRegistro;";
$sql="SELECT C_DIAG_BIOPSIA.cr_fecha_biopsia as VALOR,  'form_diagnostico1.dBiopsia' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_DIAG_BIOPSIA.CR_OTROCILINDRO as VALOR,  'form_diagnostico1.sOtroCilindro' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_OTRORHP as VALOR,  'form_diagnostico1.sOtroRHP' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_GLEASON1 as VALOR,  'form_diagnostico1.iGleason1' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_GLEASON2 as VALOR,  'form_diagnostico1.iGleason2' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_APE_TOTAL as VALOR,  'form_diagnostico1.iAPETotal' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_APE_LIBRE as VALOR,  'form_diagnostico1.iAPELibre' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_DESCONOCIDO as VALOR,  'form_diagnostico1.sDesconocido' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_OTROSMARCADORES as VALOR,  'form_diagnostico1.sOtrosMarcadores' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_ESTUDIOIMAGEN as VALOR,  'form_diagnostico1.sEstudiosImagen' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_OTRO_MARCADOR as VALOR,  'form_diagnostico1.sOtroMarcador' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_OTRO_TAC as VALOR,  'form_diagnostico1.sOtroTac' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_OTRO_RMI as VALOR,  'form_diagnostico1.sOtroRMI' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_OTRO_PET as VALOR,  'form_diagnostico1.sOtroPET' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_OTRO_GGO as VALOR,  'form_diagnostico1.sOtroGGO' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL

SELECT C_DIAG_BIOPSIA.CR_VIGILANCIA_ACTIVA as VALOR,  'form_diagnostico1.sVigilanciaActiva' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_PROGRESION_VIGILANCIA as VALOR,  'form_diagnostico1.sProgresion' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_DIFERIDO as VALOR,  'form_diagnostico1.sDiferido' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_NUMERO_LESIONES as VALOR,  'form_diagnostico1.sNumeroLesiones' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_GLEASONSUMA as VALOR,  'form_diagnostico1.iGleasonsuma' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL
SELECT C_DIAG_BIOPSIA.CR_GLEASON_DESCONOCIDO as VALOR,  'form_diagnostico1.iGleasondesconocido' AS propiedad FROM cantprosdb.C_DIAG_BIOPSIA where id_registro=$idRegistro 
UNION ALL



SELECT C_RELACION_REGISTROS.ID_OPCION_CAMPO as valor, concat('campo_', C_RELACION_REGISTROS.ID_TIPO_CAMPO) AS PROPIEDAD FROM cantprosdb.C_RELACION_REGISTROS WHERE ID_REGISTRO=$idRegistro AND TIPO_RELACION=1
UNION ALL
SELECT group_concat(C_RELACION_REGISTROS.ID_OPCION_CAMPO SEPARATOR ',') as valor, concat('campo_', C_RELACION_REGISTROS.ID_TIPO_CAMPO) AS PROPIEDAD FROM cantprosdb.C_RELACION_REGISTROS WHERE ID_REGISTRO=$idRegistro AND TIPO_RELACION=2 GROUP BY ID_TIPO_CAMPO;";
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