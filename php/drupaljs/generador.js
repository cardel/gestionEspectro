/*
 * Funciones de javascript para el generador de entradas
 * Carlos Andres Delgado S
 * Trabajo de grado gestion del espectro radioelectrico
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

//Esta funcion consulta las bandas de la BD
function consultarBandas(){    
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'bandas', idConsulta: 0 }, function(data){
		$("#bandas").html(data);
	});      
}
//Se ejecuta automaticamente
consultarBandas();

//Esta funcion consulta los rangos de frecuencias de la BD
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
//Esta funcion muestra los parametros de un rango de frecuencias
function mostrarParametros(){  
	var selector = $('#selectRanks').val();
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'numCanalesEnBanda', idConsulta: selector }, function(data){
		$("#numCanales").html(data);
	});	
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'numCanalesEnBandaForm', idConsulta: selector }, function(data){
		$("#numeroCanalesForm").html(data);
	});		
	
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'serviciosEnBanda', idConsulta: selector }, function(data){
		$("#serviciosBanda").html(data);
	});  
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'topeOperadorBanda', idConsulta: selector }, function(data){
		$("#topeOperadorBanda").html(data);
	});    
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'channelSeparation', idConsulta: selector }, function(data){
		$("#channelSeparation").html(data);
	}); 
	channelSeparation
	$("#parametrosRango").css("display", "block");
	$("#botonRequerimientos").css("display", "block");
}

//Esta funcion impide que el usuario pueda modificar los cambios cuando va crear los requerimientos asi mismo consulta los operadores de acuerdo a los servicios de cada rango y muestra la tabla para agregarlos
function crearRequerimiento()
{

	$("#formulario").css("display", "block");
	var selector = $('#selectRanks').val();

	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'serviciosPorOperador', idConsulta: selector }, function(data){
		$("#selectorOperator").html(data);

	}); 
			
	var selectBand = $('#selectBands').val();
	$('#selectBands').attr('disabled','disabled');
	
	var selectRanks = $('#selectRanks').val();
	$('#selectRanks').attr('disabled','disabled');
	
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
	
	$("#enlaceDivisionTerritorial").css("display", "none");
	$("#enlaceDepartamentos").css("display", "none");
	$("#enlaceMunicipios").css("display", "none");
	
	$("#botonReq").attr('disabled','disabled');
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'crearPostParaListas', idConsulta: 0, selectBand:selectBand, selectRanks:selectRanks, selectTerritorialDivision:selectTerritorialDivision,selectDepartaments:selectDepartaments, selectCities:selectCities}, function(data){
		$("#crearPostParaListas").html(data);

	});
} 

//Funcion para agregar filas en la tabla
function agregarFila(obj){

	var nombreOperador = $("#nombreOperador").val();
	var servicio = $("#selOperador").val();
	var esNumero = isNaN(numeroCanales);

	var textoServicio = $("#selOperador option:selected").text();
	var oId = $("#cant_campos").val();
	$("#cant_campos").val(parseInt($("#cant_campos").val()) + 1);

	$("#selOperador").find("option:selected").attr('disabled', true);
	$("#selOperador").find("option:selected").attr('selected', false);
	$("#selOperador option[value=-1]").attr("selected",true);
	
	var strHtml1 = "<td>" + textoServicio + '<input type="hidden" id="servicio_' + oId + '" name="servicio_' + oId + '" value="' + servicio + '"/></td>';
	var strHtml2 = '<td><img src="gestionEspectro/php/drupalimages/delete.png" width="16" height="16" alt="Eliminar" onclick="if(confirm(\'Realmente desea eliminar este requerimiento?\')){eliminarFila(' + oId + ');}"/>';
	strHtml3 += '<input type="hidden" id="hdnIdCampos_' + oId +'" name="hdnIdCampos[]" value="' + oId + '" /></td>';
	var strHtmlTr = "<tr id='rowDetalle_" + oId + "'></tr>";
	var strHtmlFinal = strHtml1 + strHtml2;
	//tambien se puede agregar todo el HTML de una sola vez.
	//var strHtmlTr = "<tr id='rowDetalle_" + oId + "'>" + strHtml1 + strHtml2 + "</tr>";
	$("#tbDetalle").append(strHtmlTr);
	//si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
	$("#rowDetalle_" + oId).html(strHtmlFinal);	
	
	

	return false;
}
//Funcion para borrar filas en la tabla

function eliminarFila(oId){
	$("#rowDetalle_" + oId).remove();	
	$("#selOperador option[value="+oId+"]").attr('disabled', false);
	$("#cant_campos").val(parseInt($("#cant_campos").val()) -1);
	return false;
}  


