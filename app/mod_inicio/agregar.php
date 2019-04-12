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
	<?php
		if ($_REQUEST[ediId]) {
			echo "<h1>Edita Hospital</h1>";
		} else{
			echo "<h1>Alta de Hospital</h1>";
		}
	?>
	
	<p>Hola buenos dias!  por favor complete los siguientes campos, los datos marcados con <span class="required-label">*</span> son obligatorios:</p>
	<fieldset>
		<form class="form-horizontal" style="width: 98% !Important; margin: auto;" data-toggle="validator" role="form" id="frmH">
			<br>
			<div class="form-group" id="divNombreHospital">
				<label class="col-sm-2 control-label">Tipo paciente&nbsp;<span class="required-label">*</span></label>
				<div class="col-sm-4">
					<label for="sNombreHospital" class="col-sm-6 control-label"><input type="checkbox" class="form form-control" id="iPacienteNuevo" name="iPacienteNuevo">Paciente nuevo&nbsp;</label>
					<label for="sNombreHospital" class="col-sm-6 control-label"><input type="checkbox" class="form form-control" id="iPacienteRecurrente" name="iPacienteRecurrente">Paciente recurrente&nbsp;</label>
				</div>
			</div>
			<div class="form-group" id="divNombreHospital">
				<label for="sAppaterno" class="col-sm-2 control-label">Apellido paterno&nbsp;<span class="required-label">*</span></label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="sAppaterno" placeholder="Apellido paterno" required>
				</div>
				<label for="sApmaterno" class="col-sm-2 control-label">Apellido materno&nbsp;<span class="required-label">*</span></label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="sApmaterno" placeholder="Apellido materno" required>
				</div>
			</div>
			<div class="form-group" id="divNombreHospital">
				<label for="sNombre" class="col-sm-2 control-label">Nombre(s)&nbsp;<span class="required-label">*</span></label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="sNombre" placeholder="Nombres(s)" required>
				</div>
				<label for="dFechaNacimiento" class="col-sm-2 control-label">Fecha nacimiento&nbsp;<span class="required-label">*</span></label>
				<div class="col-sm-4">
					<input type="date" class="form-control" id="dFechaNacimiento" placeholder="Fecha nacimiento" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-5 col-sm-3">
					<button type="button" class="btn btn-primary" id="btnRegistrar">Continuar</button>
				</div>
			</div>
		</form>
		
		<div id="dialog-confirm" title="Confirmación">
		  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Su registro se dio de alta, ¿Desea dar de alta un nuevo registro?</p>
		</div>
		<div id="dialog" title="Error">
		  <p>Ocurrio un error</p>
		</div>
		<input type="hidden" id="idValue" value="<?php echo $_REQUEST[ediId]?>">
	</fieldset>
	<!--jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!--boostrap-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../resources/script/validator.js" type="text/javascript"></script>
	<script src="../../resources/script/app/hospitales/registros.js" type="text/javascript"></script>
</body>
</html>
