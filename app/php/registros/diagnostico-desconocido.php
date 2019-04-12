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

$sql = "DELETE FROM `cantprosdb`.`C_RELACION_REGISTROS` where `ID_REGISTRO` = '$IdRegistro' and  ((`ID_TIPO_CAMPO` BETWEEN 13 AND 21) OR (`ID_TIPO_CAMPO` BETWEEN 72 AND 75) );";
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
$sOtroRHP=isset($_REQUEST["chk"])?$_REQUEST["chk"]:"";
//$sOtroRHP=isset($_REQUEST["sOtroRHP"])?$_REQUEST["sOtroRHP"]:"";
//$iGleason1=isset($_REQUEST["iGleason1"])?$_REQUEST["iGleason1"]:"";
//$iGleason2=isset($_REQUEST["iGleason2"])?$_REQUEST["iGleason2"]:"";
//$iAPETotal=isset($_REQUEST["iAPETotal"])?$_REQUEST["iAPETotal"]:"";
//$iAPELibre=isset($_REQUEST["iAPELibre"])?$_REQUEST["iAPELibre"]:"";
//$sDesconocido=isset($_REQUEST["sDesconocido"])?$_REQUEST["sDesconocido"]:"";
//$sOtrosMarcadores=isset($_REQUEST["sOtrosMarcadores"])?$_REQUEST["sOtrosMarcadores"]:"";
//$sEstudiosImagen=isset($_REQUEST["sEstudiosImagen"])?$_REQUEST["sEstudiosImagen"]:"";
//$sOtroMarcador=isset($_REQUEST["sOtroMarcador"])?$_REQUEST["sOtroMarcador"]:"";
//$sOtroTac=isset($_REQUEST["sOtroTac"])?$_REQUEST["sOtroTac"]:"";
//$sOtroRMI=isset($_REQUEST["sOtroRMI"])?$_REQUEST["sOtroRMI"]:"";
//$sOtroPET=isset($_REQUEST["sOtroPET"])?$_REQUEST["sOtroPET"]:"";
//$sOtroGGO=isset($_REQUEST["sOtroGGO"])?$_REQUEST["sOtroGGO"]:"";
//$sVigilanciaActiva=isset($_REQUEST["sVigilanciaActiva"])?$_REQUEST["sVigilanciaActiva"]:"";
//$sProgresionVigilancia=isset($_REQUEST["sProgresionVigilancia"])?$_REQUEST["sProgresionVigilancia"]:"";
//$sDiferido=isset($_REQUEST["sDiferido"])?$_REQUEST["sDiferido"]:"";
//$sNumeroLesiones=isset($_REQUEST["sNumeroLesiones"])?$_REQUEST["sNumeroLesiones"]:"";


/*
$sql="UPDATE cantprostdbC_REGISTROS SET  CRFECHA_CIRUGIA='$dCirugia',CRCOMPLICACION_ESPECIFICA='$iEspecificar',
CRCOMPLICACION_MOTIVO='$sMotivo',CRETAPA_PATOLOGICA='$sEtapaPatologica',CRGLEASON_1='$iGleason1',
CRGLEASON_2='$iGleason2',CRCOMPLICACION_OTRO='$sEspecificarComplicacion',CRAE_POST_OPERATORIO='$sApenPost',
CRAPE_DESCONOCIDO='$iApeDesconocido',CRAPE_RECURRENCIA='$sApeRec',CRADYUVANTE_RESCATE='$iAdyuvanteRescate',
CRFECHA_INICIO_AD='$dFechaInicioAdyuvante',CRFECHA_RECURR_AD='$dFechaRecurrencia',CRNUMERO_CONSULTAS='$iNumeroConsultas',
CRCOMENTARIOS='$Icomentarios' where ID_REGISTRO=$IdRegistro;";
mysqli_query($conexion,$sql);
*/

$sql="DELETE FROM cantprosdb.C_DIAG_DESCONOCIDO WHERE ID_REGISTRO=$IdRegistro;";
mysqli_query($conexion,$sql);

//$sql="INSERT INTO cantprostdbC_DIAG_DESCONOCIDO (ID_REGISTRO,CR_OTRORHP,CR_GLEASON1,CR_GLEASON2
//,CR_APE_TOTAL,CR_APE_LIBRE,CR_DESCONOCIDO,CR_OTROSMARCADORES,CR_ESTUDIOIMAGEN,CR_OTRO_MARCADOR,CR_OTRO_TAC,CR_OTRO_RMI
//,CR_OTRO_PET,CR_OTRO_GGO,CR_VIGILANCIA_ACTIVA,CR_PROGRESION_VIGILANCIA,CR_DIFERIDO,CR_NUMERO_LESIONES
//)
 //VALUES($IdRegistro,'$sOtroRHP','$iGleason1','$iGleason2','$iAPETotal','$iAPELibre',
 //'$sDesconocido','$sOtrosMarcadores','$sEstudiosImagen','$sOtroMarcador','$sOtroTac','$sOtroRMI','$sOtroPET','$sOtroGGO'
 //,'$sVigilanciaActiva','$sProgresionVigilancia','$sDiferido','$sNumeroLesiones');";
$sql="INSERT INTO cantprosdb.C_DIAG_DESCONOCIDO (ID_REGISTRO,CR_TIPO_DIAG)
 VALUES($IdRegistro,'$sOtroRHP');";

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