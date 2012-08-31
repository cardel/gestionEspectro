<?php
global $user;

function mostrarResultados($out1, $prefijo)
{
	global $user;
		
	//Iteraccion 1

	echo $file;
	$solucion = simplexml_load_file($out1);
	 
	$head = $solucion->head; 
	$numeroDeSolucionesEncontradas = $head->numSolutions;
	
	$numeroDeOperadores = $head->operatorsNumber;
	$numeroDeCanales = $head->channelsNumber;
	?>
	<script language="javascript">
	function botonGuardarXMLIt1(){
		var file = '<?php echo $out1; ?>';
		var nombreArchivo = prompt("Ingrese el nombre con que se va guardar el archivo","salidaIT1.xml");
		if(nombreArchivo){
			$.post("gestionEspectro/php/almacenarArchivo.php", { file : file, nombreArchivo: nombreArchivo, userID : '<?php echo $user->uid; ?>' }, function(data){
				$('#botonGuardarXMLIt1').attr('disabled','-1');
				$('#botonGuardarXMLIt1').attr("class","deshabilitado");
			});
		} 
	}
	</script>
	<script language="javascript">
	function headit1(){
		var file = '<?php echo $out1; ?>';
		var fileXML = '<?php echo "gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it1.xml"; ?>';
		$.post("gestionEspectro/php/encabezadoGenetico.php", { file: file, fileXML: fileXML, botonXML: 'botonGuardarXMLIt1' }, function(data){
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

		$.post("gestionEspectro/php/iteraccionGenetico.php", { opcSelec: selector, file: file }, function(data){
			$("#mostrarSolIt1").html(data);
		});         
	}
	</script>			

	<div id="mostrarSolIt1"></div>

	<?php
	echo "</p>\n";



	echo "<input type=button id=\"accionFormulario\" class=\"botonrojo\" value=\"Mostrar formulario\" onclick=\"mostrarOcultar();\"/>\n";
	?>
	<script language="javascript">
	function ocultarForm(){
		document.getElementById("formularioHTML").style.display='none'; 
	}
	window.onload = function(){	ocultarForm();}
	
	function mostrarOcultar()
	{
		if(document.getElementById("formularioHTML").style.display=='block')
		{
			document.getElementById("formularioHTML").style.display='none'; 
			document.getElementById("accionFormulario").value = "Mostrar formulario";

		}
		else
		{
			document.getElementById("accionFormulario").value = "Ocultar formulario";
			document.getElementById("formularioHTML").style.display='block'; 			
		}
	}
	</script>	
	<?php	
}

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

	$status = -1;
	$accion = $_POST["action"];
	$operacion = $_POST["op"];

	$prefijo = substr(md5(uniqid(rand())),0,6);
	
	if(!is_dir("/var/www/html/site/gestionEspectro/entradas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/entradas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/entradasTemp/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/entradasTemp/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid, 0755);
	
	$file = $_POST["oredefinedinput"];
	
	if ($accion == "upload") {
	
		// obtenemos los datos del archivo 
		$tamano = $_FILES["archivo"]['size'];
		$tipo = $_FILES["archivo"]['type'];
		$archivo = $_FILES["archivo"]['name'];
		
		if ($archivo != "") {
			// guardamos el archivo a la carpeta files
			exec("rm -f /var/www/html/site/gestionEspectro/entradas/".$user->uid."/".$archivo);
			
			$destino =  "/var/www/html/site/gestionEspectro/entradas/".$user->uid."/".$archivo;
			$file = $destino;
			if (copy($_FILES['archivo']['tmp_name'],$destino)) {
				$status = 1;
			} else {
				$status = -1;
			}
		} else {			
			$status = -1;
		}
	}
	
	if ($status==-1 && $file=="null")
	{
		echo "<script language='javascript'>alert('Debe ingresar un archivo o seleccionar uno de la lista');</script>";
		$accion = "none";
		$operacion = "none";
	}	
	//Variables para todas las iteracciones
	$pesoNumeroBloques = $_POST["pesoNumeroBloques"];
	$pesoCanalesLibres = $_POST["pesoCanalesLibres"];
	$pesoCanalesInutiles = $_POST["pesoCanalesInutiles"];
	$executionTime = $_POST["executionTime"];
	$numeroDeSoluciones = $_POST["numeroDeSoluciones"];
	$probabilidadCruce = $_POST["probabilidadCruce"];
	$probabilidadMutacion = $_POST["probabilidadMutacion"];
	$numeroEjecuciones = $_POST["numeroEjecuciones"];
	$poblacionInicial = $_POST["poblacionInicial"];
		
	$outputit1="/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid."/".$prefijo."_file2it1.xml";
	$inputXml="/var/www/html/site/gestionEspectro/entradasTemp/".$user->uid."/".$prefijo."_entradaEvolutivo.in";
	
	if($operacion == "Ejecutar")
	{	
		//Generar entrada para genetico con parser OZ		
		
		$saved = getenv("PATH");
		$newld = "/home/avispa/mozart-1.4.0/bin:/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin:/root/bin";
		if ($saved) { $newld .= ":$saved"; }
		putenv("PATH=$newld");	
		
		exec("./gestionEspectro/genetico/LeerXMLEvolutivo.exe --file=$file --output=$inputXml");
		
		putenv("PATH=$saved");

		//Ejecutar algoritmo genetico		

		exec("./gestionEspectro/genetico/genetico -i $inputXml -o $outputit1 -t $executionTime -s $numeroDeSoluciones -pb $pesoNumeroBloques -pn $pesoCanalesLibres -pd $pesoCanalesInutiles -n $numeroEjecuciones -p $poblacionInicial -ec $probabilidadCruce -em $probabilidadMutacion");

		mostrarResultados($outputit1,$prefijo);
	}

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
			<label for="edit-executionTime">Poblacion inicial </label>
			<input type="text" maxlength="64" name="poblacionInicial" id="edit-executionTime" size="30" value="30" class="form-text"/>
			<div class="description">
				 Ingrese la población inicial, valor recomendado entre 20 y 40.
			</div>
		</div>
		<div class="form-item" id="edit-executionTime-wrapper">
			<label for="edit-executionTime">Probabilidad cruce: </label>
			<input type="text" maxlength="64" name="probabilidadCruce" id="edit-executionTime" size="30" value="3" class="form-text"/>
			<div class="description">
				 Ingrese la probabilidad de cruce entre 1% y 100%. Valor recomendado 90%.
			</div>
		</div>
		<div class="form-item" id="edit-executionTime-wrapper">
			<label for="edit-executionTime">Probabilidad mutación: </label>
			<input type="text" maxlength="64" name="probabilidadMutacion" id="edit-executionTime" size="30" value="3" class="form-text"/>
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
			<input type="text" maxlength="64" name="numeroEjecuciones" id="edit-recomputationLevel" size="30" value="1" class="form-text"/>
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
