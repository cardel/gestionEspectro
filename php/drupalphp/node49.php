<?php
require ("/var/www/html/site/gestionEspectro/php/operadoresAcciones.php");

$id = $_GET["idOperador"];
global $user;

$permiso = 0;
$administrador = 0;

foreach($user->roles as $rol)
{
	if($rol == "administradorEspectro") $administrador=1;
}

if($administrador==0 && $user->uid!=0)
{
	echo "<script>alert('Usted debe tener privilegios de administrador para ver \u00e9sta p\u00e1gina, consulte con el administrador del sitio');</script>";
	echo "<script>location.href='http://avispa.univalle.edu.co/site/';</script>";	
}

if($user->uid==0)
{
	echo "<script>alert('Debe estar autenticado en el sistema para poder ver \u00e9sta p\u00e1gina');</script>";
	echo "<script>location.href='http://avispa.univalle.edu.co/site/';</script>";
}
else
{
	$permiso=1;
}


if($administrador==1 && $permiso==1)
{
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
	echo '<p style="text-align:left";><a class="iframe" href="http://avispa.univalle.edu.co/site/gestionEspectro/php/help/operadores.php"><img border="0" src="files/HelpIcon.gif" width="50" height="50"><br/>Ayuda</a></p>';
	if($id==null) $id=1;
	
	echo "<p class='estilo'>Editar operador: ".obtenerNombre($id)."</p>\n";
	
	echo "<input type=button class=\"botonverde\" onClick=\"window.open('http://avispa.univalle.edu.co/site/?q=node/41' ,'_top' );\" value=\"Regresar\" />\n";
?>


<div id="formularioHTML">
	<form action="/site/gestionEspectro/php/editarOperadores.php" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">		
		<div class="form-item" id="edit-pesoNumeroBloques-wrapper">
			<label>Nombre operador: </label>
			<input type="text" size="64" name="nombreOperador" value="<?echo obtenerNombre($id);?>" class="form-text"/>
			<div class="description">
				Ingrese el nombre del operador, recuerde en no cambiar el nombre por una ya existente.
			</div>			
		</div>	
		<input type="hidden" name="nodo" value="49" />
		<input type="hidden"  name="tipo" value="cambiarNombreOperador" />
		<input type="hidden"  name="operador" value="<?echo $id;?>" />
		<div>  
			<input type="submit" value="Guardar" class="buttons_OK" />
		</div>
	</form>
</div>

<div id="formularioHTML">
	<form action="/site/gestionEspectro/php/editarOperadores.php" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">		
	<div id="formulario" >
		<p class='estilo'>Agregar o quitar servicios</p>
		<input type="hidden" name="nodo" value="49" />
		<input type="hidden"  name="tipo" value="agregarServicio" />
		<input type="hidden"  name="operador" value="<?echo $id;?>" />
		<fieldset class="estiloFormFieldset">
			<legend class="estiloFormLeyenda">Gestión de servicios</legend>
			<div class="top">
				<label class="estiloFormLabel" for="nombreOperador">Seleccione servicio:</label>
				<? echo obtenerServiciosNoOperador($id);?>
			</div>
		<input type="submit" value="Agregar" class="buttons_OK" />
		</fieldset>
	</div>
	</form>
</div>

<p class='estilo'>Servicios del operador </p>

<?php
	echo obtenerServiciosOperador($id);
}
?>
