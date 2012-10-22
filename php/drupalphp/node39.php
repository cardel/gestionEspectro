<?php
global $user;
if($user->uid==0)
{
	echo "<script>alert('Debe estar autenticado en el sistema para poder ver \xe9sta p\xe1gina');</script>";
	echo "<script>location.href='http://avispa.univalle.edu.co/site/';</script>";
}
else{
	jquery_ui_add('ui.tabs');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'dataTables/media/js/jquery.dataTables.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/tabsAppSum.js');
	drupal_set_html_head('<script type="text/javascript" src="https://www.google.com/jsapi"></script>');
	drupal_add_css($path = 'sites/all/libraries/jquery.ui/themes/default/ui.all.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'css/datatable.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'css/estilos.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'gestionEspectro/php/drupalcss/botonesEspectro.css', $type = 'module', $media = 'all', $preprocess = TRUE);	
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shCore.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shBrushXml.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/consultas.js');
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shCore.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shThemeDefault.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/colorBoxU.js');
	
	if(!is_dir("/var/www/html/site/gestionEspectro/entradas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/entradas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/entradasTemp/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/entradasTemp/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid, 0755);
	
	echo "<p class='estiloTitulo'>Consultas básicas</p>";
	echo '<p style="text-align:left";><a class="iframe" href="http://avispa.univalle.edu.co/~cardel/proyInv/ayudaSecuenciamientoAviones/ayuda.php"><img border="0" src="files/HelpIcon.gif" width="50" height="50"><br/>Ayuda</a></p>';

?>


<strong style="font-size:14px; font-weight:bold;">Selección de entidades territoriales</strong>
<br/>
Usted puede seleccionar en que lugar se va realizar el proceso de asignación del espectro:

<ul>
	<li>Para nivel nacional no debe realizar ninguna selección geográfica</li>
	<li>A nivel regional seleccione la región especifica</li>
	<li>A nivel departamental seleccione el departamento dentro de la región especifíca</li>
	<li>A nivel local seleccione el municipio dentro del departamento especifíco</li>
</ul>	
<div id="seleccionNacional"></div>
<div id="enlaceDivisionTerritorial">
 	<input type=button class="botonrojo" onclick="javascript:consultarDivisionTerritorial();" value="Seleccionar división territorial" />
</div>

<div id="territorialDivision"></div>
<div id="departamentos"></div>
<div id="municipios"></div>	

<table border="0" width="100%">
	<tr>
		<div style="text-align:center;">
		<p class='estilo'>Aplicar filtro</p>	
		</div>
		<td width="50%">
			<p class='estilo'>Por operador</p>	
			<strong style="font-size:14px; font-weight:bold;">Selección operador</strong>
			<div id="operadores"></div>
			<input type="button" class="botonamarillo" value="Consultar por operador" onclick="javascript:ejecutarOperador();">
		</td >
		<td width="50%" style="text-align : right;">
			<p class='estilo'>Por Banda/Rango de frecuencia</p>
			<p>Seleccione una banda de frecuencia</p>
			<div id="bandasBD"></div>				
			<div id="rangosBD"></div>	
			
		</td>
	</tr>
	<tr>
		<td width="50%" colspan="2">
		<div id="resultadosFrecuencia"></div>
		</td>
	</tr>
</table>
<?php
}
?>
