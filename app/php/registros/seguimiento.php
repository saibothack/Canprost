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

$sql = "DELETE FROM `cantprosdb`.`C_RELACION_REGISTROS` where `ID_REGISTRO` = '$IdRegistro' and `ID_TIPO_CAMPO` BETWEEN 79 AND 84;";
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
$dFechaInicioSeguimiento=isset($_REQUEST["dFechaInicioSeg"])?$_REQUEST["dFechaInicioSeg"]:"";
$dFechaInicioResistencia=isset($_REQUEST["dFechaInicioResistenciaSeg"])?$_REQUEST["dFechaInicioResistenciaSeg"]:"";
$nivel_testosterona=isset($_REQUEST["nivel_testosteronaSeg"])?$_REQUEST["nivel_testosteronaSeg"]:"";
$nivel_ape=isset($_REQUEST["nivel_apeSeg"])?$_REQUEST["nivel_apeSeg"]:"";
$sOtroEstudioImagen=isset($_REQUEST["sOtroEstudioImagenSeg"])?$_REQUEST["sOtroEstudioImagenSeg"]:"";
$sOtroTratamientoSegunda=isset($_REQUEST["sOtroTratamientoSegundaSeg"])?$_REQUEST["sOtroTratamientoSegundaSeg"]:"";
$sOtroQuimioterapia=isset($_REQUEST["sOtroQuimioterapiaSeg"])?$_REQUEST["sOtroQuimioterapiaSeg"]:"";
$dFechaInicioQuimio=isset($_REQUEST["dFechaInicioQuimioSeg"])?$_REQUEST["dFechaInicioQuimioSeg"]:"";
$numeroConsultas=isset($_REQUEST["numeroConsultasSeg"])?$_REQUEST["numeroConsultasSeg"]:"";


$sql="DELETE FROM cantprosdb.C_SEGUIMIENTO WHERE ID_REGISTRO=$IdRegistro;";
mysqli_query($conexion,$sql);

$sql="INSERT INTO cantprosdb.C_SEGUIMIENTO (ID_REGISTRO,CRFECHA_INICIO_SEGUIMIENTO,CRFECHA_INICIO_RESIST,CRNIVEL_TESTOSTERONA,CRNIVEL_APE,CROTRO_ESTUDIO_IMAGEN,CROTRO_TRAT_SEGUNDA,CROTRO_QUIMIO,CRFECHA_INICIO_QUIMIO,CRNUMERO_CONSULTAS) VALUES($IdRegistro,'$dFechaInicioSeguimiento','$dFechaInicioResistencia','$nivel_testosterona','$nivel_ape','$sOtroEstudioImagen','$sOtroTratamientoSegunda','$sOtroQuimioterapia','$dFechaInicioQuimio','$numeroConsultas');";
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