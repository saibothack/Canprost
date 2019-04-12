<?php
/**
 * Created by PhpStorm.
 * User: Josue Garcia
 * Date: 3/9/2017
 * Time: 1:18 AM
 * Clase que se encarga de gestionar la grabacion de los datos generales del usuario
 */
header("Content-Type: application/json");

include '../../../config.php';
include '../opendb.php';


foreach( $_POST as $key => $value ) {
    if( is_array( $value ) ) {
        foreach( $value as $valor ) {

        }
    } else {
        $pos=strrpos ($key,"campo_");
        if (!($pos===false)){ //es un campo con id
            $id = substr($key,6); //obtenemos el id del campo
            $sql="INSERT INTO `C_RELACION_USUARIOS`(`ID_USER`,`ID_TIPO_CAMPO`,`ID_OPCION_CAMPO`) VALUES (' $_SESSION[ID_USUARIO] ',
'$id','$value');";

            mysqli_query($conexion,$sql);


        }
    }
}



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