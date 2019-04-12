<?php session_start(); 
if ($_SESSION['ID_USUARIO'] == "" and $_REQUEST["ind"] == "") {
	header('Location: ../../index.html'); 
}
?>
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
	<h1>Usuarios sin autorizar</h1>
	<fieldset>
		<section id="command-buttons" style="width: 98%; margin: auto; padding:5px">
			<div class="col-md-offset-9 col-md-3" style="text-align:right;">
				<button class="btn btn-default" onClick="autorizaUser('<?php print($_SESSION["cuentaNoAut"]) ?>')"><span class="glyphicon glyphicon-check"></span> Autorizar</button>
			</div><br>
			<table id="grid-command-buttons" class="table table-condensed table-hover table-striped">
				<thead>
					<tr>
						<th data-column-id="id" data-type="numeric" data-visible="false">id</th>
						<th data-column-id="nombre">Nombre</th>
						<th data-column-id="email">email</th>
						<th data-column-id="sFechaRegistro">Fecha Registro</th>
						<th data-column-id="commands" data-formatter="commands" data-sortable="false">Acciones</th>
					</tr>
				</thead>
			</table>
		</section>        
	</fieldset>
	<!--jquery-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.fa.js"></script>
	<script src="../../resources/script/validator.js" type="text/javascript"></script>
	<!--boostrap-->
	<script src="../../resources/script/app/usuarios/consultaNoAut.js" type="text/javascript"></script>
</body>
</html>
