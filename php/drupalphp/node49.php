<?php
require ("/var/www/html/site/gestionEspectro/php/operadoresAcciones.php");

$id = $_GET["idOperador"];

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
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/operadores.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/consultas.js');

	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/tabsAppSum.js');
	drupal_add_css($path = 'gestionEspectro/php/drupalcss/estilosFormGestion.css', $type = 'module', $media = 'all', $preprocess = TRUE);
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
	echo "<p class='estiloTitulo'>Edición de operador</p>\n";
	
	if($id==null) $id=1;
	
	echo "<p class='estilo'>Editar operador ".obtenerNombre($id)."</p>\n";
?>


<div id="formularioHTML">
	<form action="/site/?q=node/41" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">		
		<div class="form-item" id="edit-pesoNumeroBloques-wrapper">
			<label for="edit-pesoNumeroBloques">Nombre operador: </label>
			<input type="text" maxlength="64" name="nombreOperador" size="30" value="<?echo obtenerNombre($id);?>" class="form-text"/>
			<div class="description">
				Ingrese el nombre del operador, recuerde en no cambiar el nombre por una ya existente.
			</div>			
		</div>	
		<div>  
			<input type="submit" id="btnAgregar" name="btnAgregar" value="Guardar" class="buttons_OK" />
		</div>
	</form>
</div>

<p class='estilo'>Servicios del operador </p>;



<div id="listaServicios"></div>

<?php	
}
?>
