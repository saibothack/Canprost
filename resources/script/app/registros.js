//Seccion para el manejo del catalogo de los registros
var oCat_Registro={};
oCat_Registro["CAT_PROVENIENCIA"]=1;
oCat_Registro["CAT_ESCOLARIDAD"]=2;
oCat_Registro["CAT_OCUPACION"]=3;
oCat_Registro["CAT_TIPO_DE_CANCER"]=4;
oCat_Registro["CAT_OTROS_TIPOS_DE_CANCER"]=5;
oCat_Registro["CAT_GRADO_DEL_FAMILIAR_CON_CANCER"]=6;
oCat_Registro["CAT_ANIO_DE_DIAGNOSTICO"]=7;
oCat_Registro["CAT_ANIOS_DE_TABAQUISMO"]=8;
oCat_Registro["CAT_CANTIDAD_CIGARROS_AL_DIA"]=9;
oCat_Registro["CAT_ESCOLARIDAD_EN_ANIOS"]=10;
oCat_Registro["MODALIDAD_DEL_DIAGNOSTICO"]=11;
oCat_Registro["SINTOMAS"]=12;
oCat_Registro["NUMERO_DE_CILINDROS_POR_BIOPSIA"]=13;
oCat_Registro["OTROS_MARCADORES"]=14;
oCat_Registro["ETAPIFICACION_CLINICA_T*"]=15;
oCat_Registro["ETAPIFICACION_CLINICA_N"]=16;
oCat_Registro["PET"]=17;
oCat_Registro["GGO"]=18;
oCat_Registro["TAC"]=19;
oCat_Registro["RMI"]=20;
oCat_Registro["ETAPIFICACION_CLINICA_M"]=21;
oCat_Registro["ABORDAJE"]=22;
oCat_Registro["OTRO"]=23;
oCat_Registro["ABIERTA"]=24;
oCat_Registro["LAPAROSCOPICA"]=25;
oCat_Registro["ROBOTICA"]=26;
oCat_Registro["SANGRADO_ESTIMADO_INTRA_OPERATORIO"]=27;
oCat_Registro["NUMERO_DE_PAQUETES_GLOBULARES_TRANSFUNDIDOS"]=28;
oCat_Registro["COMPLICACIONES_TRANSOPERATORIAS"]=29;
oCat_Registro["DIAS_DE_ESTANCIA"]=30;
oCat_Registro["DIAS_DE_PERMANENCIA_DE_LA_SONDA"]=31;
oCat_Registro["COMPLICACIONES_TARDIAS"]=32;
oCat_Registro["CONTINENCIA_A_UN_ANIO"]=33;
oCat_Registro["POTENCIA_A_UN_ANIO"]=34;
oCat_Registro["RADIOTERAPIA_ADYUVANTE"]=35;
oCat_Registro["PROGRESION_POST_RADIOTERAPIA"]=36;
oCat_Registro["BLOQUEO_HORMONAL"]=37;
oCat_Registro["RADIOTERAPIA"]=38;
oCat_Registro["PROGRESION_POST_CIRUGIA"]=39;
oCat_Registro["RECURRENCIA_BIOQUIMICA"]=40;
oCat_Registro["RADIOTERAPIA_DE_RESCATE"]=41;
oCat_Registro["TIPOLOGIA"]=42;
oCat_Registro["TIPO_BLOQUEO_HORMONAL"]=43;
oCat_Registro["TIPO_RECURRENCIA_BIOQUIMICA"]=44;
oCat_Registro["CUANTO_TIEMPO_DESPUES_MESES"]=45;
oCat_Registro["BLOQUEO_HORMONAL_1"]=46;
oCat_Registro["TIPO_BLOQUEO_HORMONAL_1"]=47;
oCat_Registro["COMPLICACIONES_TARDIAS_DENTRO_DE_6_MESES"]=48;
oCat_Registro["RECURRENCIA_BIOQUIMICA"]=49;
oCat_Registro["PROGRESION_POST_RADIOTERAPIA"]=50;
oCat_Registro["TIPOLOGIA"]=51;
oCat_Registro["ORQUIECTOMIA"]=52;
oCat_Registro["ANALOGO_LHRH"]=53;
oCat_Registro["ANTAGONISTA_LHRH"]=54;
oCat_Registro["ANTAGONISTA_LHRH"]=55;
oCat_Registro["BLOQUE_HORMONAL_COMBINADO"]=56;
oCat_Registro["QUIMIOTERAPIA"]=57;
oCat_Registro["HOSPITALIZACION_POR_QUIMIOTERAPIA"]=58;
oCat_Registro["TOXICIDAD_POR_QUIMIOTERAPIA"]=59;
oCat_Registro["TRATAMIENTO_SALUD_OSEA"]=60;
oCat_Registro["RESISTENCIA_A_LA_CASTRACION"]=61;
oCat_Registro["ESTUDIO_DE_IMAGEN"]=62;
oCat_Registro["TIPO_ESTUDIO_DE_IMAGEN"]=63;
oCat_Registro["TRATAMIENTO_DE_SEGUNDA_LINEA"]=64;
oCat_Registro["TIPO_TRATAMIENTO_DE_SEGUNDA_LINEA"]=65;
oCat_Registro["QUIMIOTERAPIA"]=66;
oCat_Registro["ESTATUS_DE_ULTIMA_CONSULTA"]=67;
oCat_Registro["MUERTE_POR_CANCER"]=68;
oCat_Registro["MUERTE_POR_OTRA_CAUSA"]=69;
oCat_Registro["RHP_CANCER_DE_PROSTATA"]=70;
oCat_Registro["REALIZADO_TAC"]=71;
oCat_Registro["REALIZADO_RMI"]=72;
oCat_Registro["REALIZADO_PET"]=73;
oCat_Registro["REALIZADO_GGO"]=74;
oCat_Registro["REALIZADO_TR"]=75;
oCat_Registro["PREVIO"]=77;

