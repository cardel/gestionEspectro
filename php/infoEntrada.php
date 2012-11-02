<?
	//Este script retorna la informacion sobre canales inutilizados, reservados y asignacion actual de una entrada
	$file = $_POST["file"];
	
	$entrada = simplexml_load_file($file);	
	$ChannelAssignInDivisions = $entrada->ChannelAssignInDivisions;
	
	$ReservedChannels= $entrada->ReservedChannels;
	$DisabledChannels= $entrada->DisabledChannels;
	
	$ChannelAssignation= $entrada->ChannelAssignation;
	$numeroDeCanales =  $entrada->NumberChannels;
	
	echo '<div style="overflow:auto; width: 1200px; height :300px; align:center;">';
	
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
	foreach($ReservedChannels->list as $channel)
	{
		
		if($channel==1) echo "<td class='estilo'>X</td>\n";
		else echo "<td class='estilo'></td>\n";	
		
	}
	echo "</tr>\n";
	//Deshabilitados	
	echo "<tr>\n";
	echo "<td class='estilo'>Canales deshabilitados</td>\n";
	foreach($DisabledChannels->list as $channel)
	{
		
		if($channel==1) echo "<td class='estilo'>X</td>\n";
		else echo "<td class='estilo'></td>\n";	
		
	}
	echo "</tr>\n";	
	//Asignaciones en subdivisiones
	echo "<tr>\n";
	echo "<td class='estilo'>Asignados en subdivisiones</td>\n";
	foreach($ChannelAssignInDivisions->list as $channel)
	{
		
		if($channel==1) echo "<td class='estilo'>X</td>\n";
		else echo "<td class='estilo'></td>\n";	
		
	}	
	echo "</tr>\n";
	
	echo "</tbody>\n";				
	echo "</table>\n";	
	echo "</div>";		
?>
