/*
 * Carlos Andres Delgado
 * Este script permite realizar algunas consultas via ajax utilizando redirección php
 */
 
 //Esta funcion borra la lista de departamentos y municipios, la oculta al usuario
function borrarDepartamentos(){
	$("#departamentos").html(" ");      
	$("#municipios").html(" ");       
}

//Esta funcion borra la lista de departamentos y la oculta al usuario
function borrarMunicipios(){
	$("#municipios").html(" ");       
}

//Esta funcion consulta las divisiones territoriales de la BD
function consultarDivisionTerritorial(){ 
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'divisionTerritorial', idConsulta: 0 }, function(data){
		$("#territorialDivision").html(data);
		$("#departamentos").html("");
		$("#municipios").html("");
		$("#tipoAsignacion").html("La asignación es a nivel regional");
	});  
}
 
//Esta funcion consulta los departamentos de la BD de una division
function consultarDepartamentos(){ 
	var selector = $('#selectTerritorialDivision').val();
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'departamentos', idConsulta: selector }, function(data){
		$("#departamentos").html(data);
		$("#municipios").html("");
		$("#tipoAsignacion").html("La asignación es a nivel departamental");

	});  
}

//Esta funcion consulta los municipios de la BD de un depto
function consultarMunicipios(){    
	var selector = $('#selectDepartaments').val();
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'municipios', idConsulta: selector }, function(data){
		$("#municipios").html(data);
		$("#tipoAsignacion").html("La asignación es a nivel municipal");
	});         
} 

//Consultar operadores
function operadores(){
	$.post("gestionEspectro/php/consultasGenerales.php", { consulta: 'operadores'}, function(data){
		$("#operadores").html(data);
	}); 	
}
operadores();

//Ejecutar filtro por operador
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

/*function ejecutarEntidad()
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
	
}*/

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
