<?php
session_start();

include '../../config.php';
include 'opendb.php';

$_SESSION["ID_USUARIO"] = "";
$_SESSION["NOMBRE"] = "";
header('Location: ../../index.php');
//header('Location: ../../home.html'); 

include 'closedb.php';
?>