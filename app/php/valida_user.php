<?php
session_start();

try {

    require_once('../../config.php');
    require_once('opendb.php');

    $sql = "SELECT ID_USUARIO, TIPO, CONCAT(CUUSUARIO, ' ', CUAPELLIDOS) AS NOMBRE, hospital FROM cantprosdb.C_USUARIOS inner join cantprosdb.C_HOSPITALES ON C_USUARIOS.CUHOSPITAL = C_HOSPITALES.ID_HOSPITAL WHERE CUEMAIL = '$_POST[usuario]' AND CUPASS = '$_POST[pass]' AND CUUSUARIO_AUTORIZADO = 1;";

    $registros = mysqli_query($conexion, $sql);
    $error = mysqli_error($conexion);

    if ($error <> "") {
        print($error);
    } else {

        while ($row = mysqli_fetch_array($registros)) {
            $_SESSION["ID_USUARIO"] = $row['ID_USUARIO'];
            $_SESSION["HOSPITAL"] = $row['hospital'];
            $_SESSION["NOMBRE"] = $row['NOMBRE'];
            $_SESSION["TIPO"] = $row['TIPO'];
        }

        if ($_SESSION["ID_USUARIO"] != "") {
            header('Location: ../../home.php');
        } else {
            $_SESSION["ERROR"] = false;
            header('Location: ../../index.php');
        }
    }

    include 'closedb.php';
} catch (Exception $e) {
    echo 'Excepción capturada: ', $e->getMessage(), "\n";
}

?>
