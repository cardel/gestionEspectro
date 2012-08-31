<?php
require ("/var/www/html/site/gestionEspectro/php/consultasAplicacion.php");
$seleccion = (int) $_POST['opcSelec'];
$file = $_POST['file'];
$solucionIt = simplexml_load_file($file);
$head = $solucionIt->head; 

foreach($solucionIt->solution as $sol)
{
	$id= (int) $sol->attributes()->id;	
		
	if($seleccion==$id)
	{	
		$numeroDeSolucionesEncontradas = $head->numSolutions;			
		$numeroDeOperadores = $head->operatorsNumber;
		$numeroDeCanales = $head->channelsNumber;
		echo "<p class='estilo'>Solución: ".$id."</p>\n";
		$costo = $sol->costs;			
		echo "<p class='estilo'>Costos</p>\n";
		echo "<table width='100%' class='tabla' border='1'>\n";			
		echo "<thead>\n";
		echo "<tbody>\n";
		echo "<tr>\n";
		echo "<th class='estilo'>Concepto</th>\n";
		echo "<th class='estilo'>Valor</th>\n";
		echo "</tr>\n";
		echo "</thead>\n";
		echo "<tr>\n";
		echo "<td class='estilo'>Número de infracciones a las restricciones</td>\n";
		echo "<td class='estilo'>$costo->violations</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td class='estilo'>Número de bloques</td>\n";
		echo "<td class='estilo'>$costo->blocksNumber</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td class='estilo'>Diferencia entre el mayor bloque libre y el total de canales</td>\n";
		echo "<td class='estilo'>$costo->difChannelNumberMaxBlockFree</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td class='estilo'>Número de canales inútiles por separación en operadores que requieren asignación</td>\n";
		echo "<td class='estilo'>$costo->channelNumberUseless</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td class='estilo'>Costo total</td>\n";
		echo "<td class='estilo'>$costo->totalCost</td>\n";
		echo "</tr>\n";
		echo "</tbody>\n";				
		echo "</table>\n<br/>";	
		
		echo '<div style="overflow:auto; width: 1000px; height :300px; align:left;">';
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
		
		$report = $sol->report;
			
		foreach($report->operator as $operator)
		{
			echo "<tr>\n";
			echo "<td class='estilo'>".consultarOperador($operator->attributes()->name)."</td>\n";

			$channels = $operator->channels;
			foreach($channels->channel as $channel) 
			{
				if($channel==1) echo "<td class='estilo'>X</td>\n";
				else echo "<td class='estilo'></td>\n";

			}
			echo "</tr>\n";

		}
		echo "</tbody>\n";				
		echo "</table>\n";				
	}	
					
}

?>
