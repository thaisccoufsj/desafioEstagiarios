function objeto(o){
	return document.getElementById(o);
}

function enviarFormulario(nome){
	objeto(nome).submit();
}

function confirmarRedirecionamento(url,tipo){
	
	var msg = "Você tem certeza que deseja ";

	switch(tipo){

		case "e":
			msg += "excluir"
			break;

		case "l":
			msg += "voltar para listagem"
			break;

		default:
			msg += "continuar"

	}
	
	if(confirm(msg + "? Todos dados não salvos serão perdidos.")){
		window.location = url;
	}
}