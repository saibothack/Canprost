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

function reload() {
	"use strict";
	
	window.location.href ="consultar.html";
}

(function() {
	"use strict";
	
	function loadInfo() {
		var grid = $("#grid-command-buttons").bootgrid({
			ajax: true,
			url: "../php/registros/consulta.php",
			sorting:false,
			formatters: {
				"commands": function(column, row)
				{
					return "<a class=\"btn btn-xs btn-default command-edit\" href=\"#openModal\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-pencil\"></span></a> " + 
						"<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
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
			url: "../php/registros/elimina.php",
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