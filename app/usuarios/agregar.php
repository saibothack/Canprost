<?php
session_start(); 
include '../../config.php';
include '../php/opendb.php';

$ind = 0;

if(isset($_REQUEST['ind']) && $_REQUEST['ind'] == 1) {
	$ind = $_REQUEST['ind'];
	

	$sql = "SELECT CUUSUARIO, CUAPELLIDOS,CUGENERO,CUPASS,CUEMAIL,CUTELEFONO,
	CUPREGUNTA,CURESPUESTA,CUHOSPITAL,CUPUESTO FROM
	cantprosdb.C_USUARIOS WHERE id_usuario = {$_SESSION["ID_USUARIO"]};";

	$registros = mysqli_query($conexion,$sql);
	$error = mysqli_error($conexion);

	$nombre = "";
	$apellidos = "";
	$genero = "";
	$email= "";
	$telefono="";
	$pregunta= "";
	$respuesta= "";
	$hospital= "";
	$puesto= "";

	while($row = mysqli_fetch_assoc($registros)) {
		$nombre= $row["CUUSUARIO"];
		$apellidos= $row["CUAPELLIDOS"];
		$genero= $row["CUGENERO"];
		$email= $row["CUEMAIL"];
		$telefono= $row["CUTELEFONO"];
		$pregunta= $row["CUPREGUNTA"];
		$respuesta= $row["CURESPUESTA"];
		$hospital= $row["CUHOSPITAL"];
		$puesto= $row["CUPUESTO"];
	}
} else {
    if (isset($_REQUEST['ind'])) {
        $ind = $_REQUEST['ind'];
    }

}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Documento sin título</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
	<!--Eestilos-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="../../resources/css/global.css" rel="stylesheet">
</head>
<body>
	<h1>Alta de Usuario</h1>
	<p>Hola buenos dias!  por favor complete los siguientes campos, los datos marcados con <span class="required-label">*</span> son obligatorios:</p>
	<fieldset>
		<form class="form-horizontal" style="width: 98% !Important; margin: auto;" data-toggle="validator" role="form" id="frmH">
			<br>
			<div class="form-group">
				<div id="divNombreUsuario">
					<label for="sNombreUsuarios" class="col-sm-2 control-label">Nombre(s) &nbsp;<span class="required-label"|>*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sNombreUsuarios" placeholder="Nombre" value="<?php if (isset($nombre)) { echo($nombre); } ?>" required>
						<input type="hidden" id="ind" value="<?php if ($ind) { echo($ind); }?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div id="divApellidos">
					<label for="sApellidosUsuarios" class="col-sm-2 control-label">Apellidos &nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sApellidosUsuarios" placeholder="Apellidos" value="<?php if (isset($apellidos)) { echo($apellidos); } ?>" required>
					</div>
				</div>
				<div id="divGenero">
					<label for="iGenero" class="col-sm-2 control-label">Género&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" id="iGenero" required>
							<option value="">Seleccione</option>
							<option value="1">Mujer</option>
							<option value="2">Hombre</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div id="divPass">
					<label for="sPass" class="col-sm-2 control-label">Contraseña&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="password" class="form-control" id="sPass" placeholder="Contraseña" required>
					</div>
				</div>
				<div id="divConfirmPass">
					<label for="sConfirmPass" class="col-sm-2 control-label">Confirmar Contraseña&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="password" class="form-control" id="sConfirmPass" placeholder="Contraseña" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div id="divEmail">
					<label for="sEmail" class="col-sm-2 control-label">E-mail&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="email" onBlur="validar_email('sEmail')" class="form-control" id="sEmail" placeholder="Email" value="<?php if(isset($email)) { echo($email); } ?>" required>
					</div>
				</div>
				<div id="divTelefono">
					<label for="sTelefono" class="col-sm-2 control-label">Telefono&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="tel" onKeyPress="return solonumeros(event)" maxlength="10" class="form-control" id="sTelefono" value="<?php if(isset($telefono)) { echo($telefono); } ?>" placeholder="Telefono" required>
					</div>
				</div>
			</div>
			<hr>
			<div class="form-group">
				<div id="divPregunta">
					<label for="sPregunta" class="col-sm-2 control-label">Pregunta de seguridad&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" id="sPregunta" required>
							<option value="">Seleccione</option>
							<option value="1">Apellidos de mi artista favorito</option>
							<option value="2">Ciudad en donde nací</option>
							<option value="3">Nombre de mi mascota</option>
							<option value="4">Nombre de mi mejor amigo</option>
							<option value="5">Marca de mi primer auto</option>
							<option value="6">Mi libro favorito</option>
							<option value="7">Mi canción favorita</option>
						</select>
					</div>
				</div>
				<div id="divRespuesta">
					<label for="sRespuesta" class="col-sm-2 control-label">Respuesta secreta&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sRespuesta" value="<?php if(isset($respuesta)) { echo($respuesta); } ?>" placeholder="Respuesta secreta" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div id="divHospital">
					<label for="sHospital" class="col-sm-2 control-label">Hospital al que pertenece&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" id="sHospital" required>
							<option value="">Seleccione Hospital</option>
						<?php
							$sql = "SELECT ID_HOSPITAL, HOSPITAL FROM cantprosdb.C_HOSPITALES;";
							$registros = mysqli_query($conexion,$sql);
							$error = mysqli_error($conexion);
							while($row = mysqli_fetch_assoc($registros)) {
						?>
							<option value="<?php print($row["ID_HOSPITAL"]) ?>"><?php print($row["HOSPITAL"]) ?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div id="divPuesto">
					<label for="sPuesto" class="col-sm-2 control-label">Puesto de trabajo&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sPuesto" value="<?php if(isset($puesto)) { echo($puesto); } ?>" placeholder="Puesto laboral" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-5 col-sm-3">
					<button type="button" class="btn btn-primary" id="btnRegistrar">Registrar</button>
				</div>
			</div>
		</form>
		
		<div id="dialog-confirm" title="Confirmación">
		  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Su registro se dio de alta, ¿Desea dar de alta un nuevo registro?</p>
		</div>
		<div id="dialog" title="Error">
		  <p>Ocurrio un error</p>
		</div>
		<div id="dialogUS" title="Usuario registrado">
		  <p>Autorizador para entrar</p>
		</div>
	</fieldset>
	
	<!--jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!--boostrap-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../resources/script/validator.js" type="text/javascript"></script>
	<script src="../../resources/script/sysware.js" type="text/javascript"></script>
	<script src="../../resources/script/app/usuarios/registros.js" type="text/javascript"></script>
	<script>
		<?php if (isset($genero) && ($genero != "")) { ?>
		jQuery("#iGenero option[value=<?php echo($genero); ?>]").attr("selected", true);		
		jQuery("#sPregunta option[value=<?php echo($pregunta); ?>]").attr("selected", true);
		jQuery("#sHospital option[value=<?php echo($hospital); ?>]").attr("selected", true);
		<?php } ?>
	</script>
</body>
</html>
<?php include '../php/closedb.php'; ?>