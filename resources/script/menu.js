
(function() {
	"use strict";
	
	$("#NuevoRegistro").click(function(){
		setLoading();
		$("#ftmGlobal").attr("src","app/registros/agregar.php");
	});

	$("#consultaRegistros").click(function(){
		setLoading();
		$("#ftmGlobal").attr("src","app/registros/consultar.php");
	});


	$("#aAgregarHospital").click(function(){
		setLoading();
		$("#ftmGlobal").attr("src","app/hospitales/agregar.php");
	});
	
	$("#aRegistrosHospital").click(function(){
		setLoading();
		$("#ftmGlobal").attr("src","app/hospitales/consultar.php");
	});
	
	$("#aAgregarUsuario").click(function(){
		setLoading();
		$("#ftmGlobal").attr("src","app/usuarios/agregar.php");
	});
	$("#aPerfil").click(function(){
		setLoading();
		$("#ftmGlobal").attr("src","app/usuarios/agregar.php?ind=1");
	});
	$("#userAutorizados").click(function(){
		setLoading();
		$("#ftmGlobal").attr("src","app/usuarios/consultarAut.php");
	});
	$("#userNoAutorizados").click(function(){
		setLoading();
		$("#ftmGlobal").attr("src","app/usuarios/consultarNoAuto.php");
	});
	$("#catRegistros").click(function(){
		setLoading();
		$("#ftmGlobal").attr("src","app/registros/consultarRegistros.php");
	});
	$("#cerrarSesion").click(function(){
		setLoading();
		window.location = "app/php/cerrar_sesion.php";
	});
})();