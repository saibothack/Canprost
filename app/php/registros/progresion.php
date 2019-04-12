<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/21/2017
 * Time: 7:31 AM
 */
header("Content-Type: application/json");
if(!isset($_SESSION)) {
    session_start();
}
include '../../../config.php';
include '../opendb.php';

$IdRegistro = $_SESSION["idRegistro"];

$sql = "DELETE FROM `cantprosdb`.`C_RELACION_REGISTROS` where `ID_REGISTRO` = '$IdRegistro' and `ID_TIPO_CAMPO` BETWEEN 61 AND 66;";
mysqli_query($conexion,$sql);

foreach( $_POST as $key => $value ) {
    //echo("analizando $key \n");
    //echo($_POST[$key]." \n");
    if( is_array( $_POST[$key] ) ) {
        $id = substr($key,6); //obtenemos el id del campo
        $aValor = $_POST[$key];
        foreach( $aValor as $valor ) {
            //manejamos catalogos multiples

            $sql="INSERT INTO `cantprosdb`.`C_RELACION_REGISTROS`(`ID_REGISTRO`,`ID_TIPO_CAMPO`,`ID_OPCION_CAMPO`,`ETIQUETA_OPCION_CAMPO`,`TIPO_RELACION`,`NOMBRE_RELACION`) SELECT '$IdRegistro ',
'$id','$valor',`ETIQUETA_OPCION_CAMPO`,`TIPO_RELACION`,`NOMBRE_RELACION` FROM `cantprosdb`.`C_RELACION_REGISTROS` WHERE `ID_REGISTRO`=-1 AND `ID_TIPO_CAMPO`=$id and `ID_OPCION_CAMPO`=$valor;";
            //echo($sql);
            mysqli_query($conexion,$sql);
        }
    } else {
        $pos=strrpos ($key,"campo_");
        //echo($key);
        //echo($pos);
        if (!($pos===false)){ //es un campo con id
            $id = substr($key,6); //obtenemos el id del campo

            $sql="INSERT INTO `cantprosdb`.`C_RELACION_REGISTROS`(`ID_REGISTRO`,`ID_TIPO_CAMPO`,`ID_OPCION_CAMPO`,`ETIQUETA_OPCION_CAMPO`,`TIPO_RELACION`,`NOMBRE_RELACION`) SELECT '$IdRegistro ',
'$id','$value',`ETIQUETA_OPCION_CAMPO`,`TIPO_RELACION`,`NOMBRE_RELACION` FROM `cantprosdb`.`C_RELACION_REGISTROS` WHERE `ID_REGISTRO`=-1 AND `ID_TIPO_CAMPO`=$id and `ID_OPCION_CAMPO`=$value;";
            mysqli_query($conexion,$sql);
            //echo($sql);
        }
    }
}

//seccion datos

$dFechaInicioResistencia=isset($_REQUEST["dFechaInicioResistencia"])$_REQUEST["dFechaInicioResistencia"]:"";
$nivel_testosterona=isset($_REQUEST["nivel_testosterona"])?$_REQUEST["nivel_testosterona"]:"";
$nivel_ape=isset($_REQUEST["nivel_ape"])?$_REQUEST["nivel_ape"]:"";
$sOtroEstudioImagen=isset($_REQUEST["sOtroEstudioImagen"])?$_REQUEST["sOtroEstudioImagen"]:"";
$sOtroTratamientoSegunda=isset($_REQUEST["sOtroTratamientoSegunda"])?$_REQUEST["sOtroTratamientoSegunda"]:"";
$sOtroQuimioterapia=isset($_REQUEST["sOtroQuimioterapia"])?$_REQUEST["sOtroQuimioterapia"]:"";
$dFechaInicioQuimio=isset($_REQUEST["dFechaInicioQuimio"])?$_REQUEST["dFechaInicioQuimio"]:"";
$numeroConsultas=isset($_REQUEST["numeroConsultas"])?$_REQUEST["numeroConsultas"]:"";


/*
$sql="UPDATE cantprostdbC_REGISTROS SET  CRFECHA_CIRUGIA='$dCirugia',CRCOMPLICACION_ESPECIFICA='$iEspecificar',
CRCOMPLICACION_MOTIVO='$sMotivo',CRETAPA_PATOLOGICA='$sEtapaPatologica',CRGLEASON_1='$iGleason1',
CRGLEASON_2='$iGleason2',CRCOMPLICACION_OTRO='$sEspecificarComplicacion',CRAE_POST_OPERATORIO='$sApenPost',
CRAPE_DESCONOCIDO='$iApeDesconocido',CRAPE_RECURRENCIA='$sApeRec',CRADYUVANTE_RESCATE='$iAdyuvanteRescate',
CRFECHA_INICIO_AD='$dFechaInicioAdyuvante',CRFECHA_RECURR_AD='$dFechaRecurrencia',CRNUMERO_CONSULTAS='$iNumeroConsultas',
CRCOMENTARIOS='$Icomentarios' where ID_REGISTRO=$IdRegistro;";
mysqli_query($conexion,$sql);
*/

$sql="DELETE FROM cantprosdb.C_PROGRESION WHERE ID_REGISTRO=$IdRegistro;";
mysqli_query($conexion,$sql);

$sql="INSERT INTO cantprosdb.C_PROGRESION (ID_REGISTRO,CRFECHA_INICIO_RESIST,CRNIVEL_TESTOSTERONA,CRNIVEL_APE,CROTRO_ESTUDIO_IMAGEN,CROTRO_TRAT_SEGUNDA,CROTRO_QUIMIO,CRFECHA_INICIO_QUIMIO,CRNUMERO_CONSULTAS) VALUES($IdRegistro,$dFechaInicioResistencia,'$nivel_testosterona','$nivel_ape','$sOtroEstudioImagen','$sOtroTratamientoSegunda','$sOtroQuimioterapia','$dFechaInicioQuimio','$numeroConsultas');";
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