var sUrl="../../";
var global_catalog_data=null;

function cargaRegistroSeleccionado(idRegistro,dato){
	var pag =["json_registros","json_registros_biopsia","json_registros_ape","json_registros_rtup","json_registros_otro","json_registros_saturacion","json_registros_desc"]
	if(dato > ""){
		ind = dato
	}else{
		ind = "0"
	}
	$.ajax({
		type: "POST",
		url: sUrl + "app/php/registros/"+pag[ind]+".php",
		data: {id: idRegistro},
		success: function (xdatamain) {
			for(var ele in xdatamain){
				var element=xdatamain[ele];
				//alert(element["propiedad"].indexOf("campo_"));
				//alert(element["propiedad"]);
				try {
					if(element["propiedad"].indexOf("campo_") > -1){
						var w_ind = 0
						//es un catalogo dinamico
						var nombrecampo=element["propiedad"];
						var campox=$("input[name=" + nombrecampo + "]");
						var campo1 = ""
						var campo2 = ""
						campox.each(function(){
							
							campo=$(this);
							//console.log(campo);
							//console.log(element["VALOR"]+"=="+campo.val() + " = " + (element["VALOR"]==campo.val()));
							//if(nombrecampo == "campo_11"){
							//	alert(nombrecampo)
							//}
							//if(campo.attr("type")=="checkbox" && element["VALOR"]==campo.val()){
							if(campo.attr("type")=="checkbox"){
								w_ind = 1
								//campo1 =$("input[name="+ nombrecampo +"][value="+ element["VALOR"] +"]");
								campo.prop("checked",true);
								campo.trigger("change");
							}else if(campo.attr("type")=="radio"){
								w_ind = 1
								campo1 =$("input[name="+ nombrecampo +"][value="+ element["VALOR"] +"]");
								campo1.prop("checked",true);
								campo1.trigger("change");
							}else if(campo.attr("type")==null){
								w_ind = 1
								$(campo).val(element["VALOR"]);
							}else if (!(campo.attr("type")=="checkbox" || campo.attr("type")=="radio")){
								w_ind = 1
								campo.val(element["VALOR"]);
							}
							campo.trigger("change");
						});
						if(w_ind == 0){
							//alert(nombrecampo + " %% " + element["VALOR"])
							//setTimeout(function(){
								$("#"+ nombrecampo +" option[value="+ element["VALOR"] +"]").attr("selected", true);
								//$("#"+ nombrecampo).val(element["VALOR"]).change();
								//console.log("change select");
							//},100);
							//alert(campo.val())
							//$("#"+ nombrecampo).trigger("onchange");
							//$("#"+ nombrecampo).change(function(){validaSeleccion(campo)});
						}
					}else if(element["propiedad"].indexOf(".") > -1){
						//es un campo fijo
						var formulario=element["propiedad"].split(".")[0];
						var nombrecampo=element["propiedad"].split(".")[1];
						var campox=$("#" + formulario + " input[name=" + nombrecampo + "]");
						var campo1 = ""
						campox.each(function(){

							campo=$(this);
							//alert(formulario)
							//alert(nombrecampo)
							//alert(element["VALOR"])
							console.log(campo + "##");
							if(element["VALOR"] > ""){
								if(campo.attr("type")=="checkbox"){
									campo1 = ""
									campo1=$("#" + formulario + " input[name="+ nombrecampo +"][value="+ element["VALOR"] +"]");
									campo1.attr("checked",true);
									$(campo1).trigger("change");
									campo2 = $("#" + nombrecampo);
									campo2.attr("checked",true);
									$(campo2).trigger("change");
								}
								else if(campo.attr("type")=="radio"){
									campo1 = ""
									campo1=$("#" + formulario + " input[name="+ nombrecampo +"][value="+ element["VALOR"] +"]");
									//campo1.prop("checked",true);
									$(campo1).trigger("click");
								}
								else{
									if (element["VALOR"])
									campo.val(element["VALOR"].replace(" 00:00:00",""));
								}
								$(campo1).trigger("change");
							}
						});
					}
				}catch(ex){
					console.log("Error:" + ex)
				}
			}
			$("select").trigger("change");
			//$("select").css("font-size","30px");
		}
	});
}

function validaSeleccion(campo){
	/*
	* Metodo para validar relaciones entre campos para las selecciones
	* */
	console.log("validaSeleccion(campo) " + " Copyright Josu�");
	jQcampo=$(campo);
	//console.log(jQcampo+"###");
	validaMultiSelect(jQcampo);
}

