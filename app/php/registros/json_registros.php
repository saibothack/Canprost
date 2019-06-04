<?php
header("Content-Type: application/json");	
	
include '../../../config.php';
include '../opendb.php';

$idRegistro= $_REQUEST["id"];
//$sql = "SELECT C_REGISTROS.*, C_CIRUGIA.*,C_METASTASIS.*,C_PROGRESION.*,C_RADIOTERAPIA.*,C_SIN_TRATAMIENTO.* FROM cantprosdb.C_REGISTROS left join cantprosdb.C_CIRUGIA on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_CIRUGIA.ID_REGISTRO left join cantprosdb.C_METASTASIS on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_METASTASIS.ID_REGISTRO left join cantprosdb.C_PROGRESION on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_PROGRESION.ID_REGISTRO left join cantprosdb.C_RADIOTERAPIA on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_RADIOTERAPIA.ID_REGISTRO left join cantprosdb.C_SIN_TRATAMIENTO on cantprosdb.C_REGISTROS.id_registro = cantprosdb.C_SIN_TRATAMIENTO.ID_REGISTRO WHERE C_REGISTROS.ID_REGISTRO = $idRegistro;";
$sql="SELECT C_CIRUGIA.CRADYUVANTE_RESCATE as VALOR,  'form_cirugia.iAdyuvanteRescate' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_CIRUGIA.CRAE_POST_OPERATORIO as VALOR,  'form_cirugia.sApenPost' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_CIRUGIA.CRAPE_DESCONOCIDO as VALOR,  'form_cirugia.iApeDesconocido' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_CIRUGIA.CRAPE_RECURRENCIA as VALOR,  'form_cirugia.sApeRecurrencia' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_CIRUGIA.CRCOMENTARIOS as VALOR,  'form_cirugia.Icomentarios' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_CIRUGIA.CRCOMPLICACION_ESPECIFICA as VALOR,  'form_cirugia.iEspecificar' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_CIRUGIA.CRCOMPLICACION_MOTIVO as VALOR,  'form_cirugia.sMotivo' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_CIRUGIA.CRCOMPLICACION_OTRO as VALOR,  'form_cirugia.sEspecificarComplicacion' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_CIRUGIA.CRETAPA_PATOLOGICA as VALOR,  'form_cirugia.sEtapaPatologica' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
 SELECT C_CIRUGIA.CRFECHA_RECURR_AD as VALOR,  'form_cirugia.dFechaRecurrencia' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
 	
SELECT C_CIRUGIA.CRFECHA_CIRUGIA as VALOR,  'form_cirugia.dCirugia' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_CIRUGIA.CRFECHA_INICIO_AD as VALOR,  'form_cirugia.dFechaInicioAdyuvante' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_CIRUGIA.CRGLEASON_1 as VALOR,  'form_cirugia.iGleason1' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_CIRUGIA.CRGLEASON_2 as VALOR,  'form_cirugia.iGleason2' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_CIRUGIA.CRNUMERO_CONSULTAS as VALOR,  'form_cirugia.iNumeroConsultas' AS propiedad FROM cantprosdb.C_CIRUGIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_ESTATUS.CRFECHA_ULTIMA_CONSULTA as VALOR,  'form_estatus.dultimaconsulta' AS propiedad FROM cantprosdb.C_ESTATUS where id_registro=$idRegistro 
 UNION ALL
SELECT C_ESTATUS.CR_CERRADO as VALOR,  'form_estatus.cerradopor' AS propiedad FROM cantprosdb.C_ESTATUS where id_registro=$idRegistro 
 UNION ALL
SELECT C_ESTATUS.CR_CUALMUERTE as VALOR,  'form_estatus.cualmuerte' AS propiedad FROM cantprosdb.C_ESTATUS where id_registro=$idRegistro 
 UNION ALL
SELECT C_ESTATUS.CR_FECHAMUERTE as VALOR,  'form_estatus.dMuerte' AS propiedad FROM cantprosdb.C_ESTATUS where id_registro=$idRegistro 
 UNION ALL
SELECT C_ESTATUS.CR_FECHA_PROXIMA as VALOR,  'form_estatus.dProximaVisita' AS propiedad FROM cantprosdb.C_ESTATUS where id_registro=$idRegistro 
 UNION ALL
