function operadores(){
	$.post("gestionEspectro/php/consultarGenerales.php", { consulta: 'operadores'}, function(data){
		$("#operadores").html(data);
	}); 	
}
operadores();
