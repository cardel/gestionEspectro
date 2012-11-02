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
	
	foreach($dict->entry as $en)
	{
		$name = $en->attributes()->key;
		
		if($name=="ChannelAssignInDivisions")$ChannelAssignInDivisions = $en->i;
		if($name=="ReservedChannels")$ReservedChannels = $en->list;

		if($name=="DisabledChannels")$DisabledChannels = $en->list;
		if($name=="ChannelAssignation")$ChannelAssignation = $en->tuple;
		if($name=="NumberChannels")$numeroDeCanales = $en->i;
		
	}
		
	echo "<br/>";
	print_r($ReservedChannels);
	echo "<br/>";
	print_r($DisabledChannels);
	echo "<br/>";
	print_r($ChannelAssignInDivisions);
	echo "<br/>";
	echo $numeroDeCanales;
	echo "<br/>";
	
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
	foreach($ReservedChannels as $channel)
	{
		
		if($channel->i==1) echo "<td class='estilo'>X</td>\n";
		else echo "<td class='estilo'></td>\n";	
		
	}
	echo "</tr>\n";
	//Deshabilitados	
	echo "<tr>\n";
	echo "<td class='estilo'>Canales deshabilitados</td>\n";
	foreach($DisabledChannels as $channel)
	{
		
		if($channel->i==1) echo "<td class='estilo'>X</td>\n";
		else echo "<td class='estilo'></td>\n";	
		
	}
	echo "</tr>\n";	
	//Asignaciones en subdivisiones
	echo "<tr>\n";
	echo "<td class='estilo'>Asignados en subdivisiones</td>\n";
	foreach($ChannelAssignInDivisions as $channel)
	{
		
		if($channel->i==1) echo "<td class='estilo'>X</td>\n";
		else echo "<td class='estilo'></td>\n";	
		
	}	
	echo "</tr>\n";

	echo "</tbody>\n";				
	echo "</table>\n";	
	echo "</div>";		
?>
