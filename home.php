<?php session_start(); 
if ($_SESSION['ID_USUARIO'] == "" and $_REQUEST["ind"] == "") {
	header('Location: index.html'); 
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Canprost</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="icon" type="image/x-icon" href="/resources/img/favicon.ico" />
	<!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<!--Eestilos-->
	<link href="resources/css/menu.css" rel="stylesheet"> 
	<link href="resources/css/fontawesome.css" rel="stylesheet"> 
	<link href="resources/css/styles.css" rel="stylesheet"> 
</head>
<body>
	<aside class="container">
		<div class="row hCont">
			<div id="wrapper">
			<!-- Sidebar -->
				<div id="sidebar-wrapper">
					<ul class="sidebar-nav" style="margin-left:0;">
						<li style="background-color: white; width: 250px;">
							<img src="resources/img/logo-incan.png" alt="logo">
						</li>
						<?php
						if ($_SESSION['ID_USUARIO'] > "") {
						?>
						<li class="sidebar-brand">
							<a href="#menu-toggle"  id="menu-toggle" style="margin-top:20px;float:right;" > 
								<i class="fa fa-bars " style="font-size:20px !Important;" aria-hidden="true"></i> 
							</a>
						</li>
						<li>
							<span style="margin-left:10px; text-align: center; color: white; font-size: 14px;">
								Bienvenido  <br> 
								&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp; <?php echo $_SESSION['NOMBRE'] ?>
							</span> 
						</li>
						<li>
							<a href="#">
								<i class="glyphicon glyphicon-home" aria-hidden="true"></i> 
								<span style="margin-left:10px;">Inicio</span>  
							</a>
						</li>
						<li>
							<a href="#" data-toggle="collapse" data-target="#lregistros">
								<i class="glyphicon glyphicon-list" aria-hidden="true"></i> 
								<span style="margin-left:10px;">Registros <b class="caret"></b></span>  
							</a>
						</li>
						<ul class="sub-menu collapse" id="lregistros">
							<li>
								<a href="#" id="NuevoRegistro">
									<i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
									<span style="margin-left:10px;">Nuevo</span>   
								</a>
							</li>
							<li>
								<a href="#" id="catRegistros">
									<i class="glyphicon glyphicon-list" aria-hidden="true"></i>
									<span style="margin-left:10px;">Registros</span>
								</a>
							</li>
							<!--<li>
								<a href="#">
									<i class="glyphicon glyphicon-cloud-download" aria-hidden="true"></i>
									<span style="margin-left:10px;">Excel</span>   
								</a>
							</li>-->
						</ul>
						<?php if ($_SESSION["TIPO"] == 1) { ?>
						<li>
							<a href="#" data-toggle="collapse" data-target="#lHospitales">
								<i class="glyphicon glyphicon-header" aria-hidden="true"></i> 
								<span style="margin-left:10px;">Hospitales <b class="caret"></b></span>  
							</a>
						</li>
						<ul class="sub-menu collapse" id="lHospitales">
							<li>
								<a href="#" id="aAgregarHospital">
									<i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
									<span style="margin-left:10px;">Nuevo</span>   
								</a>
							</li>
							<li>
								<a href="#" id="aRegistrosHospital">
									<i class="glyphicon glyphicon-list" aria-hidden="true"></i>
									<span style="margin-left:10px;">Registros</span>
								</a>
							</li>
							<!--<li>
								<a href="#">
									<i class="glyphicon glyphicon-cloud-download" aria-hidden="true"></i>
									<span style="margin-left:10px;">Excel</span>   
								</a>
							</li>-->
						</ul>
						<li>
							<a href="#" data-toggle="collapse" data-target="#lUsuarios">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i> 
								<span style="margin-left:10px;">Usuarios <b class="caret"></b></span>  
							</a>
						</li>
						<ul class="sub-menu collapse" id="lUsuarios">
							<li>
								<a href="#" id="aAgregarUsuario">
									<i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
									<span style="margin-left:10px;">Nuevo</span>   
								</a>
							</li>
							<li>
								<a href="#" id="userAutorizados">
									<i class="glyphicon glyphicon-ok" aria-hidden="true"></i>
									<span style="margin-left:10px;">Autorizados</span>
								</a>
							</li>
							<li>
								<a href="#" id="userNoAutorizados">
									<i class="glyphicon glyphicon-remove" aria-hidden="true"></i>
									<span style="margin-left:10px;">No autorizados</span>
								</a>
							</li>
							<!--<li>
								<a href="#">
									<i class="glyphicon glyphicon-cloud-download" aria-hidden="true"></i>
									<span style="margin-left:10px;">Excel</span>   
								</a>
							</li>-->
						</ul>
						<?php } ?>
						<li>
							<a href="#" data-toggle="collapse" data-target="#lPerfil">
								<i class="glyphicon glyphicon-cog" aria-hidden="true"></i> 
								<span style="margin-left:10px;">Perfil <b class="caret"></b></span>  
							</a>
						</li>
						<ul class="sub-menu collapse" id="lPerfil">
							<li>
								<a href="#" id="aPerfil">
									<i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
									<span style="margin-left:10px;">Perfil</span>   
								</a>
							</li>
							<li>
								<a href="#">
									<i class="glyphicon glyphicon-comment" aria-hidden="true"></i>
									<span style="margin-left:10px;">Mensajes</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="glyphicon glyphicon-info-sign" aria-hidden="true"></i>
									<span style="margin-left:10px;">Soporte</span>   
								</a>
							</li>
						</ul>
						<li>
							<a  href="#" id="cerrarSesion">
								<i class="glyphicon glyphicon-off" aria-hidden="true"> </i> 
								<span style="margin-left:10px;">Cerrar</span>  
							</a>
						</li>
						<?php } else { ?>
						<li>
							<a href="#" data-toggle="collapse" data-target="#lPerfil">
								<i class="glyphicon glyphicon-cog" aria-hidden="true"></i> 
								<span style="margin-left:10px;">Iniciar sesión <b class="caret"></b></span>  
							</a>
						</li>
						<?php } ?>
					</ul>
				</div>
			<!-- /#sidebar-wrapper -->
				<div id="page-content-wrapper">
					<div class="container-fluid" id="divFluid">
						<div class="row hCont">
							<div class="col-lg-12 hCont">
								<div class="loading" id="dLoading">
									<img src="resources/img/loading.gif" alt="loading">
								</div>
								<iframe src="principal.html" id="ftmGlobal" style="padding-left: 20px;">
								</iframe>
							</div>
						</div>
					</div>
				</div>
			<!-- /#wrapper -->
			</div>
		</div>
	</aside>
	<!--jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
	<!--boostrap-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
	<!--boostrap-->
	<script src="resources/script/global.js" type="text/javascript"></script>
	<script src="resources/script/menu.js" type="text/javascript"></script>
	<script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
    </script>
    <?php if ($_SESSION['ID_USUARIO'] == "" and $_REQUEST["ind"] > "") { ?>
	<script>
		setTimeout(function(){$("#ftmGlobal").attr("src","/app/usuarios/agregar.php?ind=2");}, 100);
	</script>
	<?php }	?>
</body>
</html>
