
function setLoading() {
	"use strict";
	$("#dLoading").show();
}

function endLoading () {
	"use strict";
	$("#dLoading").hide();
}

function resize(e) {
	"use strict";
	
	var frm = document.getElementById("ftmGlobal");
	if(frm) {
		// here you can make the height, I delete it first, then I make it again
		var h = frm.contentWindow.document.body.scrollHeight + "px";
		console.log(h);
		frm.height = "";
		frm.height = h;
	}   
}
(function() {
	"use strict";
	
	function inicializa() {
		endLoading();
	}
	
	$(document).ready(inicializa);
	
})();