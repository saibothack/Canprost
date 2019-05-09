<?php session_start();
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/21/2017
 * Time: 10:27 PM
 */

header("Content-Type: application/json");

include '../../../config.php';
include '../opendb.php';
include '../funciones.php';

$current = $_REQUEST["current"];
$rowcount = $_REQUEST["rowCount"];
$search = $_REQUEST["searchPhrase"];
//$current = $_REQUEST["current"];


$inicia = (($current - 1) *  $rowcount);

if ($search) {
    $sql = "select r.ID_REGISTRO as id, 	CONCAT(IFNULL(CONCAT(r.CRNOMBRE,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_PATERNO,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_MATERNO,' '),' ')) AS sNombre, r.CRNUMERO_REGISTRO, DATE_FORMAT(r.CRFECHA_INICIO, '%d/%m/%Y') as sFechaRegistro, h.HOSPITAL as sNombreHospital
	from cantprosdb.C_REGISTROS r inner join cantprosdb.C_USUARIOS u on u.ID_USUARIO=r.CRUSUARIO_INICIO inner join cantprosdb.C_HOSPITALES h on h.ID_HOSPITAL=u.CUHOSPITAL WHERE CONCAT(IFNULL(CONCAT(r.CRNOMBRE,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_PATERNO,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_MATERNO,' '),' '))  LIKE '%{$search}%'";
    $sqlcount = "SELECT COUNT(*) as cuenta from cantprosdb.C_REGISTROS r inner join cantprosdb.C_USUARIOS u on u.ID_USUARIO=r.CRUSUARIO_INICIO inner join cantprosdb.C_HOSPITALES h on h.ID_HOSPITAL=u.CUHOSPITAL WHERE CONCAT(IFNULL(CONCAT(r.CRNOMBRE,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_PATERNO,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_MATERNO,' '),' '))  LIKE '%{$search}%'";

    if ($_SESSION["TIPO"] == 2) {
        $sql = $sql . " AND u.ID_USUARIO = {$_SESSION["ID_USUARIO"]}";
        $sqlcount = $sqlcount . " AND u.ID_USUARIO = {$_SESSION["ID_USUARIO"]};";
    }

    $sql = $sql . " ORDER BY r.ID_REGISTRO DESC;";
} else {
    $sql = "select r.ID_REGISTRO as id, CONCAT(IFNULL(CONCAT(r.CRNOMBRE,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_PATERNO,' '),' '),IFNULL(CONCAT(r.CRAPELLIDO_MATERNO,' '),' ')) AS sNombre, r.CRNUMERO_REGISTRO, DATE_FORMAT(r.CRFECHA_INICIO, '%d/%m/%Y') as sFechaRegistro, h.HOSPITAL as sNombreHospital from cantprosdb.C_REGISTROS r inner join cantprosdb.C_USUARIOS u on u.ID_USUARIO=r.CRUSUARIO_INICIO inner join cantprosdb.C_HOSPITALES h on h.ID_HOSPITAL=u.CUHOSPITAL";
    $sqlcount = "SELECT COUNT(*) as cuenta from cantprosdb.C_REGISTROS r inner join cantprosdb.C_USUARIOS u on u.ID_USUARIO=r.CRUSUARIO_INICIO inner join cantprosdb.C_HOSPITALES h on h.ID_HOSPITAL=u.CUHOSPITAL";

    if ($_SESSION["TIPO"] == 2) {
        $sql = $sql . " WHERE u.ID_USUARIO = {$_SESSION["ID_USUARIO"]}";
        $sqlcount = $sqlcount . " WHERE u.ID_USUARIO = {$_SESSION["ID_USUARIO"]};";
    }

    $sql = $sql . " ORDER BY r.ID_REGISTRO DESC LIMIT {$inicia}, {$rowcount};";
    //$sql = $sql . " ORDER BY r.ID_REGISTRO DESC LIMIT 0, 7;";
}


//echo $sql;
//echo $sqlcount;

//echo $_SESSION["TIPO"];
//exit();



//print($sql);
//die();
$registros = mysqli_query($conexion,$sqlcount);
$error = mysqli_error($conexion);
$count = 0;
while($row = mysqli_fetch_assoc($registros)) {
    $count = $row["cuenta"];
}

$registros = mysqli_query($conexion,$sql);
$error = mysqli_error($conexion);


$rows = array();
while($row = mysqli_fetch_assoc($registros)) {
    $rows[] = $row;
}

$data = array(
    "current" 	=> (int)$current,
    "rowCount"	=> (int)$rowcount,
    "rows" => array($rows),
    "total" => $count
);

echo jsonformat($data);


include '../closedb.php';
?>