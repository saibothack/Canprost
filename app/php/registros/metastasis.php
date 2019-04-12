<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/20/2017
 * Time: 11:01 PM
 */
header("Content-Type: application/json");
if(!isset($_SESSION)) {
    session_start();
}
include '../../../config.php';
include '../opendb.php';

$IdRegistro = $_SESSION["idRegistro"];

$sql = "DELETE FROM `cantprosdb`.`C_RELACION_REGISTROS` where `ID_REGISTRO` = '$IdRegistro' and `ID_TIPO_CAMPO` BETWEEN 52 AND 60;";
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

$dFechaOrquiectomia=isset($_REQUEST["dFechaOrquiectomia"])?$_REQUEST["dFechaOrquiectomia"]:"";
$sCualLHRH=isset($_REQUEST["sCualLHRH"])?$_REQUEST["sCualLHRH"]:"";
$dFechaInicioLHRH=isset($_REQUEST["dFechaInicioLHRH"])?$_REQUEST["dFechaInicioLHRH"]:"";
$dFechaInicioAntagonistaLHRH=isset($_REQUEST["dFechaInicioAntagonistaLHRH"])?$_REQUEST["dFechaInicioAntagonistaLHRH"]:"";
$sCualAntiandrogeno=isset($_REQUEST["sCualAntiandrogeno"])?$_REQUEST["sCualAntiandrogeno"]:"";
$sDosisAntiandrogeno=isset($_REQUEST["sDosisAntiandrogeno"])?$_REQUEST["sDosisAntiandrogeno"]:"";
$dFechaInicioAntiAndrogeno=isset($_REQUEST["dFechaInicioAntiAndrogeno"])?$_REQUEST["dFechaInicioAntiAndrogeno"]:"";
$sCualBloqueHormonal=isset($_REQUEST["sCualBloqueHormonal"])?$_REQUEST["sCualBloqueHormonal"]:"";
$APENadirPostBloqueo=isset($_REQUEST["APENadirPostBloqueo"])?$_REQUEST["APENadirPostBloqueo"]:"";
$chkDesconocido=isset($_REQUEST["chkDesconocido"])?$_REQUEST["chkDesconocido"]:"";
$dFechametastasis=isset($_REQUEST["dFechametastasis"])?$_REQUEST["dFechametastasis"]:"";

/*
$sql="UPDATE cantprostdbC_REGISTROS SET  CRFECHA_CIRUGIA='$dCirugia',CRCOMPLICACION_ESPECIFICA='$iEspecificar',
CRCOMPLICACION_MOTIVO='$sMotivo',CRETAPA_PATOLOGICA='$sEtapaPatologica',CRGLEASON_1='$iGleason1',
CRGLEASON_2='$iGleason2',CRCOMPLICACION_OTRO='$sEspecificarComplicacion',CRAE_POST_OPERATORIO='$sApenPost',
CRAPE_DESCONOCIDO='$iApeDesconocido',CRAPE_RECURRENCIA='$sApeRec',CRADYUVANTE_RESCATE='$iAdyuvanteRescate',
CRFECHA_INICIO_AD='$dFechaInicioAdyuvante',CRFECHA_RECURR_AD='$dFechaRecurrencia',CRNUMERO_CONSULTAS='$iNumeroConsultas',
CRCOMENTARIOS='$Icomentarios' where ID_REGISTRO=$IdRegistro;";
mysqli_query($conexion,$sql);
*/

$sql="DELETE FROM cantprosdb.C_METASTASIS WHERE ID_REGISTRO=$IdRegistro;";
mysqli_query($conexion,$sql);

$sql="INSERT INTO cantprosdb.C_METASTASIS (ID_REGISTRO,CRFECHA_ORQUITECT,CRTIPO_LHRH,CRFECHA_LHRH,CRFECHAINICIO_ANTAG_LHRH,CRTIPO_ANTIANDROGENO,CRDOSIS_ANTIANDROGENO,CRFECHAINICIO_ANTIANDROGENO,CRTIPO_BLOQUEHORMONAL,CRAPE_NADIR_POSTBLOQUEO,CR_DESCONOCIDO,CR_DATE_METASTASIS) VALUES($IdRegistro, $dFechaOrquiectomia,'$sCualLHRH','$dFechaInicioLHRH','$dFechaInicioAntagonistaLHRH','$sCualAntiandrogeno','$sDosisAntiandrogeno','$dFechaInicioAntiAndrogeno','$sCualBloqueHormonal','$APENadirPostBloqueo','$chkDesconocido','$dFechametastasis');";
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