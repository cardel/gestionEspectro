<?php

	$file = $_POST['file'];
	$fileXML = $_POST['fileXML'];
	$solucionHead = simplexml_load_file($file);
	$head = $solucionHead->head; 

	echo "<button class=\"botonazul\">Ver PDF</button>\n";
	echo "<input type=button class=\"botonamarillo\" onclick=\"window.open(\"http://www.google.com\", ,\"mywindow\",\"'width=300,height=400'\");\" value=\"Descargar XML\"/>";
	echo "<button class=\"botonverde\">Almacenar XML</button>";
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
	if($tipo == "noOptimal") $tipoSolucion="No óptima";
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
	echo "<td class='estilo'>$head->considerTop</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Se conserva la asignación de los operadores que requieren asignación</td>\n";
	echo "<td class='estilo'>$head->staticAssignation</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Se considera la separación</td>\n";
	echo "<td class='estilo'>$head->considerSeparation</td>\n";
	echo "</tr>\n";			
	echo "</tbody>\n";			
	echo "</table>\n";
	
?>
