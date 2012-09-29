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
	
?>
<p class='estiloTitulo'>Gestión entradas, salidas y base de datos espectro radioeléctrico</p>
<p style="text-align:center;"><a href="http://avispa.univalle.edu.co/site"><img src="http://avispa.univalle.edu.co/site/gestionEspectro/php/drupalimages/EspectroAPP.png" width="600 height="220"></a></p>
<p>
	En este módulo usted podrá administrar las entradas del sistema y la base de datos de gestión del espectro radioeléctrico en Colombia.
	<ul>
		<li><a href="http://avispa.univalle.edu.co/site/?q=node/39">Consultas a base de datos:</a> Realice consultas básicas a la base de datos de gestión del espectro</li>
		<li><a href="http://avispa.univalle.edu.co/site/?q=node/41">Gestion operadores:</a>Administre los operadores en la base de datos de gestión del espectro</li>
		<li><a href="http://avispa.univalle.edu.co/site/?q=node/45">Gestión servicios:</a> Cree y edite servicios que se prestan en el medio electromagnético</li>
		<li><a href="http://avispa.univalle.edu.co/site/?q=node/46">Gestión rangos de frecuencia:</a> Gestione los rangos de frecuencia asociados a una banda de frecuencia, en cada rango se asignan canales y se especifica que servicios se prestan en cada uno</li>
		<li><a href="http://avispa.univalle.edu.co/site/?q=node/47">Gestión entradas XML:</a> Administre las entradas XML almacenadas en el sistema</li>
		<li><a href="http://avispa.univalle.edu.co/site/?q=node/48">Gestión salidas XML:</a> Realice la gestión de las salidas XML de la aplicación de gestión del espectro almacenadas en el sistema</li>
	</ul>
</p>
<?php
}
?>
