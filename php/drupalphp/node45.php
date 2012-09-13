<?php
require ("/var/www/html/site/gestionEspectro/php/consultasAplicacion.php");

global $user;

if($user->uid==0)
{
	echo "<script>alert('Debe estar autenticado en el sistema para poder ver \xe9sta p\xe1gina');</script>";
	echo "<script>location.href='http://avispa.univalle.edu.co/site/';</script>";
}
else{
	jquery_ui_add('ui.tabs');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'dataTables/media/js/jquery.dataTables.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/jtables.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/tabsAppSum.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/generador.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/consultas.js');
	drupal_set_html_head('<script type="text/javascript" src="https://www.google.com/jsapi"></script>');
	drupal_add_css($path = 'css/estilos.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'css/datatable.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'gestionEspectro/php/drupalcss/botonesEspectro.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'sites/all/libraries/jquery.ui/themes/default/ui.all.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shCore.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shBrushXml.js');
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shCore.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shThemeDefault.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/colorBoxU.js');
	echo "<p class='estiloTitulo'>Administración de servicios</p>\n";
	echo '<p style="text-align:left";><a class="iframe" href="http://avispa.univalle.edu.co/~cardel/proyInv/ayudaSecuenciamientoAviones/ayuda.php"><img border="0" src="files/HelpIcon.gif" width="50" height="50"><br/>Ayuda</a></p>';
	
	
?>
<p class='estilo'>Añadir servicio</p>


<div id="formularioHTML">
	<form action="/site/gestionEspectro/php/insertarServicios.php" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">		
		<div class="form-item" id="edit-pesoNumeroBloques-wrapper">
			<label>Nombre servicio: </label>
			<input type="text" size="64" name="nombreServicio" value="servicio" class="form-text"/>
			<div class="description">
				Ingrese el nombre del servicio, recuerde en no usar uno ya existente.
			</div>			
		</div>	
		<div class="form-item" id="edit-pesoNumeroBloques-wrapper">
			<label>Descripción servicio: </label>
			<textarea cols="64" rows="10" name="descripcionServicio" >Ingrese descripción servicio</textarea>
			<div class="description">
				Ingrese la descripción del nuevo servicio
			</div>			
		</div>	
		<input type="hidden" name="nodo" value="45"/>
		<div>  
			<input type="submit" value="Guardar" class="buttons_OK" />
		</div>
	</form>
</div>

<p class='estilo'>Lista de servicios registrados</p>

<div id="divServicios"></div>
<script>consultarServicios();</script>
<?php	
}
?>


