<?php
	global $user;
	jquery_ui_add('ui.tabs');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'dataTables/media/js/jquery.dataTables.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/jtables.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/tabsAppSum.js');
	drupal_set_html_head('<script type="text/javascript" src="https://www.google.com/jsapi"></script>');
	drupal_add_css($path = 'css/datatable.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'sites/all/libraries/jquery.ui/themes/default/ui.all.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shCore.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shBrushXml.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/generador.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/consultas.js');
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shCore.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shThemeDefault.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/colorBoxU.js');
	
	if(!is_dir("/var/www/html/site/gestionEspectro/entradas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/entradas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/entradasTemp/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/entradasTemp/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid, 0755);
	$accion = $_POST["accion"];
?>
<p class='estiloTitulo'>Consultas básicas</p>
<p class='estilo'>Asignacion por operador en zona</p>

<form action="/site/?q=node/39" method="post">
	<strong style="font-size:14px; font-weight:bold;">Selección geográfica</strong>
	<div id="tipoAsignacion" style="font-size:11px; font-weight:bold;">La asignación es a nivel nacional</div>
	<br/>
	Usted puede seleccionar en que lugar se va realizar el proceso de asignación del espectro:

	<ul>
		<li>Para nivel nacional no debe realizar ninguna selección geográfica</li>
		<li>A nivel regional seleccione la región especifica</li>
		<li>A nivel departamental seleccione el departamento dentro de la región especifíca</li>
		<li>A nivel local seleccione el municipio dentro del departamento especifíco</li>
	</ul>	

	<div id="enlaceDivisionTerritorial">
	<a href="#" id="consultarDivisionTerritorial" onclick="javascript:consultarDivisionTerritorial();"> Seleccionar división territorial </a>
	</div>
	<div id="territorialDivision"></div>
	<div id="departamentos"></div>
	<div id="municipios"></div>	
	<strong style="font-size:14px; font-weight:bold;">Selección operador</strong>
	
	<input type="hidden" name="accion" value="operador">
	<div id="operadores"></div>
	<div id="crearPostParaListas"></div>
	<input type="submit" name="op" id="edit-submit" value="Consultar" onclick="javascript:listas();" class="form-submit"/>
	
	</div>
</form>
<?php
if($accion=="operador")
{
	$divisionTerritorial = $_POST["selectTerritorialDivisionForm"];
	$departamento = $_POST["selectDepartamentsForm"];
	$municipio = $_POST["selectCitiesForm"];
	$operador = $_POST["operadores"];
	
	echo $divisionTerritorial."<br/>";
	echo $departamento."<br/>";
	echo $municipio."<br/>";
	echo $operador."<br/>";
	
}
?>
<p class='estilo'>Asignacion en entidad territorial</p>
<p class='estilo'>Asignación por banda/rango</p>