SELECT C_ESTATUS.CR_OBSERVACIONES as VALOR,  'form_estatus.observaciones' AS propiedad FROM cantprosdb.C_ESTATUS where id_registro=$idRegistro 
 UNION ALL
SELECT C_METASTASIS.CRAPE_NADIR_POSTBLOQUEO as VALOR,  'form_metastasis.APENadirPostBloqueo' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro 
 UNION ALL
SELECT C_METASTASIS.CRDOSIS_ANTIANDROGENO as VALOR,  'form_metastasis.sDosisAntiandrogeno' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro 
 UNION ALL
SELECT C_METASTASIS.CRFECHAINICIO_ANTAG_LHRH as VALOR,  'form_metastasis.dFechaInicioAntagonistaLHRH' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro 
 UNION ALL
SELECT C_METASTASIS.CRFECHAINICIO_ANTIANDROGENO as VALOR,  'form_metastasis.dFechaInicioAntiAndrogeno' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro 
 UNION ALL
SELECT C_METASTASIS.CRFECHA_LHRH as VALOR,  'form_metastasis.dFechaInicioLHRH' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro 
 UNION ALL
SELECT C_METASTASIS.CRFECHA_ORQUITECT as VALOR,  'form_metastasis.dFechaOrquiectomia' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro 
 UNION ALL


SELECT C_METASTASIS.CR_DATE_INICIO_APE as VALOR,  'form_metastasis.dFechaInicioApe' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro
 UNION ALL
SELECT C_METASTASIS.CR_APE_BLOQUEO_HORMONAL as VALOR,  'form_metastasis.ApeBloqueoHormonal' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro
 UNION ALL
SELECT C_METASTASIS.CR_DATE_FIN_APE as VALOR,  'form_metastasis.dFechaFinApe' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro
 UNION ALL
 
SELECT C_SEGUIMIENTO.CRFECHA_INICIO_SEGUIMIENTO as VALOR,  'form_seguimiento.dFechaInicioSeg' AS propiedad FROM cantprosdb.C_SEGUIMIENTO where id_registro=$idRegistro
 UNION ALL
SELECT C_SEGUIMIENTO.CRFECHA_INICIO_RESIST as VALOR,  'form_seguimiento.dFechaInicioResistenciaSeg' AS propiedad FROM cantprosdb.C_SEGUIMIENTO where id_registro=$idRegistro
 UNION ALL
SELECT C_SEGUIMIENTO.CRNIVEL_TESTOSTERONA as VALOR,  'form_seguimiento.nivel_testosteronaSeg' AS propiedad FROM cantprosdb.C_SEGUIMIENTO where id_registro=$idRegistro
 UNION ALL
SELECT C_SEGUIMIENTO.CRNIVEL_APE as VALOR,  'form_seguimiento.nivel_apeSeg' AS propiedad FROM cantprosdb.C_SEGUIMIENTO where id_registro=$idRegistro
 UNION ALL
SELECT C_SEGUIMIENTO.CROTRO_ESTUDIO_IMAGEN as VALOR,  'form_seguimiento.sOtroEstudioImagenSeg' AS propiedad FROM cantprosdb.C_SEGUIMIENTO where id_registro=$idRegistro
 UNION ALL
SELECT C_SEGUIMIENTO.CRFECHA_INICIO_QUIMIO as VALOR,  'form_seguimiento.dFechaInicioQuimioSeg' AS propiedad FROM cantprosdb.C_SEGUIMIENTO where id_registro=$idRegistro
 UNION ALL
SELECT C_SEGUIMIENTO.CROTRO_TRAT_SEGUNDA as VALOR,  'form_seguimiento.sOtroTratamientoSegundaSeg' AS propiedad FROM cantprosdb.C_SEGUIMIENTO where id_registro=$idRegistro
 UNION ALL
SELECT C_SEGUIMIENTO.CROTRO_QUIMIO as VALOR,  'form_seguimiento.sOtroQuimioterapiaSeg' AS propiedad FROM cantprosdb.C_SEGUIMIENTO where id_registro=$idRegistro
 UNION ALL
SELECT C_SEGUIMIENTO.CRNUMERO_CONSULTAS as VALOR,  'form_seguimiento.sNumeroConsultas' AS propiedad FROM cantprosdb.C_SEGUIMIENTO where id_registro=$idRegistro 



 UNION ALL
