<?php session_start();
if ($_SESSION['ID_USUARIO'] == "") {
    header('Location: ../../index.html');
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Documento sin t�tulo</title>
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
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script>
	  $( function() {
		$( "date" ).datepicker();
	  } );
  	</script>
</head>

<body>
<h1>Diagnóstico por Biopsia</h1>
    <div id="tabs-4">
        <form class="form-horizontal" id="form_diagnostico1">
            <div class="form-group">
				<label for="dCirugia" class="col-sm-2 control-label">Fecha de Biopsia</label>
				<div class="col-sm-3">
					<input type="date"  class="form-control" name="dBiopsia" id="dBiopsia" placeholder="Fecha de Biopsia">
				</div>
            </div>
		   <div class="form-group">
               <div id="campoGleason">
                   <label for="iGleason" class="col-sm-2 control-label">Gleason</label>
                   <div class="col-sm-2">
                       <input type="text" onkeypress="return isNumberKey(event)" name="iGleason1" id="iGleason1" min="1" max="10" maxlength="2" onchange="iGleason1V()" onblur="iGleason1V()" class="form-control">
                   </div>
                   <div class="col-sm-2">
                       <input type="text" onkeypress="return isNumberKey(event)" name="iGleason2" id="iGleason2" min="1" max="10" maxlength="2" onchange="iGleason2V()" onblur="iGleason2V()" class="form-control">
                   </div>
                   <div class="col-sm-2">
                       <input type="text" name="iGleasonsuma" id="iGleasonsuma" readonly min="1" max="10" maxlength="2" class="form-control">
                   </div>
               </div>
               <script>
                var arrIsu = [["2","-4","1"], 
                ["3","4","2"],
                ["4","3","3"], 
                ["4","4","4"],
                ["3","5","4"],
                ["5","3","4"],
                ["9","10","5"]];


                function isuV(){
                    var dato = 0;
                    for(x=0;x< 7;x++){
                        if(arrIsu[x][0] == $('#iGleason1').val() && arrIsu[x][1] == $('#iGleason2').val()){
                            dato = arrIsu[x][2]
                            break;
                        }else{
                            dato = ""
                        }
                    }
                    $("#lblIsu").text("ISU " + dato)
                }
                function iGleason1V(){
                    if (!isNaN($('#iGleason1').val())){
                        $('#iGleasonsuma').val(parseFloat($('#iGleason1').val()) + (!isNaN($('#iGleason2').val()) ? parseFloat($('#iGleason2').val()) : 0.0));
                        isuV()
                    }
                }
                function iGleason2V(){
                    if (!isNaN($('#iGleason2').val())){
                        $('#iGleasonsuma').val(parseFloat($('#iGleason2').val()) + (!isNaN($('#iGleason1').val()) ? parseFloat($('#iGleason1').val()) : 0.0)); 
                        isuV()
                    }
                }
			   function isNumberKey(evt)
				  {
					 var charCode = (evt.which) ? evt.which : event.keyCode
					 if (charCode > 31 && (charCode < 48 || charCode > 57))
						return false;

					 return true;
				  }
			   </script>
               <div class="col-sm-2">
                   <input type="radio" name="iGleasonDesconocido" id="iGleasonDesconocido" value="1" onchange="$('#iGleason1').val('');$('#iGleason2').val('');$('#iGleasonsuma').val('');" />Desconocido
               </div>
               <div class="col-sm-2">
                   <label id="lblIsu"></label>
               </div>
			</div>
            <hr style="border: solid 1px;" />
            <label  class="control-label" style="text-align: center" width="100%">APE al diagnóstico</label>
            <div class="form-group">
                <label for="iAPETotal" class="col-sm-2 control-label">Total</label>
                <div class="col-sm-2">
                    <input type="number" name="iAPETotal" min="1" max="1000" maxlength="4" class="form-control">
                </div>
                <label for="iAPELibre" class="col-sm-2 control-label">Libre</label>
                <div class="col-sm-2">
                    <input type="number" name="iAPELibre" min="1" max="1000" maxlength="4" class="form-control">
                </div>
                <label for="iAPELibre" class="col-sm-2 control-label">Desconocido</label>
                <div class="col-sm-2">
                    <input type="checkbox" name="sDesconocido" id="sDesconocido" value="1" >
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="iAPELibre" class="col-sm-2 control-label">Estudios de Imagen</label>
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
			</div>
		   	<div class="form-group" >
                <div class="form-group" id="TR" >
                    <label for="campo_75" class="col-sm-2 control-label">TR</label>
                    <div id="rg_campo_75" style="width: 35%;display: inline-block;">
                    </div>
                </div>
			</div>
            <div class="form-group" >
                <label for="iModalidadDiagnostico" class="col-sm-2 control-label">Etapificación Clínica T</label>
                <div class="col-sm-4">
                    <select class="form-control" id="campo_15" name="campo_15">
                    </select>
                </div>
                <div class="col-sm-offset-4 col-sm-2">
                	<!--<button type="button" class="btn btn-primary" onclick="window.open('../../docs/TNM-2016.pdf')" >TNM pdf</button>-->
                    <button type="button" class="btn btn-primary" onclick="showTableM()" >TNM pdf</button>
                </div>
			</div>
			<div class="form-group" >
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
		   	</div>
            <div class="form-group">
                <div class="col-sm-offset-9 col-sm-3">
                    <button type="button" class="btn btn-primary" id="continuarGeneral" onclick="guardarDiagnostico1()">Guardar</button>
                </div>
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
	
<div id="dialog" title="TNM">
    <img src="../../images/tab_met.png" />
</div>
<script>

    $(function () {
        $("#dialog").dialog({
            autoOpen: false,
            modal: true,
            buttons: {
                "Aceptar": function () {
                    $(this).dialog("close");
                }/*,
                "Cerrar": function () {
                    $(this).dialog("close");
                }*/
            }
        });
    });

    function showTableM() {
        $("#dialog").dialog("option", "width", 800);
        $("#dialog").dialog("option", "height", 700);
        $("#dialog").dialog("option", "resizable", false);
        $("#dialog").dialog("open");
    }
</script>

<script>
    function asignarValoresRegistros(){
        <?php
        if (  $_SESSION["idRegistro"]<>""){
         ?>
        cargaRegistroSeleccionado(<?php echo($_SESSION["idRegistro"]); ?>,"1");
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