(function() {
	"use strict";
	
	function loadInfo() {
		var grid = $("#grid-command-buttons").bootgrid({
			ajax: true,
			post: function ()
			{
				return {
					id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
				};
			},
			url: "../php/hospitales/consulta.php",
			formatters: {
				"commands": function(column, row)
				{
					return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " + 
						"<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash-o\"></span></button>";
				}
			}
		}).on("loaded.rs.jquery.bootgrid", function()
		{
			grid.find(".command-edit").on("click", function(e)
			{
				alert("You pressed edit on row: " + $(this).data("row-id"));
			}).end().find(".command-delete").on("click", function(e)
			{
				alert("You pressed delete on row: " + $(this).data("row-id"));
			});
		});
	}
	
	
	function inicializa() {
		$("#confirm-elimina").dialog();
		$("#confirm-edita").dialog();
		$("#dialog-error").dialog();
		$("#confirm-elimina").dialog("close");
		$("#confirm-edita").dialog("close");
		$("#dialog-error").dialog("close");
		
		loadInfo();
		
		parent.endLoading();

	}
	
	$(document).ready(inicializa);
})();