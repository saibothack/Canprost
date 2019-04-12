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
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>
	<!--<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script>
	  $( function() {
		$( "date" ).datepicker();
	  } );
  	</script>
</head>

<body>
<h1>Diagnóstico Desconocido</h1>


<!--Empieza formulario-->
<div id="tabs-4">
    <form class="form-horizontal" id="form_diagnostico5">
        <div class="form-group">
            <label for="iAPELibre" class="col-sm-3 control-label">Desconocido</label>
            <div class="col-sm-3">
                <div class="col-sm-2">
                    <input value="1 " type="radio" checked="true" name="sDesconocido" id="sDesconocido" />Si
                </div>
                <div class="col-sm-2">
                    <input value="0" type="radio" name="sDesconocido" id="sDesconocido" />No
                </div>
        </div>
       <!-- <div class="form-group">
            <div id="rg_campo_70" class="col-sm-6">
                <label for="rg_campo_70" class="col-sm-4 control-label">RHP Cáncer de Próstata</label>

            </div>
            <div id="OtroRHP" class="col-sm-6" hidden>
                <label for="sOtroRHP" class="col-sm-4 control-label">Especificar otro</label>
                <div class="col-sm-8">
                    <input type="text" name="sOtroRHP" maxlength="100" class="form-control" placeholder="Especificar Otro">
                </div>
            </div>
        </div>



        <div class="form-group">
            <label for="iGleason" class="col-sm-2 control-label">Gleason</label>
            <div class="col-sm-3">
                <input type="number" name="iGleason1" min="1" max="10" maxlength="2" class="form-control">
            </div>
            <div class="col-sm-3">
                <input type="number" name="iGleason2" min="1" max="10" maxlength="2" class="form-control">
            </div>
        </div>
        <hr style="border: solid 1px;" />
        <label  class="control-label" style="text-align: center" width="100%">APE al diagnóstico</label>
        <div class="form-group">
            <label for="iAPETotal" class="col-sm-2 control-label">Total</label>
            <div class="col-sm-2">

                <input type="number" name="iAPETotal" min="1" max="10" maxlength="2" class="form-control">
            </div>
            <label for="iAPELibre" class="col-sm-2 control-label">Libre</label>
            <div class="col-sm-2">

                <input type="number" name="iAPELibre" min="1" max="10" maxlength="2" class="form-control">
            </div>
            <label for="iAPELibre" class="col-sm-2 control-label">Desconocido</label>
            <div class="col-sm-2">
                <input type="checkbox" name="sDesconocido" id="sDesconocido" value="1" >
            </div>
        </div>
        <div class="form-group">
			<label for="iAPELibre" class="col-sm-2 control-label">Otros Marcadores</label>
			<div class="col-sm-2">
				<input type="checkbox" name="sOtrosMarcadores" id="sOtrosMarcadores" onchange="mostrarOcultarSeccion('OtrosMarcadores',this.checked);">
			</div>
            <div class="col-sm-6" id="OtrosMarcadores" hidden>
                <label for="campo_14" class="col-sm-2 control-label">Indique Otros Marcadores</label>
                <div class="col-sm-2">
                    <select class="form-control" id="campo_14" name="campo_14">

                    </select>
                </div>
                <div id="OtroMarcador"  hidden>
                    <label for="sOtroMarcador" class="col-sm-2 control-label">Especificar otro</label>
                    <div class="col-sm-2">
                        <input type="text" name="sOtroMarcador" maxlength="100" class="form-control" placeholder="Especificar Otro">
                    </div>
                </div>
            </div>

        </div>

        <div class="form-group">
            <div style="width: 50%;">
                <label for="iAPELibre" class="col-sm-3 control-label">Estudios de Imagen</label>
                <div class="col-sm-3">
                    <input type="checkbox" name="sEstudiosImagen" id="sEstudiosImagen" onchange="var xchecked=this.checked;window.setTimeout(function(){mostrarOcultarSeccion('EstudiosImagen',xchecked)},100);" value="1">
                </div>
            </div>


        </div>

        <div class="form-group" id="EstudiosImagen" hidden>
            <div class="form-group" id="TAC" >
                <label for="campo_71" class="col-sm-2 control-label">TAC</label>
                <div id="rg_campo_71" style="width: 35%;display: inline-block;">

                </div>

                <div id="OtroTac"  hidden>
                    <label for="iModalidadDiagnostico" class="col-sm-2 control-label">Seleccione TAC</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="campo_19" name="campo_19">

                        </select>
                    </div>
                    <div id="EspecificaTAC" hidden>
                        <label for="sOtroTac" class="col-sm-1 control-label">Especificar otro</label>
                        <div class="col-sm-2">
                            <input type="text" name="sOtroTac" maxlength="100" class="form-control" placeholder="Especificar Otro">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="RMI" >
                <label for="campo_72" class="col-sm-2 control-label">RMI</label>
                <div id="rg_campo_72" style="width: 35%;display: inline-block;">

                </div>

                <div id="OtroRMI"  hidden>
                    <label for="iModalidadDiagnostico" class="col-sm-2 control-label">Seleccione RMI</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="campo_20" name="campo_20">

                        </select>
                    </div>
                    <div id="EspecificaRMI" hidden>
                        <label for="sOtroRMI" class="col-sm-1 control-label">Especificar otro</label>
                        <div class="col-sm-2">
                            <input type="text" name="sOtroRMI" maxlength="100" class="form-control" placeholder="Especificar Otro">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="PET" >
                <label for="campo_73" class="col-sm-2 control-label">PET</label>
                <div id="rg_campo_73" style="width: 35%;display: inline-block;">

                </div>

                <div id="OtroPET"  hidden>
                    <label for="iModalidadDiagnostico" class="col-sm-2 control-label">Seleccione PET</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="campo_17" name="campo_17">

                        </select>
                    </div>
                    <div id="EspecificaPET" hidden>
                        <label for="sOtroPET" class="col-sm-1 control-label">Especificar otro</label>
                        <div class="col-sm-2">
                            <input type="text" name="sOtroPET" maxlength="100" class="form-control" placeholder="Especificar Otro">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group" id="GGO" >
                <label for="campo_74" class="col-sm-2 control-label">GGO</label>
                <div id="rg_campo_74" style="width: 35%;display: inline-block;">

                </div>

                <div id="OtroGGO" class="col-sm-offset-1 col-sm-11" hidden>
                    <label for="iModalidadDiagnostico" class="col-sm-2 control-label">Seleccione GGO</label>
                    <div class="col-sm-4">
                        <input type="text" name="sOtroGGO" maxlength="100" class="form-control" placeholder="Especificar Otro">
                    </div>

                    <label for="sOtroGGO" class="col-sm-2 control-label">Número de lesiones</label>
                    <div class="col-sm-4">
                        <input type="text" name="sNumeroLesiones" maxlength="100" class="form-control" placeholder="Especificar Otro">
                    </div>

                </div>
            </div>

            <div class="form-group" id=TR" >
                <label for="campo_75" class="col-sm-2 control-label">TR</label>
                <div id="rg_campo_75" style="width: 35%;display: inline-block;">

                </div>
            </div>


        </div>

        <div class="form-group" >
            <label for="iModalidadDiagnostico" class="col-sm-2 control-label">Etapificación Clínica T*</label>
            <div class="col-sm-4">
                <select class="form-control" id="campo_15" name="campo_15">

                </select>
            </div>


            <label for="iModalidadDiagnostico" class="col-sm-2 control-label">Etapificación Clínica N</label>
            <div class="col-sm-4">
                <select class="form-control" id="campo_16" name="campo_16">

                </select>
            </div>
        </div>
        <div class="form-group" >
            <label for="iModalidadDiagnostico" class="col-sm-2 control-label">Etapificación Clínica M</label>
            <div class="col-sm-4">
                <select class="form-control" id="campo_21" name="campo_21">

                </select>
            </div>

            <label for="iAPELibre" class="col-sm-3 control-label">Vigilancia Activa</label>
            <div class="col-sm-3">
                <input type="checkbox" name="sVigilanciaActiva" id="sVigilanciaActiva" value="1">
            </div>
        </div>

        <div class="form-group">
            <label for="iAPELibre" class="col-sm-3 control-label">Progresión post-vigilancia activa</label>
            <div class="col-sm-3">
                <input type="checkbox" name="sProgresionVigilancia" id="sProgresionVigilancia" value="1">
            </div>


            <label for="iAPELibre" class="col-sm-3 control-label">Tratamiento Diferido</label>
            <div class="col-sm-3">
                <input type="checkbox" name="sDiferido" id="sDiferido" value="1" >
            </div>
        </div>

        </div>--->
            <div class="form-group">
                <div class="col-sm-offset-9 col-sm-3">
                    <button type="button" class="btn btn-primary" id="continuarGeneral" onclick="guardarDiagnostico5()">Guardar</button>
                </div>

    </form>
</div>
<!--termina formulario-->

<!--boostrap-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<!--steps-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--alerts-->
<script src="../../resources/script/jquery.alerts.js"></script>
<!--steps-->
<script src="../../resources/script/app/registros.js" type="text/javascript"></script>
<script>
    function asignarValoresRegistros(){
        <?php
           if (  $_SESSION["idRegistro"]<>""){
            ?>
        cargaRegistroSeleccionado(<?php echo($_SESSION["idRegistro"]); ?>,"6");
        <?php
            }
        ?>
    }
</script>
<!--<script>
    setTimeout(function(){$("li").removeClass("ui-state-disabled"); },500);
</script>-->
</body>
</html>