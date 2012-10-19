/*
 * Este script permite realizar algunas consultas via ajax utilizando redirección php
 */
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

function ejecutarEntidad()
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
	
	$.post("gestionEspectro/php/resultadosConsultas.php", { accion: 'territorio', selectTerritorialDivision:selectTerritorialDivision,selectDepartaments:selectDepartaments, selectCities:selectCities}, function(data){
		$("#resultadosOperador").html(data);
	});	
	
}

function asignacionFrecuencias()
{

	var bandas = $('#selectBands').val();
	var rangos = $('#selectRanks').val();
	$.post("gestionEspectro/php/resultadosConsultas.php", { accion: 'frecuencia',bandas:bandas,rangos:rangos}, function(data){
		$("#resultadosFrecuencia").html(data);
	});	
	
}



//Esta funcion consulta las bandas de la BD
function consultarBandasBD(){    
	$.post("gestionEspectro/php/resultadosConsultas.php", { accion: 'bandasBD', idConsulta: 0 }, function(data){
		$("#bandasBD").html(data);
	});      
}
//Se ejecuta automaticamente
consultarBandasBD();

//Esta funcion consulta los rangos de frecuencias de la BD
function consultarRangosBD(){  
	var selector = $('#selectBands').val();
	$.post("gestionEspectro/php/resultadosConsultas.php", { accion: 'rangosBD', idConsulta: selector }, function(data){
		$("#rangosBD").html(data);
	});   
}

//Consulta operadores

function consultarOperadores(){  
	$.post("gestionEspectro/php/resultadosConsultas.php", { accion: 'operadores' }, function(data){
		$("#divOperadores").html(data);
	});   
}

function consultarServicios(){  
	$.post("gestionEspectro/php/resultadosConsultas.php", { accion: 'servicios' }, function(data){
		$("#divServicios").html(data);
	});   
}
