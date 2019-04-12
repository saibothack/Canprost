function resize(e) {
	"use strict";
	
	var frm = document.getElementById("frmEdita");
	if(frm) {
		// here you can make the height, I delete it first, then I make it again
		//var he = frm.contentWindow.document.body.scrollHeight + 200; 
		var h = (frm.contentWindow.document.body.scrollHeight + 100) + "px";
		console.log(h);
		frm.height = "";
		frm.height = h;
		
		//$("#openModal").children().css("height", he + "px");
		
	}   
}

function autorizaUser(cuenta){
	//alert(cuenta);
	for(var x = 1; x <= cuenta; x++){
		if($("#chk_" + x).is(':checked')){
			//alert($("#chk_" + x).val());
			var params = {
				id: $("#chk_" + x).val()
			};

			$.ajax({
				type: "POST",
				url: "../php/usuarios/autorizaUsuario.php",
				data: params,
			});	
		}
	}
	setTimeout(function(){window.location.reload();},1000);
}
function reload() {
	"use strict";
	
	window.location.href ="consultar.php";
}

(function() {
	"use strict";
	
	function loadInfo() {
		var i = 0;
		var grid = $("#grid-command-buttons").bootgrid({
			ajax: true,
			url: "../php/usuarios/consultaNoAut.php",
			sorting:false,
			formatters: {
				"commands": function(column, row)
				{
					i = i + 1;
					return "<input type=\"checkbox\" id=\"chk_" + i + "\" name=\"chk_" + i + "\" value=\"" + row.id + "\" />";
				}
			}
		}).on("loaded.rs.jquery.bootgrid", function()
		{
			grid.find(".command-edit").on("click", function(e)
			{
				parent.setLoading();
				$("#frmEdita").attr("src","agregar.php?ediId="+$(this).data("row-id"));
				
			}).end().find(".command-delete").on("click", function(e)
			{
				var idReg = $(this).data("row-id");
				 $( "#dialog-confirm" ).dialog({
					  resizable: false,
					  height: "auto",
					  width: 400,
					  modal: true,
					  buttons: {
						"Continuar": function() {
						  $(this).dialog("close");
							eliminaRegistro(idReg);
						},
						"Cancelar": function() {
						  $(this).dialog("close");
						}
					  }
					});
			});
			$(".fa-search").addClass("glyphicon glyphicon-search");
			$(".fa-refresh").addClass("glyphicon glyphicon-refresh");
		});
		
	}
	
	function eliminaRegistro(id) {
		parent.setLoading();
		
		var params = {
			idRegistro: id
		};

		$.ajax({
			type: "POST",
			url: "../php/hospitales/elimina.php",
			data: params,
			success: function(data) {
				try {
					if(data.status) {
						window.alert("Su registro se elimino");	
						reload();
					} else {
						window.alert("Ocurrio un error");	
					}
				} catch(e) {
					window.alert(e.message);
				}
			}
		});	
	}
		
	function inicializa() {
		$("#dialog-confirm").dialog();
		$("#dialog-confirm").dialog("close");
		
		loadInfo();
		
		try {
			parent.endLoading();
		} catch(e) {
			parent.parent.endLoading();
		}
	}
	
	$(document).ready(inicializa);
})();