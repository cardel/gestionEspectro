function operadores(){
	$.post("gestionEspectro/php/consultasGenerales.php", { consulta: 'operadores'}, function(data){
		$("#operadores").html(data);
	}); 	
}
operadores();

function listas()
{
	var selectTerritorialDivision = -1;
	if($('#selectTerritorialDivision').length)
	{
		selectTerritorialDivision = $('#selectTerritorialDivision').val();
		$('#selectTerritorialDivision').attr('disabled','disabled');
	}
	
	var selectDepartaments=-1;
	if($('#selectDepartaments').length)
	{
		selectDepartaments = $('#selectDepartaments').val();
		$('#selectDepartaments').attr('disabled','disabled');
	
	}	
	var selectCities = -1;
	if($('#selectCities').length)
	{
		selectCities = $('#selectCities').val();
		$('#selectCities').attr('disabled','disabled');

	}
	$.post("gestionEspectro/php/consultasGenerales.php", { consulta: 'crearPostParaListas', selectTerritorialDivision:selectTerritorialDivision,selectDepartaments:selectDepartaments, selectCities:selectCities}, function(data){
		$("#crearPostParaListas").html(data);
	});
	
	alert(selectTerritorialDivision);
	
}