function validaMultiSelect(campo){
	/*
	 * Metodo para validar relaciones entre campos para las selecciones
	 * */
	console.log("validaMultiSelect(campo) " + " Copyright Josu�");
	jQcampo=$(campo);
	id_campo=jQcampo.attr('name');
	console.log("validando registros para el campo " + id_campo);
	console.log(jQcampo);
	if (global_catalog_data){
		var idCatalogo = obtieneIdCatalogo(id_campo);
		console.log("id_catalogo_seleccionado" + idCatalogo);
		var matrizOpciones=global_catalog_data[id_campo];
		if (idCatalogo){
			switch(idCatalogo){
				case oCat_Registro["NUMERO_DE_CILINDROS_POR_BIOPSIA"]:
				{
					if (esOpcionSeleccionada(id_campo,"otro",matrizOpciones))
						mostrarOcultarSeccion("OtroCilindro",true);
					else
						mostrarOcultarSeccion("OtroCilindro",false);


				}
					break;
				case oCat_Registro["RHP_CANCER_DE_PROSTATA"]:
				{
					if (esOpcionSeleccionada(id_campo,"otro",matrizOpciones))
						mostrarOcultarSeccion("OtroRHP",true);
					else
						mostrarOcultarSeccion("OtroRHP",false);
				}
					break;
				case oCat_Registro["OTROS_MARCADORES"]:
				{
					if (esOpcionSeleccionada(id_campo,"otros",matrizOpciones))
						mostrarOcultarSeccion("OtroMarcador",true);
					else
						mostrarOcultarSeccion("OtroMarcador",false);
				}
					break;
				case oCat_Registro["REALIZADO_TAC"]:
				{
					console.log("entra tac")
				if (esOpcionSeleccionada(id_campo,"positivo",matrizOpciones))
					mostrarOcultarSeccion("OtroTac",true);
				else
					mostrarOcultarSeccion("OtroTac",false);
				}
				break;
				case oCat_Registro["TAC"]:
				{
					if (esOpcionSeleccionada(id_campo,"otros",matrizOpciones))
						mostrarOcultarSeccion("EspecificaTAC",true);
					else
						mostrarOcultarSeccion("EspecificaTAC",false);
				}
					break;
				case oCat_Registro["REALIZADO_RMI"]:
				{
					if (esOpcionSeleccionada(id_campo,"positivo",matrizOpciones))
						mostrarOcultarSeccion("OtroRMI",true);
					else
						mostrarOcultarSeccion("OtroRMI",false);
				}
					break;
				case oCat_Registro["RMI"]:
				{
					if (esOpcionSeleccionada(id_campo,"otros",matrizOpciones))
						mostrarOcultarSeccion("EspecificaRMI",true);
					else
						mostrarOcultarSeccion("EspecificaRMI",false);
				}
					break;
				case oCat_Registro["REALIZADO_PET"]:
				{
					if (esOpcionSeleccionada(id_campo,"positivo",matrizOpciones))
						mostrarOcultarSeccion("OtroPET",true);
					else
						mostrarOcultarSeccion("OtroPET",false);
				}
					break;
				case oCat_Registro["PET"]:
				{
					if (esOpcionSeleccionada(id_campo,"otros",matrizOpciones))
						mostrarOcultarSeccion("EspecificaPET",true);
					else
						mostrarOcultarSeccion("EspecificaPET",false);
				}
					break;
				case oCat_Registro["REALIZADO_GGO"]:
				{
					if (esOpcionSeleccionada(id_campo,"positivo",matrizOpciones))
						mostrarOcultarSeccion("OtroGGO",true);
					else
						mostrarOcultarSeccion("OtroGGO",false);
				}
					break;
                case oCat_Registro["ABORDAJE"]:
                {
                    if (esOpcionSeleccionada(id_campo,"Otro",matrizOpciones))
                        mostrarOcultarSeccion("EspecificaOtro",true);
                    else
                        mostrarOcultarSeccion("EspecificaOtro",false);
                }
                    break;
                case oCat_Registro["BLOQUEO_HORMONAL"]:
                {
                	console.log("Validar " + oCat_Registro["BLOQUEO_HORMONAL"]);
                    if (esOpcionSeleccionada(id_campo,"SI",matrizOpciones))
                        mostrarOcultarSeccion("divCualBloqueo",true);
                    else
                        mostrarOcultarSeccion("divCualBloqueo",false);
                }
                    break;
				case oCat_Registro["PREVIO"]:
				{
					console.log("Validar " + oCat_Registro["PREVIO"]);
					if (esOpcionSeleccionada(id_campo,"Otro",matrizOpciones))
						mostrarOcultarSeccion("divTratamientoPreventivoOtro",true);
					else
						mostrarOcultarSeccion("divTratamientoPreventivoOtro",false);
				}
					break;
			}
		}
	}
}

function mostrarOcultarSeccion(id_div,mostrar){
	if (mostrar){
		$("#"+id_div).show();
	}else{
		$("#"+id_div).hide();
		$("#"+id_div + " :input").each(
			function(){
				//console.log($(this).attr("type"));

				if($(this).attr("type")=="checkbox")
							$(this).attr("checked",false);
				else if($(this).attr("type")=="radio")
					$(this).prop("checked",false);
				else
					$(this).val("");

				$(this).trigger("change");

			}

		)
	}
}

function obtieneIdCatalogo(id_campo){
	var w_campo = id_campo.replace("campo_","");
	return parseInt(w_campo,10);
}

