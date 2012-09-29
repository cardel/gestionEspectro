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
	drupal_set_html_head('<script type="text/javascript" src="https://www.google.com/jsapi"></script>');
	drupal_add_css($path = 'css/estilos.css', $type = 'module', $media = 'all', $preprocess = TRUE);

	drupal_add_css($path = 'css/datatable.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'gestionEspectro/php/drupalcss/botonesEspectro.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'sites/all/libraries/jquery.ui/themes/default/ui.all.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shCore.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shBrushXml.js');
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shCore.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shThemeDefault.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	
	if(!is_dir("/var/www/html/site/gestionEspectro/entradas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/entradas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/entradasTemp/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/entradasTemp/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid, 0755);
		echo "<p class='estiloTitulo'>Aplicación gestión del espectro usando programación por restricciones</p>\n";
	echo "<p class='estilo'>Ingresar salidas XML a base de datos</p>\n";

	echo '<p style="text-align:left";><a class="iframe" href="http://avispa.univalle.edu.co/~cardel/proyInv/ayudaSecuenciamientoAviones/ayuda.php"><img border="0" src="files/HelpIcon.gif" width="50" height="50"><br/>Ayuda</a></p>';
?>

<div id="formularioHTML">
	<form action="/site/?q=node/44" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">
		<div class="form-item" id="edit-file-upload-wrapper">
			<label for="edit-file-upload">Seleccione archivo de entrada: </label>
			<input type="file" name="archivo" class="form-file" id="edit-file-upload" size="60"/>
			<input name="action" type="hidden" value="upload" />   
		</div>
		<div class="form-item" id="edit-oredefinedinput-wrapper">
			<label for="edit-oredefinedinput">Selección salida almacenada: </label>
			<select name="file" class="form-select" id="edit-oredefinedinput">
				<option value="null" selected="selected">Ninguna</option>
				<?php
					$directorio=@opendir("/var/www/html/site/gestionEspectro/salidas/".$user->uid); 
					if($directorio==false)
					{
						mkdir("/var/www/html/site/gestionEspectro/salidas/".$user->uid, 0755);
						$directorio=@opendir("/var/www/html/site/gestionEspectro/salidas/".$user->uid); 

					}		
					while ($archivo = readdir($directorio))
					{
						if(is_file("/var/www/html/site/gestionEspectro/salidas/".$user->uid."/".$archivo)) echo "<option value=\"/var/www/html/site/gestionEspectro/salidas/".$user->uid."/".$archivo."\">$archivo</option>"; 
					}	
					closedir($directorio); 
					
				 ?>
			</select>
			<div class="description">
				 Seleccione una entrada predefinida, ninguna si desea cargar un archivo.
			</div>
		</div>
		<input type="submit" name="op" id="edit-submit" value="Cargar archivo" class="form-submit"/>
	</form>
</div>

<?php

	$file=$_POST["file"];
	$accion = $_POST["action"];
	
	if($file=="null")
	{
		echo "<script language='javascript'>alert('Debe ingresar un archivo o seleccionar uno de la lista');</script>";
		$accion = "none";
		$operacion = "none";
	}	
	if($accion=="upload")
	{	
		$solucionHead = simplexml_load_file($file);
		echo "ok";
		//Insertar debe ser
		
		/*
		 * Por cada operador
		 * Depende del tipo de asignación
		 * 
		 * 1. Nacionales
		 * 2. Terrtorial
		 * 3. Departamental
		 * 4. Municipal
		 * 
		 * << Necesario consultar IDs de cada caso>>
		 */
		
	}
	
}
?>

