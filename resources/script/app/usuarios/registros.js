(function() {
	"use strict";
	
	function inicializa() {
		$("#dialog").dialog();
		$("#dialog-confirm").dialog();
		$("#dialogUS").dialog();
		$("#dialogUS").dialog("close");
		$("#dialog").dialog("close");
		$("#dialog-confirm").dialog("close");
		
		try {
			$("#btnRegistrar").click(function(){
				registrar();
			});
				
			parent.endLoading();	
		} catch(e) {
			
			$("#btnEdita").click(function(){	
				registrar();
			});
			
			parent.parent.endLoading();
		}
		
		if ($('#idValue').val() !== "") { 
			//consultaRegistros($('#idValue').val());
		}
		parent.endLoading();

	}
	
	function consultaRegistros(id) {
		parent.resize();
		parent.parent.setLoading();
		
		var params = {
			idRegistro: id
		};

		$.ajax({
			type: "POST",
			url: "../php/hospitales/consultaRegistro.php",
			data: params,
			success: function(data) {
				try {
					$('#sNombreHospital').val(decodeEntities(data[0].sHospital));
					$('input[name=rSector][value='+ data[0].iSector + ']').prop('checked', true);
					$('#iNivelHospitalario').val(data[0].iNivel);
					$('#sCalle').val(decodeEntities(data[0].sDireccion));
					$('#sColonia').val(decodeEntities(data[0].sColonia));
					$('#sCiudad').val(decodeEntities(data[0].sCiudad));
					$('#sEstado').val(decodeEntities(data[0].sEstado));
					$('#sCp').val(decodeEntities(data[0].sCp));
					$('#sTelefono').val(decodeEntities(data[0].sTelefono));
					$('input[name=rTipoTel][value=' + data[0].iTipoTel + ']').prop('checked', true);
					$('#sEmail').val(decodeEntities(data[0].sEmail));
					$('#sObservaciones').val(decodeEntities(data[0].sObservaciones));
				} catch(e) {
					window.alert(e.message);
				}
				
				parent.parent.endLoading();
			}
		});	
		
	}
	
	
	function clean() {
		$('#sApellidosUsuarios').val("");
		$('#sNombreUsuarios').val("");
		$('#iGenero').val([]);
		$('#sPass').val("");
		$('#sConfirmPass').val("");
		$('#sEmail').val("");
		$('#sTelefono').val("");
		$('#sPregunta').val([]);
		$('#sRespuesta').val("");
		$('#sHospital').val("");
		$('#sPuesto').val("");
	}
	
	function registrar(){
		var bFocus = false;
		var ind = 0;
		
		if (!$('#sApellidosUsuarios').val()) {
			$('#divApellidos').addClass('has-error');
			$('#divApellidos').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				ind = 1;
				$('#sApellidosUsuarios').focus();
			}
		} else {
			$('#divApellidos').removeClass('has-error');
			$('#divApellidos').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sNombreUsuarios').val()) {
			$('#divNombreUsuario').addClass('has-error');
			$('#divNombreUsuario').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				ind = 1;
				$('#sNombreUsuarios').focus();
			}
		} else {
			$('#divNombreUsuario').removeClass('has-error');
			$('#divNombreUsuario').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#iGenero').val()) {
			$('#divGenero').addClass('has-error');
			$('#divGenero').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				ind = 1;
				$('#iGenero').focus();
			}
		} else {
			$('#divGenero').removeClass('has-error');
			$('#divGenero').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sPass').val()) {
			$('#divPass').addClass('has-error');
			$('#divPass').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				ind = 1;
				$('#sPass').focus();
			}
		} else {
			$('#divPass').removeClass('has-error');
			$('#divPass').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sConfirmPass').val()) {
			$('#divConfirmPass').addClass('has-error');
			$('#divConfirmPass').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				ind = 1;
				$('#sConfirmPass').focus();
			}
		} else {
			if($('#sPass').val() == $('#sConfirmPass').val()){
				$('#divConfirmPass').removeClass('has-error');
				$('#divConfirmPass').addClass('has-success');
				bFocus = false;
			}else{
				$('#divPass').addClass('has-error');
				$('#divPass').removeClass('has-success');
				$('#divConfirmPass').removeClass('has-success');
				$('#divConfirmPass').addClass('has-error');
				if (!bFocus) {
					bFocus = true;
					ind = 1;
					$('#sConfirmPass').focus();
				}
			}
		}
	
		if (!$('#sEmail').val()) {
			$('#divEmail').addClass('has-error');
			$('#divEmail').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				ind = 1;
				$('#sEmail').focus();
			}
		} else {
			$('#divEmail').removeClass('has-error');
			$('#divEmail').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sTelefono').val()) {
			$('#divTelefono').addClass('has-error');
			$('#divTelefono').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				ind = 1;
				$('#sTelefono').focus();
			}
		} else {
			$('#divTelefono').removeClass('has-error');
			$('#divTelefono').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sPregunta').val()) {
			$('#divPregunta').addClass('has-error');
			$('#divPregunta').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				ind = 1;
				$('#sPregunta').focus();
			}
		} else {
			$('#divPregunta').removeClass('has-error');
			$('#divPregunta').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sRespuesta').val()) {
			$('#divRespuesta').addClass('has-error');
			$('#divRespuesta').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				ind = 1;
				$('#sRespuesta').focus();
			}
		} else {
			$('#divRespuesta').removeClass('has-error');
			$('#divRespuesta').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sHospital').val()) {
			$('#divHospital').addClass('has-error');
			$('#divHospital').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				ind = 1;
				$('#sHospital').focus();
			}
		} else {
			$('#divHospital').removeClass('has-error');
			$('#divHospital').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sPuesto').val()) {
			$('#divPuesto').addClass('has-error');
			$('#divPuesto').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				ind = 1;
				$('#sPuesto').focus();
			}
		} else {
			$('#divPuesto').removeClass('has-error');
			$('#divPuesto').addClass('has-success');
			bFocus = false;
		}
		
		if (ind == 0) {
			parent.setLoading();
			
			var params = {
				apellidosUsuario : $('#sApellidosUsuarios').val(),
				nombreUsuario : $('#sNombreUsuarios').val(),
				genero : $('#iGenero').val(),
				pass : $('#sPass').val(),
				email : $('#sEmail').val(),
				telefono : $('#sTelefono').val(),
				pregunta : $('#sPregunta').val(),
				respuesta : $('#sRespuesta').val(),
				hospital : $('#sHospital').val(),
				ind : $('#ind').val(),
				puesto : $('#sPuesto').val()
			};
			
			$.ajax({
				type: "POST",
				url: "../php/usuarios/registro.php",
				data: params,
				success: function(data) {
					console.log(data.status);
					if($('#ind').val() == 0){
						if (data.status) {
							$("#dialog-confirm").dialog({
								resizable: false,
								height: "auto",
								width: 400,
								modal: true,
								buttons: {
									"Nuevo": function() {
										$(this).dialog( "close" );
										clean();
										$('#frmH').validator();
									},
									"Continuar": function() {
										$(this).dialog( "close" );
										window.location.href ="consultarNoAuto.php";
									}
								}
							});
						} else {
							if(data == "1"){
								$("#dialogUS").dialog({
								resizable: false,
								height: "auto",
								width: 400,
								modal: true,
								buttons: {
									"Continuar": function() {
										$(this).dialog( "close" );
										window.location.href ="agregar.php";
									}
								}
							});
							}else{
								$("#dialog").dialog();
							}
						}
					}else{
						if($('#ind').val() == 2){
							window.parent.location ="../../index.html";
						}
					}
					parent.endLoading();
				}
			});	
		}
	}
	
	$(document).ready(inicializa);
})();