function esOpcionSeleccionada(id_campo,valorBuscado,matriz){
	//alert("1");
	/*
	* Metodo que regresa true o false dependiendo si se encuentra seleccionada la opcion para el juego de campos buscado
	* */
	//console.log("validando campo para opcion seleccionada " + valorBuscado);
	var esSeleccionado=false;
	$(":checked,:selected").each(function () {
		//alert("2");
		var id = $(this).attr("id");
		if (!id){
			//alert("z")
			id=$($(this).parent()).attr("id");
		}
		if (!id){
			//alert("y")
			id = $(this).attr("name");	
		}
		console.log("Validando "  + " id " + id + " id_campo " + id_campo + " " + (id==id_campo))
		if (id==id_campo){
			//alert("3");
				for (var i in matriz){
					//alert("4");
					
					element=matriz[i];
					console.log(element["ID_OPCION_CAMPO"] + "##" + $(this).val());
					console.log("Validando "  + " element[\"ID_OPCION_CAMPO\"] " + element["ID_OPCION_CAMPO"] + " valor " + $(this).attr("value") + " " + (element["ID_OPCION_CAMPO"] ==$(this).attr("value")));
					if (element["ID_OPCION_CAMPO"] ==$(this).val()){
						//alert("5");
						console.log("entro5");
					/*	console.log("valor en matriz ");
						console.log(element["ETIQUETA_OPCION_CAMPO"]);
						console.log("valor buscado ");
						console.log(valorBuscado);
						console.log("resultado= " + (valorBuscado.toLowerCase().trim()==element["ETIQUETA_OPCION_CAMPO"].toLowerCase().trim()));
						*/
						if (valorBuscado.toLowerCase().trim()==element["ETIQUETA_OPCION_CAMPO"].toLowerCase().trim()){
							console.log("entro6");
							esSeleccionado=true;
							//console.log("esta seleccionado " + esSeleccionado);
						}
					}
					if (esSeleccionado) break;
				}
			if (esSeleccionado) return;
		}
		//alert("Do something for: " + id + ", " + answer);
	});


/*
	$("#"+id_campo).each(function(){
		console.log("valor en campo " + this.value);
		for (var element in matriz){
			if (element["ID_OPCION_CAMPO"] == this.value){
				console.log("valor en matriz " + element["ETIQUETA_OPCION_CAMPO"]);
				console.log("valor buscado " + valorBuscado);
				if (valorBuscado.toLowerCase()==element["ETIQUETA_OPCION_CAMPO"].toLowerCase()){
					esSeleccionado=true;
					console.log("esta seleccionado " + esSeleccionado);
				}
			}
			if (esSeleccionado) break;
		}
		if (esSeleccionado) return;
	});*/
	return esSeleccionado;

}


