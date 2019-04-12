<?php session_start(); 
if ($_SESSION['ID_USUARIO'] == "") {
	header('Location: ../../index.html'); 
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
	<link href="../../resources/css/app/registros.css" rel="stylesheet">
	<link href="../../resources/css/jquery.alerts.css" rel="stylesheet">
	<!--jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
	<!--Empieza seccion datos generales-->
	<div id="tabs-2">
		<form id="form_dgenerales" class="form-horizontal" method="post" action="../php/registros/datos_generales.php">
			<div class="form-group">
				<div id="divRHP">
					<label for="inputEmail3" class="col-sm-2 control-label">RHP Cáncer de Próstata <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<label><input type="checkbox" name="chk" />Adenocarcinoma</label>
						<label><input type="checkbox" name="chk" />Otro</label>
					</div>
				</div>
				<div id="divEspecificarCancer" hidden>
					<label class="col-sm-2 control-label">Especificar otro <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" maxlength="50" />
					</div>
				</div>
			</div>
			<script>
				$(document).ready(function(){
					$("#divRHP").click(function(){
						if($("input[name=iBloqueHormonal]:checked").val() == 1){
							$("#divEspecificarCancer").show()
						}else{
							$("#divEspecificarCancer").hide()
						}
					});
				});
			</script>
			
			<div class="form-group" id="divAnoDiagnostico">
				<label for="campo_7" class="col-sm-2 control-label">Gleason <span class="required-label">*</span></label>
				<div class="col-sm-2">
					<input type="text" id="gleason_1" class="form-control" onkeypress="validaGleason()"/>
				</div>
				<div class="col-sm-2">
					<input type="text" id="gleason_2" class="form-control" onkeypress="validaGleason()"/>
				</div>
				<script>
					function validaGleason(){
						if($("#gleason_1").val() < 1){
							$("#gleason_1").val('')
						}else{
							if($("#gleason_1").val() > 10){
								$("#gleason_1").val('')
							}	
						}
						if($("#gleason_2").val() < 1){
							$("#gleason_2").val('')
						}else{
							if($("#gleason_2").val() > 10){
								$("#gleason_2").val('')
							}	
						}
					}
				</script>
			</div>
			<hr style="border:solid 1px">
			<div class="form-group" id="divAnoDiagnostico">
				<label class="col-sm-2 control-label">APE al diagnóstico</label>
			</div>
			<div class="form-group" id="divApellidoPaterno">
				<label for="sApellidoPaterno" class="col-sm-2 control-label">Total</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="sApellidoPaternoD" name="sApellidoPaternoD" placeholder="Total" >
				</div>
				<label for="sApellidoMaterno" class="col-sm-2 control-label">Libre</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="sApellidoMaternoD" name="sApellidoMaternoD" placeholder="Libre" >
				</div>
			</div>
			<div class="form-group" id="divNombres">
				<label for="sNombres" class="col-sm-2 control-label">Desconocido</label>
				<div class="col-sm-4">
					<input type="checkbox">
				</div>
				<label for="dNacimiento" class="col-sm-2 control-label">Otros marcadores</label>
				<div class="col-sm-2">
					<input type="checkbox" > Si
				</div>
				<div class="col-sm-2">
					<input type="checkbox" > No
				</div>
			</div>
			<div class="form-group">
				<label for="campo_2" class="col-sm-2 control-label">Indique otros marcadores</label>
				<div class="col-sm-4">
					<select class="form-control" id="campo_2" name="campo_2">
					</select>
				</div>
				<label for="campo_10" class="col-sm-2 control-label">Especificar otro</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="Especificar otro" maxlength="50">
				</div>
			</div>
			<div class="form-group">
				<label for="campo_3" class="col-sm-2 control-label">Estudios de imagen</label>
				<div class="col-sm-2">
					<input type="radio" > Si
				</div>
				<div class="col-sm-2">
					<input type="radio" > No
				</div>
				<label for="campo_3" class="col-sm-2 control-label">TAC</label>
				<div class="col-sm-4">
					<input type="radio" > No realizado
					<input type="radio" > Negativo
					<input type="radio" > Positivo
				</div>
			</div>
			<div class="form-group">
				<label for="campo_8" class="col-sm-2 control-label">Seleccionar TAC</label>
				<div class="col-sm-4">
					<select class="form-control" name="campo_8" id="campo_8">
					</select>
				</div>
				<label for="campo_10" class="col-sm-2 control-label">Especificar otro</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="Especificar otro" maxlength="50">
				</div>
			</div>
			<hr style="border: solid 1px;">
			<div class="form-group ">
				<label for="campo_3" class="col-sm-2 control-label">RMI</label>
				<div class="col-sm-4">
					<input type="radio" > No realizado
					<input type="radio" > Negativo
					<input type="radio" > Positivo
				</div>
				<label for="campo_8" class="col-sm-2 control-label">Seleccionar RMI</label>
				<div class="col-sm-4">
					<select class="form-control" name="campo_8" id="campo_8">
					</select>
				</div>
			</div>
			<div class="form-group " >
				<label for="campo_10" class="col-sm-2 control-label">Especificar otro</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="Especificar otro" maxlength="50">
				</div>
				<label for="campo_3" class="col-sm-2 control-label">PET</label>
				<div class="col-sm-4">
					<input type="radio" > No realizado
					<input type="radio" > Negativo
					<input type="radio" > Positivo
				</div>
			</div>
			<div class="form-group " >
				<label for="campo_8" class="col-sm-2 control-label">Seleccionar RMI</label>
				<div class="col-sm-4">
					<select class="form-control" name="campo_8" id="campo_8">
					</select>
				</div>
				<label for="campo_10" class="col-sm-2 control-label">Especificar otro</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="Especificar otro" maxlength="50">
				</div>
			</div>
			<div class="form-group " >
				<label for="campo_3" class="col-sm-2 control-label">GGO</label>
				<div class="col-sm-4">
					<input type="radio" > No realizado
					<input type="radio" > Negativo
					<input type="radio" > Positivo
				</div>
				<label for="campo_10" class="col-sm-2 control-label">Seleccionar GGO</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="Especificar otro" maxlength="50">
				</div>
			</div>
			<div class="form-group " >
				<label for="campo_10" class="col-sm-2 control-label">Numero de lesiones</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" placeholder="Especificar otro" maxlength="10">
				</div>
				<label for="campo_3" class="col-sm-2 control-label">TR</label>
				<div class="col-sm-4">
					<input type="radio" > Si
					<input type="radio" > No
					<input type="radio" > No realizado
				</div>
			</div>
			<div class="form-group ">
				<label for="campo_3" class="col-sm-2 control-label">Etapificación Clínica T*</label>
				<div class="col-sm-4">
					<select class="form-control" name="campo_8" id="campo_8">
					</select>
				</div>
				<label for="campo_8" class="col-sm-2 control-label">Etapificación Clínica N</label>
				<div class="col-sm-4">
					<select class="form-control" name="campo_8" id="campo_8">
					</select>
				</div>
			</div>
			<div class="form-group ">
				<label for="campo_8" class="col-sm-2 control-label">Etapificación Clínica M</label>
				<div class="col-sm-4">
					<select class="form-control" name="campo_8" id="campo_8">
					</select>
				</div>
				<label for="campo_3" class="col-sm-2 control-label">Vigilancia Activa</label>
				<div class="col-sm-4">
					<input type="radio" > Si
					<input type="radio" > No
				</div>
			</div>
			<div class="form-group ">
				<label for="campo_8" class="col-sm-2 control-label">Progresión post-vigilancia activa</label>
				<div class="col-sm-4">
					<input type="radio" > Si
					<input type="radio" > No
				</div>
				<label for="campo_3" class="col-sm-2 control-label">Tratamiento diferido</label>
				<div class="col-sm-4">
					<input type="radio"> Si
					<input type="radio" > No
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-9 col-sm-3">
					<button type="button" class="btn btn-danger" id="regresarGeneral" onclick="cargaSeccion1()">Regresar</button>
					<button type="button" class="btn btn-primary" id="continuarGeneral" onclick="guardarDatosGenerales()">Continuar</button>
				</div>
			</div>
		</form>
	</div>
	<!--termina seccion datos generales-->
	
	<!--boostrap-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
	<!--steps-->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!--alerts-->
	<script src="../../resources/script/jquery.alerts.js"></script>
	<!--steps-->
	<script src="../../resources/script/app/registros.js" type="text/javascript"></script>
	<script>
		$(function() {
			$("#tabs").tabs();
		});
	</script>
</body>
</html>