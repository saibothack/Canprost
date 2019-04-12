<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/20/2017
 * Time: 10:31 PM
 */
header("Content-Type: application/json");
if(!isset($_SESSION)) {
    session_start();
}
include '../../../config.php';
include '../opendb.php';

$IdRegistro = $_SESSION["idRegistro"];

$sql = "DELETE FROM `cantprosdb`.`C_RELACION_REGISTROS` where `ID_REGISTRO` = '$IdRegistro' and `ID_TIPO_CAMPO` BETWEEN 46 AND 51;";
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

$sDosis=isset($_REQUEST["sDosis"])?$_REQUEST["sDosis"]:"";
$iDosisDesconocida=isset($_REQUEST["iDosisDesconocida"])?$_REQUEST["iDosisDesconocida"]:"";
$dFechaDosis=isset($_REQUEST["dFechaDosis"])?$_REQUEST["dFechaDosis"]:"";
$dFechaTerminoDosis=isset($_REQUEST["dFechaTerminoDosis"])?$_REQUEST["dFechaTerminoDosis"]:"";
$iApeNadir=isset($_REQUEST["iApeNadir"])?$_REQUEST["iApeNadir"]:"";
$sEspecificarComplicaciones=isset($_REQUEST["sEspecificarComplicaciones"])?$_REQUEST["sEspecificarComplicaciones"]:"";
$sApeRec=isset($_REQUEST["sApeRec"])?$_REQUEST["sApeRec"]:"";
$dFechaRec=isset($_REQUEST["dFechaRec"])?$_REQUEST["dFechaRec"]:"";
$dFechaInicioProg=isset($_REQUEST["dFechaInicioProg"])?$_REQUEST["dFechaInicioProg"]:"";
$iNumeroConsultas=isset($_REQUEST["iNumeroConsultas"])?$_REQUEST["iNumeroConsultas"]:"";


/*
$sql="UPDATE cantprostdbC_REGISTROS SET  CRFECHA_CIRUGIA='$dCirugia',CRCOMPLICACION_ESPECIFICA='$iEspecificar',
CRCOMPLICACION_MOTIVO='$sMotivo',CRETAPA_PATOLOGICA='$sEtapaPatologica',CRGLEASON_1='$iGleason1',
CRGLEASON_2='$iGleason2',CRCOMPLICACION_OTRO='$sEspecificarComplicacion',CRAE_POST_OPERATORIO='$sApenPost',
CRAPE_DESCONOCIDO='$iApeDesconocido',CRAPE_RECURRENCIA='$sApeRec',CRADYUVANTE_RESCATE='$iAdyuvanteRescate',
CRFECHA_INICIO_AD='$dFechaInicioAdyuvante',CRFECHA_RECURR_AD='$dFechaRecurrencia',CRNUMERO_CONSULTAS='$iNumeroConsultas',
CRCOMENTARIOS='$Icomentarios' where ID_REGISTRO=$IdRegistro;";
mysqli_query($conexion,$sql);
*/

$sql="DELETE FROM cantprosdb.C_RADIOTERAPIA WHERE ID_REGISTRO=$IdRegistro;";
mysqli_query($conexion,$sql);

$sql="INSERT INTO cantprosdb.C_RADIOTERAPIA (ID_REGISTRO,CR_DOSIS,CR_DOSIS_DESC,CR_FECHAINICIO,CR_FECHATERMINO,CR_APE_POST_RT,CR_ESPECIFICA_COMPLIC,CR_APE_RECURR,CR_RECURR_FECHA,CR_INICIO_PROG_FECHA,CR_NUMERO_CONSULTAS) VALUES($IdRegistro,'$sDosis','$iDosisDesconocida','$dFechaDosis','$dFechaTerminoDosis','$iApeNadir','$sEspecificarComplicaciones','$sApeRec','$dFechaRec','$dFechaInicioProg','$iNumeroConsultas');";
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