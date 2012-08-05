<?php

require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");

function numeroDeOperadores($id_frequency_rank, $requerimientos )
{
	$total = sizeof($requerimientos);
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();	
    
    $query="select DISTINCT \"ID_Operator\" from channels_assignations natural join channel_assignations_per_city natural join cities natural join operators natural join channels where  \"ID_frequency_ranks\"=".$id_frequency_rank.";";	
 	$result= $objconexionBD->enviarConsulta($query);	

	while ($row =  pg_fetch_array ($result))
	{
		$total++;
	}	
	pg_free_result($result);
	while ($a =  $requerimientos)
	{
		$query="select select count(*) from channels_assignations natural join channel_assignations_per_city natural join cities natural join operators natural join channels where \"ID_Operator\"=".$a[0]." and \"ID_frequency_ranks\"=".$id_frequency_rank.";";	 	$resultAux= $objconexionBD->enviarConsulta($query);
		
		while ($row =  pg_fetch_array ($resultAux))
		{
			if($row['count']==0) $total--;
		}	
		pg_free_result($resultAux);
	}	
		
 	$objconexionBD->cerrarConexion();	
	return $total;
}


function obtenerInutilizableYReservado($id_frequency_rank )
{
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();		
	
	$salida="";

	$inutilizado = "\t\t\t\t\t<entry key=\"inutilizado\">\n";
	$inutilizado .= "\t\t\t\t\t\t<tuple>\n";
	$inutilizado .= "\t\t\t\t\t\t\t<i>\n";
	$inutilizado .= "\t\t\t\t\t\t\t\t<list>\n";
	
	$reservado="\t\t\t\t\t<entry key=\"reservado\">\n";
	$reservado .= "\t\t\t\t\t\t<tuple>\n";
	$reservado .= "\t\t\t\t\t\t\t<i>\n";
	$reservado .= "\t\t\t\t\t\t\t\t<list>\n";	
	
	$query="select channel_number, reserved, disabled from channels where \"ID_frequency_ranks\" = ".$id_frequency_rank." order by channel_number;";
	$result= $objconexionBD->enviarConsulta($query);	
	while ($row =  pg_fetch_array ($result))
	{
	  $inut = 0;
	  $reser = 0;
	  
	  if($row["disabled"]!='f') $inut=1;
	  if($row["reserved"]!='f') $reser=1;
	  
 	  $inutilizado .= "\t\t\t\t\t\t\t\t\t<i>".$inut."</i>\n";	    
 	  $reservado .= "\t\t\t\t\t\t\t\t\t<i>".$reser."</i>\n";
	}	
	pg_free_result($result);
	$inutilizado .= "\t\t\t\t\t\t\t\t</list>\n";	
	$inutilizado .= "\t\t\t\t\t\t\t</i>\n";
	$inutilizado .= "\t\t\t\t\t</entry>\n";

	$reservado .= "\t\t\t\t\t\t\t\t</list>\n";	
	$reservado .= "\t\t\t\t\t\t\t</i>\n";
	$reservado .= "\t\t\t\t\t</entry>\n";
	
	$salida.= $inutilizado;
	$salida.= $reservado;
	$objconexionBD->cerrarConexion();	
	return $salida;
}
	
?>