function calculaRFC() {
	function quitaArticulos(palabra) {
		return palabra.replace("DEL ", "").replace("LAS ", "").replace("DE ",
				"").replace("LA ", "").replace("Y ", "").replace("A ", "");
	}
	function esVocal(letra) {
		if (letra == 'A' || letra == 'E' || letra == 'I' || letra == 'O'
				|| letra == 'U' || letra == 'a' || letra == 'e' || letra == 'i'
				|| letra == 'o' || letra == 'u')
			return true;
		else
			return false;
	}
	nombre = $("#sNombres").val().toUpperCase();
	apellidoPaterno = $("#sApellidoPaterno").val().toUpperCase();
	apellidoMaterno = $("#sApellidoMaterno").val().toUpperCase();
	fecha = $("#dNacimiento").val();

	var rfc = "";
	apellidoPaterno = quitaArticulos(apellidoPaterno);
	apellidoMaterno = quitaArticulos(apellidoMaterno);
	rfc += apellidoPaterno.substr(0, 1);
	var l = apellidoPaterno.length;
	var c;
	for (i = 0; i < l; i++) {
		c = apellidoPaterno.charAt(i);
		if (esVocal(c)) {
			rfc += c;
			break;
		}
	}
	rfc += apellidoMaterno.substr(0, 1);
	rfc += nombre.substr(0, 1);
	rfc += fecha.substr(2, 2);
	rfc += fecha.substr(5, 2);
	rfc += fecha.substr(8,10);
	// rfc += "-" + homclave;
	$("#sRFC").val(rfc);
}
/*
* Realiza el submit del formulario para enviar los primeros datos de registro
* */
function validaRfc(){
	var ind = 0;
	
	if (!$('#sApellidoPaterno').val()) {
		$('#divApellidoPaterno').addClass('has-error');
		$('#divApellidoPaterno').removeClass('has-success');
		if (!bFocus) {
			bFocus = true;
			ind = 1;
			$('#sApellidoPaterno').focus();
		}
	} else {
		$('#divApellidoPaterno').removeClass('has-error');
		$('#divApellidoPaterno').addClass('has-success');
		bFocus = false;
	}
	
	if (!$('#sApellidoMaterno').val()) {
		$('#divApellidoMaterno').addClass('has-error');
		$('#divApellidoMaterno').removeClass('has-success');
		if (!bFocus) {
			bFocus = true;
			ind = 1;
			$('#sApellidoMaterno').focus();
		}
	} else {
		$('#divApellidoMaterno').removeClass('has-error');
		$('#divApellidoMaterno').addClass('has-success');
		bFocus = false;
	}
	
	if (!$('#sNombres').val()) {
		$('#divNombreReg').addClass('has-error');
		$('#divNombreReg').removeClass('has-success');
		if (!bFocus) {
			bFocus = true;
			ind = 1;
			$('#sNombres').focus();
		}
	} else {
		$('#divNombreReg').removeClass('has-error');
		$('#divNombreReg').addClass('has-success');
		bFocus = false;
	}
	
	if (!$('#dNacimiento').val()) {
		$('#divFecNac').addClass('has-error');
		$('#divFecNac').removeClass('has-success');
		if (!bFocus) {
			bFocus = true;
			ind = 1;
			$('#dNacimiento').focus();
		}
	} else {
		$('#divFecNac').removeClass('has-error');
		$('#divFecNac').addClass('has-success');
		bFocus = false;
	}
	
	if(ind == 0){
	
		$.ajax({
			type: "POST",
			url: sUrl+"app/php/registros/validaRfc.php",
			data: $("#form_registro").serialize(),// {rfc:$("#sRFC").val()},
			success: function(data) {
				//alert(data);
				if(data > " "){
					$("#btnDiagnostico").show();
					//window.location = "agregar.php?#tabs-3";
					var tipoRecurrente = $('input[name=sRecurrente]:checked').val();
					//window.alert(tipoRecurrente);
					//if (tipoRecurrente==1){
						jAlert("Paciente pre-registrado. Está autorizado entrar", "Recurrencia", function(){
                            cargaRegistroSeleccionado(data);

                            $("#tabs").tabs("enable",1);
                            $("#tabs").tabs("enable",2);
                            $("#tabs").tabs("enable",3);
							$("#tabs").tabs("enable",10);
                            //$("#tabs").tabs("enable",4);
                            //$("#tabs").tabs("enable",5);
                            $("#tabs").tabs("enable",6);
                            $("#tabs").tabs("enable",7);
                            $("#tabs").tabs("enable",8);
                            $("#tabs").tabs({ active:  1});
							
							var sApP = $("#sApellidoPaterno").val();
							var sApM = $("#sApellidoMaterno").val();
							var sNom = $("#sNombres").val();
							var sNac = $("#dNacimiento").val();

							$("#sApellidoPaternoD").val(sApP);
							$("#sApellidoMaternoD").val(sApM);
							$("#sNombresD").val(sNom);
							$("#dNacimientoD").val(sNac);
							
						});
					///}else{
						//jAlert("Favor de anotar los datos nuevos", "Recurrencia", function(){
                          //  $('#form_registro').trigger("reset");
						//});
					//}
					/*
					jConfirm('El RFC Capturado ya existe, desea identificar al paciente como recurrente?', 'Confirmar', function(r) {
						if (r){

							//el rfc ya existe, se requiere cargar la interfaz con toda la informaci�n
							cargaRegistroSeleccionado(data);

							$("#tabs").tabs("enable",1);
							$("#tabs").tabs("enable",2);
							$("#tabs").tabs("enable",3);
							$("#tabs").tabs("enable",4);
							$("#tabs").tabs("enable",5);
							$("#tabs").tabs("enable",6);
							$("#tabs").tabs("enable",7);
							$("#tabs").tabs("enable",8);

						}else{
							$('#form_registro').trigger("reset");
						}

					});*/
				}else{

					var sApP = $("#sApellidoPaterno").val();
					var sApM = $("#sApellidoMaterno").val();
					var sNom = $("#sNombres").val();
					var sNac = $("#dNacimiento").val();

					$("#tabs").tabs("enable",1);
					$("#tabs").tabs({ active:  1});

					$("#sApellidoPaternoD").val(sApP);
					$("#sApellidoMaternoD").val(sApM);
					$("#sNombresD").val(sNom);
					$("#dNacimientoD").val(sNac);
				}
			}
		});
	}
}

function guardarDatosGenerales(){
 	$('#form_dgenerales').validate();
	if($('#form_dgenerales').valid()){
		$.ajax({
			type: "POST",
			url: sUrl+"app/php/registros/datos_generales.php",
			data: $("#form_dgenerales").serialize(),// {rfc:$("#sRFC").val()},
			success: function(data) {
				$("#tabs").tabs("enable",2);
				$("#tabs").tabs({ active:  2});
			}
		});
	}
}

function guardarDiagnostico(){
	$('#form_diagnostico').validate();
	if($('#form_diagnostico').valid()){
	$.ajax({
		type: "POST",
		url: sUrl+"app/php/registros/diagnosticos.php",
		data: $("#form_diagnostico").serialize(),// {rfc:$("#sRFC").val()},
		success: function(data) {
			var pagina="";
			/*
			1	Biopsia
			2	cl�nico APE y/o TR
			3	RTUP/ Adenomectom�a
			4	Biopsia en otro sitio
			5	Biopsia de saturaci�n
			6	Desconocido*/
			var seleccion=$("#campo_11").val();
			if (seleccion == 1)
					pagina="diagnostico-biopsia.php";
			if (seleccion == 2)
				pagina="diagnostico_clinico_ape.php";
			if (seleccion == 3)
				pagina="diagnostico_rtup.php";
			if (seleccion == 4)
				pagina="diagnostico_biopsia_otro_sitio.php";
			if (seleccion == 5)
				pagina="diagnostico_biopsia_saturacion.php";
			if (seleccion == 6)
				pagina="diagnostico_desconocido.php";

			$("#dialog").dialog({
				autoOpen: true,
				modal: true,
				height: 640,
				width: 940,
				open: function(ev, ui){
					//$('#myIframe').attr('src','diagnostico-biopsia.php');
					$('#myIframe').attr('src',pagina);
				}
			});

			/*
			$("#tabs").tabs("enable",3);
			$("#tabs").tabs("enable",4);
			$("#tabs").tabs("enable",5);
			$("#tabs").tabs("enable",6);
			$("#tabs").tabs("enable",7);
			$("#tabs").tabs("enable",8);
			*/

		}
	});
	}
}

