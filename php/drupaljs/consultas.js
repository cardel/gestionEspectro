function operadores(){
	$.post("gestionEspectro/php/consultasGenerales.php", { consulta: 'operadores'}, function(data){
		$("#operadores").html(data);
	}); 	
}
operadores();

function listas()
{
	$.post("gestionEspectro/php/consultasGenerales.php", { consulta: 'crearPostParaListas', idConsulta: 0, selectBand:selectBand, selectRanks:selectRanks, selectTerritorialDivision:selectTerritorialDivision,selectDepartaments:selectDepartaments, selectCities:selectCities}, function(data){
		$("#crearPostParaListas").html(data);

	});
}
