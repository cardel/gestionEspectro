
function borrarDepartamentos(){
	$("#departamentos").html(" ");      
	$("#municipios").html(" ");       
}
function borrarMunicipios(){
	$("#municipios").html(" ");       
}
function consultarDivisionTerritorial(){ 
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'divisionTerritorial', idConsulta: 0 }, function(data){
		$("#territorialDivision").html(data);
		$("#departamentos").html("");
		$("#municipios").html("");
		$("#tipoAsignacion").html("La asignación es a nivel regional");
	});  
}

function consultarDepartamentos(){ 
	var selector = $('#selectTerritorialDivision').val();
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'departamentos', idConsulta: selector }, function(data){
		$("#departamentos").html(data);
		$("#municipios").html("");
		$("#tipoAsignacion").html("La asignación es a nivel departamental");

	});  
}

function consultarMunicipios(){    
	var selector = $('#selectDepartaments').val();
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'municipios', idConsulta: selector }, function(data){
		$("#municipios").html(data);
		$("#tipoAsignacion").html("La asignación es a nivel municipal");
	});         
}

function consultarBandas(){    
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'bandas', idConsulta: 0 }, function(data){
		$("#bandas").html(data);
	});      
}
consultarBandas();

function consultarRangos(){  
	var selector = $('#selectBands').val();
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'rangos', idConsulta: selector }, function(data){
		$("#rangos").html(data);
	});   
	$("#serviciosBanda").html(" "); 
	$("#numCanales").html(" ");  
	$("#botonRequerimientos").css("display", "none");  
	$("#parametrosRango").css("display", "none");   
}
