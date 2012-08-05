<?php
/*
 * Carlos Andres Delgado
 * Diseño e implementación de una aplicación para la gestión del espectro radioeléctrico
 * Consultas para generador de entradas
*/

require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");

//Esta funcion retorna el número de operadores de la banda mas los que entran
function numeroDeOperadores($id_frequency_rank, $requerimientos )
{
	$total = sizeof($requerimientos);
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();	
    
    $query="select DISTINCT \"ID_Operator\" from channels_assignations natural join channel_assignations_per_city natural join cities natural join operators natural join channels where \"ID_frequency_ranks\"=".$id_frequency_rank.";";	
 	$result= $objconexionBD->enviarConsulta($query);	

	while ($row =  pg_fetch_array ($result))
	{
		$total++;
	}	
	pg_free_result($result);
	foreach($requerimientos as $a)
	{
		$query="select count(*) from channels_assignations natural join channel_assignations_per_city natural join cities natural join operators natural join channels where \"ID_Operator\"=".$a[0]." and \"ID_frequency_ranks\"=".$id_frequency_rank.";";	 	$resultAux= $objconexionBD->enviarConsulta($query);
		
		while ($row =  pg_fetch_array ($resultAux))
		{
			if($row['count']==0) $total--;
		}	
		pg_free_result($resultAux);
	}	
		
 	$objconexionBD->cerrarConexion();	
	return $total;
}

//Esta funcion retorna los canales reservado e inutilizables de una banda
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
/*
 * Esta funcion obtiene el maximo que tiene asignado un operador en las subdivisiones de la region de trabajo
 * Por ejemplo
 * Para el caso nacional, toma las divisiones territoriales, departamentales y municipales, las suma y obtiene el total
 */ 
function obtenerMaximoParcial($operador, $tipoAsignacion, $idLugarAsignacion, $id_frequency_rank )
{
	
	//!!ESTO DEBE CORREGIRSE
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();	
	
	$maximo=0;	
	
	switch($tipoAsignacion)
	{
		case 0:
			//Asignacion nacional	
			
			$resultadosAcumulados = array();
				
			$query="select \"ID_Territorial_Division\" as idter, count(*) as total from channels_assignations natural join channel_assignations_per_territorialdivision natural join channels where \"ID_Operator\" = ".$operador." and \"ID_frequency_ranks\"=".$id_frequency_rank." group by \"ID_Territorial_Division\";";
			
			//Ahora total por entidad territorial
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
				$resultadosAcumulados[$row['idter']] = $row['total'];
			}			
			pg_free_result($result);
				
			//Luego se calcula por departamentos de la divisiones territoriales
			foreach($resultadosAcumulados as $idTer => $resIt){
				
				$maximoLocal = 0;
				$resultadosAcumuladosDep = array();	
									
				$query="select \"ID_departament\" as iddep, count(*) as total from channels_assignations natural join channel_assignations_per_departament natural join channels natural join departaments where \"ID_Operator\" = ".$operador." and \"ID_frequency_ranks\"=".$id_frequency_rank." and \"ID_Territorial_Division\"=".$idTer." group by \"ID_departament\";";
				
				$result= $objconexionBD->enviarConsulta($query);
				
				while ($row =  pg_fetch_array ($result))
				{
						$resultadosAcumuladosDep[$row['iddep']] = $row['total'];
				}			
				pg_free_result($result);	
		
				//Se suma lo encontrado a los municipios de cada departamento
				foreach($resultadosAcumuladosDep as $idDep => $resDep)
				{
					$query="select max(count) as total from (select count(*) from channels_assignations natural join channel_assignations_per_city natural join channels natural join cities where \"ID_Operator\" = ".$operador." and \"ID_frequency_ranks\"=".$id_frequency_rank." and \"ID_departament\"=".$idDep." group by \"ID_cities\") as tablaParcial;";	
					
					$result= $objconexionBD->enviarConsulta($query);
		
					while ($row =  pg_fetch_array ($result))
					{
						$resultadosAcumuladosDep[$idDep] += $row['total'];	
						if($maximoLocal < $resultadosAcumuladosDep[$idDep]) $maximoLocal = $resultadosAcumuladosDep[$idDep];				
					}					
					pg_free_result($result);				
				}
				
				$resultadosAcumulados[$idTer] += $maximoLocal;
				
				if($maximo < $resultadosAcumulados[$idTer]) $maximo = $resultadosAcumulados[$idTer];				

			}		
			break;
		case 1:
			//Asignacion territorial
			
			$resultadosAcumulados = array();
			
			//Primero se calcula por departamento
			$query="select \"ID_departament\" as iddep, count(*) as total from channels_assignations natural join channel_assignations_per_departament natural join channels natural join departaments where \"ID_Operator\" = ".$operador." and \"ID_frequency_ranks\"=".$id_frequency_rank." and \"ID_Territorial_Division\"=".$idLugarAsignacion." group by \"ID_departament\";";
			
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
					$resultadosAcumulados[$row['iddep']] = $row['total'];
			}			
			pg_free_result($result);	
	
			//Se suma lo encontrado a los municipios de cada departamento
			foreach($resultadosAcumulados as $idDep => $res)
			{
				
		
				$query="select max(count) as total from (select count(*) from channels_assignations natural join channel_assignations_per_city natural join channels natural join cities where \"ID_Operator\" = ".$operador." and \"ID_frequency_ranks\"=".$id_frequency_rank." and \"ID_departament\"=".$idDep." group by \"ID_cities\") as tablaParcial;";	
				
				$result= $objconexionBD->enviarConsulta($query);
	
				while ($row =  pg_fetch_array ($result))
				{
					$resultadosAcumulados[$idDep] += $row['total'];
					
					if($maximo < $resultadosAcumulados[$idDep]) $maximo = $resultadosAcumulados[$idDep];
				}					
				pg_free_result($result);
				
			}						
			break;
			
		case 2:
			//Asignacion departamental
			//Se considera el maximo que tiene un operador en un municipio dado
			$query="select max(count) as total from (select count(*) from channels_assignations natural join channel_assignations_per_city natural join channels natural join cities where \"ID_Operator\" = ".$operador." and \"ID_frequency_ranks\"=".$id_frequency_rank." and \"ID_departament\"=".$idLugarAsignacion." group by \"ID_cities\") as tablaParcial;";	
					
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
				$maximo = $row['total'];
			}	
			
			pg_free_result($result);	
			break;		
		case 3:	
			//Asignacion municipal
			$maximo = 0;
			break;
		default:
			break;
	}	

	$objconexionBD->cerrarConexion();	
	return $maximo;
}

function obtenerAsignacionesParciales($id_frequency_rank, $tipoAsignacion, $idLugarAsignacion)
{
	
		return 0;
}
	
function obtenerAsignacion($requerimientos, $tipoAsignacion, $idAsignacion, $id_frequency_rank )
{
	
		return 0;
}

	
?>