SELECT C_METASTASIS.CRTIPO_ANTIANDROGENO as VALOR,  'form_metastasis.sCualAntiandrogeno' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro 
 UNION ALL
SELECT C_METASTASIS.CRTIPO_BLOQUEHORMONAL as VALOR,  'form_metastasis.sCualBloqueHormonal' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro
  UNION ALL
SELECT C_METASTASIS.CR_DATE_METASTASIS as VALOR,  'form_metastasis.dFechametastasis' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro 
 UNION ALL
SELECT C_METASTASIS.CRTIPO_LHRH as VALOR,  'form_metastasis.sCualLHRH' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro 
 UNION ALL
SELECT C_METASTASIS.CR_DESCONOCIDO as VALOR,  'form_metastasis.chkDesconocido' AS propiedad FROM cantprosdb.C_METASTASIS where id_registro=$idRegistro 
 UNION ALL
SELECT C_PROGRESION.CRFECHA_INICIO_QUIMIO as VALOR,  'form_progresion.dFechaInicioQuimio' AS propiedad FROM cantprosdb.C_PROGRESION where id_registro=$idRegistro 
 UNION ALL
SELECT C_PROGRESION.CRFECHA_INICIO_RESIST as VALOR,  'form_progresion.dFechaInicioResistencia' AS propiedad FROM cantprosdb.C_PROGRESION where id_registro=$idRegistro 
 UNION ALL
SELECT C_PROGRESION.CRNIVEL_APE as VALOR,  'form_progresion.nivel_ape' AS propiedad FROM cantprosdb.C_PROGRESION where id_registro=$idRegistro 
 UNION ALL
SELECT C_PROGRESION.CRNIVEL_TESTOSTERONA as VALOR,  'form_progresion.nivel_testosterona' AS propiedad FROM cantprosdb.C_PROGRESION where id_registro=$idRegistro 
 UNION ALL
SELECT C_PROGRESION.CRNUMERO_CONSULTAS as VALOR,  'form_progresion.numeroConsultas' AS propiedad FROM cantprosdb.C_PROGRESION where id_registro=$idRegistro 
 UNION ALL
SELECT C_PROGRESION.CROTRO_ESTUDIO_IMAGEN as VALOR,  'form_progresion.sOtroEstudioImagen' AS propiedad FROM cantprosdb.C_PROGRESION where id_registro=$idRegistro 
 UNION ALL
SELECT C_PROGRESION.CROTRO_QUIMIO as VALOR,  'form_progresion.sOtroQuimioterapia' AS propiedad FROM cantprosdb.C_PROGRESION where id_registro=$idRegistro 
 UNION ALL
SELECT C_PROGRESION.CROTRO_TRAT_SEGUNDA as VALOR,  'form_progresion.sOtroTratamientoSegunda' AS propiedad FROM cantprosdb.C_PROGRESION where id_registro=$idRegistro 
 UNION ALL
SELECT C_RADIOTERAPIA.CR_APE_POST_RT as VALOR,  'form_radioterapia.iApeNadir' AS propiedad FROM cantprosdb.C_RADIOTERAPIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_RADIOTERAPIA.CR_APE_RECURR as VALOR,  'form_radioterapia.sApeRec' AS propiedad FROM cantprosdb.C_RADIOTERAPIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_RADIOTERAPIA.CR_DOSIS as VALOR,  'form_radioterapia.sDosis' AS propiedad FROM cantprosdb.C_RADIOTERAPIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_RADIOTERAPIA.CR_DOSIS_DESC as VALOR,  'form_radioterapia.iDosisDesconocida' AS propiedad FROM cantprosdb.C_RADIOTERAPIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_RADIOTERAPIA.CR_ESPECIFICA_COMPLIC as VALOR,  'form_radioterapia.sEspecificarComplicaciones' AS propiedad FROM cantprosdb.C_RADIOTERAPIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_RADIOTERAPIA.CR_FECHAINICIO as VALOR,  'form_radioterapia.dFechaDosis' AS propiedad FROM cantprosdb.C_RADIOTERAPIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_RADIOTERAPIA.CR_FECHATERMINO as VALOR,  'form_radioterapia.dFechaTerminoDosis' AS propiedad FROM cantprosdb.C_RADIOTERAPIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_RADIOTERAPIA.CR_INICIO_PROG_FECHA as VALOR,  'form_radioterapia.dFechaInicioProg' AS propiedad FROM cantprosdb.C_RADIOTERAPIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_RADIOTERAPIA.CR_NUMERO_CONSULTAS as VALOR,  'form_radioterapia.iNumeroConsultas' AS propiedad FROM cantprosdb.C_RADIOTERAPIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_RADIOTERAPIA.CR_RECURR_FECHA as VALOR,  'form_radioterapia.dFechaRec' AS propiedad FROM cantprosdb.C_RADIOTERAPIA where id_registro=$idRegistro 
 UNION ALL
