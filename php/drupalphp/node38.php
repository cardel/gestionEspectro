<?php
	include('gestionEspectro/php/consultasCreacionXMLGenerador.php');
	drupal_add_css($path = 'css/datatable.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'gestionEspectro/php/drupalcss/estilosFormGestion.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_set_html_head('<script type="text/javascript" src="https://www.google.com/jsapi"></script>');
	drupal_add_css($path = 'sites/all/libraries/jquery.ui/themes/default/ui.all.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shCore.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shBrushXml.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/generador.js');
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shCore.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shThemeDefault.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/colorBoxU.js');
	echo "<p class='estiloTitulo'>Generador de entradas XML</p>\n";
	echo '<p style="text-align:left";><a class="iframe" href="http://avispa.univalle.edu.co/~cardel/proyInv/ayudaSecuenciamientoAviones/ayuda.php"><img border="0" src="files/HelpIcon.gif" width="50" height="50"><br/>Ayuda</a></p>';
	drupal_add_css($path = 'gestionEspectro/php/drupalcss/botonesEspectro.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	
	if(!is_dir("/var/www/html/site/gestionEspectro/entradas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/entradas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid, 0755);
?>
<form action="/site/?q=node/38" method="post">
	<p class='estilo'>Selección geográfica</p>
	<div id="tipoAsignacion" style="font-size:14px; font-weight:bold;">La asignación es a nivel nacional</div>
	<br/>
	Usted puede seleccionar en que lugar se va realizar el proceso de asignación del espectro:

	<ul>
		<li>Para nivel nacional no debe realizar ninguna selección geográfica</li>
		<li>A nivel regional seleccione la región especifica</li>
		<li>A nivel departamental seleccione el departamento dentro de la región especifíca</li>
		<li>A nivel local seleccione el municipio dentro del departamento especifíco</li>
	</ul>	

	<div id="enlaceDivisionTerritorial">
	<a href="#" id="consultarDivisionTerritorial" onclick="javascript:consultarDivisionTerritorial();"> Seleccionar división territorial </a>
	</div>
	<div id="territorialDivision"></div>
	<div id="departamentos"></div>

	<div id="municipios"></div>	
		
	<p class='estilo'>Selección banda</p>
	Por favor seleccione una banda y posteriormente un rango donde desea generar el requerimiento.
	<div id="bandas"></div>		
	<div id="rangos"></div>	


	<div id="numeroCanalesForm"></div>
	<div id="parametrosRango" style="display:none;">
		<table border="0">
		<tr>
		<td>Número de canales en la banda: </td><td id="numCanales"></td>
		</tr>
		<tr>
		<td>Servicios en la banda: </td><td id="serviciosBanda"></td>
		</tr>
		<tr>
		<td>Tope por operador en la banda: </td><td id="topeOperadorBanda"></td>
		</tr>
		<tr>
		<td>Separación entre canales establecida por el regulador: </td><td id="channelSeparation"></td>
		</tr>
		</table>
	</div>

	<div id="botonRequerimientos" style="display:none;">
	<input type="button" id="botonReq" class="botonrojo" value="Crear requerimientos" onClick="javascript:crearRequerimiento();"/>
	</div>
	<div id="crearPostParaListas"></div>
	<div id="formulario" style="display:none;">
		<p class='estilo'>Creación requerimientos</p>
		<input type="hidden" id="cant_campos" name="cant_campos" value="0" />
		<input type="hidden" id="enviar" name="enviar" value="1" />
		<fieldset class="estiloFormFieldset">
			<legend class="estiloFormLeyenda">Gestión de requerimiento</legend>
			<div class="top">
			<label class="estiloFormLabel" for="numeroCanales">Seleccione operador:</label>
				<div id="selectorOperator" class="div_texbox"></div>
			<label class="estiloFormLabel" for="numeroCanales">Número de canales requeridos:</label>
			 <div class="div_texbox"><input type="text" id="numeroCanales" name="numeroCanales" value=0 class="textbox" /></div>
			</div>
		</fieldset>
	<div class="button_div">    
		<input type="button" id="btnAgregar" name="btnAgregar" value="Agregar" class="buttons_aplicar" onclick="agregarFila(document.getElementById('cant_campos'));" />
	</div>
	<fieldset class="estiloFormFieldset">
		<legend class="estiloFormLeyenda">
			Detalle de Requerimientos
		</legend>
		<div class="clear"></div>
		<div id="form3" class="form-horiz">
			<table width="100%" id="tblDetalle" class="listado">
				<thead>
					<tr>
						<th>Operador</th>
						<th>Número de canales requeridos</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody id="tbDetalle">
				</tbody>
			</table>
			<div class="button_div">  
				<input type="submit" id="btnAgregar" name="btnAgregar" value="Enviar" class="buttons_OK" />
			</div>
		</div>    
	</fieldset>
	</div>
</form>
<?php
	if( $_POST["enviar"]==1)
	{
		$numeroCampos = $_POST["cant_campos"];
		$requerimientos = array();
		
		for($i=0; $i<$numeroCampos; $i++)
		{
			$auxOp = $_POST["operador_".$i];
			$auxReq = $_POST["numRequerido_".$i];
			
			if(!(empty($auxOp) || empty($auxReq)))
			{
				$requerimientos[$i]=array($auxOp,$auxReq);			
			}

		}
		
		if(!(empty($requerimientos)))
		{
			$divisionTerritorial = $_POST["selectTerritorialDivisionForm"];
			$departamento = $_POST["selectDepartamentsForm"];
			$municipio = $_POST["selectCitiesForm"];
			$rangoSeleccionado = $_POST["selectRanksForm"];
			$bandaSeleccionada = $_POST["selectBandForm"];
			$numeroCanales = $_POST["numeroCanalesFormulario"];
			$separacion = $_POST["channel_separationFormulario"];
			$maxChannelPerOperatorFormulario = $_POST["maxChannelPerOperatorFormulario"];
			$tipoAsignacion;
			$idAsignacion;
			
			if($divisionTerritorial == -1)
			{
					$tipoAsignacion=0;
					$idAsignacion=0;
			}
			else
			{
					if($departamento == -1)
					{
						$tipoAsignacion=1;
						$idAsignacion=$divisionTerritorial;						
					}
					else
					{
							if($municipio == -1)
							{
								$tipoAsignacion=2;
								$idAsignacion=$departamento;									
							}
							else
							{
								$tipoAsignacion=3;
								$idAsignacion=$municipio;									
							}
					}
			}
			
			//Crear XML
			$salida = "\n<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
			$salida .= "<instance>\n";
			$salida .= "\t<presentation nbSolutions=\"?\" format=\"XCSP 2.1\">\n\t\tRepresentacion entrada de problema gestion espectro radioelectrico\n\t</presentation>\n";
			$salida .= "\t<dict>\n";
			
			$salida .= "\t\t<entry key=\"GeograficAssignationType\">\n";
			$salida .= "\t\t\t<i>".$tipoAsignacion."</i>\n";
			$salida .= "\t\t</entry>\n";
			
			$salida .= "\t\t<entry key=\"GeograficAssignationID\">\n";
			$salida .= "\t\t\t<i>".$idAsignacion."</i>\n";
			$salida .= "\t\t</entry>\n";			

			$salida .= "\t\t<entry key=\"FrecuencyBand\">\n";
			$salida .= "\t\t\t<i>".$rangoSeleccionado."</i>\n";
			$salida .= "\t\t</entry>\n";
			
			$salida .= "\t\t<entry key=\"EspecificBand\">\n";
			$salida .= "\t\t\t<i>".$bandaSeleccionada."</i>\n";
			$salida .= "\t\t</entry>\n";	

			$salida .= "\t\t<entry key=\"NumberChannels\">\n";
			$salida .= "\t\t\t<i>".$numeroCanales."</i>\n";
			$salida .= "\t\t</entry>\n";	
			
			//Consultar operadores actuales
			$salida .= "\t\t<entry key=\"Operators\">\n";
			
			$listaOperadores = retornarOperadores($rangoSeleccionado, $tipoAsignacion , $idAsignacion, $requerimientos );
			
			$salida .= "\t\t\t<i>".implode(", ",$listaOperadores)."</i>\n";
			$salida .= "\t\t</entry>\n";	
			
			$salida .= "\t\t<entry key=\"OperatorsOfInput\">\n";
			$salida .= "\t\t\t<i>".sizeof($requerimientos)."</i>\n";
			$salida .= "\t\t</entry>\n";	
			
			$salida .= "\t\t<entry key=\"ChannelSeparation\">\n";
			$salida .= "\t\t\t<i>".$separacion."</i>\n";
			$salida .= "\t\t</entry>\n";	
			
		
			//Requerimientos
			$salida .= "\t\t<entry key=\"Requeriments\">\n";
			$salida .= "\t\t\t<tuple>\n";
			$salida .= "\t\t\t\t<i>\n";
			foreach($requerimientos as $op)
			{
				$keyOP = 0;
				foreach ($listaOperadores as $key => $elemento) {
					if ($elemento == $op[0]) {
						$keyOP =  $key;
					}
				}
				$salida .= "\t\t\t\t\t<entry key=\"".$keyOP."\">\n";
				$salida .= "\t\t\t\t\t\t<i>".$op[1]."</i>\n";
				$salida .= "\t\t\t\t\t</entry>\n";
			}
		
			$salida .= "\t\t\t\t</i>\n";
			$salida .= "\t\t\t</tuple>\n";	
			$salida .= "\t\t</entry>\n";	

			//maximo ocupado por un operador de entrada
			$salida .= "\t\t<entry key=\"PartialAssignation\">\n";
			foreach($requerimientos as $op)
			{
				$keyOP = 0;
				foreach ($listaOperadores as $key => $elemento) {
					if ($elemento == $op[0]) {
						$keyOP =  $key;
					}
				}
				$salida .= "\t\t\t\t\t<entry key=\"".$keyOP."\">\n";
				$salida .= "\t\t\t\t\t\t<i>".obtenerMaximoParcial($op[0], $tipoAsignacion, $idAsignacion, $rangoSeleccionado)."</i>\n";
				$salida .= "\t\t\t\t\t</entry>\n";
			}
			$salida .= "\t\t</entry>\n";
			
			//Asignaciones actuales				
			$salida .= "\t\t<entry key=\"AssignationChannel\">\n";
			$salida .= "\t\t\t<tuple>\n";
			$salida .= "\t\t\t\t<i>\n";

			$salida .= obtenerInutilizableYReservado($rangoSeleccionado);
			$salida .= obtenerAsignacionesParciales($rangoSeleccionado, $tipoAsignacion, $idAsignacion);
		
			$salida .= "\t\t\t\t</i>\n";
			$salida .= "\t\t\t</tuple>\n";					
			$salida .= "\t\t</entry>\n";	
							
			//Tope de canales por operador en la banda	
			$salida .= "\t\t<entry key=\"MaximumOperatorChannels\">\n";
			$salida .= "\t\t\t<i>".$maxChannelPerOperatorFormulario."</i>\n";
			$salida .= "\t\t</entry>\n";	
														
			$salida .= "\t</dict>\n";
			$salida .= "</instance>\n";				
			
					
			echo "<pre class='brush: xml'>\n";
			$salida = str_replace("<","&lt;",$salida);
			$salida = str_replace(">","&gt;",$salida);	
			echo $salida;		
			echo "</pre>";	
		}
		else
		{
			echo "<script language=\"javascript\">alert(\"Los requerimientos están vacios, por favor ingrese por lo menos uno\");</script>";
		}
	}

?>