function muestraTNM(){
	$("#dialog").dialog({
		autoOpen: true,
		modal: true,
		height: 640,
		width: 940,
		open: function(ev, ui){
			//$('#myIframe').attr('src','diagnostico-biopsia.php');
			$('#myIframe').attr('src','../../docs/TNM-2016.pdf');
		}
	});
}

function guardarPrevio(){
	$('#form_previo').validate();
	if($('#form_previo').valid()){
		$.ajax({
			type: "POST",
			url: sUrl+"app/php/registros/datos_previos.php",
			data: $("#form_previo").serialize(),
			success: function(data) {
				$("#tabs").tabs("enable",6);
				$("#tabs").tabs({ active:  6});
			}
		});
	}
}

function guardarCirugia(){
	$('#form_cirugia').validate();
	if($('#form_cirugia').valid()){
	$.ajax({
		type: "POST",
		url: sUrl+"app/php/registros/cirugia.php",
		data: $("#form_cirugia").serialize(),// {rfc:$("#sRFC").val()},
		success: function(data) {
			$("#tabs").tabs("enable",9);
			$("#tabs").tabs({ active:  9});
		}
	});
	}
}

function guardarRadioterapia(){
	$('#form_radioterapia').validate();
	if($('#form_radioterapia').valid()){
	$.ajax({
		type: "POST",
		url: sUrl+"app/php/registros/radioterapia.php",
		data: $("#form_radioterapia").serialize(),// {rfc:$("#sRFC").val()},
		success: function(data) {
			$("#tabs").tabs("enable",9);
			$("#tabs").tabs({ active:  9});
		}
	});
	}
}

function guardarMetastasis(){
	$('#form_metastasis').validate();
	if($('#form_metastasis').valid()){
	$.ajax({
		type: "POST",
		url: sUrl+"app/php/registros/metastasis.php",
		data: $("#form_metastasis").serialize(),// {rfc:$("#sRFC").val()},
		success: function(data) {
			$("#tabs").tabs("enable",9);
			$("#tabs").tabs({ active:  9});
		}
	});
	}
}

function guardarProgresion(){
	$('#form_progresion').validate();
	if($('#form_progresion').valid()){
	$.ajax({
		type: "POST",
		url: sUrl+"app/php/registros/progresion.php",
		data: $("#form_progresion").serialize(),// {rfc:$("#sRFC").val()},
		success: function(data) {
			$("#tabs").tabs("enable",9);
			$("#tabs").tabs({ active:  9});
		}
	});
	}
}

function guardarSinTratamiento(){
	$('#form_sintratamiento').validate();
	if($('#form_sintratamiento').valid()){
	$.ajax({
		type: "POST",
		url: sUrl+"app/php/registros/sin_tratamiento.php",
		data: $("#form_sintratamiento").serialize(),// {rfc:$("#sRFC").val()},
		success: function(data) {
			$("#tabs").tabs("enable",9);
			$("#tabs").tabs({ active:  9});
		}
	});
	}
}

function guardarEstatus(){
	$('#form_estatus').validate();
	if($('#form_estatus').valid()){
	$.ajax({
		type: "POST",
		url: sUrl+"app/php/registros/estatus.php",
		data: $("#form_estatus").serialize(),// {rfc:$("#sRFC").val()},
		success: function(data) {
			//$("#tabs").tabs("enable",8);
			//$("#tabs").tabs({ active:  8});
			window.location = "agregar.php"
		}
	});
	}
}

function guardarDiagnostico1(){
	$('#form_diagnostico1').validate();
	if($('#form_diagnostico1').valid()){
	$.ajax({
		type: "POST",
		url: sUrl+"app/php/registros/diagnostico-biopsia.php",
		data: $("#form_diagnostico1").serialize(),// {rfc:$("#sRFC").val()},
		success: function(data) {
			diagnosticoGuardado();
		}
	});
	}
}

function guardarDiagnostico2(){
	$('#form_diagnostico2').validate();
	if($('#form_diagnostico2').valid()){
	$.ajax({
		type: "POST",
		url: sUrl+"app/php/registros/diagnostico-biopsia-otro-sitio.php",
		data: $("#form_diagnostico2").serialize(),// {rfc:$("#sRFC").val()},
		success: function(data) {
			diagnosticoGuardado();
		}
	});
	}
}

function guardarDiagnostico3(){
	$('#form_diagnostico3').validate();
	if($('#form_diagnostico3').valid()){
	$.ajax({
		type: "POST",
		url: sUrl+"app/php/registros/diagnostico-biopsia-saturacion.php",
		data: $("#form_diagnostico3").serialize(),// {rfc:$("#sRFC").val()},
		success: function(data) {
			diagnosticoGuardado();
		}
	});
	}
}

function guardarDiagnostico4(){	
	$('#form_diagnostico4').validate();
	if($('#form_diagnostico4').valid()){
		$.ajax({
			type: "POST",
			url: sUrl+"app/php/registros/diagnostico-clinico-ape.php",
			data: $("#form_diagnostico4").serialize(),// {rfc:$("#sRFC").val()},
			success: function(data) {
				diagnosticoGuardado();
			}
		});
	}
}

function guardarDiagnostico5(){
	$('#form_diagnostico5').validate();
	if($('#form_diagnostico5').valid()){
	$.ajax({
		type: "POST",
		url: sUrl+"app/php/registros/diagnostico-desconocido.php",
		data: $("#form_diagnostico5").serialize(),// {rfc:$("#sRFC").val()},
		success: function(data) {
			diagnosticoGuardado();
		}
	});
	}
}

