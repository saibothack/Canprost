<?php
header("Content-Type: application/json");	
session_start(); 
include '../../../config.php';
include '../opendb.php';

if($_REQUEST[ind] == 0 or $_REQUEST[ind] == 2){
	$sql = "SELECT CUUSUARIO  FROM cantprosdb.C_USUARIOS WHERE `CUUSUARIO`='$_REQUEST[nombreUsuario]' and `CUAPELLIDOS`= '$_REQUEST[apellidosUsuario]' and `CUEMAIL`='$_REQUEST[email]';";

	$registros = mysqli_query($conexion,$sql);
	$error = mysqli_error($conexion);
	$num_rows = mysql_numrows($result);

	$rows = "";
	while($row = mysqli_fetch_assoc($registros)) {
		$rows = $row;
	}
	
	if($rows > ""){
		
	} else {
		$sql="INSERT INTO `C_USUARIOS`(`CUUSUARIO`,`CUAPELLIDOS`,`CUGENERO`,`CUPASS`,`CUEMAIL`,`CUTELEFONO`,
		`CUPREGUNTA`,`CURESPUESTA`,`CUHOSPITAL`,`CUPUESTO`) VALUES ('$_REQUEST[nombreUsuario]',
		'$_REQUEST[apellidosUsuario]','$_REQUEST[genero]', '$_REQUEST[pass]', '$_REQUEST[email]', '$_REQUEST[telefono]', '$_REQUEST[pregunta]', '$_REQUEST[respuesta]', '$_REQUEST[hospital]', '$_REQUEST[puesto]');";
	}
}else{
	$sql="UPDATE `cantprosdb`.`C_USUARIOS` SET `CUUSUARIO`='$_REQUEST[nombreUsuario]',`CUAPELLIDOS`= '$_REQUEST[apellidosUsuario]',`CUGENERO`='$_REQUEST[genero]',`CUPASS`='$_REQUEST[pass]', `CUEMAIL`='$_REQUEST[email]',`CUTELEFONO`='$_REQUEST[telefono]',`CUPREGUNTA`='$_REQUEST[pregunta]', `CURESPUESTA`='$_REQUEST[respuesta]',`CUHOSPITAL`='$_REQUEST[hospital]', `CUPUESTO`='$_REQUEST[puesto]' WHERE `ID_USUARIO` = {$_SESSION["ID_USUARIO"]};";
}

    //Envia mail usuario
    mysqli_query($conexion,$sql);
    $error = mysqli_error($conexion);
    
    
    $para  = $_REQUEST[email];
    //$para  = 'garenas@sysware.com.mx';
    $titulo = 'Registro de Usuario';
    
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
									<h3>Gracias por registrarse, el administrador tiene que autorizar si ingreso cuando esto suceda le llegara un correo indicando que el administrdor le a concedido el acceso.</h3>
								</td>
							</tr>
							<tr>
								<td style="width: 50%; font-weight: bold">
									<label style="margin-left: 100px">Bienvenido</label>
								</td>
								<td style="width: 50%">'. $_REQUEST[nombreUsuario] . ' ' . $_REQUEST[apellidosUsuario] . '</td>
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
    
    //$para  = $_REQUEST[email];
    $para = 'annasc80@gmail.com';
    // tÃ­tulo
    $titulo = 'Registro de Usuario';
    
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
									<h3>Un usuario nuevo se registro, por favor valide la información para que el usuario pueda accesar al sistema.</h3>
								</td>
							</tr>
							<tr>
								<td style="width: 50%; font-weight: bold">
									<label style="margin-left: 100px">Nombre</label>
								</td>
								<td style="width: 50%">'. $_REQUEST[nombreUsuario] . ' ' . $_REQUEST[apellidosUsuario] . '</td>
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
	
	if($rows > ""){
		$response = "1";
	}else{
		$response = array(
        'status' => true,
        'message' => 'Success'
    	);
	}
	


echo json_encode($response);

include '../closedb.php';
?>