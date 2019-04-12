(function() {
	"use strict";
	
	function decodeEntities(str) {
		return $("<div/>").html(str).text();
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
		$('#sNombreHospital').val("");
		$('input[name=rSector]:checked').prop('checked', false);
		$('#iNivelHospitalario').val([]);
		$('#sCalle').val("");
		$('#sColonia').val("");
		$('#sCiudad').val("");
		$('#sEstado').val("");
		$('#sCp').val("");
		$('#sTelefono').val("");
		$('input[name=rTipoTel]:checked').prop('checked', false);
		$('#sEmail').val("");
		$('#sObservaciones').val("");
	}
	
	function registrar(){
		var bFocus = false;
		var ind = 0;
		if (!$('#sNombreHospital').val()) {
			$('#divNombreHospital').addClass('has-error');
			$('#divNombreHospital').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				var ind = 1;
				$('#sNombreHospital').focus();
			}
		} else {
			$('#divNombreHospital').removeClass('has-error');
			$('#divNombreHospital').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('input[name=rSector]:checked').val()){          
			$('#divSector').addClass('has-error');
			$('#divSector').removeClass('has-success');
			var ind = 1;
		} else {
			$('#divSector').removeClass('has-error');
			$('#divSector').addClass('has-success');
		}
		
		if (!$('#iNivelHospitalario').val()) {
			$('#divNivelHospitalario').addClass('has-error');
			$('#divNivelHospitalario').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				var ind = 1;
				$('#iNivelHospitalario').focus();
			}
		} else {
			$('#divNivelHospitalario').removeClass('has-error');
			$('#divNivelHospitalario').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sCalle').val()) {
			$('#divCalle').addClass('has-error');
			$('#divCalle').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				var ind = 1;
				$('#sCalle').focus();
			}
		} else {
			$('#divCalle').removeClass('has-error');
			$('#divCalle').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sColonia').val()) {
			$('#divColonia').addClass('has-error');
			$('#divColonia').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				var ind = 1;
				$('#sColonia').focus();
			}
		} else {
			$('#divColonia').removeClass('has-error');
			$('#divColonia').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sCiudad').val()) {
			$('#divCiudad').addClass('has-error');
			$('#divCiudad').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				var ind = 1;
				$('#sCiudad').focus();
			}
		} else {
			$('#divCiudad').removeClass('has-error');
			$('#divCiudad').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sEstado').val()) {
			$('#divEstado').addClass('has-error');
			$('#divEstado').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				var ind = 1;
				$('#sEstado').focus();
			}
		} else {
			$('#divEstado').removeClass('has-error');
			$('#divEstado').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sCp').val()) {
			$('#divCp').addClass('has-error');
			$('#divCp').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				var ind = 1;
				$('#sCp').focus();
			}
		} else {
			$('#divCp').removeClass('has-error');
			$('#divCp').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('#sTelefono').val()) {
			$('#divTelefono').addClass('has-error');
			$('#divTelefono').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				var ind = 1;
				$('#sTelefono').focus();
			}
		} else {
			$('#divTelefono').removeClass('has-error');
			$('#divTelefono').addClass('has-success');
			bFocus = false;
		}
		
		if (!$('input[name=rTipoTel]:checked').val()) {
			$('#divTipoTel').addClass('has-error');
			$('#divTipoTel').removeClass('has-success');
			var ind = 1;
		} else {
			$('#divTipoTel').removeClass('has-error');
			$('#divTipoTel').addClass('has-success');
		}
		
		if (ind == 0) {
			try {
				parent.setLoading();
			} catch(e) {
				parent.parent.setLoading();
			}
			
			var params = {
				iHospital : $('#idValue').val(),
				hospital : $('#sNombreHospital').val(),
				sector : $('input[name=rSector]:checked').val(),
				nivel : $('#iNivelHospitalario').val(),
				direccion : $('#sCalle').val(),
				colonia : $('#sColonia').val(),
				ciudad : $('#sCiudad').val(),
				estado : $('#sEstado').val(),
				cp : $('#sCp').val(),
				telefono : $('#sTelefono').val(),
				tipotel : $('input[name=rTipoTel]:checked').val(),
				email : $('#sEmail').val(),
				observaciones : $('#sObservaciones').val()
			};
			
			$.ajax({
				type: "POST",
				url: "../php/hospitales/registro.php",
				data: params,
				success: function(data) {
					if (data.status) {
						if ($('#idValue').val() === "") {
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
										window.location.href ="consultar.php";
									}
								}
							});	
						} else {
							parent.reload();
						}
					} else {
						$("#dialog").dialog();
					}
					
					try {
						parent.endLoading();
					} catch(e) {
						parent.parent.endLoading();
					}
				}
			});	
		}
	}
	
	function inicializa() {
		$("#dialog").dialog();
		$("#dialog-confirm").dialog();
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
			consultaRegistros($('#idValue').val());
		}

	}
	
	$(document).ready(inicializa);
})();