function guardarDiagnostico6(){
	$('#form_diagnostico6').validate();
	if($('#form_diagnostico6').valid()){
	$.ajax({
		type: "POST",
		url: sUrl+"app/php/registros/diagnostico-rtup.php",
		data: $("#form_diagnostico6").serialize(),// {rfc:$("#sRFC").val()},
		success: function(data) {
			diagnosticoGuardado();
		}
	});
	}
}

function diagnosticoGuardado(){
	$('#btnDiagnostico', window.parent.document).show();
	/*$("#tabs", window.parent.document).tabs("enable",3)
	$("#tabs", window.parent.document).tabs("enable",4);
	$("#tabs", window.parent.document).tabs("enable",5);
	$("#tabs", window.parent.document).tabs("enable",6);
	$("#tabs", window.parent.document).tabs("enable",7);
	$("#tabs", window.parent.document).tabs("enable",8);*/
	window.parent.mostrarTabs();


}

function mostrarTabs(){
	$("#tabs").tabs("enable",3);
	$("#tabs").tabs("enable",10);
	//$("#tabs").tabs("enable",4);
	//$("#tabs").tabs("enable",5);
	$("#tabs").tabs("enable",6);
	$("#tabs").tabs("enable",7);
	$("#tabs").tabs("enable",8);
	$("#tabs").tabs("enable",8);
	$("#tabs").tabs("enable",9);
	$("#tabs").tabs({active:3});
	$('#dialog').dialog('close');
}

function verDiagnostico(){
	var seleccion=$("#campo_11").val();
	if (seleccion == 1)
		pagina="diagnostico-biopsia.php";
	if (seleccion == 2)
		pagina="diagnostico_clinico_ape.php";
	if (seleccion == 3)
		pagina="diagnostico_rtup.php";
	if (seleccion == 4)
		pagina="diagnostico_biopsia_otro_sitio.php";
	if (seleccion == 5)
		pagina="diagnostico_biopsia_saturacion.php";
	if (seleccion == 6)
		pagina="diagnostico_desconocido.php";

	$("#dialog").dialog({
		autoOpen: true,
		modal: true,
		height: 660,
		width: 960,
		open: function(ev, ui){
			//$('#myIframe').attr('src','diagnostico-biopsia.php');
			$('#myIframe').attr('src',pagina);
		}
	});

}

