<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/18/2017
 * Time: 7:57 AM
 */
header("Content-Type: application/json");
if(!isset($_SESSION)) {
    session_start();
}
include '../../../config.php';
include '../opendb.php';

$IdRegistro = $_SESSION["idRegistro"];

$sql = "DELETE FROM `cantprosdb`.`C_RELACION_REGISTROS` where `ID_REGISTRO` = '$IdRegistro' and `ID_TIPO_CAMPO` BETWEEN 22 AND 45;";
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

$dCirugia=$_REQUEST["dCirugia"];
$iEspecificar=$_REQUEST["iEspecificar"];
$sMotivo=$_REQUEST["sMotivo"];
$sEtapaPatologica=$_REQUEST["sEtapaPatologica"];
$iGleason1=$_REQUEST["iGleason1"];
$iGleason2=$_REQUEST["iGleason2"];
$sEspecificarComplicacion=$_REQUEST["sEspecificarComplicacion"];
$sApenPost=$_REQUEST["sApenPost"];
$iApeDesconocido=$_REQUEST["iApeDesconocido"];
$sApeRec=$_REQUEST["sApeRecurrencia"];
$iAdyuvanteRescate=isset($_REQUEST["iAdyuvanteRescate"]) ? $_REQUEST["iAdyuvanteRescate"] : "" ;
$dFechaInicioAdyuvante=$_REQUEST["dFechaInicioAdyuvante"];
$dFechaRecurrencia=$_REQUEST["dFechaRecurrencia"];
$iNumeroConsultas=$_REQUEST["iNumeroConsultas"];
$Icomentarios=$_REQUEST["Icomentarios"];

/*
$sql="UPDATE cantprostdbC_REGISTROS SET  CRFECHA_CIRUGIA='$dCirugia',CRCOMPLICACION_ESPECIFICA='$iEspecificar',
CRCOMPLICACION_MOTIVO='$sMotivo',CRETAPA_PATOLOGICA='$sEtapaPatologica',CRGLEASON_1='$iGleason1',
CRGLEASON_2='$iGleason2',CRCOMPLICACION_OTRO='$sEspecificarComplicacion',CRAE_POST_OPERATORIO='$sApenPost',
CRAPE_DESCONOCIDO='$iApeDesconocido',CRAPE_RECURRENCIA='$sApeRec',CRADYUVANTE_RESCATE='$iAdyuvanteRescate',
CRFECHA_INICIO_AD='$dFechaInicioAdyuvante',CRFECHA_RECURR_AD='$dFechaRecurrencia',CRNUMERO_CONSULTAS='$iNumeroConsultas',
CRCOMENTARIOS='$Icomentarios' where ID_REGISTRO=$IdRegistro;";
mysqli_query($conexion,$sql);
*/

$sql="DELETE FROM cantprosdb.C_CIRUGIA WHERE ID_REGISTRO=$IdRegistro;";
mysqli_query($conexion,$sql);

$sql="INSERT INTO cantprosdb.C_CIRUGIA (CRFECHA_CIRUGIA,CRCOMPLICACION_MOTIVO,CRGLEASON_2,CRAPE_DESCONOCIDO,
CRFECHA_INICIO_AD,CRCOMENTARIOS,CRCOMPLICACION_ESPECIFICA,CRETAPA_PATOLOGICA,CRCOMPLICACION_OTRO,CRAPE_RECURRENCIA,
CRFECHA_RECURR_AD,CRGLEASON_1,CRAE_POST_OPERATORIO,CRADYUVANTE_RESCATE,CRNUMERO_CONSULTAS,ID_REGISTRO)
VALUES('$dCirugia','$sMotivo','$iGleason2','$iApeDesconocido','$dFechaInicioAdyuvante','$Icomentarios','$iEspecificar',
'$sEtapaPatologica','$sEspecificarComplicacion','$sApeRec','$dFechaRecurrencia','$iGleason1','$sApenPost',
'$iAdyuvanteRescate','$iNumeroConsultas',$IdRegistro);";
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