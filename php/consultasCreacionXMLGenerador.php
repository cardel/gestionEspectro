<?php

require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");

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
	  
	  $salida.=$row["disabled"];
	  if($row["disabled"]) $inut=1;
	  if($row["reserved"]) $reser=1;
	  
 	  $inutilizado .= "\t\t\t\t\t\t\t\t\t<i>".$inut."</i>\n";	    
 	  $reservado .= "\t\t\t\t\t\t\t\t\t<i>".$reser."</i>\n";
	}	
	
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
