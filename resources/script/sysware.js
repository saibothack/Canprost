function validar_email(valor) {
	var dato = $("#" + valor).val();
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	// utilizamos test para comprobar si el parametro valor cumple la regla
	if (!filter.test(dato) ){
		$("#" + valor).val('');
		$("#" + valor).focusin();
		return false;
	}else{
		return true;
	}
}
function solonumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = [8, 39, 33];
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}