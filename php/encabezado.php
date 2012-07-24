<?php

	$file = $_POST['file'];
	$fileXML = $_POST['fileXML'];
	$botonXML  = $_POST['botonXML'];
	$solucionHead = simplexml_load_file($file);
	$head = $solucionHead->head; 

	echo "<input type=button class=\"botonverde\" onClick=\"window.open('".$fileXML."' ,'_blank ','toolbar=1,menubar=1,width=500,height=600');\" value=\"Descargar XML\" />\n";
	echo "<input type=button class=\"botonamarillo\" value=\"Almacenar XML\" onClick=\"".$botonXML."();\" id=\"".$botonXML."\"/>\n";
	echo "<p class='estilo'>Información</p>\n";
	echo "<table width='100%' class='tabla' border='1'>\n";
	
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th class='estilo'>Concepto</th>\n";
	echo "<th class='estilo'>Valor</th>\n";
	echo "</tr>\n";

	echo "</thead>\n";
	echo "<tbody>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Tipo de solución</td>\n";
	$tipo = $head->attributes()->solution;
	$tipoSolucion;
	if($tipo == "noOptima") $tipoSolucion="No óptima";
	else $tipoSolucion="Óptima";
	echo "<td class='estilo'>$tipoSolucion</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Lugar de asignación</td>\n";
	echo "<td class='estilo'>Localidad/Datos de la banda/Numero de canales --> faltan</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Banda</td>\n";
	echo "<td class='estilo'>Localidad/Datos de la banda/Numero de canales --> faltan</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Número de canales</td>\n";
	echo "<td class='estilo'>Localidad/Datos de la banda/Numero de canales --> faltan</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Tope por operador en la banda</td>\n";
	echo "<td class='estilo'>Localidad/Datos de la banda/Numero de canales --> faltan</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Número de soluciones</td>\n";
	echo "<td class='estilo'>$head->numSolutions</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Espacios de computación creados</td>\n";
	echo "<td class='estilo'>$head->spacesCreated</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Número de variables de dominios finitos</td>\n";
	echo "<td class='estilo'>$head->FDVariables</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Número de propagadores</td>\n";
	echo "<td class='estilo'>$head->propagators</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Uso de memoria (Bytes)</td>\n";
	echo "<td class='estilo'>$head->memoryUsage</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Separación de canales</td>\n";
	echo "<td class='estilo'>$head->channelSeparation</td>\n";
	echo "</tr>\n";			
	echo "<tr>\n";
	echo "<td class='estilo'>Número de operadores por canal</td>\n";
	echo "<td class='estilo'>$head->numberOperatorPerChannel</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Considerar tope de la banda</td>\n";
	$considerTop=$head->considerTop;
	$considerTop ? "true": "false";
	if(!strcmp("\"".$considerTop."\"" == "true")) $considerTop="Sí";
	else  $considerTop="No";
	echo "<td class='estilo'>$considerTop</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Se conserva la asignación de los operadores que requieren asignación</td>\n";
	$staticAssignation;
	if($head->staticAssignation == 'true') $staticAssignation="Sí";
	else  $staticAssignation="No";
	echo "<td class='estilo'>$staticAssignation</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Se considera la separación</td>\n";
	$considerSeparation;
	if($head->considerSeparatio == 'true') $considerSeparation="Sí";
	else  $considerSeparation="No";
	echo "<td class='estilo'>$considerSeparation</td>\n";
	echo "</tr>\n";			
	echo "</tbody>\n";			
	echo "</table>\n";
	
?>
