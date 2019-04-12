<?php
/**
 * Created by PhpStorm.
 * User: Josue Garcia
 * Date: 3/11/2017
 * Time: 3:12 pm
 * Manejo de validacion de RFC y Generación de nuevo registro
 */
	if(!isset($_SESSION)) {
		session_start();
	}
	include '../../../config.php';
	include '../opendb.php';

	$sRfc = ((string)$_REQUEST["sRFC"]);
	$sql = "SELECT CRRFC, ID_REGISTRO FROM cantprosdb.C_REGISTROS WHERE CRRFC = '$sRfc';";
	$registros = getSelectV($conexion, $sql);
	//print($sql);
	//exit();
	$RFC = "";
	$registros = mysqli_query($conexion,$sql);
	foreach($registros as $row){
		$RFC = $row['CRRFC'];

		$_SESSION["idRegistro"] =$row['ID_REGISTRO'];
	}
	if ($RFC <> ""){
		if (isset($_SESSION["rfc"]) && $_SESSION["rfc"] == $RFC){ //la sesion del rfc es la actual continuamos a la siguiente pantalla


			//die();
		}else{
			$_SESSION["rfc"] =$row['CRRFC'];
			echo($_SESSION["idRegistro"]);
		}
	}else{
		//generamos la inserción en la tabla temporal de registros
	//sApellidoPaterno:GARCIA
	//sApellidoMaterno:ARENAS
	//sNombres:JOSUE DAVID
	//dNacimiento:2017-03-11
	//sRFC:GAAJ170311

		$sNombre = (string)$_REQUEST["sNombres"];
		$sApPaterno = (string)$_REQUEST["sApellidoPaterno"];
		$sApMaterno = (string)$_REQUEST["sApellidoMaterno"];
		$dDate = ((string)$_REQUEST["dNacimiento"]);
		$idUser = $_SESSION["ID_USUARIO"];
		$sql = "INSERT INTO `cantprosdb`.`C_REGISTROS` (`CRNOMBRE`, `CRAPELLIDO_PATERNO`,`CRAPELLIDO_MATERNO`, `CRFECHA_NACIMIENTO`, `CRRFC`, `CRUSUARIO_INICIO`, `CRESTATUS`) VALUES ('{$sNombre}','{$sApPaterno}','{$sApMaterno}','{$dDate}','{$sRfc}','{$idUser}',-1)";
		//se carga la sesion del RFC para poder asignarla al usuario
		mysqli_query($conexion,$sql);
		$_SESSION["rfc"] = $sRfc;
		$_SESSION["idRegistro"] = mysqli_insert_id($conexion);
	}
	include '../closedb.php';
?>