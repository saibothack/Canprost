<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Documento sin título</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Librerias -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" rel="stylesheet">
    <link href="../../resources/css/modalwindow.css" rel="stylesheet">
	<!--Eestilos-->
	<link href="../../resources/css/global.css" rel="stylesheet">
</head>
<body>
	<h1>Registros</h1>
	<button type="button" data-toggle="modal" data-target="#myModal" style="display: none;" id="openModal"></button>
	<button type="button" data-toggle="modal" data-target="#openModal2" style="display: none;" id="openModal1"></button>
	<input type="hidden" id="idEmail" />
	<fieldset>
		<section id="command-buttons" style="width: 98%; margin: auto; text-align: right">
		<?php if ($_SESSION["TIPO"] == 1) { ?>
			<form action="gen_excel.php" method="post" target="_blank" id="FormularioExportacion">
				<button formtarget="_blank" class="btn btn-default boton excel" onclick="genExcel()"><span class="glyphicon glyphicon-cloud-download"></span> Excel</button>
				<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
			</form>
		<?php } ?>
			<table id="grid-command-buttons" class="table table-condensed table-hover table-striped">
				<thead>
					<tr>
						<th data-column-id="id" data-type="numeric" data-visible="false">id</th>
						<th data-column-id="nombre">Nombre</th>
						<th data-column-id="sNombreHospital">Hospital</th>
						<th data-column-id="sFechaRegistro">Fecha Registro</th>
						<th data-column-id="commands" data-formatter="commands" data-sortable="false">Acciones</th>
					</tr>
				</thead>
			</table>
		</section>
           
		<div id="openModal2" class="modalDialog" >
			<div>
				<a href="#close" title="Close" class="close">X</a>
				<iframe id="frmEdita" style="width: 98%; height: 100%; border: 0px;">
					
				</iframe>
			</div>
		</div>
		<div id="dialog-confirm" title="Confirmación" style="width: 80%; height: 80%">
		  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>¿Esta seguro de eliminar el registro?</p>
		</div>
		
		
	 	<!-- Modal -->
	  	<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
		  		<!-- Modal content-->
			  	<div class="modal-content">
					<div class="modal-header">
				  		<button type="button" class="close" data-dismiss="modal">&times;</button>
				  			<h4 class="modal-title">Envio de correo</h4>
					</div>
					<div class="modal-body">
				  		<div class="row">
				  			<div class="col-md-offset-2 col-md-8">
				  				<input type="text" maxlength="50" id="subjectEmail" class="form-control" placeholder="Titulo de mensaje"/>
							</div>
						</div><br>
						<div class="row">
				  			<div class="col-md-offset-2 col-md-8">
				  				<textarea class="form-control" style="width:100%; height: 300px;" placeholder="Cuerpo del mensaje" id="cuerpoEmail" maxlength="512"></textarea>
							</div>
				  		</div>
				  		<div class="row">
				  			<div class="col-md-offset-10 col-md-2">
				  				<button class="btn btn-default" type="button" onClick="enviaCorreo()">Enviar</button>
							</div>
						</div>
					</div>
			  	</div>
			</div>
	  	</div>
	</fieldset>
	<!--jquery-->
	<script src="../../resources/script/jquery-3.2.1.js" type="application/javascript"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.fa.js"></script>
	<script src="../../resources/script/validator.js" type="text/javascript"></script>
	<!--boostrap-->
	<script src="../../resources/script/app/registros/consultaRegistro.js" type="text/javascript"></script>
</body>
</html>
