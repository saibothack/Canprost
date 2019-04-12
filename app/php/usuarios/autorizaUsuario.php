<?php
header("Content-Type: application/json");	
session_start(); 
include '../../../config.php';
include '../opendb.php';

$sql="UPDATE `cantprosdb`.`C_USUARIOS` SET `CUUSUARIO_AUTORIZADO`='1' WHERE `ID_USUARIO` = $_REQUEST[id];";
mysqli_query($conexion,$sql);
$error = mysqli_error($conexion);

$sqlquery = "SELECT CONCAT(CUUSUARIO,  ' ', CUAPELLIDOS) as nombre, cuemail as email FROM
cantprosdb.C_USUARIOS WHERE ID_USUARIO = $_REQUEST[id];";

$registros = mysqli_query($conexion,$sqlquery);
$error = mysqli_error($conexion);

$nombre = "";
$correo = "";
while($row = mysqli_fetch_assoc($registros)) {
	$nombre = $row["nombre"];
	$correo = $row["email"];
}

$para  = $correo;
//$para  = 'garenas@sysware.com.mx';
$titulo = 'Autorizaci&oacute;n de usuario';

// mensaje
$mensaje = '<table style="text-align: left; margin-left: 100px; position: absolute; font-family: arial; width: 500px">
							<tr>
								<td colspan="2">
									<img src="http://canprost.com/resources/img/logo-incan.png" alt="logo" >
								</td>
							</tr>
							<tr>
								<td style="text-align: center;" colspan="2">
									<h3>Registro de Usuario</h3>
								</td>
							</tr>
                            <tr>
								<td style="text-align: center;" colspan="2">
									<h5> Su usuario se autorizo, desde este momento puede ingresar al sistema. </h5>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									&nbsp;
								</td>
							</tr>
							<tr>
								<td colspan="2">
									&nbsp;
								</td>
							</tr>
							<tr>
								<td colspan="2">
									&nbsp;
								</td>
							</tr>
							<tr>
								<td colspan="2" style="background-color: #565459">
									<p style="color: white; font-weight:normal; font-size: 13px; margin: 20px; text-align: justify;">
										* Por favor no responda este correo al mismo remitente.
									</p>
								</td>
							</tr>
						</table>';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$cabeceras .= 'From: Registro Cliente <notificaciones@canprost.com>' . "\r\n";

// Enviarlo
mail($para, $titulo, $mensaje, $cabeceras);



$msg = "Estimado ";
$msg .= $nombre;
$msg .= "Mensaje: Le damos una coordial bienvenida a nuestro sitio, en breve uno de nuestros administradores validara su información";
//print($msg);
$msg = wordwrap($msg,70);

$response = array();

//if (!$error) {
	//try {
		mail($correo,"Usuario autorizado",$msg);
//	} catch (Exception $e) {
		//echo 'Excepción capturada: ',  $e->getMessage(), "\n";
	//} finally {
		$response = array(
        'status' => true,
        'message' => 'Success'
    	);
	//}
//}else {
  //  $response = array(
    //    'status' => false,
      //  'message' => $error
    //);
//}

echo json_encode($response);

include '../closedb.php';
?>