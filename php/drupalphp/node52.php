<?php
require ("/var/www/html/site/gestionEspectro/php/rangosFrecuenciaAcciones.php");

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
	//drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/rangosFrecuencia.js');
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
	echo "<p class='estiloTitulo'>Administración de canales</p>\n";
	echo '<p style="text-align:left";><a class="iframe" href="http://avispa.univalle.edu.co/~cardel/proyInv/ayudaSecuenciamientoAviones/ayuda.php"><img border="0" src="files/HelpIcon.gif" width="50" height="50"><br/>Ayuda</a></p>';
	
	$idRango = $_GET["idRango"];
	echo "<input type=button class=\"botonverde\" onClick=\"window.open('http://avispa.univalle.edu.co/site/?q=node/51' ,'_top' );\" value=\"Regresar\" />\n";

?>

<div id="editarRango">
	<div id="formularioHTML">
		<form action="/site/gestionEspectro/php/editar" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">		
			<div class="form-item">
				<label>Frecuencia transmisión (Hz): </label>
				<input type="text" size="64" name="frecuenciaTX" value="<?php echo $datosBanda["channel_separation"]; ?>" class="form-text"/>
				<div class="description">
					Indique la frecuencia de transmisión del canal
				</div>			
			</div>	
			<div class="form-item">
				<label>Frecuencia recepción (Hz): </label>
				<input type="text" size="64" name="frecuenciaRX" value="<?php echo $datosBanda["channel_separation"]; ?>" class="form-text"/>
				<div class="description">
					Indique la frecuencia de transmisión del canal
				</div>			
			</div>	
			<div class="form-item">
				<label>¿Está reservado? </label>
				<input type="checkbox" size="64" name="reservado" value="1" class="form-text"/>
				<div class="description">
					Indique si el canal está reservado.
				</div>			
			</div>
				<div class="form-item">
				<label>¿Está deshabilitado? </label>
				<input type="checkbox" size="64" name="deshabilidado" value="1" class="form-text"/>
				<div class="description">
					Indique si el canal está reservado.
				</div>			
			</div>
			<div class="form-item">
				<label>Descripción canal: </label>
				<textarea cols="64" rows="10" name="descripcionCanal" ></textarea>
				<div class="description">
					Ingrese la descripción del canal
				</div>			
			</div>
			<input type="hidden" name="nodo" value="52"/>
			<div>  
				<input type="submit" value="Guardar" class="buttons_OK" />
			</div>
		</form>
	</div>
</div>
<?php
}
?>
