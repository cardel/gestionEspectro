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
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/jtables.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/tabsAppSum.js');
	//drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/appEspectro.js');
	drupal_set_html_head('<script type="text/javascript" src="https://www.google.com/jsapi"></script>');
	drupal_add_css($path = 'css/datatable.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'gestionEspectro/php/drupalcss/botonesEspectro.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'sites/all/libraries/jquery.ui/themes/default/ui.all.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shCore.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shBrushXml.js');
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shCore.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shThemeDefault.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/colorBoxU.js');
	echo "<p class='estiloTitulo'>Aplicación gestión del espectro usando algoritmos genéticos</p>\n";
	echo '<p style="text-align:left";><a class="iframe" href="http://avispa.univalle.edu.co/~cardel/proyInv/ayudaSecuenciamientoAviones/ayuda.php"><img border="0" src="files/HelpIcon.gif" width="50" height="50"><br/>Ayuda</a></p>';

?>

<div id="formularioHTML">
	<form action="/site/?q=node/37" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">
		<div class="form-item" id="edit-<file-upload-wrapper">
			<label for="edit-file-upload">Seleccione archivo de entrada: </label>
			<input type="file" name="archivo" class="form-file" id="edit-file-upload" size="60"/>
			<input name="action" type="hidden" value="upload" />   
		</div>
		<div class="form-item" id="edit-oredefinedinput-wrapper">
			<label for="edit-oredefinedinput">Selección entrada definida: </label>
			<select name="oredefinedinput" class="form-select" id="edit-oredefinedinput">
				<option value="null" selected="selected">Ninguna</option>
				<?php
					$directorio=@opendir("/var/www/html/site/gestionEspectro/entradas/".$user->uid); 
					if($directorio==false)
					{
						mkdir("/var/www/html/site/gestionEspectro/entradas/".$user->uid, 0755);
						$directorio=@opendir("/var/www/html/site/gestionEspectro/entradas/".$user->uid); 

					}		
					while ($archivo = readdir($directorio))
					{
						if(is_file("/var/www/html/site/gestionEspectro/entradas/".$user->uid."/".$archivo)) echo "<option value=\"/var/www/html/site/gestionEspectro/entradas/".$user->uid."/".$archivo."\">$archivo</option>"; 
					}	
					closedir($directorio); 
					
				 ?>
			</select>
			<div class="description">
				 Seleccione una entrada predefinida, ninguna si desea cargar un archivo.
			</div>
		</div>
	
		<div class="form-item" id="edit-pesoNumeroBloques-wrapper">
			<label for="edit-pesoNumeroBloques">Peso número de bloques: </label>
			<input type="text" maxlength="64" name="pesoNumeroBloques" id="edit-pesoNumeroBloques" size="30" value="33" class="form-text"/>
			<div class="description">
				 Ingrese peso costo número de bloques
			</div>
		</div>
		<div class="form-item" id="edit-pesoCanalesLibres-wrapper">
			<label for="edit-pesoCanalesLibres">Peso máximo bloque de canales libres: </label>
			<input type="text" maxlength="64" name="pesoCanalesLibres" id="edit-pesoCanalesLibres" size="30" value="33" class="form-text"/>
			<div class="description">
				 Ingrese peso costo de bloque de canales libres
			</div>
		</div>
		<div class="form-item" id="edit-pesoCanalesInutiles-wrapper">
			<label for="edit-pesoCanalesInutiles">Peso número de canales inútiles: </label>
			<input type="text" maxlength="64" name="pesoCanalesInutiles" id="edit-pesoCanalesInutiles" size="30" value="33" class="form-text"/>
			<div class="description">
				 Ingrese peso costo Peso número de canales inútiles
			</div>
		</div>
		<div class="form-item" id="edit-executionTime-wrapper">
			<label for="edit-executionTime">Probabilidad cruce: </label>
			<input type="text" maxlength="64" name="executionTime" id="edit-executionTime" size="30" value="3" class="form-text"/>
			<div class="description">
				 Ingrese la probabilidad de cruce entre 1% y 100%. Valor recomendado 90%.
			</div>
		</div>
		<div class="form-item" id="edit-executionTime-wrapper">
			<label for="edit-executionTime">Probabilidad mutación: </label>
			<input type="text" maxlength="64" name="executionTime" id="edit-executionTime" size="30" value="3" class="form-text"/>
			<div class="description">
				 Ingrese la probabilidad de mutación entre 1% y 100%. Valor recomendado 2%
			</div>
		</div>
		<div class="form-item" id="edit-executionTime-wrapper">
			<label for="edit-executionTime">Tiempo de ejecución: </label>
			<input type="text" maxlength="64" name="executionTime" id="edit-executionTime" size="30" value="3" class="form-text"/>
			<div class="description">
				 Ingrese el tiempo de ejecución máximo en segundos (s)
			</div>
		</div>
		<div class="form-item" id="edit-numeroDeSoluciones-wrapper">
			<label for="edit-numeroDeSoluciones">Número de soluciones: </label>
			<input type="text" maxlength="64" name="numeroDeSoluciones" id="edit-numeroDeSoluciones" size="30" value="10" class="form-text"/>
			<div class="description">
				 Es el número de soluciones que se muestran, ordenadas de la mejor a la peor encontrada.
			</div>
		</div>
		<div class="form-item" id="edit-recomputationLevel-wrapper">
			<label for="edit-recomputationLevel">Número de ejecuciones: </label>
			<input type="text" maxlength="64" name="recomputationLevel" id="edit-recomputationLevel" size="30" value="1" class="form-text"/>
			<div class="description">
				 Ingrese el número de ejecuciones, el tiempo de ejecución se incrementa por el factor que indique aquí.
			</div>
		</div>		
		<input type="submit" name="op" id="edit-submit" value="Ejecutar" class="form-submit"/>
	</form>
</div>
<?php
}
?>
