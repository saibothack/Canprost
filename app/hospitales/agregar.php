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
		if ($_REQUEST[ediId] <> "") {
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
				<label for="sNombreHospital" class="col-sm-2 control-label">Nombre del hospital&nbsp;<span class="required-label">*</span></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="sNombreHospital" placeholder="Nombre del hospital" required>
				</div>
			</div>
			<div class="form-group">
				<div id="divSector">
					<label class="col-sm-2 control-label">Sector&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="radio" name="rSector" value="1" required/>&nbsp;Público
						<input type="radio" name="rSector" value="2" />&nbsp;Privado
						<input type="radio" name="rSector" value="3" />&nbsp;Descentralizado
					</div>
				</div>
				<div id="divNivelHospitalario">
					<label for="iNivelHospitalario" class="col-sm-2 control-label">Nivel hospitalario&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" id="iNivelHospitalario" required>
							<option value="">Select</option>
							<option value="1">1er Nivel</option>
							<option value="2">2o Nivel</option>
							<option value="3">3er Nivel</option>
							<option value="4">4to Nivel</option>

						</select>
					</div>
				</div>
			</div>
			<hr>
			<div class="form-group">
				<div id="divCalle">
					<label for="sCalle" class="col-sm-2 control-label">Calle y Número&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sCalle" placeholder="Domicilio (calle y número)" required>
					</div>
				</div>
				<div id="divColonia">
					<label for="sColonia" class="col-sm-2 control-label">Colonia&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sColonia" placeholder="Colonia" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div id="divCiudad">
					<label for="sCiudad" class="col-sm-2 control-label">Ciudad&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sCiudad" placeholder="Ciudad" required>
					</div>
				</div>
				<div id="divEstado">
					<label for="sEstado" class="col-sm-2 control-label">Estado&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sEstado" placeholder="Estado" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div id="divCp">
					<label for="sCp" class="col-sm-2 control-label">Código postal&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sCp" placeholder="Código postal" required>
					</div>
				</div>
				<div id="divTelefono">
					<label for="sTelefono" class="col-sm-2 control-label">Teléfono&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sTelefono" placeholder="Teléfono" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div id="divTipoTel">
					<label class="col-sm-2 control-label">Tipo de teléfono&nbsp;<span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="radio" name="rTipoTel" value="1" required/>&nbsp;Fijo
						<input type="radio" name="rTipoTel" value="2" />&nbsp;Fax
						<input type="radio" name="rTipoTel" value="3" />&nbsp;Móvil
					</div>
				</div>
				<label for="sEmail" class="col-sm-2 control-label">Correo electrónico</label>
				<div class="col-sm-4">
					<input type="email" id="sEmail" class="form-control" placeholder="Correo electrónico" data-error="Por favor ingrese una cuenta de correo valida">
					 <div class="help-block with-errors"></div>
				</div>
			</div>
			<div class="form-group">
				<label for="sObservaciones" class="col-sm-2 control-label">Observaciones</label>
				<div class="col-sm-10">
					<textarea rows="4" class="form-control" id="sObservaciones">
					</textarea>
				</div>
			</div>
			<?php
				if ($_REQUEST[ediId] == "") {
					echo '<div class="form-group">
							<div class="col-md-offset-5 col-sm-3">
								<button type="button" class="btn btn-primary" id="btnRegistrar">Registrar</button>
							</div>
						</div>';
				} else{
					echo '<div class="form-group">
							<div class="col-sm-5">&nbsp;</div>
							<div class="col-sm-1">
								<button type="button" class="btn btn-primary" id="btnEdita">Editar</button>
							</div>
						</div>';
				}
			?>
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
