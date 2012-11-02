<?
	//Este script retorna la informacion sobre canales inutilizados, reservados y asignacion actual de una entrada
	$file = $_POST["file"];
	
	$entrada = simplexml_load_file($file);	
	$dict = $entrada->dict;
	
	$ChannelAssignInDivisions;
	$ReservedChannels;
	$DisabledChannels;
	$ChannelAssignation;
	$numeroDeCanales;	

	/*foreach($dict->entry as $en)
	{
		$name = $en->attributes()->key;
		
		if($name=="ChannelAssignInDivisions")$ChannelAssignInDivisions = $en->i;
		if($name=="ReservedChannels")$ReservedChannels = $en->list;

		if($name=="DisabledChannels")$DisabledChannels = $en->list;
		if($name=="ChannelAssignation")$ChannelAssignation = $en->tuple;
		if($name=="NumberChannels")$numeroDeCanales = $en->i;			
		
	}*/
	
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
	echo "<td class='estilo'>Tipo de asignación geográfica</td>\n";
	echo "<td class='estilo'>Tipo de asignación geográfica</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Lugar de asignación geográfica</td>\n";
	echo "<td class='estilo'>Lugar de asignación geográfica</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Banda de frecuencia</td>\n";
	echo "<td class='estilo'>Banda de frecuencia</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Número de canales de la banda</td>\n";
	echo "<td class='estilo'>".$numeroDeCanales."</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Separación minima requerida</td>\n";
	echo "<td class='estilo'>Separación minima requerida</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Tope de canales en la banda</td>\n";
	echo "<td class='estilo'>Tope de canales en la banda</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Operadores presentes en la banda</td>\n";
	echo "<td class='estilo'>Operadores presentes en la banda</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Operadores con requerimientos</td>\n";
	echo "<td class='estilo'>Operadores con requerimientos</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Requerimientos</td>\n";
	echo "<td class='estilo'>Requerimientos</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td class='estilo'>Maxima asignación en subdivisiones</td>\n";
	echo "<td class='estilo'>Maxima asignación en subdivisiones</td>\n";
	echo "</tr>\n";
	echo "</tbody>\n";				
	echo "</table>\n";	
	echo "</div>";		
	echo "<p class='estilo'>Estado actual de la banda</p>\n";
	
	echo '<div style="overflow:auto; width: 1200px; height :300px; align:center;">';
	echo "ok<br/>";
	echo "<table width='100%' class='tabla' border='1'>\n";
	
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th class='estilo'>Operador</th>\n";
	
	for($j=0; $j<$numeroDeCanales; $j++)
	{
		echo "<th class='estilo'>C".($j+1)."</th>\n";

	}
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";

	//Reservados
	echo "<tr>\n";
	echo "<td class='estilo'>Canales reservados</td>\n";
	foreach($ReservedChannels->i as $channel)
	{
		
		if($channel==1) echo "<td class='estilo'>X</td>\n";
		else echo "<td class='estilo'></td>\n";	
		
	}
	echo "</tr>\n";
	//Deshabilitados	
	echo "<tr>\n";
	echo "<td class='estilo'>Canales deshabilitados</td>\n";
	foreach($DisabledChannels->i as $channel)
	{
		
		if($channel==1) echo "<td class='estilo'>X</td>\n";
		else echo "<td class='estilo'></td>\n";	
		
	}
	echo "</tr>\n";	
	//Asignaciones en subdivisiones
	echo "<tr>\n";
	echo "<td class='estilo'>Asignados en subdivisiones</td>\n";
	foreach($ChannelAssignInDivisions->i as $channel)
	{
		
		if($channel==1) echo "<td class='estilo'>X</td>\n";
		else echo "<td class='estilo'></td>\n";	
		
	}	
	echo "</tr>\n";
	
	//Divisiones locales
	//foreach(

	echo "</tbody>\n";				
	echo "</table>\n";	
	echo "</div>";		
?>
