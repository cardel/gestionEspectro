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
	echo "<p class='estiloTitulo'>Administración de Rangos de frecuencia</p>\n";
	echo '<p style="text-align:left";><a class="iframe" href="http://avispa.univalle.edu.co/~cardel/proyInv/ayudaSecuenciamientoAviones/ayuda.php"><img border="0" src="files/HelpIcon.gif" width="50" height="50"><br/>Ayuda</a></p>';
	
	$idRango = $_GET["idRango"];
	$idBanda = $_GET["idBanda"];
	$datosBanda = datosEditarRangoFrecuencia($idRango);
	echo "<input type=button class=\"botonverde\" onClick=\"window.open('http://avispa.univalle.edu.co/site/?q=node/46&&idBanda=".$idBanda."' ,'_top' );\" value=\"Regresar\" />\n";

?>

<div id="editarRango">
	<div id="formularioHTML">
		<form action="/site/gestionEspectro/php/editFrequencyRanks.php" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">		
			<div class="form-item">
				<label>Rango de frecuencias: </label>
				<input type="text" size="64" name="rangoFrecuencias" value="<?php echo $datosBanda["frequency_ranks_name"]; ?>" class="form-text"/>
				<div class="description">
					Máximo número de canales permitido por operador en la banda, debe ser mayor que 0.
				</div>			
			</div>	
			<div class="form-item">
				<label>Máximo número de canales por operador: </label>
				<input type="text" size="64" name="maxCanalesOperador" value="<?php echo $datosBanda["max_channels_per_operator"]; ?>" class="form-text"/>
				<div class="description">
					Ingrese la frecuencia inicial de la banda en Hz. Debe ser menor que la frecuencia final y mayor que 0.
				</div>			
			</div>	
			<div class="form-item" >
				<label>Frecuencia inicial (Hz): </label>
				<input type="text" size="64" name="frecuenciaInicial" value="<?php echo $datosBanda["frequency_begin_Hz"]; ?>" class="form-text"/>
				<div class="description">
					Ingrese la frecuencia inicial de la banda en Hz. Debe ser menor que la frecuencia final y mayor que 0.
				</div>			
			</div>	
			<div class="form-item">
				<label>Frecuencia final (Hz): </label>
				<input type="text" size="64" name="frecuenciaFinal" value="<?php echo $datosBanda["frequency_end_Hz"]; ?>" class="form-text"/>
				<div class="description">
					Ingrese la frecuencia final de la banda en Hz. Debe ser mayor que la frecuencia inicial.
				</div>			
			</div>	
			<div class="form-item">
				<label>Separación mínima: </label>
				<input type="text" size="64" name="separacion" value="<?php echo $datosBanda["channel_separation"]; ?>" class="form-text"/>
				<div class="description">
					Indique la seperación mínima entre canales de operadores diferentes.
				</div>			
			</div>	
			<div class="form-item">
				<label>Descripción rango de frecuencia: </label>
				<textarea cols="64" rows="10" name="descripcioNRango" ><?php echo $datosBanda["frequency_ranks_description"]; ?></textarea>
				<div class="description">
					Ingrese la descripción del nuevo rango de frecuencia
				</div>			
			</div>
			<input type="hidden" name="nodo" value="51"/>
			<input type="hidden" name="idRango" value="<?php echo $idRango;?>"/>
			<div>  
				<input type="submit" value="Guardar" class="buttons_OK" />
			</div>
		</form>
	</div>
</div>

<p class='estilo'>Lista de canales registrados</p>
<?php
	echo obtenerCanalesPorRango($idRango);
}
?>
