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
</head>

<body>
	<h1>Nuevo Registro</h1>
	<div id="tabs" class="wtabs">
		<!--Menu de nuevo registro-->
		<ul>
			<li><a href="#tabs-1">Nuevo</a></li>
			<li><a href="#tabs-2">1 Datos Generales</a></li>
			<li><a href="#tabs-3">2 Diagnóstico</a></li>
			<li><a href="#tabs-4">3 Cirugía</a></li>
			<li><a href="#tabs-5">4 Radioterapia</a></li>
			<li><a href="#tabs-6">5 Metástasis</a></li>
			<li><a href="#tabs-7">6 Progresión</a></li>
			<li><a href="#tabs-8">7 Ningún tratamiento</a></li>
			<li><a href="#tabs-9">8 Estatus</a></li>
		</ul>
		<!--Inicia seccion nuevo-->
		<div id="tabs-1">
			<h2>Un registro consta de 8 partes:</h2>
			<ul>
				<li>Datos Generales</li>
				<li>Diagnóstico</li>
				<li>Cirugía</li>
				<li>Radio Terapia</li>
				<li>Metástasis</li>
				<li>Progresión</li>
				<li>Ningún tratamiento</li>
				<li>Estatus</li>
			</ul>
			<br>
			<ol>
				<li>Usted puede iniciar con la captura del registro, y si por cualquier motivo no puede concluir, puede usted terminar en otro momento.</li>
				<li>Por favor sea tan preciso y conciso como le sea posible en sus respuestas.</li>
				<li>Si tiene dudas, puede mandarnos un mensaje mediante nuestra página de contacto.</li>
			</ol>
			<filset>
				<legend>Por favor ingrese los datos del paciente del paciente:</legend>
				<form id="form_registro" class="form-horizontal" method="post" action="../php/registros/nuevo.php">
					<div class="form-group">
						<div id="divApellidoPaterno">
						<label for="sApellidoPaterno" class="col-sm-2 control-label">Apellido paterno</label>
						<div class="col-sm-4">
							<input type="text" onBlur="calculaRFC()" class="form-control" name="sApellidoPaterno" id="sApellidoPaterno" placeholder="Apellido paterno" required>
						</div>
						</div>
						<div id="divApellidoMaterno">
						<label for="sApellidoMaterno" class="col-sm-2 control-label">Apellido materno</label>
						<div class="col-sm-4">
							<input type="text" onBlur="calculaRFC()" class="form-control" name="sApellidoMaterno" id="sApellidoMaterno" placeholder="Apellido materno" required>
						</div>
					</div>
					</div>
					<div class="form-group">
						<div id="divNombreReg">
						<label for="sNombres" class="col-sm-2 control-label">Nombres</label>
						<div class="col-sm-4">
							<input type="text" onBlur="calculaRFC()" class="form-control" name="sNombres" id="sNombres" placeholder="Nombres" required>
						</div>
						</div>
						<div id="divFecNac">
						<label for="dNacimiento" class="col-sm-2 control-label">Fecha de Nacimiento</label>
						<div class="col-sm-4">
							<input type="date" onChange="calculaRFC()" class="form-control" name="dNacimiento" id="dNacimiento" placeholder="Fecha de Nacimiento" required>
						</div>
					</div>
					</div>
					<div class="form-group">
						<label for="sRFC" class="col-sm-2 control-label">RFC</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="sRFC" id="sRFC" placeholder="RFC" required>
						</div>
					</div>
					<div class="form-group">
						<label for="sRecurrente" class="col-sm-1 control-label">Recurrente</label>
						<div class="col-sm-4">
							<input type="radio" name="sRecurrente" id="sRecurrente" />Si
						</div>
							<div class="col-sm-4">
								<input type="radio" name="sRecurrente" id="sRecurrente" />No
							</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-10 col-sm-1">
							<button type="button" class="btn btn-primary" onclick="validaRfc()">Continuar</button>
						</div>
					</div>
				</form>
			</filset>
		</div>
		<!--termina seccion nuevo-->

		<!--Empieza seccion datos generales-->
		<div id="tabs-2">
			<form id="form_dgenerales" class="form-horizontal" method="post" action="../php/registros/datos_generales.php">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Hospital</label>
					<div class="col-sm-4">
						<label  class="form-control">Hospital Genérico de Captura</label>
					</div>
					<label class="col-sm-2 control-label">Proveniencia <span class="required-label">*</span></label>
					<div id="rg_campo_1">
					<!--	<input type="radio" name="proveniencia"  value="1" required/>Público (Instituto/Hospital)<br />
					</div>
					<div class="col-sm-2">
						<input type="radio" name="proveniencia"  value="2" />Privado<br />-->
					</div>
				</div>

				<div class="form-group" id="divAnoDiagnostico">
					<label for="campo_7" class="col-sm-2 control-label">Año de diagnóstico <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<select class="form-control" name="campo_7" id="campo_7" required>
						</select>
					</div>
					</div>
					<script>
						function validaFecha(){
							var d = $("#campo_7").val()
							if(d <= $("#dNacimientoD").val()){
								$("#divAnioDiagnostico").addClass('has-error')
								$("#campo_7").val('')
								$("#campo_7").focus()
							}else{
								if(d > <?php echo date("Y")?>){
									$("#campo_7").addClass('has-error')
									$("#campo_7").val('')
									$("#campo_7").focus()
								}
							}
						}
					</script>
					<div id="divNumeroRegistro">
					<label for="sNumeroRegistro" class="col-sm-2 control-label">Número de registro <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sNumeroRegistro" name="sNumeroRegistro" placeholder="Número de registro" required>
					</div>
				</div>
				<div class="form-group" id="divApellidoPaterno">
					<label for="sApellidoPaterno" class="col-sm-2 control-label">Apellido Paterno <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sApellidoPaternoD" name="sApellidoPaternoD" placeholder="Apellido Paterno" required>
					</div>
					<label for="sApellidoMaterno" class="col-sm-2 control-label">Apellido Materno <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sApellidoMaternoD" name="sApellidoMaternoD" placeholder="Apellido Materno" required>
					</div>
				</div>
				<div class="form-group" id="divNombres">
					<label for="sNombres" class="col-sm-2 control-label">Nombre(s) <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sNombresD" name="sNombresD" placeholder="Nombre(s)" required>
					</div>
					<label for="dNacimiento" class="col-sm-2 control-label">Fecha de nacimiento <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" id="dNacimientoD" name="dNacimientoD" placeholder="Fecha de nacimiento" required>
					</div>
				</div>
				<div class="form-group">
					<label for="campo_2" class="col-sm-2 control-label">Escolaridad </label>
					<div class="col-sm-4">
							<select class="form-control" id="campo_2" name="campo_2">
							</select>
					</div>
					<label for="campo_10" class="col-sm-2 control-label">Escolaridad en años</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_10" name="campo_2">
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="campo_3" class="col-sm-2 control-label">Ocupación</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_3" name="campo_3" >
						</select>
					</div>
					<label class="col-sm-2 control-label">Tabaquismo <span class="required-label">*</span></label>
					<div class="col-sm-1">
						<input type="radio" name="rTabaquismo" id="rTabaquismo1" value="1" onClick="cargaTabaquismo('0')" checked/>No<br />
					</div>
					<div class="col-sm-1">
						<input type="radio" name="rTabaquismo" id="rTabaquismo2" value="2" onClick="cargaTabaquismo('1')" />Si<br />
					</div>
				</div>
				<script>
					function cargaTabaquismo(ind){
						if(ind == 0){
							$("#divTabaquismo").hide()
						}else{
							$("#divTabaquismo").show()
						}
					}
					function cargaHistoria(ind){
						if(ind == 0){
							$(".divHistoria").hide()
						}else{
							$(".divHistoria").show()
						}
					}
				</script>
				<div class="form-group">
					<label for="campo_8" class="col-sm-2 control-label">Años de tabaquismo</label>
					<div class="col-sm-4">
						<select class="form-control" name="campo_8" id="campo_8">
						</select>
					</div>
					<label for="campo_9" class="col-sm-2 control-label">Cantidad (cigarros al día)</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_9" name="campo_9">
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Historia Familiar de Cáncer</label>
					<div class="col-sm-1">
						<input type="radio" name="iFamiliaCancer" id="iFamiliaCancer1" value="1"/>No<br />
					</div>
					<div class="col-sm-1">
						<input type="radio" name="iFamiliaCancer" id="iFamiliaCancer2" value="2" />Si<br />
					</div>
					<label for="campo_4" class="col-sm-offset-2 col-sm-2 control-label">Tipo de cáncer</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_4" name="campo_4" >
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="campo_5" class="col-sm-2 control-label">Otros tipos de Cáncer</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_5" name="campo_5">
						</select>
					</div>
					<label for="campo_6" class="col-sm-2 control-label">Grado del familiar con Cáncer</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_6" name="campo_6">
						</select>
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
		<div id="tabs-3">
			<form class="form-horizontal" id="form_diagnostico">
				<div class="form-group">
					<label for="campo_11" class="col-sm-2 control-label">Modalidad del diagnóstico</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_11" name="campo_11" required>
							<!--<option value="" class="form-control">Seleccione</option>
							<option value="1" class="form-control">Biopsia</option>
							<option value="2" class="form-control">Clínico APE y/o TR</option>
							<option value="3" class="form-control">RTUP/Adenomectomía</option>
							<option value="4" class="form-control">Biopsia en otro sitio</option>
							<option value="5" class="form-control">Biopsia de saturación</option>
							<option value="5" class="form-control">Desconocido</option>-->
						</select>
					</div>
					<label class="col-sm-2 control-label">Síntomas <span class="required-label">*</span></label>
					<div  id="rg_campo_12">
						<!--
						<input type="radio" name="proveniencia" value="1" required/>Asintomático
					</div>
					<div class="col-sm-2">
						<input type="radio" name="proveniencia" value="2" />Obstructivo/Irritativo
					</div>
					<div class="col-sm-2">
						<input type="radio" name="proveniencia" value="1" required/>Dolor Óseo Sangrado
					</div>
					<div class="col-sm-2">
						<input type="radio" name="proveniencia" value="1" required/>Anemia
					</div>
					<div class="col-sm-2">
						<input type="radio" name="proveniencia" value="1" required/>Otros
					-->

					</div>

				</div>
				<hr>
				<div class="form-group">

				</div>
				<div class="form-group">
					<div class="col-sm-offset-9 col-sm-3">
						<!--<button type="button" class="btn btn-danger" id="regresarGeneral">Regresar</button>-->
						<button type="button" class="btn btn-primary" id="continuarGeneral" onclick="guardarDiagnostico()" >Continuar</button>
					</div>
				</div>
			</form>
		</div>
		<!--termina seccion diagnostico-->

		<!--Empieza seccion cirugia-->
		<div id="tabs-4">
			<form class="form-horizontal" id="form_cirugia">
				<div class="form-group">
					<div id="divFechaCirugia">
					<label for="dCirugia" class="col-sm-2 control-label">Fecha de Cirugia</label>
					<div class="col-sm-4">
						<input type="date"  class="form-control" name="dCirugia" id="dCirugia" placeholder="Fecha de Cirugia" required>
					</div>
					</div>
					<label for="sNombres" class="col-sm-1 control-label">Abordaje</label>
					<div id="rg_campo_22">
						<!--<input type="checkbox" name="sNombres" id="sNombres">6
					</div>
					<div class="col-sm-1">
						<input type="checkbox" name="sNombres" id="sNombres">12
					</div>
					<div class="col-sm-1">
						<input type="checkbox" name="sNombres" id="sNombres">16
					</div>
					<div class="col-sm-1">
						<input type="checkbox" name="sNombres" id="sNombres">24
					</div>
					<div class="col-sm-1">
						<input type="checkbox" name="sNombres" id="sNombres">Otro-->
					</div>
				</div>
				<div class="form-group">
					<label for="iModalidadDiagnostico" class="col-sm-2 control-label">Especificar otro</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_23" name="campo_23" onChange="cargaEspecificar()">
							<!--<option value="" class="form-control">Seleccione</option>
							<option value="1" class="form-control">Abierta</option>
							<option value="2" class="form-control">Laparoscópica</option>
							<option value="3" class="form-control">Robótica</option>-->
						</select>
					</div>
					<script>
						function cargaEspecificar(){
							if($("#iEspecificarOtro").val() == 1){
								$("#divAbierta").show()
								$("#divLaparoscopica").hide()
								$("#divRobotica").hide()
							}else{
								if($("#iEspecificarOtro").val() == 2){
									$("#divAbierta").hide()
									$("#divLaparoscopica").show()
									$("#divRobotica").hide()
								}else{
									if($("#iEspecificarOtro").val() == 3){
										$("#divAbierta").hide()
										$("#divLaparoscopica").hide()
										$("#divRobotica").show()
									}
								}
							}
						}
					</script>
					<div id="divAbierta" hidden>
					<label for="iModalidadDiagnostico" class="col-sm-2 control-label">Abierta</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_24" name="campo_24">
							<!--<option value="" class="form-control">Seleccione</option>
							<option value="1" class="form-control">Retropúbica</option>
							<option value="2" class="form-control">Perineal</option>
							<option value="3" class="form-control">Retrógrada</option>
							<option value="4" class="form-control">Anterógrada</option>-->
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="iModalidadDiagnostico" class="col-sm-2 control-label">Laparoscópica</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_25" name="campo_25">
							<!--<option value="" class="form-control">Seleccione</option>
							<option value="1" class="form-control">Transperitoneal</option>
							<option value="2" class="form-control">Extraperitoneal</option>
							<option value="3" class="form-control">Extrafascial</option>
							<option value="2" class="form-control">Neuro-Preservadora Unilateral</option>
							<option value="3" class="form-control">Neuro-Preservadora Bilateral</option>-->
						</select>
					</div>
					<label for="iModalidadDiagnostico" class="col-sm-2 control-label">Robótica</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_26" name="campo_26">
							<!--<option value="" class="form-control">Seleccione</option>
							<option value="1" class="form-control">Transperitoneal</option>
							<option value="2" class="form-control">Extraperitoneal</option>
							<option value="3" class="form-control">Extrafascial</option>
							<option value="4" class="form-control">Anterógrada</option>
							<option value="4" class="form-control">Neuro-Preservadora Unilateral</option>
							<option value="4" class="form-control">Neuro-Preservadora Bilateral</option>-->
						</select>
					</div>
				</div>
				</div>
				<div class="form-group">
					<label for="iSangradoIntra" class="col-sm-2 control-label">Sangrado Estimado Intra-operatorio</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_27" name="campo_27">
							<!--<option value="" class="form-control">Seleccione</option>
							<?php
							for($x = 0;$x <= 5; $x++){
							?>
							<option value="<?php echo($x)?>" class="form-control"><?php echo($x)?> litros</option>
							<?php
							}
							?>
							<option value="6" class="form-control">Desconocido</option>--->
						</select>
					</div>
					<label for="iNumPaquetes" class="col-sm-2 control-label">Número de Paquetes Globulares Transfundidos</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_28" name="campo_28">
							<!--<option value="" class="form-control">Seleccione</option>
							<?php
							for($x = 0;$x <= 10; $x++){
							?>
							<option value="<?php echo($x)?>" class="form-control"><?php echo($x)?> unidades</option>
							<?php
							}
							?>
							<option value="11" class="form-control">Desconocido</option>-->
						</select>
					</div>
				</div>
				<div class="form-group">
					<div id="divComplicaciones">
						<label for="iComplicaciones" class="col-sm-2 control-label">Complicaciones Transoperatorias <span class="required-label">*</span></label>
						<div id="rg_campo_29">
						<!--	<input type="radio" onClick="cargaComplicaciones()" name="iComplicaciones" value="1">Si
						</div>
						<div class="col-sm-2">
							<input type="radio" onClick="cargaComplicaciones()" name="iComplicaciones" value="0" checked>No-->
						</div>
					</div>
				</div>
				<script>
					function cargaComplicaciones(){
						if($('input[name=iComplicaciones]:checked').val() == 1){
							$("#divEspec_Motivo").show()
						}else{
							$("#divEspec_Motivo").hide()
						}
					}
				</script>
				<div class="form-group" id="divEspec_Motivo" hidden>
					<label for="iEspecificar" class="col-sm-2 control-label">Especificar</label>
					<div class="col-sm-4">
						<input type="text" name="iEspecificar" class="form-control" maxlength="50" placeholder="Especificar">
					</div>
					<label for="sMotivo" class="col-sm-2 control-label">Motivo</label>
					<div class="col-sm-4">
						<input type="text" name="sMotivo" maxlength="100" class="form-control" placeholder="Motivo">
					</div>
				</div>
				<div class="form-group">
					<label for="iDiasEstancia" class="col-sm-2 control-label">Días de Estancia</label>
					<div class="col-sm-4">
						<!--<select class="form-control" id="iDiasEstancia">
							<option value="" class="form-control">Seleccione</option>
							<?php
							for($x = 0;$x <= 30; $x++){
							?>
							<option value="<?php echo($x)?>" class="form-control"><?php echo($x)?> dias</option>
							<?php
							}
							?>
							<option value="31" class="form-control">Desconocido</option>
						</select>-->
					</div>
					<label for="iDiasPermanenciaSonda" class="col-sm-2 control-label">Días de Permanencia de la Sonda</label>
					<div class="col-sm-4">
						<!--<select class="form-control" id="iDiasPermanenciaSonda">
							<option value="" class="form-control">Seleccione</option>
							<?php
							for($x = 0;$x <= 30; $x++){
							?>
							<option value="<?php echo($x)?>" class="form-control"><?php echo($x)?> dias</option>
							<?php
							}
							?>
							<option value="31" class="form-control">Desconocido</option>
						</select>-->
					</div>
				</div>
				<div class="form-group">

					<label for="sEtapaPatologica" class="col-sm-2 control-label">Etapa patológica</label>
					<div class="col-sm-4">
						<input type="text" name="sEtapaPatologica" maxlength="100" class="form-control" placeholder="Etapa patológica">
					</div>
					<label for="iGleason" class="col-sm-2 control-label">Gleason (Prostatectomía Radical)</label>
					<div class="col-sm-2">
						<input type="number" name="iGleason1" min="1" max="10" maxlength="2" class="form-control">
					</div>
					<div class="col-sm-2">
						<input type="number" name="iGleason2" min="1" max="10" maxlength="2" class="form-control">
					</div>
				</div>
				<hr>
				<div class="form-group">
					<label for="iModalidadDiagnostico" class="col-sm-4 control-label">Resultados Post-Cirugía</label>
				</div>
				<div class="form-group">
					<label for="iComplicacionesTardias" class="col-sm-2 control-label">Complicaciones Tardías</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_32" onChange="cargaEspComplicaciones()">
							<!--
							<option value="" class="form-control">Seleccione</option>
							<option value="1" class="form-control">Estenosis</option>
							<option value="2" class="form-control">Incontinencia</option>
							<option value="3" class="form-control">Linfocele</option>
							<option value="4" class="form-control">Ninguna</option>
							<option value="5" class="form-control">Otras</option>
							-->
						</select>
					</div>
					<div id="divEspecificarComplicacion">
						<label for="sEspecificarComplicacion" class="col-sm-2 control-label">Especificar otro</label>
						<div class="col-sm-4">
							<input type="text" name="sEspecificarComplicacion" class="form-control" placeholder="Especificar otro">
						</div>
					</div>
				</div>
				<script>
					function cargaEspComplicaciones(){
						if($('#iComplicacionesTardias').val() == 5){
							$("#divEspecificarComplicacion").show()
						}else{
							$("#divEspecificarComplicacion").hide()
						}
					}
				</script>
				<div class="form-group">
					<label for="iModalidadDiagnostico" class="col-sm-2 control-label">Continencia (a un año)</label>
					<div id="rg_campo_33">
					<!--	<input type="radio" name="iContinencia" value="1">Si
					</div>
					<div class="col-sm-1">
						<input type="radio" name="iContinencia" value="2">No

					</div>
					<div class="col-sm-2">
						<input type="radio" name="iContinencia" value="3">Desconocido
						-->
					</div>
					<label for="iPotencia" class="col-sm-2 control-label">Potencia (a un año)</label>
					<div id="rg_campo_34">
						<!--
						<input type="radio" name="iPotencia" value="1">Si
					</div>
					<div class="col-sm-1">
						<input type="radio" name="iPotencia" value="2">No
					</div>
					<div class="col-sm-2">
						<input type="radio" name="iPotencia" value="3">Desconocido
						-->
					</div>
				</div>
				<div class="form-group">
					<label for="sApenPost" class="col-sm-2 control-label">APE Post-Operatorio (Desde 6 semanas hasta 3 meses)</label>
					<div class="col-sm-4">
						<input type="text" name="sApenPost" class="form-control">Ng/ml
					</div>
					<label for="iApeDesconocido" class="col-sm-2 control-label">APE Desconocido</label>
					<div class="col-sm-4">
						<input type="checkbox" name="iApeDesconocido" value="1">Se refiere a que NO se tiene registrado el APE desde 6 semanas hasta 3 meses
					</div>
				</div>
				<div class="form-group">
					<label for="iModalidadDiagnostico" class="col-sm-2 control-label">Cuánto tiempo después (meses)</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_45" name="campo_45">
							<!--
							<option value="" class="form-control">Seleccione</option>
							<?php
							for($x = 1;$x <= 12; $x++){
							?>
							<option value="<?php echo($x)?>" class="form-control"><?php echo($x)?> meses</option>
							<?php
							}
							?>
							-->
						</select>
					</div>
					<label for="iRadioterapia" class="col-sm-2 control-label">Radioterapia Adyuvante</label>
					<div id="rg_campo_35">
						<!--
						<input type="radio" name="iRadioterapia" value="1">Si
					</div>
					<div class="col-sm-1">
						<input type="radio" name="iRadioterapia" value="2">No
					</div>
					<div class="col-sm-2">
						<input type="radio" name="iRadioterapia" value="3">Desconocido
						-->
					</div>
				</div>
				<div class="form-group">
					<label for="iPogresionPost" class="col-sm-2 control-label">Progresión Post-Radioterapia</label>
					<div id="rg_campo_36">
						<!--
						<input type="radio" name="iPogresionPost" value="1">Si
					</div>
					<div class="col-sm-1">
						<input type="radio" name="iPogresionPost" value="2">No
					</div>
					<div class="col-sm-2">
						<input type="radio" name="iPogresionPost" value="3">Desconocido
						-->
					</div>
					<label for="iTipologia" class="col-sm-2 control-label">Tipología</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_42" name="campo_42">
						<!--	<option value="" class="form-control">Seleccione</option>
							<option value="1" class="form-control">Por marcador (APE)</option>
							<option value="2" class="form-control">Por imagen</option>-->
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="iBloqueHormonal" class="col-sm-2 control-label">Bloqueo Hormonal</label>
					<div id="rg_campo_37">
						<!---
						<input type="radio" onClick="cargaCualBloqueo()" name="iBloqueHormonal" value="1">Si
					</div>
					<div class="col-sm-1">
						<input type="radio" onClick="cargaCualBloqueo()" name="iBloqueHormonal" value="2">No
					</div>
					<div class="col-sm-2">
						<input type="radio" onClick="cargaCualBloqueo()" name="iBloqueHormonal" value="3">Desconocido
						--->
					</div>
					<div id="divCualBloqueo" hidden>
						<label for="iCualBloqueo" class="col-sm-2 control-label">Cuál</label>
						<div class="col-sm-4">
							<select class="form-control" id="campo_43">
								<!--<option value="" class="form-control">Seleccione</option>
								<option value="1" class="form-control">Quirúrgico</option>
								<option value="2" class="form-control">Farmacológico</option>-->
							</select>
						</div>
					</div>
				</div>
				<script>
					function cargaCualBloqueo(){
						if($("input[name=iBloqueHormonal]:checked").val() == 1){
							$("#divCualBloqueo").show()
						}else{
							$("#divCualBloqueo").hide()
						}
					}
				</script>
				<div class="form-group">
					<label for="iAdyuvanteRescate" class="col-sm-2 control-label">Adyuvante o de rescate</label>
					<div class="col-sm-1">
						<input type="checkbox" name="iAdyuvanteRescate" value="1">
					</div>
					<label for="dFechaInicioAdyuvante" class="col-sm-offset-3 col-sm-2 control-label">Fecha de inicio <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dFechaInicioAdyuvante" id="dFechaInicioAdyuvante" placeholder="Fecha de Nacimiento" required>
					</div>
				</div>
				<div class="form-group">
					<label for="iRadioterapia" class="col-sm-2 control-label">Radioterapia</label>
					<div id="rg_campo_38">
						<!---
						<input type="radio" name="iRadioterapia" value="1">Si
					</div>
					<div class="col-sm-1">
						<input type="radio" name="iRadioterapia" value="2">No
					</div>
					<div class="col-sm-2">
						<input type="radio" name="iRadioterapia" value="3">Desconocido
						-->
					</div>
					<label for="iProgresionPost" class="col-sm-2 control-label">Progresión Post-Cirugía</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_39" name="campo_39">
							<!--
							<option value="" class="form-control">Seleccione</option>
							<option value="1" class="form-control">Si</option>
							<option value="1" class="form-control">NO</option>
							<option value="1" class="form-control">Por marcador (APE)</option>
							<option value="1" class="form-control">Por imagen</option>
							-->
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="iRecurrenciaBioquimica" class="col-sm-2 control-label">Recurrencia bioquímica</label>
					<div id="rg_campo_40">
						<!--
						<input type="radio" onClick="cargaCualRecurrencia()" name="iRecurrenciaBioquimica" value="1">Si
					</div>
					<div class="col-sm-1">
						<input type="radio" onClick="cargaCualRecurrencia()" name="iRecurrenciaBioquimica" value="2">No
					</div>
					<div class="col-sm-2">
						<input type="radio" onClick="cargaCualRecurrencia()" name="iRecurrenciaBioquimica" value="3">Desconocido
						-->
					</div>
					<div id="divCualRecurrencia">
						<label for="iModalidadDiagnostico" class="col-sm-2 control-label">Cuál</label>
						<div class="col-sm-4">
							<select class="form-control" id="campo_44" name="campo_44">
								<!--
								<option value="" class="form-control">Seleccione</option>
								<option value="1" class="form-control">Ningún tratamiento</option>
								<option value="1" class="form-control">RT</option>
								<option value="1" class="form-control">Bloqueo hormonal</option>
								<option value="1" class="form-control">Desconocido</option>
								-->
							</select>
						</div>
					</div>
				</div>
				<script>
					function cargaCualBloqueo(){
						if($("input[name=iRecurrenciaBioquimica]:checked").val() == 1){
							$("#divCualRecurrencia").show()
						}else{
							$("#divCualRecurrencia").hide()
						}
					}
				</script>
				<div class="form-group">
					<label for="sApeRecurrencia" class="col-sm-2 control-label">APE de recurrencia</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sApeRecurrencia" name="sApeRecurrencia">
					</div>
					<label for="dFechaRecurrencia" class="col-sm-2 control-label">Fecha recurrencia <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dFechaRecurrencia" id="dFechaRecurrencia" placeholder="Fecha de recurrencia" required>
					</div>
				</div>
				<div class="form-group">
					<label for="iRadioterapiaRescate" class="col-sm-2 control-label">Radioterapia de rescate</label>
					<div id="rg_campo_41" >
						<!--
						<input type="radio" name="iRadioterapiaRescate" value="1">Si
					</div>
					<div class="col-sm-1">
						<input type="radio" name="iRadioterapiaRescate" value="2">No
					</div>
					<div class="col-sm-2">
						<input type="radio" name="iRadioterapiaRescate" value="3">Desconocido
						-->
					</div>
					<label for="iModalidadDiagnostico" class="col-sm-2 control-label">Comentarios</label>
					<div class="col-sm-4">
						<textarea class="form-control" maxlength="100" name="Icomentarios" id="Icomentarios" placeholder="Comentarios"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="iNumeroConsultas" class="col-sm-2 control-label">Número total de consultas</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" id="iNumeroConsultas" name="iNumeroConsultas">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-9 col-sm-3">
						<!--<button type="button" class="btn btn-danger" id="regresarGeneral">Regresar</button>-->
						<button type="button" class="btn btn-primary" id="continuarGeneral" onclick="guardarCirugia()">Continuar</button>
					</div>
				</div>
			</form>
		</div>
		<!--termina seccion cirugia-->

		<!--Empieza seccion radioterapia-->
		<div id="tabs-5">
			<form class="form-horizontal" id="form_radioterapia">
				<div class="form-group">
					<label for="iRadBloqueoHormonal" class="col-sm-2 control-label">Bloqueo hormonal</label>
					<div id="rg_campo_46">
						<!--
						<input type="radio" onClick="cargaRadCualBloqueo()" name="iRadBloqueoHormonal" value="1" checked>Si
					</div>
					<div class="col-sm-1">
						<input type="radio" onClick="cargaRadCualBloqueo()" name="iRadBloqueoHormonal" value="2">No
					</div>
					<div class="col-sm-2">
						<input type="radio" onClick="cargaRadCualBloqueo()" name="iRadBloqueoHormonal" value="3">Desconocido
						-->
					</div>
					<label for="sDosis" class="col-sm-2 control-label">Dosis </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="sDosis" placeholderotepa="Dosis" maxlength="50" required/>
					</div>
				</div>
				<script>
					function cargaRadCualBloqueo(){
						if($("input[name=iRadBloqueoHormonal]:checked").val() == 1){
							$("#divRadCualBloqueo").show()
						}else{
							$("#divRadCualBloqueo").hide()
						}
					}
				</script>
				<div class="form-group">
					<label for="iDosisDesconocida" class="col-sm-2 control-label">Dosis desconocida</label>
					<div class="col-sm-1">
						<input type="checkbox" name="iDosisDesconocida">
					</div>
					<label for="dFechaDosis" class="col-sm-offset-3 col-sm-2 control-label">Fecha de inicio <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dFechaDosis" id="dFechaDosis" placeholder="Fecha de inicio" required>
					</div>
				</div>
				<div class="form-group">
					<label for="dFechaTerminoDosis" class="col-sm-2 control-label">Fecha de termino <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dFechaTerminoDosis" id="dFechaTerminoDosis" placeholder="Fecha de termino" required>
					</div>
					<div id="divRadCualBloqueo" hidden>
						<label for="iCualBloqueo" class="col-sm-2 control-label">Cual</label>
						<div id="rg_campo_47">
							<!--
							<label><input name="iCualBloqueo" type="checkbox" value="1">Medico</label>
							<label><input name="iCualBloqueo" type="checkbox" value="2">
							Quirurgico</label>
							<label><input name="iCualBloqueo" type="checkbox" value="3"> Monoterapia</label>
							<label><input name="iCualBloqueo" type="checkbox" value="4"> Bloqueo total</label>
							<label><input name="iCualBloqueo" type="checkbox" value="5"> Desconocido</label>
							-->
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group">
					<label class="col-sm-4 control-label">Resultados Post-Radioterapia</label>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">APE nadir Post-RT (considerando 6 meses, posterior al Tx)</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="iApeNadir">
					</div>
					<label for="iComplicacionesTardias" class="col-sm-2 control-label">Complicaciones tardías (dentro de 6 meses)</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_48" name="campo_48">
						<!--<select class="form-control" id="iComplicacionesTardias" onChange="cargEspeCompl()">
							<option value="" class="form-control">Seleccione</option>
							<option value="1" class="form-control">Hematuria</option>
							<option value="2" class="form-control">Incontinencia</option>
							<option value="3" class="form-control">Estenosis</option>
							<option value="4" class="form-control">Rectoragia</option>
							<option value="5" class="form-control">Desconocido</option>
							<option value="6" class="form-control">Otro</option>-->
						</select>
					</div>
				</div>
				<script>
					function cargEspeCompl(){
						if($("#iComplicacionesTardias") == 6){
					   		$("#divEspecificarComplicaciones").show()
				   		}else{
							$("#divEspecificarComplicaciones").hide()
						}
					}
				</script>
				<div class="form-group">
					<div class="divEspecificarComplicaciones" hidden>
						<label for="sEspecificarComplicaciones" class="col-sm-2 control-label">Especificar otro</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="sEspecificarComplicaciones" id="sEspecificarComplicaciones" placeholder="Especificar otro" >
						</div>
					</div>
					<label for="iRecurrenciaBioq" class="col-sm-2 control-label">Recurrencia bioquímica</label>
					<div id="rg_campo_49">
					<!--<div class="col-sm-1">
						<input type="radio" name="iRecurrenciaBioq" value="1">Si
					</div>
					<div class="col-sm-1">
						<input type="radio" name="iRecurrenciaBioq" value="2">No
					</div>
					<div class="col-sm-2">
						<input type="radio" name="iRecurrenciaBioq" value="3">Desconocido
						-->
					</div>
				</div>
				<div class="form-group">
					<label for="sApeRec" class="col-sm-2 control-label">APE de recurrencia</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="sApeRec">
					</div>
					<label for="dFechaRec" class="col-sm-2 control-label">Fecha de recurrencia <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dFechaRec" id="dFechaRec" placeholder="Fecha de recurrencia" required>
					</div>
				</div>
				<div class="form-group">
					<label for="iProgPostRadio" class="col-sm-2 control-label">Progresión Post-Radioterapia</label>
					<div id="rg_campo_50">
						<!--
						<input type="radio" name="iProgPostRadio" value="1">Si
					</div>
					<div class="col-sm-1">
						<input type="radio" name="iProgPostRadio" value="2">No
					</div>
					<div class="col-sm-2">
						<input type="radio" name="iProgPostRadio" value="3">Desconocido
						-->
					</div>
					<label for="dFechaInicioProg" class="col-sm-2 control-label">Fecha de inicio de progresión Post-Radioterapia <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dFechaInicioProg" id="dFechaInicioProg" placeholder="Fecha de inicio de progresión" required>
					</div>
				</div>
				<div class="form-group">
					<label for="iRadTipologia" class="col-sm-2 control-label">Tipología</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_51" name="campo_51">
							<!--<option value="" class="form-control">Seleccione</option>
							<option value="1" class="form-control">Por marcador (APE)</option>
							<option value="2" class="form-control">Por imagen</option>-->
						</select>
					</div>
					<label for="iNumeroConsultas" class="col-sm-2 control-label">Número total de consultas</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="iNumeroConsultas">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-9 col-sm-3">
						<button type="button" class="btn btn-danger" id="regresarGeneral">Regresar</button>
						<button type="button" class="btn btn-primary" id="continuarGeneral" onclick="guardarRadioterapia()">Continuar</button>
					</div>
				</div>
			</form>
		</div>
		<!--termina seccion radioterapia-->

		<!--Empieza seccion metastasis-->
		<div id="tabs-6">
			<form class="form-horizontal" id="form_metastasis">
				<div class="form-group">
					<label for="iOrquiectomia" class="col-sm-2 control-label">Orquiectomía</label>
					<div id="rg_campo_52">
					<!--<div class="col-sm-1">
						<input type="radio" onClick="cargaOrquiectomia()" name="iOrquiectomia" value="1">Si
					</div>
					<div class="col-sm-1">
						<input type="radio" onClick="cargaOrquiectomia()" name="iOrquiectomia" value="2">No
					</div>
					<div class="col-sm-2">
						<input type="radio" onClick="cargaOrquiectomia()" name="iOrquiectomia" value="3">Desconocido-->
					</div>
					<div id="divFechaOrquiectomia">
						<label for="dFechaOrquiectomia" class="col-sm-2 control-label">Fecha de Orquitectomía <span class="required-label">*</span></label>
						<div class="col-sm-4">
							<input type="date" class="form-control" name="dFechaOrquiectomia" id="dFechaOrquiectomia" placeholder="Fecha de Orquitectomía" >
						</div>
					</div>
				</div>
				<script>
					function cargaOrquiectomia(){
						if($("input[name=iOrquiectomia]:checked") == 1){
					   		$("#divFechaOrquiectomia").show()
				   		}else{
							$("#divFechaOrquiectomia").hide()
						}
					}
				</script>
				<div class="form-group">
					<label for="iAnalogoLHRH" class="col-sm-2 control-label">Análogo LHRH</label>
					<div id="rg_campo_53">
					<!--<div class="col-sm-1">

						<input type="radio" onClick="cargaCualLHRH()" name="iAnalogoLHRH" value="1">Si
					</div>
					<div class="col-sm-1">
						<input type="radio" onClick="cargaCualLHRH()" name="iAnalogoLHRH" value="2">No
					</div>
					<div class="col-sm-2">
						<input type="radio" onClick="cargaCualLHRH()" name="iAnalogoLHRH" value="3">Desconocido-->
					</div>
					<div id="sCualLHRH">
						<label for="sCualLHRH" class="col-sm-2 control-label">Cuál </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="sCualLHRH" id="sCualLHRH" placeholder="Cual" maxlength="50">
						</div>
					</div>
				</div>
				<script>
					function cargaCualLHRH(){
						if($("input[name=iAnalogoLHRH]:checked") == 1){
					   		$("#divFechaOrquiectomia").show()
							$("#divFechaInicioLHRH").show()
				   		}else{
							$("#divFechaOrquiectomia").hide()
							$("#divFechaInicioLHRH").hide()
						}
					}
				</script>
				<div class="form-group">
					<div class="divFechaInicioLHRH">
						<label for="dFechaInicioLHRH" class="col-sm-2 control-label">Fecha de inicio Análogo LHRH <span class="required-label">*</span></label>
						<div class="col-sm-4">
							<input type="date" class="form-control" name="dFechaInicioLHRH" id="dFechaInicioLHRH" placeholder="Fecha de inicio Análogo LHRH" required>
						</div>
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Antagonista LHRH</label>
					<div id="rg_campo_54">
					<!--<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>-->
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Fecha de inicio Antagonista LHRH <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dFechaInicioAntagonistaLHRH" id="dFechaInicioAntagonistaLHRH" placeholder="Fecha de inicio Análogo LHRH" required>
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Anti andrógeno</label>
					<div id="rg_campo_55">
					<!--<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>-->
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Cuál <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="sCualAntiandrogeno" id="sCualAntiandrogeno" placeholder="Cual" maxlength="50" required>
					</div>
					<label class="col-sm-2 control-label">Dosis <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="sDosisAntiandrogeno" id="sDosisAntiandrogeno" placeholder="Dosis" maxlength="50" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Fecha de inicio Anti andrógeno <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dFechaInicioAntiAndrogeno" id="dFechaInicioAntiAndrogeno" placeholder="Fecha de inicio Análogo LHRH" required>
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Bloque Hormonal Combinado (Se considera agonista LHRH más antiandrogénico o castración quirúrgica más antiandrogénico)</label>
					<div id="rg_campo_56">
					<!--<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>-->
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Cuál <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="sCualBloqueHormonal" id="sCualBloqueHormonal" placeholder="Cual" maxlength="50" required>
					</div>
					<label class="col-sm-2 control-label">APE nadir post-Bloqueo Hormonal <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="APENadirPostBloqueo" id="APENadirPostBloqueo" placeholder="APE" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Quimioterapia</label>
					<div id="rg_campo_57">
					<!--<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>-->
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Hospitalización por quimioterapia</label>
					<div id="rg_campo_58">
					<!--<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>-->
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Toxicidad por quimioterapia</label>
					<div id="rg_campo_59">
					<!--
					<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>-->
					</div>
					<label class=" col-sm-2 control-label">Número de consultas durante quimioterapia <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="sNumeroCcnsultas" id="sNumeroCcnsultas" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Desconocido</label>
					<div class="col-sm-2">
						<label><input type="checkbox" name="chkDesconocido" value="1">Desconocido</label>
					</div>
					<label for="inputEmail3" class="col-sm-offset-2 col-sm-2 control-label">Tratamiento salud ósea</label>
					<div id="rg_campo_60">
					<!--<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>-->
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-9 col-sm-3">
						<button type="button" class="btn btn-danger" id="regresarGeneral">Regresar</button>
						<button type="button" class="btn btn-primary" id="continuarGeneral" onclick="guardarMetastasis()">Continuar</button>
					</div>
				</div>
			</form>
		</div>
		<!--termina seccion metastasis-->

		<!--Empieza seccion progresion-->
		<div id="tabs-7">
			<form class="form-horizontal" id="form_progresion">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Resistencia a la Castración</label>
					<div id="rg_campo_61">
					<!--<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>-->
					</div>
					<label class="col-sm-2 control-label">Fecha de inicio de Resistencia a la Castración <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dFechaInicioResistencia" id="dFechaInicioResistencia" placeholder="Fecha de inicio de Resistencia a la Castración" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nivel de Testosterona</label>
					<div class="col-sm-4">
						<input type="number" name="nivel_testosterona"  id="nivel_testosterona" class="form-control">
					</div>
					<label class="col-sm-2 control-label">Nivel de APE <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="number" class="form-control" id="nivel_ape" name="nivel_ape">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Estudio de imagen</label>
					<div id="rg_campo_62">
					<!--
					<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>-->
					</div>
					<label class="col-sm-2 control-label">Cuál <span class="required-label">*</span></label>
					<div id="rg_campo_63">
					<!--<div class="col-sm-4">
						<label><input type="checkbox">TAC</label>
						<label><input type="checkbox">PET</label>
						<label><input type="checkbox">GGO</label>
						<label><input type="checkbox">RMI</label>
						<label><input type="checkbox">Otro</label>-->
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Especificar otro</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="sOtroEstudioImagen" id="sOtroEstudioImagen" maxlength="50">
					</div>
					<label class="col-sm-2 control-label">Tratamiento de segunda línea <span class="required-label">*</span></label>
					<div id="rg_campo_64">
					<!--<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>-->
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Cuál</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_65" name="campo_65">
							<!--<option value="" class="form-control">Seleccione</option>
							<option value="1" class="form-control">Retiro de anti-andrógeno</option>
							<option value="2" class="form-control">DES</option>
							<option value="3" class="form-control">Ketoconazol</option>
							<option value="1" class="form-control">Abiraterona</option>
							<option value="2" class="form-control">Enzalutamida</option>
							<option value="3" class="form-control">Otro</option>-->
						</select>
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Especificar otro</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="sOtroTratamientoSegunda" id="sOtroTratamientoSegunda" maxlength="50">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Quimioterapia <span class="required-label">*</span></label>
					<div id="rg_campo_66">
					<!--
					<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>-->
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Especificar otro</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sOtroQuimioterapia" name="sOtroQuimioterapia" maxlength="50">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Fecha de inicio Quimioterapia <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dFechaInicioQuimio" id="dFechaInicioQuimio" placeholder="Fecha de inicio Quimioterapia" required>
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Número de consultas</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="numeroConsultas">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-9 col-sm-3">
						<button type="button" class="btn btn-danger" id="regresarGeneral">Regresar</button>
						<button type="button" class="btn btn-primary" id="continuarGeneral" onclick="guardarProgresion()">Continuar</button>
					</div>
				</div>
			</form>
		</div>
		<!--termina seccion progresion-->

		<!--Inicia modulo de ningun tratamiento-->
		<div id="tabs-8">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-2 control-label">Nivel de APE <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="numer" class="form-control" name="dNacimiento" id="dNacimiento" placeholder="Nivel de APE" required>
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Mensaje</label>
					<div class="col-sm-4">
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-9 col-sm-3">
						<button type="button" class="btn btn-danger" id="regresarGeneral">Regresar</button>
						<button type="button" class="btn btn-primary" id="continuarGeneral">Continuar</button>
					</div>
				</div>
			</form>
		</div>
		<!--termina modulo de ningun tratamiento-->

		<!--Inicia modulo de estatus-->
		<div id="tabs-9">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-2 control-label">Fecha de la última consulta <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dNacimiento" id="dNacimiento" placeholder="Fecha de la última consulta" required>
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Estatus de última consulta</label>
					<div class="col-sm-4">
						<select class="form-control" id="iModalidadDiagnostico">
							<option value="" class="form-control">Seleccione</option>
							<option value="1" class="form-control">muerto con o sin actividad tumoral</option>
							<option value="2" class="form-control">vivo con actividad tumoral</option>
							<option value="3" class="form-control">vivo sin actividad tumoral</option>
							<option value="1" class="form-control">perdido con y sin act tum</option>-->
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Muerte por cáncer</label>
					<div id="rg_campo_62">
					<!--<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>-->
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Muerte por otra causa</label>
					<div id="rg_campo_63">
					<!--
					<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>-->
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Cual</label>
					<div class="col-sm-4">
						<input type="text" maxlength="100" class="form-control" name="sTipoMuerte" id="sTipoMuerte">
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Fecha de muerte por cáncer</label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dFechaMuerteCancer" id="dFechaMuerteCancer" placeholder="Fecha de muerte por cancer" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Observaciones</label>
					<div class="col-sm-4">
						<textarea class="form-control" placeholder="Observaciones" id="sObservaciones" name="sObservaciones"></textarea>
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Caso cerrado por fallecimiento o abandono de tratamiento</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Caso cerrado por" id="sCasoCerrado" name="sCasoCerrado">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Fecha de próxima visita</label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dFechaProximaVisita" id="dFechaProximaVisita" placeholder="Fecha de próxima visita" required>
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Sobrevida</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" id="Sobrevida" id="Sobrevida">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-9 col-sm-3">
						<button type="button" class="btn btn-danger" id="regresarGeneral">Regresar</button>
						<button type="button" class="btn btn-primary" id="continuarGeneral">Finalizar</button>
					</div>
				</div>
			</form>
		</div>
		<!--termina modulo de estatus-->
	</div>
	<!--jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
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
	<!--<script>
		setTimeout(function(){$("li").removeClass("ui-state-disabled"); },500);
	</script>-->
</body>
</html>