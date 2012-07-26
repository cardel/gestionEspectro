
Usted puede seleccionar en que lugar se va realizar el proceso de asignación del espectro:

<ul>
	<li>Para nivel nacional no debe realizar ninguna selección geográfica</li>
	<li>A nivel regional seleccione la región especifica</li>
	<li>A nivel departamental seleccione el departamento dentro de la región especifíca</li>
	<li>A nivel local seleccione el municipio dentro del departamento especifíco</li>
</ul>	

<a href="#" onclick="javascript:consultarDivisionTerritorial();"> Seleccionar división territorial </a>

<script language="javascript">
function consultarDivisionTerritorial(){ 
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'divisionTerritorial', idConsulta: 0 }, function(data){
		$("#territorialDivision").html(data);
		$("#departamentos").html("");
		$("#municipios").html("");
	}); 	
 
}
</script>	

<div id="territorialDivision"></div>

<script language="javascript">
function consultarDepartamentos(){ 
	var selector = $('#selectTerritorialDivision').val();
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'departamentos', idConsulta: selector }, function(data){
		$("#departamentos").html(data);
		$("#municipios").html("");
	}); 	
 
}
</script>

<div id="departamentos"></div>

<script language="javascript">
function consultarMunicipios(){    
	var selector = $('#selectDepartaments').val();
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'municipios', idConsulta: selector }, function(data){
		$("#municipios").html(data);
	});         
}
</script>

<div id="municipios"></div>	
	