(function(){
	"use strict";

	function inicializa() 
	{
		convertToDate();

		$('#continuaCurp').click(function(){
			buscaCurp();
		});

		$('#continuarGeneral').click(function(){
			validaFormGeneral();
		});

		//$("#tabs").tabs();
		//$("#tabs").tabs("option", "disabled", [ 1, 2, 3, 4, 5, 6, 7 ]);
		/*window.setTimeout( function(){

			$("#tabs").tabs({ disabled: [ 1, 2, 3, 4, 5, 6, 7 ]});
		}, 1000);*/

		carga_Catalogos_Dinamicos();
        $("#tabs").tabs({ disabled: [ 1, 2, 3, 10, 6, 7, 8, 9]});
		try {
			parent.endLoading();
		} catch(e) {
			parent.parent.endLoading();
		}
	}

	function finalizaCarga(){
		asignarValoresRegistros();
		if (parent.endLoading){
            parent.endLoading();
            //inicializa();
		}

	}

	function carga_Catalogos_Dinamicos()
	{

		$.ajax({
			type: "POST",
			url: sUrl+"app/php/registros/ObtieneCatalogosRegistros.php",
			data: {catalog: "x"},
			success: function (xdatamain) {
				global_catalog_data=null;
				global_catalog_data=xdatamain;
				for (var element in xdatamain){
					var idCampo = "#" + element;
					if ($(idCampo)) {
						if ($(idCampo).prop("tagName") && $(idCampo).prop("tagName").toLowerCase() == "select") {
							var xcombo=$(idCampo);
							xcombo.change(function(){validaSeleccion(this)});
							xcombo.append(
								'<option value="">Seleccione</option>');
							var xdata = xdatamain[element];
							for (var i = 0; i < xdata.length; i++){
								var rec = xdata[i];
								xcombo.append(
									'<option value="' + rec["ID_OPCION_CAMPO"] + '" >' + rec["ETIQUETA_OPCION_CAMPO"] + '</option>'
									/*$("<option></option>")
									 .attr("class",  "form-control")
									 .attr("value",  rec["ID_OPCION_CAMPO"])
									 .text(rec["ETIQUETA_OPCION_CAMPO"])*/
								);
							}
						}
					}

					idCampo = '#rg_' + element;
					if ($(idCampo)){
						var divradio=$(idCampo);

						//console.log(idCampo);
						//console.log(divradio);
						var xdata = xdatamain[element];
						var required = ""
						if(element == "campo_12"){
							required = "required"
						}else{required = ""}
						for (var i = 0; i < xdata.length; i++){
							var rec = xdata[i];
							if(rec["ETIQUETA_OPCION_CAMPO"] == "SI" || rec["ETIQUETA_OPCION_CAMPO"] == "NO"){
								divradio.append(
									'<div class="col-sm-1"><label style="font-weight:100;"><input '+required+' type="radio" name="'+element+'" value="' + rec["ID_OPCION_CAMPO"] +'" onchange="validaSeleccion($(this));" />' + rec["ETIQUETA_OPCION_CAMPO"] +'</label></div>'
								);
							}else{
								if(rec["ETIQUETA_OPCION_CAMPO"].length < 8 && rec["ETIQUETA_OPCION_CAMPO"] != "Anemia"){
									divradio.append(
										'<div class="col-sm-3"> <label style="font-weight:100;"><input '+required+' type="radio" name="'+element+'" value="' + rec["ID_OPCION_CAMPO"] +'" onchange="validaSeleccion($(this));" />' + rec["ETIQUETA_OPCION_CAMPO"] +'</label></div>'
									);
								}else{
									if(rec["ETIQUETA_OPCION_CAMPO"] == "DESCONOCIDO"){
										divradio.append(
											'<div class="col-sm-2"><label style="font-weight:100;"><input '+required+' type="radio" name="'+element+'" value="' + rec["ID_OPCION_CAMPO"] +'" onchange="validaSeleccion($(this));" />' + rec["ETIQUETA_OPCION_CAMPO"] +'</label></div>'
										);
									}else{
										divradio.append(
											'<div class="col-sm-7"><label style="font-weight:100;"><input '+required+' type="radio" name="'+element+'" value="' + rec["ID_OPCION_CAMPO"] +'" onchange="validaSeleccion($(this));" />' + rec["ETIQUETA_OPCION_CAMPO"] +'</label></div>'
										);
									}
								}
								/*divradio.append(
									'<input type="radio" id="'+element+'" name="'+element+'" value="' + rec["ID_OPCION_CAMPO"] +'" onchange="validaSeleccion(this);" />' + rec["ETIQUETA_OPCION_CAMPO"] +''
								)*/
							}
							
						}
					}

					idCampo = '#chk_' + element;
					if ($(idCampo)){
						var divradio=$(idCampo);
						//var xdata = xdatamain[element];
						for (var i = 0; i < xdata.length; i++){
							var rec = xdata[i];
							/*divradio.append(
								'<div class="col-sm-2"> <input type="checkbox" id="'+element+'" name="'+element+'[]" value="' + rec["ID_OPCION_CAMPO"] +'" onchange="validaMultiSelect(this);" />' + rec["ETIQUETA_OPCION_CAMPO"] +'</div>'
							);*/
							divradio.append(
								'<div class="col-sm-3"><input   type="checkbox" name="'+element+'[]" value="' + rec["ID_OPCI 	ON_CAMPO"] +'" onchange="validaMultiSelect($(this));" />' + rec["ETIQUETA_OPCION_CAMPO"] +'<div>'
							);
						}
					}

				}

				finalizaCarga();


			}
		});

	}

	function buscaCurp() 
	{
		$.ajax({
		  type: "POST",
		  url: "../php/registro/buscaCurp.php",
		  data: {curp:""},
		  success: function() {
			  alert("entra");
		  }
		});
	}

	function validaFormGeneral () 
	{
		var bFocus = false;

		if (!$('input[name=proveniencia]:checked').val()){
			$('#divProveniencia').addClass('has-error');
			$('#divProveniencia').removeClass('has-success');
		} else {
			$('#divProveniencia').removeClass('has-error');
			$('#divProveniencia').addClass('has-success');
		}
		if (!$('#iAnoDiagnostico').val()) {
			$('#divAnoDiagnostico').addClass('has-error');
			$('#divAnoDiagnostico').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				$('#iAnoDiagnostico').focus();
			}
		} else {
			$('#divAnoDiagnostico').removeClass('has-error');
			$('#divAnoDiagnostico').addClass('has-success');
		}
		if (!$('#sNumeroRegistro').val()) {
			$('#divNumeroRegistro').addClass('has-error');
			$('#divNumeroRegistro').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				$('#sNumeroRegistro').focus();
			}
		} else {
			$('#divNumeroRegistro').removeClass('has-error');
			$('#divNumeroRegistro').addClass('has-success');
		}
		if (!$('#sApellidoPaterno').val()) {
			$('#divApellidoPaterno').addClass('has-error');
			$('#divApellidoPaterno').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				$('#sApellidoPaterno').focus();
			}
		} else {
			$('#divApellidoPaterno').removeClass('has-error');
			$('#divApellidoPaterno').addClass('has-success');
		}
		if (!$('#sApellidoMaterno').val()) {
			$('#divApellidoMaterno').addClass('has-error');
			$('#divApellidoMaterno').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				$('#sApellidoMaterno').focus();
			}
		} else {
			$('#divApellidoMaterno').removeClass('has-error');
			$('#divApellidoMaterno').addClass('has-success');
		}
		if (!$('#sNombres').val()) {
			$('#divNombres').addClass('has-error');
			$('#divNombres').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				$('#sNombres').focus();
			}
		} else {
			$('#divNombres').removeClass('has-error');
			$('#divNombres').addClass('has-success');
		}
		if (!$('#dNacimiento').val()) {
			$('#divNacimiento').addClass('has-error');
			$('#divNacimiento').removeClass('has-success');
			if (!bFocus) {
				bFocus = true;
				$('#dNacimiento').focus();
			}
		} else {
			$('#divNacimiento').removeClass('has-error');
			$('#divNacimiento').addClass('has-success');
		}


	}
	

	function convertToDate() 
	{
		$("input[type=date]").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0", });
		$("input[type=date]").attr("readonly", true);
	}

	$(document).ready(inicializa);

})();