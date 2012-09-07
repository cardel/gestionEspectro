function consultarServiciosList(){  
	$.post("gestionEspectro/php/resultadosConsultas.php", { accion: 'serviciosList' }, function(data){
		$("#divServicios").html(data);
	});   
}

consultarServiciosList();

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

	var operador = $("#selServices").val();

	if(operador>=1)
	{
		var textoOperador = $("#selOperador option:selected").text();
		var oId = $("#cant_campos").val();
		$("#cant_campos").val(parseInt($("#cant_campos").val()) + 1);

		$("#selServices").find("option:selected").attr('disabled', true);
		$("#selServices").find("option:selected").attr('selected', false);
		$("#selServices option[value=-1]").attr("selected",true);
		
		var strHtml1 = "<td>" + textoOperador + '<input type="hidden" id="operador_' + oId + '" name="operador_' + oId + '" value="' + operador + '"/></td>';
		var strHtml2 = "<td>" + numeroCanales + '<input type="hidden" id="numRequerido_' + oId + '" name="numRequerido_' + oId + '" value="' + numeroCanales + '"/></td>' ;
		var strHtml3 = '<td><img src="gestionEspectro/php/drupalimages/delete.png" width="16" height="16" alt="Eliminar" onclick="if(confirm(\'Realmente desea eliminar este requerimiento?\')){eliminarFila(' + oId + ');}"/>';
		strHtml3 += '<input type="hidden" id="hdnIdCampos_' + oId +'" name="hdnIdCampos[]" value="' + oId + '" /></td>';
		var strHtmlTr = "<tr id='rowDetalle_" + oId + "'></tr>";
		var strHtmlFinal = strHtml1 + strHtml2 + strHtml3;
		//tambien se puede agregar todo el HTML de una sola vez.
		//var strHtmlTr = "<tr id='rowDetalle_" + oId + "'>" + strHtml1 + strHtml2 + "</tr>";
		$("#tbDetalle").append(strHtmlTr);
		//si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
		$("#rowDetalle_" + oId).html(strHtmlFinal);	
		
	}
	else
	{
		alert("Debe seleccionar un operador e ingresar un n\xfamero v\xe1lido para los requerimientos");
	}	

	return false;
}
//Funcion para borrar filas en la tabla

function eliminarFila(oId){
	$("#rowDetalle_" + oId).remove();	
	$("#selServices option[value="+oId+"]").attr('disabled', false);
	return false;
}  
