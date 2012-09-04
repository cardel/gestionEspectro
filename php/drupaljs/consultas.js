function operadores(){
	$.post("gestionEspectro/php/consultasGenerales.php", { consulta: 'operadores'}, function(data){
		$("#operadores").html(data);
	}); 	
}
operadores();

function ejecutarOperador()
{
	var selectTerritorialDivision = -1;
	if($('#selectTerritorialDivision').length)
	{
		selectTerritorialDivision = $('#selectTerritorialDivision').val();
	}
	
	var selectDepartaments=-1;
	if($('#selectDepartaments').length)
	{
		selectDepartaments = $('#selectDepartaments').val();
	
	}	
	var selectCities = -1;
	if($('#selectCities').length)
	{
		selectCities = $('#selectCities').val();
	}
	
	var operador = -1;
	if($('#operadoresSelect').length)
	{
		operador = $('#operadoresSelect').val();
	}
	
	$.post("gestionEspectro/php/resultadosConsultas.php", { accion: 'operador', selectTerritorialDivision:selectTerritorialDivision,selectDepartaments:selectDepartaments, selectCities:selectCities,operadorSel:operador}, function(data){
		$("#resultadosOperador").html(data);
	});	
	

	
}