SELECT C_REGISTROS.CRAPELLIDO_MATERNO as VALOR,  'form_dgenerales.sApellidoMaternoD' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro 
 UNION ALL
SELECT C_REGISTROS.CRAPELLIDO_MATERNO as VALOR,  'form_registro.sApellidoMaterno' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro 
 UNION ALL
SELECT C_REGISTROS.CRAPELLIDO_PATERNO as VALOR,  'form_dgenerales.sApellidoPaternoD' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro 
 UNION ALL
SELECT C_REGISTROS.CRAPELLIDO_PATERNO as VALOR,  'form_registro.sApellidoPaterno' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro 
 UNION ALL
SELECT C_REGISTROS.CRFECHA_NACIMIENTO as VALOR,  'form_dgenerales.dNacimientoD' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro 
 UNION ALL
SELECT C_REGISTROS.CRFECHA_NACIMIENTO as VALOR,  'form_registro.dNacimiento' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro 
 UNION ALL
SELECT C_REGISTROS.CRHISTORIAL_FAMILIAR as VALOR,  'form_registro.iFamiliaCancer' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro 
 UNION ALL
SELECT C_REGISTROS.CRNOMBRE as VALOR,  'form_dgenerales.sNombresD' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro 
 UNION ALL
SELECT C_REGISTROS.CRNOMBRE as VALOR,  'form_registro.sNombres' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro 
 UNION ALL
SELECT C_REGISTROS.CRNUMERO_REGISTRO as VALOR,  'form_dgenerales.sNumeroRegistro' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro 
 UNION ALL
SELECT C_REGISTROS.CRRFC as VALOR,  'form_registro.sRFC' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro 
 UNION ALL
SELECT C_REGISTROS.CRTABAQUISMO as VALOR,  'form_dgenerales.rTabaquismo' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro
 UNION ALL
 SELECT C_REGISTROS.OTRO_PREVIO as VALOR,  'form_previo.sOtroTratamientoPreventivo' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro
 UNION ALL
 SELECT C_REGISTROS.CRHISTORIAL_FAMILIAR as VALOR,  'form_dgenerales.iFamiliaCancer' AS propiedad FROM cantprosdb.C_REGISTROS where id_registro=$idRegistro
 UNION ALL
SELECT C_SIN_TRATAMIENTO.CRMENSAJE as VALOR,  'form_sintratamiento.dNivelSintratamiento' AS propiedad FROM cantprosdb.C_SIN_TRATAMIENTO where id_registro=$idRegistro 
 UNION ALL
SELECT C_SIN_TRATAMIENTO.CRNIVEL_APE as VALOR,  'form_sintratamiento.dNivelAPE' AS propiedad FROM cantprosdb.C_SIN_TRATAMIENTO where id_registro=$idRegistro 
UNION ALL
SELECT C_RELACION_REGISTROS.ID_OPCION_CAMPO as valor, concat('campo_', C_RELACION_REGISTROS.ID_TIPO_CAMPO) AS PROPIEDAD FROM cantprosdb.C_RELACION_REGISTROS WHERE ID_REGISTRO=$idRegistro AND TIPO_RELACION=1
UNION ALL
SELECT group_concat(C_RELACION_REGISTROS.ID_OPCION_CAMPO SEPARATOR ',') as valor, concat('campo_', C_RELACION_REGISTROS.ID_TIPO_CAMPO) AS PROPIEDAD FROM cantprosdb.C_RELACION_REGISTROS WHERE ID_REGISTRO=$idRegistro AND TIPO_RELACION=2 GROUP BY ID_TIPO_CAMPO
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