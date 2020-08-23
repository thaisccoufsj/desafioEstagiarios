function objeto(o){
	return document.getElementById(o);
}

function enviarFormulario(nome){
	objeto(nome).submit();
}