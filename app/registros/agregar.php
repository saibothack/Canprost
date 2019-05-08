<?php session_start(); 
if ($_SESSION['ID_USUARIO'] == "") {
	header('Location: ../../index.html'); 
}
include '../../config.php';
include '../php/opendb.php';
$_SESSION['rfc']="";
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
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>
    
</head>

<body>

<div id="dialog" hidden>
	<iframe id="myIframe" src="" width="900" height="600" style="overflow-y: hidden;" frameBorder="0"></iframe>
</div>
<h1>Nuevo Registro</h1>
	<div id="tabs" class="wtabs">
		<!--Menu de nuevo registro-->
		<ul>
			<li><a href="#tabs-1">Nuevo</a></li>
			<li><a href="#tabs-2">1 Datos Generales</a></li>
			<li><a href="#tabs-3">2 Diagnóstico</a></li>
			<li><a href="#tabs-4">3 Previo</a></li>
			<li><a href="#tabs-5">4 Metástasis</a></li>
			<li><a href="#tabs-6">5 Progresión</a></li>
			<li><a href="#tabs-7">6 Estatus</a></li>
		</ul>
		<!--Inicia seccion nuevo-->
		<div id="tabs-1">
			<h2>Un registro consta de 6 partes:</h2>
			<ul>
				<li>Datos Generales</li>
				<li>Diagnóstico</li>
				<li>Previo</li>
				<li>Metástasis</li>
				<li>Progresión</li>
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
					<div class="form-group" hidden>
						<label for="sRecurrente" class="col-sm-2 control-label">Pre-registrado</label>
						<div class="col-sm-2">
							<input value="1 " type="radio" name="sRecurrente" id="sRecurrente" />Si
						</div>
						<div class="col-sm-2">
							<input value="0" type="radio" name="sRecurrente" id="sRecurrente" />No
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
			<form id="form_dgenerales" class="form-horizontal" >
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Hospital</label>
					<div class="col-sm-4">
					
						<label  class="form-control"><?php print($_SESSION["HOSPITAL"]) ?></label>
					</div>
					<label class="col-sm-2 control-label">Proveniencia <span class="required-label">*</span></label>
					<div id="rg_campo_1" class="col-sm-4">
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
							<input type="text" class="form-control" id="sNumeroRegistro" name="sNumeroRegistro" placeholder="Número de registro" required><br>
							<label>Anote el consecutivo de su registro</label>
						</div>
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
						<input type="date" class="form-control" id="dNacimientoD" name="dNacimientoD" placeholder="Fecha de nacimiento">
					</div>
				</div>
				<hr style="border: solid 1px;">
				<div class="form-group">
					<label for="campo_2" class="col-sm-2 control-label">Escolaridad </label>
					<div class="col-sm-4">
							<select class="form-control" id="campo_2" name="campo_2">
							</select>
					</div>
					<label for="campo_10" class="col-sm-2 control-label">Escolaridad en años</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_10" name="campo_10">
						</select>
					</div>
				</div>
				<hr style="border: solid 1px;">
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
				<div class="form-group" id="divTabaquismo" hidden>
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
				<hr style="border: solid 1px;">
				<div class="form-group ">
					<label class="col-sm-2 control-label">Historia Familiar de Cáncer</label>
					<div class="col-sm-1">
						<input type="radio" name="iFamiliaCancer" id="iFamiliaCancer1" onClick="cargaHistoria('0')" value="1" checked/>No<br />
					</div>
					<div class="col-sm-1">
						<input type="radio" name="iFamiliaCancer" id="iFamiliaCancer2" onClick="cargaHistoria('1')" value="2" />Si<br />
					</div>
					<div class="divHistoria" hidden>
						<label for="campo_4" class="col-sm-offset-2 col-sm-2 control-label">Tipo de cáncer</label>
						<div class="col-sm-4">
							<select class="form-control" id="campo_4" name="campo_4" >
							</select>
						</div>
					</div>
				</div>
				<div class="form-group divHistoria" hidden>
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
		<!--termina seccion datos generales-->

		<!--Empieza seccion diagnostico-->
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
					<div class="col-sm-4" id="rg_campo_12">
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
						<div id="btnDiagnostico" hidden><button type="button" class="btn btn-danger" id="regresarGeneral" onclick="verDiagnostico()">Ver Diagnostico</button></div>
						<!--<button type="button" class="btn btn-primary" onclick="muestraTNM()" >TNM pdf</button>-->
						<button type="button" class="btn btn-primary" id="continuarGeneral" onclick="guardarDiagnostico()" >Continuar</button>
					</div>
				</div>
			</form>
		</div>
		<!--termina seccion diagnostico-->

		<!--Empieza seccion cirugia-->
		<div id="tabs-4">
			<form class="form-horizontal" id="form_previo">
				<div class="form-group">
					<label for="iTipologia" class="col-sm-2 control-label">Tratamiento previo</label>
					<div class="col-sm-5">

                        <div id="rg_campo_77" class="col-sm-12">
                        </div>
					</div>
					<div id="divTratamientoPreventivoOtro" hidden>
						<label for="sOtroTratamientoPreventivo" class="col-sm-2 control-label">Especificar otro</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="sOtroTratamientoPreventivo" id="sOtroTratamientoPreventivo" maxlength="100">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-9 col-sm-3">
						<button type="button" class="btn btn-danger" id="regresarGeneral">Regresar</button>
						<button type="button" class="btn btn-primary" id="continuarGeneral" onclick="guardarPrevio()">Continuar</button>
					</div>
				</div>
			</form>
		</div>
		<!--termina seccion metastasis-->

		<!--Empieza seccion progresion-->
		<div id="tabs-6">
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
						<input type="date" class="form-control" name="dFechaInicioResistencia" id="dFechaInicioResistencia" placeholder="Fecha de inicio de Resistencia a la Castración" >
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nivel de Testosterona</label>
					<div class="col-sm-4">
						<input type="number" name="nivel_testosterona"  id="nivel_testosterona" class="form-control">
					</div>
					<label class="col-sm-2 control-label">Nivel de APE <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="number" class="form-control" id="nivel_ape" name="nivel_ape" required>
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
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Cuál <span class="required-label">*</span></label>
					<div id="chk_campo_63" class="col-sm-4">
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
				</div>
				<div class="form-group">
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
						<select class="form-control" id="campo_65" name="campo_65" onchange="especificarSegundaLinea()">
							<!--<option value="" class="form-control">Seleccione</option>
							<option value="1" class="form-control">Retiro de anti-andrógeno</option>
							<option value="2" class="form-control">DES</option>
							<option value="3" class="form-control">Ketoconazol</option>
							<option value="1" class="form-control">Abiraterona</option>
							<option value="2" class="form-control">Enzalutamida</option>
							<option value="3" class="form-control">Otro</option>-->
						</select>
					</div>
					<div id="divEspecificarSegundaLinea" style="display: none;" hidden="">
						<label for="inputEmail3" class="col-sm-2 control-label">Especificar otro</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="sOtroTratamientoSegunda" id="sOtroTratamientoSegunda" maxlength="50">
						</div>
					</div>
				</div>
				<script type="text/javascript" >
					function especificarSegundaLinea(){
						if($('#campo_65').val() == 6){
							$("#divEspecificarSegundaLinea").show()
						}else{
							$("#divEspecificarSegundaLinea").hide()
						}
					}
				</script>
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
					<div hidden>
					<label for="inputEmail3" class="col-sm-2 control-label">Especificar otro</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sOtroQuimioterapia" name="sOtroQuimioterapia" maxlength="50">
					</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Fecha de inicio Quimioterapia <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dFechaInicioQuimio" id="dFechaInicioQuimio" placeholder="Fecha de inicio Quimioterapia" >
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

		<!--Inicia modulo de estatus-->
		<div id="tabs-7">
			<form class="form-horizontal" id="form_estatus">
				<div class="form-group">
					<label class="col-sm-2 control-label">Fecha de la última consulta <span class="required-label">*</span></label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dultimaconsulta" id="dultimaconsulta" placeholder="Fecha de la última consulta" >
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Estatus de última consulta</label>
					<div class="col-sm-4">
						<select class="form-control" id="campo_67" name="campo_67">
							<!--
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
					<!--<div class="col-sm-1" >
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>
					</div>-->
					<div id="rg_campo_68">
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
					<label for="inputEmail3" class="col-sm-2 control-label">Muerte por otra causa</label>
					<!--<div class="col-sm-1">
						<label><input type="checkbox">Si</label>
					</div>
					<div class="col-sm-1">
						<label><input type="checkbox">No</label>
					</div>
					<div class="col-sm-2">
						<label><input type="checkbox">Desconocido</label>
					</div>-->
					<div id="rg_campo_69">
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
						<input type="text" name="cualmuerte" maxlength="100" class="form-control">
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Fecha de muerte por cáncer</label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dMuerte" id="dMuerte" placeholder="Fecha de la última consulta">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Observaciones</label>
					<div class="col-sm-4">
						<textarea class="form-control" name="observaciones" placeholder="Observaciones"></textarea>
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Caso cerrado por fallecimiento o abandono de tratamiento</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="cerradopor" placeholder="Caso cerrado por">
					</div>
				</div>
				<div class="form-group" hidden>
					<label for="inputEmail3" class="col-sm-2 control-label">Fecha de próxima visita</label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="dProximaVisita" id="dProximaVisita" placeholder="Fecha de próxima visita">
					</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Sobrevida</label>
					<div class="col-sm-4">
						<input type="number" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-9 col-sm-3">
						<button type="button" class="btn btn-danger" id="regresarGeneral">Regresar</button>
						<button type="button" class="btn btn-primary" id="continuarGeneral" onclick="guardarEstatus()">Finalizar</button>
					</div>
				</div>
			</form>
		</div>
		<!--termina modulo de estatus-->
	</div>
	
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
			//$("#tabs").tabs();

		});
		function asignarValoresRegistros(){
			<?php
			if (isset($_REQUEST["ediId"]) && $_REQUEST["ediId"]<>""){
				$_SESSION["idRegistro"] =$_REQUEST["ediId"];
 			?>
				$("#btnDiagnostico").show();
				cargaRegistroSeleccionado(<?php
				echo($_REQUEST["ediId"])
				?>);

				$("#tabs").tabs("disable",0);
				$("#tabs").tabs("enable",1);
				$("#tabs").tabs({active:1});
				$("#tabs").tabs("enable",2);
				$("#tabs").tabs("enable",3);
				$("#tabs").tabs("enable",4);
				$("#tabs").tabs("enable",5);
				$("#tabs").tabs("enable",6);
				$("#tabs").tabs("enable",7);

			<?php
				}
				
			?>
		}
	</script>

	<script>
		//setTimeout(function(){$("li").removeClass("ui-state-disabled"); },500);
	</script>
	<?php
	include '../php/closedb.php';
	?>
</body>
</html>