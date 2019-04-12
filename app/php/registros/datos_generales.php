<?php
/**
 * Created by PhpStorm.
 * User: Josue Garcia
 * Date: 3/9/2017
 * Time: 1:18 AM
 * Clase que se encarga de gestionar la grabacion de los datos generales del usuario
 */
header("Content-Type: application/json");
if(!isset($_SESSION)) {
    session_start();
}
include '../../../config.php';
include '../opendb.php';

$IdRegistro = $_SESSION["idRegistro"];

$sql = "DELETE FROM `cantprosdb`.`C_RELACION_REGISTROS` where `ID_REGISTRO` = '$IdRegistro' and ID_TIPO_CAMPO between 1 and 10;";
mysqli_query($conexion,$sql);

foreach( $_POST as $key => $value ) {
        if( is_array( $value ) ) {
        $id = substr($key,6); //obtenemos el id del campo

        foreach( $value as $valor ) {
        //manejamos catalogos multiples

            $sql="INSERT INTO `cantprosdb`.`C_RELACION_REGISTROS`(`ID_REGISTRO`,`ID_TIPO_CAMPO`,`ID_OPCION_CAMPO`,`ETIQUETA_OPCION_CAMPO`,`TIPO_RELACION`,`NOMBRE_RELACION`) SELECT '$IdRegistro ',
'$id','$value',`ETIQUETA_OPCION_CAMPO`,`TIPO_RELACION`,`NOMBRE_RELACION` FROM `cantprosdb`.`C_RELACION_REGISTROS` WHERE `ID_REGISTRO`=-1 AND `ID_TIPO_CAMPO`=$id and `ID_OPCION_CAMPO`=$value;";
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
        }
    }
}

$Tabaquismo = "0";
$Proveniencia = "0";
$numeroRegistro= "0";
$HistorialFamiliar = "0";

if (isset($_POST["proveniencia"]) && $_POST["proveniencia"] <> "")
    $Proveniencia=$_POST["proveniencia"];

if (isset($_POST["rTabaquismo"]) && $_POST["rTabaquismo"] <> "")
    $Tabaquismo=$_POST["rTabaquismo"];

if (isset($_POST["sNumeroRegistro"]) && $_POST["sNumeroRegistro"] <> "")
    $numeroRegistro=$_POST["sNumeroRegistro"];

if (isset($_POST["iFamiliaCancer"]) && $_POST["iFamiliaCancer"] <> "")
    $HistorialFamiliar=$_POST["iFamiliaCancer"];

$sql="UPDATE `cantprosdb`.`C_REGISTROS` set CRHISTORIAL_FAMILIAR='$HistorialFamiliar', CRTABAQUISMO='$Tabaquismo', CRNUMERO_REGISTRO='$numeroRegistro' WHERE ID_REGISTRO='$IdRegistro';";
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