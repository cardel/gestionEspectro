<?php
	jquery_ui_add('ui.tabs');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'dataTables/media/js/jquery.dataTables.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/jtables.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/tabsAppSum.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/appEspectro.js');
	drupal_set_html_head('<script type="text/javascript" src="https://www.google.com/jsapi"></script>');
	drupal_add_css($path = 'css/datatable.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'gestionEspectro/php/drupalcss/botonesEspectro.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'sites/all/libraries/jquery.ui/themes/default/ui.all.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shCore.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shBrushXml.js');
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shCore.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shThemeDefault.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/colorBoxU.js');

	echo '<p style="text-align:left";><a class="iframe" href="http://avispa.univalle.edu.co/~cardel/proyInv/ayudaSecuenciamientoAviones/ayuda.php"><img border="0" src="files/HelpIcon.gif" width="50" height="50"><br/>Ayuda</a></p>';

	global $user;
	$status = "";
	$accion = $_POST["action"];
	$operacion = $_POST["op"];

	$prefijo = substr(md5(uniqid(rand())),0,6);
	
	if(!is_dir("/var/www/html/site/gestionEspectro/entradas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/entradas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid, 0755);
		
	$file = $_POST["oredefinedinput"];
	
	if ($file=="null" && $_FILES["archivo"]['name']=="")
	{
		echo "<script language='javascript'>alert('Debe ingresar un archivo o seleccionar uno de la lista');</script>";
		$accion = "none";
		$operacion = "none";
	}
	
	if ($accion == "upload" && $file=="null") {
	
		// obtenemos los datos del archivo 
		$tamano = $_FILES["archivo"]['size'];
		$tipo = $_FILES["archivo"]['type'];
		$archivo = $_FILES["archivo"]['name'];
		
		if ($archivo != "") {
			// guardamos el archivo a la carpeta files
			$destino =  "/var/www/html/site/gestionEspectro/entradas/".$user->uid."/".$archivo;
			$file = $destino;
			if (copy($_FILES['archivo']['tmp_name'],$destino)) {
				$status = "Archivo subido: <b>".$archivo."</b>";
			} else {
				$status = "Error al subir el archivo";
			}
		} else {			
			$status = "Error al subir archivo";
		}
	}

	echo $status;
	//Variables para todas las iteracciones
	$motor = $_POST["motor"];
	$estrategia = $_POST["estrategia"];
	$numeroIteracciones = $_POST["numIter"];
	$pesoNumeroBloques = $_POST["pesoNumeroBloques"];
	$pesoCanalesLibres = $_POST["pesoCanalesLibres"];
	$pesoCanalesInutiles = $_POST["pesoCanalesInutiles"];
	$recomputationLevel = $_POST["recomputationLevel"];
	$executionTime = $_POST["executionTime"]*1000;
	$numeroDeSoluciones = $_POST["numeroDeSoluciones"];

	$noSepit1 = $_POST["noSepit1"];
	$noconsidTopeit1 = $_POST["noconsidTopeit1"];
	$noMantenerSepit1 = $_POST["noMantenerSepit1"];
	$numerOpeCanalit1 = $_POST["numerOpeCanalit1"];

	$noSepit2 = $_POST["noSepit2"];
	$noconsidTopeit2 = $_POST["noconsidTopeit2"];
	$noMantenerSepit2 = $_POST["noMantenerSepit2"];
	$numerOpeCanalit2 = $_POST["numerOpeCanalit2"];

	$noSepit3 = $_POST["noSepit3"];
	$noconsidTopeit3 = $_POST["noconsidTopeit3"];
	$noMantenerSepit3 = $_POST["noMantenerSepit3"];
	$numerOpeCanalit3 = $_POST["numerOpeCanalit3"];

	$noSepit4 = $_POST["noSepit4"];
	$noconsidTopeit4 = $_POST["noconsidTopeit4"];
	$noMantenerSepit4 = $_POST["noMantenerSepit4"];
	$numerOpeCanalit4 = $_POST["numerOpeCanalit4"];

	$noSepit5 = $_POST["noSepit5"];
	$noconsidTopeit5 = $_POST["noconsidTopeit5"];
	$noMantenerSepit5 = $_POST["noMantenerSepit5"];
	$numerOpeCanalit5 = $_POST["numerOpeCanalit5"];

	$noSepit6 = $_POST["noSepit6"];
	$noconsidTopeit6 = $_POST["noconsidTopeit6"];
	$noMantenerSepit6 = $_POST["noMantenerSepit6"];
	$numerOpeCanalit6 = $_POST["numerOpeCanalit6"];


	if ($noSepit1!=1) $noSepit1=0;
	if ($noconsidTopeit1!=1) $noconsidTopeit1=0;
	if ($noMantenerSepit1!=1) $noMantenerSepit1=0;

	if ($noSepit2!=1) $noSepit2=0;
	if ($noconsidTopeit2!=1) $noconsidTopeit2=0;
	if ($noMantenerSepit2!=1) $noMantenerSepit2=0;

	if ($noSepit3!=1) $noSepit3=0;
	if ($noconsidTopeit3!=1) $noconsidTopeit3=0;
	if ($noMantenerSepit3!=1) $noMantenerSepit3=0;

	if ($noSepit4!=1) $noSepit4=0;
	if ($noconsidTopeit4!=1) $noconsidTopeit4=0;
	if ($noMantenerSepit4!=1) $noMantenerSepit4=0;

	if ($noSepit5!=1) $noSepit5=0;
	if ($noconsidTopeit5!=1) $noconsidTopeit5=0;
	if ($noMantenerSepit5!=1) $noMantenerSepit5=0;

	if ($noSepit6!=1) $noSepit6=0;
	if ($noconsidTopeit6!=1) $noconsidTopeit6=0;
	if ($noMantenerSepit6!=1) $noMantenerSepit6=0;
	
	$outputit1="/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it1.xml";
	$outputit2="/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it2.xml";
	$outputit3="/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it3.xml";
	$outputit4="/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it4.xml";
	$outputit5="/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it5.xml";
	$outputit6="/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it6.xml";
	
	if($operacion == "Ejecutar")
	{		
		//Cambiar variables de entorno
		$saved = getenv("PATH");
		$newld = "/home/avispa/mozart-1.4.0/bin:/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin:/root/bin";
		if ($saved) { $newld .= ":$saved"; }
		putenv("PATH=$newld");
		
		switch($numeroIteracciones)
		{
				case 1:
					 
					 exec("./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit1 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit1 --nsep=$noSepit1 --ntope=$noconsidTopeit1 --nopc=$numerOpeCanalit1");
					break;
				case 2:
					exec("./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit1 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit1 --nsep=$noSepit1 --ntope=$noconsidTopeit1 --nopc=$numerOpeCanalit1 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit2 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit2 --nsep=$noSepit2 --ntope=$noconsidTopeit2 --nopc=$numerOpeCanalit2");
					break;
				case 3:
					exec("./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit1 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit1 --nsep=$noSepit1 --ntope=$noconsidTopeit1 --nopc=$numerOpeCanalit1 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit2 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit2 --nsep=$noSepit2 --ntope=$noconsidTopeit2 --nopc=$numerOpeCanalit2 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit3 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit3 --nsep=$noSepit3 --ntope=$noconsidTopeit3 --nopc=$numerOpeCanalit3");
					break;
				case 4:
					exec("./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit1 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit1 --nsep=$noSepit1 --ntope=$noconsidTopeit1 --nopc=$numerOpeCanalit1 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit2 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit2 --nsep=$noSepit2 --ntope=$noconsidTopeit2 --nopc=$numerOpeCanalit2 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit3 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit3 --nsep=$noSepit3 --ntope=$noconsidTopeit3 --nopc=$numerOpeCanalit3 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit4 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit4 --nsep=$noSepit4 --ntope=$noconsidTopeit4 --nopc=$numerOpeCanalit4");
					break;
				case 5:
					exec("./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit1 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit1 --nsep=$noSepit1 --ntope=$noconsidTopeit1 --nopc=$numerOpeCanalit1 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit2 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit2 --nsep=$noSepit2 --ntope=$noconsidTopeit2 --nopc=$numerOpeCanalit2 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit3 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit3 --nsep=$noSepit3 --ntope=$noconsidTopeit3 --nopc=$numerOpeCanalit3 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit4 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit4 --nsep=$noSepit4 --ntope=$noconsidTopeit4 --nopc=$numerOpeCanalit4 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit5 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit5 --nsep=$noSepit5 --ntope=$noconsidTopeit5 --nopc=$numerOpeCanalit5");
				case 6:
					exec("./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit1 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit1 --nsep=$noSepit1 --ntope=$noconsidTopeit1 --nopc=$numerOpeCanalit1 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit2 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit2 --nsep=$noSepit2 --ntope=$noconsidTopeit2 --nopc=$numerOpeCanalit2 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit3 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit3 --nsep=$noSepit3 --ntope=$noconsidTopeit3 --nopc=$numerOpeCanalit3 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit4 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit4 --nsep=$noSepit4 --ntope=$noconsidTopeit4 --nopc=$numerOpeCanalit4 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit5 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit5 --nsep=$noSepit5 --ntope=$noconsidTopeit5 --nopc=$numerOpeCanalit5 & ./gestionEspectro/TGAplicacion/AplicacionAsignacionDelEspectro.exe --motor=$motor --f=$file --pnb=$pesoNumeroBloques  --psm=$pesoCanalesLibres --pnc=$pesoCanalesInutiles --es=$estrategia --tm=$executionTime --o=$outputit6 --rc=$recomputationLevel --ns=$numeroDeSoluciones --nmas=$noMantenerSepit6 --nsep=$noSepit6 --ntope=$noconsidTopeit6 --nopc=$numerOpeCanalit6");
					break;
				default:
					break;	
		}
	
		putenv("PATH=$saved");
		mostrarResultados($numeroIteracciones,$outputit1,$outputit2,$outputit3,$outputit4,$outputit5,$outputit6);
	}

	function mostrarResultados($numIt, $out1, $out2, $out3, $out4, $out5, $out6)
	{

		echo '<div id="tabs" class="tabs" style="width:100%;">';
		
		echo '<ul>';
		if($numIt>0) echo '<li><a href="#tabs-1">Iteración 1</a></li>';
		if($numIt>1) echo '<li><a href="#tabs-2">Iteración 2</a></li>';
		if($numIt>2) echo '<li><a href="#tabs-3">Iteración 3</a></li>';
		if($numIt>3) echo '<li><a href="#tabs-4">Iteración 4</a></li>';
		if($numIt>4) echo '<li><a href="#tabs-5">Iteración 5</a></li>';
		if($numIt>5) echo '<li><a href="#tabs-6">Iteración 6</a></li>';
		echo '</ul>';
				
		//Iteraccion 1
		if($numIt>0)
		{
			echo '<div id="tabs-1">';
			echo $file;
			$solucion = simplexml_load_file($out1);
			 
			$head = $solucion->head; 
			$numeroDeSolucionesEncontradas = $head->numSolutions;
			
			$numeroDeOperadores = $head->operatorsNumber;
			$numeroDeCanales = $head->channelsNumber;
			?>
			<script language="javascript">
			function headit1(){
				var file = '<?php echo $out1; ?>';
				var fileXML = '<?php echo "site/gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it1.xml"; ?>';
				$.post("gestionEspectro/php/encabezado.php", { file: file }, function(data){
					$("#headit1").html(data);
				});         
			}
			headit1();
			</script>
			<div id="headit1"></div>
				
			<?php
			
			echo "<p class='estilo'>Soluciones</p>\n";
			echo "<select id=\"selectit1\">";
			for($i=0; $i<$numeroDeSolucionesEncontradas; $i++)
			{
					echo "<option value=\"".$i."\">Solución #".$i."</option>";
			}
			echo "</select>";
			?>
			<a href="#" onclick="javascript:recargarit1();"> Mostrar solución </a>
			
			<script language="javascript">
			function recargarit1(){    
				var selector = $('#selectit1').val();
				var file = '<?php echo $out1; ?>';

				$.post("gestionEspectro/php/iteraccion.php", { opcSelec: selector, file: file }, function(data){
					$("#mostrarSolIt1").html(data);
				});         
			}
			</script>			

			<div id="mostrarSolIt1"></div>

			<?php
			echo "</p>\n";
			echo "</div>\n";

		}
		
		if($numIt>1)
		{
			echo '<div id="tabs-2">';
			$solucion = simplexml_load_file($out2);
			 
			$head = $solucion->head; 
			$numeroDeSolucionesEncontradas = $head->numSolutions;
			
			$numeroDeOperadores = $head->operatorsNumber;
			$numeroDeCanales = $head->channelsNumber;
			?>
			<script language="javascript">
			function headit2(){
				var file = '<?php echo $out2; ?>';
				var fileXML = '<?php echo "site/gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it2.xml"; ?>';
				$.post("gestionEspectro/php/encabezado.php", { file: file }, function(data){
					$("#headit2").html(data);
				});         
			}
			headit2();
			</script>	
			<div id="headit2"></div>
				
			<?php
			
			echo "<p class='estilo'>Soluciones</p>\n";
			echo "<select id=\"selectit2\">";
			for($i=0; $i<$numeroDeSolucionesEncontradas; $i++)
			{
					echo "<option value=\"".$i."\">Solución #".$i."</option>";
			}
			echo "</select>";
			?>
			<a href="#" onclick="javascript:recargarit2();"> Mostrar solución </a>
			
			<script language="javascript">
			function recargarit2(){    
				var selector = $('#selectit2').val();
				var file = '<?php echo $out2; ?>';
				$.post("gestionEspectro/php/iteraccion.php", { opcSelec: selector, file: file }, function(data){
					$("#mostrarSolIt2").html(data);
				});         
			}
			</script>			

			<div id="mostrarSolIt2"></div>

			<?php
			echo "</p>\n";
			echo "</div>\n";
		}
		
		if($numIt>2)
		{
			echo '<div id="tabs-3">';
			$solucion = simplexml_load_file($out3);
			$head = $solucion->head; 
			$numeroDeSolucionesEncontradas = $head->numSolutions;
			
			$numeroDeOperadores = $head->operatorsNumber;
			$numeroDeCanales = $head->channelsNumber;
			?>
			<script language="javascript">
			function headit3(){
				var file = '<?php echo $out3; ?>';
				var fileXML = '<?php echo "site/gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it3.xml"; ?>';
				$.post("gestionEspectro/php/encabezado.php", { file: file }, function(data){
					$("#headit3").html(data);
				});         
			}
			headit3();
			</script>	
			<div id="headit3"></div>
				
			<?php
			
			echo "<p class='estilo'>Soluciones</p>\n";
			echo "<select id=\"selectit3\">";
			for($i=0; $i<$numeroDeSolucionesEncontradas; $i++)
			{
					echo "<option value=\"".$i."\">Solución #".$i."</option>";
			}
			echo "</select>";
			?>
			<a href="#" onclick="javascript:recargarit3();"> Mostrar solución </a>
			
			<script language="javascript">
			function recargarit3(){    
				var selector = $('#selectit3').val();
				var file = '<?php echo $out3; ?>';

				$.post("gestionEspectro/php/iteraccion.php", { opcSelec: selector, file: file }, function(data){
					$("#mostrarSolIt3").html(data);
				});         
			}
			</script>			

			<div id="mostrarSolIt3"></div>

			<?php
			echo "</p>\n";
			echo "</div>\n";
		}
		if($numIt>3)
		{
			echo '<div id="tabs-4">';
			$solucion = simplexml_load_file($out4);
			 
			$head = $solucion->head; 
			$numeroDeSolucionesEncontradas = $head->numSolutions;
			
			$numeroDeOperadores = $head->operatorsNumber;
			$numeroDeCanales = $head->channelsNumber;
			?>
			<script language="javascript">
			function headit4(){
				var file = '<?php echo $out4; ?>';
				var fileXML = '<?php echo "site/gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it4.xml"; ?>';
				$.post("gestionEspectro/php/encabezado.php", { file: file }, function(data){
					$("#headit4").html(data);
				});         
			}
			headit4();
			</script>	
			<div id="headit4"></div>
				
			<?php
			
			echo "<p class='estilo'>Soluciones</p>\n";
			echo "<select id=\"selectit2\">";
			for($i=0; $i<$numeroDeSolucionesEncontradas; $i++)
			{
					echo "<option value=\"".$i."\">Solución #".$i."</option>";
			}
			echo "</select>";
			?>
			<a href="#" onclick="javascript:recargarit4();"> Mostrar solución </a>
			
			<script language="javascript">
			function recargarit4(){    
				var selector = $('#selectit4').val();
				var file = '<?php echo $out4; ?>';
				$.post("gestionEspectro/php/iteraccion.php", { opcSelec: selector, file: file }, function(data){
					$("#mostrarSolIt4").html(data);
				});         
			}
			</script>			

			<div id="mostrarSolIt4"></div>

			<?php
			echo "</p>\n";
			echo "</div>\n";
		}
		if($numIt>4)
		{
			echo '<div id="tabs-5">';
			$solucion = simplexml_load_file($out5);
			 
			$head = $solucion->head; 
			$numeroDeSolucionesEncontradas = $head->numSolutions;
			
			$numeroDeOperadores = $head->operatorsNumber;
			$numeroDeCanales = $head->channelsNumber;
			?>
			<script language="javascript">
			function headit5(){
				var file = '<?php echo $out5; ?>';
				var fileXML = '<?php echo "site/gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it5.xml"; ?>';
				$.post("gestionEspectro/php/encabezado.php", { file: file }, function(data){
					$("#headit5").html(data);
				});         
			}
			headit5();
			</script>	
			<div id="headit5"></div>
				
			<?php
			echo "<p class='estilo'>Soluciones</p>\n";
			echo "<select id=\"selectit5\">";
			for($i=0; $i<$numeroDeSolucionesEncontradas; $i++)
			{
					echo "<option value=\"".$i."\">Solución #".$i."</option>";
			}
			echo "</select>";
			?>
			<a href="#" onclick="javascript:recargarit5();"> Mostrar solución </a>
			
			<script language="javascript">
			function recargarit5(){    
				var selector = $('#selectit5').val();
				var file = '<?php echo $out5; ?>';

				$.post("gestionEspectro/php/iteraccion.php", { opcSelec: selector, file: file }, function(data){
					$("#mostrarSolIt5").html(data);
				});         
			}
			</script>			

			<div id="mostrarSolIt5"></div>

			<?php
			echo "</p>\n";
			echo "</div>\n";
		}
		if($numIt>5)
		{
			echo '<div id="tabs-6">';
			$solucion = simplexml_load_file($out6);
			 
			$head = $solucion->head; 
			$numeroDeSolucionesEncontradas = $head->numSolutions;
			
			$numeroDeOperadores = $head->operatorsNumber;
			$numeroDeCanales = $head->channelsNumber;

			?>
			<script language="javascript">
			function headit6(){
				var file = '<?php echo $out6; ?>';
				var fileXML = '<?php echo "site/gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it6.xml"; ?>';
				$.post("gestionEspectro/php/encabezado.php", { file: file }, function(data){
					$("#headit6").html(data);
				});         
			}
			headit6()
			</script>	
			<div id="headit6"></div>			
				
			<?php
			echo "<p class='estilo'>Soluciones</p>\n";
			echo "<select id=\"selectit6\">";
			for($i=0; $i<$numeroDeSolucionesEncontradas; $i++)
			{
					echo "<option value=\"".$i."\">Solución #".$i."</option>";
			}
			echo "</select>";
			?>
			<a href="#" onclick="javascript:recargarit6();"> Mostrar solución </a>
			
			<script language="javascript">
			function recargarit6(){    
				var selector = $('#selectit6').val();
				var file = '<?php echo $out6; ?>';
				$.post("gestionEspectro/php/iteraccion.php", { opcSelec: selector, file: file }, function(data){
					$("#mostrarSolIt6").html(data);
				});         
			}
			</script>			

			<div id="mostrarSolIt6"></div>

			<?php
			echo "</p>\n";
			echo "</div>\n";	
		}
	}
?>
<div id="formularioHTML">
	<form action="/site/?q=node/40" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">
		<div class="form-item" id="edit-file-upload-wrapper">
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
		<div class="form-item" id="edit-estretegia-busqueda-wrapper">
			<label for="edit-estretegia-busqueda">Selección motor de búsqueda:</label>
			<select name="motor" class="form-select" id="edit-estretegia-busqueda">
				<option value="2" selected="selected">Mejor costo</option>
				<option value="3">Mejor por tamaño de bloque libre</option>
				<option value="4">Mejor por número de bloques de asignados</option>
				<option value="5">Mejor por número de canales inútiles</option>
				<option value="1">Ninguna</option>
			</select>
			<div class="description">
				 Escoja el motor de búsqueda.
			</div>
		</div>
		<div class="form-item" id="edit-feed-item-length-wrapper">
			<label for="edit-feed-item-length">Selección estrategia distribución: </label>
			<select name="estrategia" class="form-select" id="edit-feed-item-length">
				<option value="1" selected="selected">Asignar primero al inicio de la banda</option>
				<option value="2">Asignar primero al final de la banda</option>
				<option value="3">Asignar primero al inicio de la banda a operadores con asignación</option>
				<option value="4">Asignar primero al final de la banda a operadores con asignación</option>
				<option value="5">Asignar primero al inicio de la banda a operadores sin asignación</option>
				<option value="6">Asignar primero al final de la banda a operadores sin asignación</option>
				<option value="7">Asignar primero al inicio de la banda a operadores con mayores requerimientos</option>
				<option value="8">Asignar primero al final de la banda a operadores con mayores requerimientos</option>
				<option value="9">Asignar primero al inicio de la banda a operadores con menores requerimientos</option>
				<option value="10">Asignar primero al final de la banda a operadores con menores requerimientos</option>
			</select>
			<div class="description">
				 Escoja la distribución de búsqueda con se realizará la solución del problema.
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
			<label for="edit-executionTime">Tiempo de ejecución: </label>
			<input type="text" maxlength="64" name="executionTime" id="edit-executionTime" size="30" value="3" class="form-text"/>
			<div class="description">
				 Ingrese el tiempo de ejecución máximo en segundos (s)
			</div>
		</div>
		<div class="form-item" id="edit-numeroDeSoluciones-wrapper">
			<label for="edit-numeroDeSoluciones">Número máximo de soluciones por iteracción: </label>
			<input type="text" maxlength="64" name="numeroDeSoluciones" id="edit-numeroDeSoluciones" size="30" value="10" class="form-text"/>
			<div class="description">
				 Número de soluciones
			</div>
		</div>
		<div class="form-item" id="edit-recomputationLevel-wrapper">
			<label for="edit-recomputationLevel">Nivel de recomputación: </label>
			<input type="text" maxlength="64" name="recomputationLevel" id="edit-recomputationLevel" size="30" value="1" class="form-text"/>
			<div class="description">
				 Ingrese el nivel de recomputación
			</div>
		</div>
		<p style='text-align:center; font-size:18px'>
			 Fortaleza/Debilidad restricciones
		</p>
		<div>
			 Seleccione el número de iteracciones que desea realizar:
			<select name="numIter" id="selectNumIter">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
			</select>
		</div>
		<table width="100%">
		<tr>
			<td width="50%" bgcolor="#AE8EE6">
				<div id="it1">
					<p style='text-align:center; font-size:18px'>
						 Iteracción 1
					</p>
					<div class="form-item" id="edit-propCostos-wrapper">
						<label class="option" for="edit-propCostos">
						<input type="checkbox" name="noSepit1" id="edit-propCostos" value="1"  class="form-checkbox"/> No considerar separación.</label>
					</div>
					<div class="form-item" id="edit-restriTec-wrapper">
						<label class="option" for="edit-restriTec"><input type="checkbox" name="noconsidTopeit1" id="edit-restriTec" value="1" class="form-checkbox"/> No considerar tope.</label>
					</div>
					<div class="form-item" id="edit-frec-wrapper">
						<label class="option" for="edit-frec">
						<input type="checkbox" name="noMantenerSepit1" id="edit-frec" value="1" class="form-checkbox"/> Canales en operadores que solicitan asignación se pueden mover.</label>
					</div>
					<div class="form-item" id="edit-numerOperadores-wrapper">
						<label for="edit-numerOperadores">Número de operadores por canal: </label>
						<input type="text" maxlength="64" name="numerOpeCanalit1" default="1" id="edit-numerOperadores" value="1" size="30" class="form-text"/>
						<div class="description"> Número de operadores por canal (en casos especiales > 1)</div>
					</div>
				</div>
			</td>
			<td width="50%" style="text-align:right" bgcolor="#AE8EE6">
				<div id="it2" style="display:none">
					<p style='text-align:center; font-size:18px'>
						 Iteracción 2
					</p>
					<div class="form-item" id="edit-propCostos-wrapper">
						<label class="option" for="edit-propCostos"><input type="checkbox" name="noSepit2" id="edit-propCostos" value="1" class="form-checkbox"/> No considerar separación.</label>
					</div>
					<div class="form-item" id="edit-restriTec-wrapper">
						<label class="option" for="edit-restriTec"><input type="checkbox" name="noconsidTopeit2" id="edit-restriTec" value="1" class="form-checkbox"/> No considerar tope.</label>
					</div>
					<div class="form-item" id="edit-frec-wrapper">
						<label class="option" for="edit-frec"><input type="checkbox" name="noMantenerSepit2" id="edit-frec" value="1" class="form-checkbox"/> Canales en operadores que solicitan asignación se pueden mover.</label>
					</div>
					<div class="form-item" id="edit-numerOperadores-wrapper">
						<label for="edit-numerOperadores">Número de operadores por canal: </label>
						<input type="text" maxlength="64" name="numerOpeCanalit2" id="edit-numerOperadores" size="30" value="1" class="form-text"/>
						<div class="description">
							 Número de operadores por canal (en casos especiales > 1)
						</div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td width="50%" bgcolor="#A9E68E">
				<div id="it3" style="display:none">
					<p style='text-align:center; font-size:18px'>
						 Iteracción 3
					</p>
					<div class="form-item" id="edit-propCostos-wrapper">
						<label class="option" for="edit-propCostos"><input type="checkbox" name="noSepit3" id="edit-propCostos" value="1" class="form-checkbox"/> No considerar separación.</label>
					</div>
					<div class="form-item" id="edit-restriTec-wrapper">
						<label class="option" for="edit-restriTec"><input type="checkbox" name="noconsidTopeit3" id="edit-restriTec" value="1" class="form-checkbox"/> No considerar tope.</label>
					</div>
					<div class="form-item" id="edit-frec-wrapper">
						<label class="option" for="edit-frec"><input type="checkbox" name="noMantenerSepit3" id="edit-frec" value="1" class="form-checkbox"/> Canales en operadores que solicitan asignación se pueden mover.</label>
					</div>
					<div class="form-item" id="edit-numerOperadores-wrapper">
						<label for="edit-numerOperadores">Número de operadores por canal: </label>
						<input type="text" maxlength="64" name="numerOpeCanalit3" id="edit-numerOperadores" size="30" value="1" class="form-text"/>
						<div class="description">
							 Número de operadores por canal (en casos especiales > 1)
						</div>
					</div>
				</div>
			</td>
			<td width="50%" style="text-align:right" bgcolor="#A9E68E">
				<div id="it4" style="display:none">
					<p style='text-align:center; font-size:18px'>
						 Iteracción 4
					</p>
					<div class="form-item" id="edit-propCostos-wrapper">
						<label class="option" for="edit-propCostos"><input type="checkbox" name="noSepit4" id="edit-propCostos" value="1" class="form-checkbox"/> No considerar separación.</label>
					</div>
					<div class="form-item" id="edit-restriTec-wrapper">
						<label class="option" for="edit-restriTec"><input type="checkbox" name="noconsidTopeit4" id="edit-restriTec" value="1" class="form-checkbox"/> No considerar tope.</label>
					</div>
					<div class="form-item" id="edit-frec-wrapper">
						<label class="option" for="edit-frec"><input type="checkbox" name="noMantenerSepit4" id="edit-frec" value="1" class="form-checkbox"/> Canales en operadores que solicitan asignación se pueden mover.</label>
					</div>
					<div class="form-item" id="edit-numerOperadores-wrapper">
						<label for="edit-numerOperadores">Número de operadores por canal: </label>
						<input type="text" maxlength="64" name="numerOpeCanalit4" id="edit-numerOperadores" size="30" value="1" class="form-text"/>
						<div class="description">
							 Número de operadores por canal (en casos especiales > 1)
						</div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td width="50%" bgcolor="#E6DB8E">
				<div id="it5" style="display:none">
					<p style='text-align:center; font-size:18px'>
						 Iteracción 5
					</p>
					<div class="form-item" id="edit-propCostos-wrapper">
						<label class="option" for="edit-propCostos"><input type="checkbox" name="noSepit5" id="edit-propCostos" value="1" class="form-checkbox"/> No considerar separación.</label>
					</div>
					<div class="form-item" id="edit-restriTec-wrapper">
						<label class="option" for="edit-restriTec"><input type="checkbox" name="noconsidTopeit5" id="edit-restriTec" value="1" class="form-checkbox"/> No considerar tope.</label>
					</div>
					<div class="form-item" id="edit-frec-wrapper">
						<label class="option" for="edit-frec"><input type="checkbox" name="noMantenerSepit5" id="edit-frec" value="1" class="form-checkbox"/> Canales en operadores que solicitan asignación se pueden mover.</label>
					</div>
					<div class="form-item" id="edit-numerOperadores-wrapper">
						<label for="edit-numerOperadores">Número de operadores por canal: </label>
						<input type="text" maxlength="64" name="numerOpeCanalit5" id="edit-numerOperadores" size="30" value="1" class="form-text"/>
						<div class="description">
							 Número de operadores por canal (en casos especiales > 1)
						</div>
					</div>
				</div>
			</td>
			<td width="50%" style="text-align:right" bgcolor="#E6DB8E">
				<div id="it6" style="display:none">
					<p style='text-align:center; font-size:18px'>
						 Iteracción 6
					</p>
					<div class="form-item" id="edit-propCostos-wrapper">
						<label class="option" for="edit-propCostos"><input type="checkbox" name="noSepit6" id="edit-propCostos" value="1" class="form-checkbox"/> No considerar separación.</label>
					</div>
					<div class="form-item" id="edit-restriTec-wrapper">
						<label class="option" for="edit-restriTec"><input type="checkbox" name="noconsidTopeit6" id="edit-restriTec" value="1" class="form-checkbox"/> No considerar tope.</label>
					</div>
					<div class="form-item" id="edit-frec-wrapper">
						<label class="option" for="edit-frec"><input type="checkbox" name="noMantenerSepit6" id="edit-frec" value="1" class="form-checkbox"/> Canales en operadores que solicitan asignación se pueden mover.</label>
					</div>
					<div class="form-item" id="edit-numerOperadores-wrapper">
						<label for="edit-numerOperadores">Número de operadores por canal: </label>
						<input type="text" maxlength="64" name="numerOpeCanalit6" id="edit-numerOperadores" size="30" value="1" class="form-text"/>
						<div class="description">
							 Número de operadores por canal (en casos especiales > 1)
						</div>
					</div>
				</div>
			</td>
		</tr>
		</table>
		<input type="submit" name="op" id="edit-submit" value="Ejecutar" class="form-submit"/>
	</form>
</div>
