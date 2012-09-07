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
	drupal_add_css($path = 'css/datatable.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'css/estilos.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'sites/all/libraries/jquery.ui/themes/default/ui.all.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shCore.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shBrushXml.js');
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shCore.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shThemeDefault.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/colorBoxU.js');
	
	if(!is_dir("/var/www/html/site/gestionEspectro/entradas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/entradas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/entradasTemp/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/entradasTemp/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid, 0755);
	
?>
<p class='estiloTitulo'>Gestión de salidas XML</p>

<div id="formularioHTML">
	<form action="/site/?q=node/47" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">
		<div class="form-item" id="edit-file-upload-wrapper">
			<label for="edit-file-upload">Ingresar XML de salida: </label>
			<input type="file" name="archivo" class="form-file" id="edit-file-upload" size="60"/>
			<input name="action" type="hidden" value="upload" />   
			<br/>
			<input type="submit" name="op" id="edit-submit" value="Guardar" class="form-submit"/>
		</div>
	</form>
</div>

<?php
	
	$status=-1;
	$borrar=0;
	$accion = $_POST["action"];
	
	if ($accion == "upload") {
	
		// obtenemos los datos del archivo 
		$tamano = $_FILES["archivo"]['size'];
		$tipo = $_FILES["archivo"]['type'];
		$archivo = $_FILES["archivo"]['name'];	
		
		// guardamos el archivo a la carpeta files
		exec("rm -f /var/www/html/site/gestionEspectro/salidas/".$user->uid."/".$archivo);		
		$destino =  "/var/www/html/site/gestionEspectro/salidas/".$user->uid."/".$archivo;
		
		$file = $destino;
		if (copy($_FILES['archivo']['tmp_name'],$destino)) {
			$status = 1;
		} else {
			$status = -1;
		}

	}
	
	if($status==-1 && $borrar=0 && $accion == "upload")
	{
		echo "<script language='javascript'>alert('Debe ingresar un archivo o seleccionar uno de la lista');</script>";
	}
	
	if($status==1 && $accion == "upload")	echo "<script language='javascript'>alert('Archivo almacenado correctamente');</script>";
	
    echo "<p class='estilo'>Archivos de salidas en el sistema</p>\n";
    echo "<table width='100%' id='tabla1' class='tabla' border='1'>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Archivo</th>\n";
	echo "<th>Visualizar</th>\n";
	echo "<th>Acción</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";
	$directorio=@opendir("/var/www/html/site/gestionEspectro/salidas/".$user->uid); 
	if($directorio==false)
	{
		mkdir("/var/www/html/site/gestionEspectro/salidas/".$user->uid, 0755);
		$directorio=@opendir("/var/www/html/site/gestionEspectro/salidas/".$user->uid); 

	}		
	while ($archivo = readdir($directorio))
	{		
		if(is_file("/var/www/html/site/gestionEspectro/salidas/".$user->uid."/".$archivo))
		{
			echo "<tr>\n";
			echo "<td>$archivo</td>\n";
			echo "<td><a href=\"#\" onClick=\"window.open('"."http://avispa.univalle.edu.co/site/gestionEspectro/salidas/".$user->uid."/".$archivo."' ,'_blank ','toolbar=1,menubar=1,width=500,height=600');\"> Ver </a>\n";
			echo "<td><a href=\"http://avispa.univalle.edu.co/site/gestionEspectro/php/borrarArchivo.php?archivo=/var/www/html/site/gestionEspectro/salidas/".$user->uid."/".$archivo."&&lugar=2\">Borrar</a></td>\n";
			echo "</tr>\n";
		}
	}	
	
	echo "</tbody>\n";
    echo "</table>\n";
	closedir($directorio); 
}
?>

