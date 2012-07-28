<?php
	drupal_add_css($path = 'css/datatable.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_set_html_head('<script type="text/javascript" src="https://www.google.com/jsapi"></script>');
	drupal_add_css($path = 'sites/all/libraries/jquery.ui/themes/default/ui.all.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shCore.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shBrushXml.js');
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shCore.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shThemeDefault.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/colorBoxU.js');
	echo "<p class='estiloTitulo'>Generador de entradas XML</p>\n";
	echo '<p style="text-align:left";><a class="iframe" href="http://avispa.univalle.edu.co/~cardel/proyInv/ayudaSecuenciamientoAviones/ayuda.php"><img border="0" src="files/HelpIcon.gif" width="50" height="50"><br/>Ayuda</a></p>';

?>

<p class='estilo'>Selección geográfica</p>

Usted puede seleccionar en que lugar se va realizar el proceso de asignación del espectro:

<ul>
	<li>Para nivel nacional no debe realizar ninguna selección geográfica</li>
	<li>A nivel regional seleccione la región especifica</li>
	<li>A nivel departamental seleccione el departamento dentro de la región especifíca</li>
	<li>A nivel local seleccione el municipio dentro del departamento especifíco</li>
</ul>	

<script language="javascript">
function borrarDepartamentos(){
	$("#departamentos").html(" ");      
	$("#municipios").html(" ");       
}
function borrarMunicipios(){
	$("#municipios").html(" ");       
}
</script>

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
	
<p class='estilo'>Selección banda</p>

<script language="javascript">
function consultarBandas(){    
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'bandas', idConsulta: 0 }, function(data){
		$("#bandas").html(data);
		$("#rangos").html(" ");
	});         
}
consultarBandas();
</script>

<div id="bandas"></div>	

<script language="javascript">
function consultarRangos(){  
	var selector = $('#selectBands').val();
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'rangos', idConsulta: selector }, function(data){
		$("#rangos").html(data);
	});         
}
</script>

<div id="rangos"></div>	

<p class='estilo'>Creación requerimientos</p>

<script language="javascript">
function mostrarParametros(){  
	var selector = $('#selectRanks').val();
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'numCanalesEnBanda', idConsulta: selector }, function(data){
		$("#numCanales").html(data);
	});	
	$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'serviciosEnBanda', idConsulta: selector }, function(data){
		$("#serviciosBanda").html(data);
	});            
}
</script>

<table>
<tr>
<td>Número de canales en la banda:</td><td id="numCanales"></td>
</tr>
<tr>
Servicios en la banda:<td id="serviciosBanda"></td>
</tr>
</table>
