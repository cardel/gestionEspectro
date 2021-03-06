<?php
/*
 * Carlos Andres Delgado
 * Diseño e implementación de una aplicación para la gestión del espectro radioeléctrico
 * Consultas para generador de entradas
*/

require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");

/*
 * Esta función retorna los operadores presente en el lugar de asignación unido con los operadores de los requerimientos
 */ 
function retornarOperadores($id_frequency_rank, $tipoAsignacion, $idAsignacion)
{
	$salida = array();

	$contador = 0;
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();	
    
    $tipoConsultaInicio="";
    $tipoConsultaFinal="";
    
    $typeAssign = $tipoAsignacion;   
    
    $idAsignacionTerritorial = $idAsignacion;
    $idAsignacionDepartamental = $idAsignacion;
    $idAsignacionMunicipal = $idAsignacion;
    
    //Se toma en cuenta que las asignaciones se propagan de divisiones a subdivisiones, por ejemplo una asignación nacional va con otras
	while($typeAssign >= 0)
	{
		switch($typeAssign)
		{
				case 0:
					$tipoConsultaInicio = " channel_assignations_national ";
					$tipoConsultaFinal="";
					break;
				case 1:
					$tipoConsultaInicio = " channel_assignations_per_territorialdivision ";
					$tipoConsultaFinal=" and \"ID_Territorial_Division\"=".$idAsignacionTerritorial;
					break;
				case 2:
					$tipoConsultaInicio = " channel_assignations_per_departament ";
					$tipoConsultaFinal=" and \"ID_departament\"=".$idAsignacionDepartamental;
					
					//Consultar ID_Territorial
					$query="select \"ID_Territorial_Division\" as idter from departaments where \"ID_departament\" =".$idAsignacionDepartamental.";";	
					
					$result= $objconexionBD->enviarConsulta($query);	

					while ($row =  pg_fetch_array ($result))
					{
						$idAsignacionTerritorial= $row['idter'];
					}	
					pg_free_result($result);
					break;
				case 3:
				default:
					$tipoConsultaInicio = " channel_assignations_national natural join channel_assignations_per_city ";
					$tipoConsultaFinal=" and \"ID_cities\"=".$idAsignacionMunicipal;
					
					//Consultar ID_Departamental
					$query="select \"ID_departament\" as iddep from cities where \"ID_cities\" =".$idAsignacionMunicipal.";";	
					$result= $objconexionBD->enviarConsulta($query);	

					while ($row =  pg_fetch_array ($result))
					{
						$idAsignacionDepartamental= $row['iddep'];
					}	
					pg_free_result($result);
					break;		
		}
		$typeAssign--;
		
		$query="select DISTINCT \"ID_Operator\" as idop from channels_assignations natural join ".$tipoConsultaInicio." natural join operators natural join channels where \"ID_frequency_ranks\"=".$id_frequency_rank." ".$tipoConsultaFinal." ;";	
		$result= $objconexionBD->enviarConsulta($query);	

		//Consultar operadores actuales en la banda
		while ($row =  pg_fetch_array ($result))
		{
			if(!(in_array($row['idop'],$salida)))
			{
				$contador++;
				$salida[$contador] = $row['idop'];
			}

		}	
		pg_free_result($result);		
		
	}
		
 	$objconexionBD->cerrarConexion();	
	return $salida;
}

//Esta funcion retorna los canales reservado de una banda
function obtenerReservado($id_frequency_rank)
{
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();
    		
	$reservado = "";
	
	$query="select channel_number, reserved, disabled from channels where \"ID_frequency_ranks\" = ".$id_frequency_rank." order by channel_number;";
	$result= $objconexionBD->enviarConsulta($query);	
	while ($row =  pg_fetch_array ($result))
	{
	  $reser = 0;	  
	  if($row["reserved"]!='f') $reser=1;	  
 	  $reservado .= "\t\t\t\t<i>".$reser."</i>\n";
	}	
	pg_free_result($result);


	$salida.= $reservado;
	$objconexionBD->cerrarConexion();	
	return $salida;
}
//Esta funcion retorna los canales inutilizables de una banda
function obtenerInutilizable($id_frequency_rank)
{
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();
    		
	$inutilizado="";	
	
	$query="select channel_number, reserved, disabled from channels where \"ID_frequency_ranks\" = ".$id_frequency_rank." order by channel_number;";
	$result= $objconexionBD->enviarConsulta($query);	
	while ($row =  pg_fetch_array ($result))
	{
	  $inut = 0;	  
	  if($row["disabled"]!='f') $inut=1;	  
 	  $inutilizado .= "\t\t\t\t<i>".$inut."</i>\n";	    
	}	
	pg_free_result($result);

	$salida.= $inutilizado;
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
	
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();	
	
	$maximo=0;	
	
	switch($tipoAsignacion)
	{
		
		case 0:
			//Asignacion nacional	
			
			$resultadosAcumulados = array();
			$divisionesTerritoriales = array();
				
			$query="select \"ID_Territorial_Division\" as idter, count(*) as total from channels_assignations natural join channel_assignations_per_territorialdivision natural join channels where \"ID_Operator\" = ".$operador." and \"ID_frequency_ranks\"=".$id_frequency_rank." group by \"ID_Territorial_Division\";";
			
			//Ahora total por entidad territorial
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
				$resultadosAcumulados[$row['idter']] = $row['total'];
			}			
			pg_free_result($result);
			
			//Se calculan las divisiones territoriales			
					
			$query="select \"ID_Territorial_Division\" as terr from territorial_divisions;";
			
			//Ahora total por entidad territorial
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
				$divisionesTerritoriales[$row['terr']] = 0;
			}			
			pg_free_result($result);
			
						
			//Luego se calcula por departamentos de la divisiones territoriales
			foreach($divisionesTerritoriales as $idTer => $resIt){
				
				$maximoLocal = 0;
				$resultadosAcumuladosDep = array();	
				$departamentos = array();
									
				$query="select \"ID_departament\" as iddep, count(*) as total from channels_assignations natural join channel_assignations_per_departament natural join channels natural join departaments where \"ID_Operator\" = ".$operador." and \"ID_frequency_ranks\"=".$id_frequency_rank." and \"ID_Territorial_Division\"=".$idTer." group by \"ID_departament\";";
				
				$result= $objconexionBD->enviarConsulta($query);
				
				while ($row =  pg_fetch_array ($result))
				{
					$resultadosAcumuladosDep[$row['iddep']] = $row['total'];
				}			
				pg_free_result($result);	
		
				//Se suma lo encontrado a los municipios de cada departamento de la division territorial
				$query="select \"ID_departament\" as iddep from departaments where \"ID_Territorial_Division\"=".$idTer.";";
				$result= $objconexionBD->enviarConsulta($query);
				
				while ($row =  pg_fetch_array ($result))
				{
						$departamentos[$row['iddep']] = 0;
				}			
				pg_free_result($result);					
					
				
				foreach($departamentos as $idDep => $resDep)
				{
					$query="select max(count) as total from (select count(*) from channels_assignations natural join channel_assignations_per_city natural join channels natural join cities where \"ID_Operator\" = ".$operador." and \"ID_frequency_ranks\"=".$id_frequency_rank." and \"ID_departament\"=".$idDep." group by \"ID_cities\") as tablaParcial;";	
					
					$result= $objconexionBD->enviarConsulta($query);
		
					while ($row =  pg_fetch_array ($result))
					{
						$aux = $resultadosAcumuladosDep[$idDep];
						if($aux==null) $aux = 0;
						$resultadosAcumuladosDep[$idDep] = $aux + $row['total'];	
						if($maximoLocal < $resultadosAcumuladosDep[$idDep]) $maximoLocal = $resultadosAcumuladosDep[$idDep];				
					}					
					pg_free_result($result);				
				}
				
				$aux = $resultadosAcumulados[$idTer];
				if($aux == null) $aux = 0;	
				$resultadosAcumulados[$idTer] = $aux + $maximoLocal;
				
				if($maximo < $resultadosAcumulados[$idTer]) $maximo = $resultadosAcumulados[$idTer];				

			}		
			break;
		case 1:
			//Asignacion territorial
			
			$resultadosAcumulados = array();
			$departamentos = array();
			
			//Primero se calcula por departamento
			$query="select \"ID_departament\" as iddep, count(*) as total from channels_assignations natural join channel_assignations_per_departament natural join channels natural join departaments where \"ID_Operator\" = ".$operador." and \"ID_frequency_ranks\"=".$id_frequency_rank." and \"ID_Territorial_Division\"=".$idLugarAsignacion." group by \"ID_departament\";";
			
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
					$resultadosAcumulados[$row['iddep']] = $row['total'];
			}			
			pg_free_result($result);	

			//Se seleccionan los departamentos de la division territorial
			$query="select \"ID_departament\" as iddep from departaments where \"ID_Territorial_Division\"=".$idLugarAsignacion.";";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
					$departamentos[$row['iddep']] = 0;
			}			
			pg_free_result($result);	
			
			//Se suma lo encontrado a los municipios de cada departamento
			foreach($departamentos as $idDep => $res)
			{			
		
				$query="select max(count) as total from (select count(*) from channels_assignations natural join channel_assignations_per_city natural join channels natural join cities where \"ID_Operator\" = ".$operador." and \"ID_frequency_ranks\"=".$id_frequency_rank." and \"ID_departament\"=".$idDep." group by \"ID_cities\") as tablaParcial;";	
				
				$result= $objconexionBD->enviarConsulta($query);
	
				while ($row =  pg_fetch_array ($result))
				{
					$aux = $resultadosAcumulados[$idDep];
					if($aux == null) $aux = 0;
					
					$resultadosAcumulados[$idDep] = $aux + $row['total'];
					
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
			$maximo = 0;
			break;
	}	
	if($maximo=='') $maximo=0;
	$objconexionBD->cerrarConexion();	
	return $maximo;
}

/*
 * Esta funcion obtiene la asignacion en las subdivisiones del área de trabajo en el rango de frecuencias que se busca asignar
 */ 
function obtenerAsignacionesParciales($id_frequency_rank, $tipoAsignacion, $idLugarAsignacion)
{
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();		
	$salida = "";

	switch($tipoAsignacion)
	{
		case 0:
			$asignado = array();

			//Asignaciones de todas las asignaciones territoriales
			$query = "select DISTINCT channel_number from channels natural join channel_assignations_per_territorialdivision natural join channels_assignations where \"ID_frequency_ranks\" = ".$id_frequency_rank." order by channel_number;";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{  
			  $asignado[$row['channel_number']] = 1;
			}	
			pg_free_result($result);
						

			//Asignaciones de todos los departamentos
			$query = "select DISTINCT channel_number from channels natural join channel_assignations_per_departament natural join channels_assignations where \"ID_frequency_ranks\" = ".$id_frequency_rank." order by channel_number;";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{  
			  $asignado[$row['channel_number']] = 1;
			}	
			pg_free_result($result);
						
			//Se seleccionan todos los departamentos
			$departamentos = array();
			$query="select \"ID_departament\" as iddep from departaments ;";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
				$departamentos[$row['iddep']] = 0;
			}		
			pg_free_result($result);	
			
			foreach($departamentos as $dep => $res)
			{
				$query = "select DISTINCT channel_number from channels natural join channel_assignations_per_city natural join channels_assignations natural join cities where \"ID_frequency_ranks\" = ".$id_frequency_rank." and \"ID_departament\" = ".$dep." order by channel_number;";

				$result= $objconexionBD->enviarConsulta($query);	
				
				while ($row =  pg_fetch_array ($result))
				{  
				  $asignado[$row['channel_number']] = 1;
				}	
				pg_free_result($result);

			}
			$query="select channel_number, reserved, disabled from channels where \"ID_frequency_ranks\" = ".$id_frequency_rank." order by channel_number;";
			$result= $objconexionBD->enviarConsulta($query);	
			
			while ($row =  pg_fetch_array ($result))
			{  
			  $ingresar = 0;
			  
			  if($asignado[$row['channel_number']]==1) $ingresar = 1;			  
			  $salida .= "\t\t\t\t<i>".$ingresar."</i>\n";
			}	
				pg_free_result($result);
			break;
		case 1:
			$asignado = array();

			$query = "select  DISTINCT channel_number from channels natural join channel_assignations_per_departament natural join channels_assignations natural join departaments where \"ID_frequency_ranks\" = ".$id_frequency_rank." and \"ID_Territorial_Division\" = ".$idLugarAsignacion." order by channel_number;";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{  
			  $asignado[$row['channel_number']] = 1;
			}	
			pg_free_result($result);
						
			//Se seleccionan los departamentos de la division territorial
			$departamentos = array();
			$query="select \"ID_departament\" as iddep from departaments where \"ID_Territorial_Division\"=".$idLugarAsignacion.";";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
					$departamentos[$row['iddep']] = 0;
			}			
			pg_free_result($result);	
			
			foreach($departamentos as $dep => $res)
			{
				$query = "select DISTINCT channel_number from channels natural join channel_assignations_per_city natural join channels_assignations natural join cities where \"ID_frequency_ranks\" = ".$id_frequency_rank." and \"ID_departament\" = ".$dep." order by channel_number;";

				$result= $objconexionBD->enviarConsulta($query);	
				
				while ($row =  pg_fetch_array ($result))
				{  
				  $asignado[$row['channel_number']] = 1;
				}	
				pg_free_result($result);
			
			}	
			$query="select channel_number, reserved, disabled from channels where \"ID_frequency_ranks\" = ".$id_frequency_rank." order by channel_number;";
			$result= $objconexionBD->enviarConsulta($query);	
			
			while ($row =  pg_fetch_array ($result))
			{  
			  $ingresar = 0;
			  
			  if($asignado[$row['channel_number']]==1) $ingresar = 1;			  
			  $salida .= "\t\t\t\t<i>".$ingresar."</i>\n";
			}	
			pg_free_result($result);
							
			break;
		case 2:
			$asignado = array();
			
			$query = "select DISTINCT channel_number from channels natural join channel_assignations_per_city natural join channels_assignations natural join cities where \"ID_frequency_ranks\" = ".$id_frequency_rank." and \"ID_departament\" = ".$idLugarAsignacion." order by channel_number;";

			$result= $objconexionBD->enviarConsulta($query);	
			
			while ($row =  pg_fetch_array ($result))
			{  
			  $asignado[$row['channel_number']] = 1;
			}	
			pg_free_result($result);
			
			$query="select channel_number, reserved, disabled from channels where \"ID_frequency_ranks\" = ".$id_frequency_rank." order by channel_number;";
			$result= $objconexionBD->enviarConsulta($query);	
			
			while ($row =  pg_fetch_array ($result))
			{  
			  $ingresar = 0;
			  
			  if($asignado[$row['channel_number']]==1) $ingresar = 1;			  
			  $salida .= "\t\t\t\t<i>".$ingresar."</i>\n";
			}	
			pg_free_result($result);			
			break;
		case 3:
		default:			
			$query="select channel_number, reserved, disabled from channels where \"ID_frequency_ranks\" = ".$id_frequency_rank." order by channel_number;";
			$result= $objconexionBD->enviarConsulta($query);	
			$ingresar = 0;
			while ($row =  pg_fetch_array ($result))
			{  
			  $salida .= "\t\t\t\t<i>".$ingresar."</i>\n";
			}	
			pg_free_result($result);	
			break;
		
	}			
	$objconexionBD->cerrarConexion();
		
	return $salida;;
}

/*
 * Esta funcion obtiene las asignaciones de los canales
 */

function obtenerAsignacion($listaOperadoresOrdenada, $tipoAsignacion, $idAsignacion, $id_frequency_rank )
{
	$salida = "";

    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();	
    
    $tipoConsultaInicio="";
    $tipoConsultaFinal="";
    
	 
    
    $idAsignacionTerritorial = $idAsignacion;
    $idAsignacionDepartamental = $idAsignacion;
    $idAsignacionMunicipal = $idAsignacion;
    
    //Se toma en cuenta que las asignaciones se propagan de divisiones a subdivisiones, por ejemplo una asignación nacional va con otras
	foreach($listaOperadoresOrdenada as $op)
	{
		$asignacion = array();
		$salida .= "\t\t\t\t<i>\n";
		$salida .= "\t\t\t\t\t<entry key=\"".$op."\">\n";
		$salida .= "\t\t\t\t\t\t<i>\n";
		$salida .= "\t\t\t\t\t\t\t<list>\n";
		$typeAssign = $tipoAsignacion;  
		//Revisar asignaciones desde subdivisiones a divisiones
		while($typeAssign >= 0)
		{
			switch($typeAssign)
			{
					case 0:
						$tipoConsultaInicio = " channel_assignations_national ";
						$tipoConsultaFinal="";
						break;
					case 1:
						$tipoConsultaInicio = " channel_assignations_per_territorialdivision ";
						$tipoConsultaFinal=" and \"ID_Territorial_Division\"=".$idAsignacionTerritorial;
						break;
					case 2:
						$tipoConsultaInicio = " channel_assignations_per_departament ";
						$tipoConsultaFinal=" and \"ID_departament\"=".$idAsignacionDepartamental;
						
						//Consultar ID_Territorial
						$query="select \"ID_Territorial_Division\" as idter from departaments where \"ID_departament\" =".$idAsignacionDepartamental.";";	
						$result= $objconexionBD->enviarConsulta($query);	

						while ($row =  pg_fetch_array ($result))
						{
							$idAsignacionTerritorial= $row['idter'];
						}	
						pg_free_result($result);
						break;
					case 3:
					default:
						$tipoConsultaInicio = " channel_assignations_national natural join channel_assignations_per_city ";
						$tipoConsultaFinal=" and \"ID_cities\"=".$idAsignacionMunicipal;
						
						//Consultar ID_Departamental
						$query="select \"ID_departament\" as iddep from cities where \"ID_cities\" =".$idAsignacionMunicipal.";";	
						$result= $objconexionBD->enviarConsulta($query);	

						while ($row =  pg_fetch_array ($result))
						{
							$idAsignacionDepartamental= $row['iddep'];
						}	
						pg_free_result($result);
						break;		
			}
			$typeAssign--;	
			
			$query="select channel_number as canal from channels_assignations natural join ".$tipoConsultaInicio." natural join operators natural join channels where \"ID_Operator\"=".$op." and \"ID_frequency_ranks\"=".$id_frequency_rank." ".$tipoConsultaFinal." ;";
			$result= $objconexionBD->enviarConsulta($query);	
			
			//Consultar operadores actuales en la banda
			while ($row =  pg_fetch_array ($result))
			{
				$asignacion[$row['canal']] = 1;
			}	
			pg_free_result($result);			
	
		}
		
		$query="select channel_number from channels where \"ID_frequency_ranks\" = ".$id_frequency_rank." order by channel_number;";
		$result= $objconexionBD->enviarConsulta($query);	

		while ($row =  pg_fetch_array ($result))
		{  
		  $ingresar = 0;		  
		  if($asignacion[$row['channel_number']]==1) $ingresar = 1;			  
		  $salida .= "\t\t\t\t\t\t\t\t<i>".$ingresar."</i>\n";
		}
		
		$salida .= "\t\t\t\t\t\t\t</list>\n";	
		$salida .= "\t\t\t\t\t\t</i>\n";
		$salida .= "\t\t\t\t\t</entry>\n";	
		$salida .= "\t\t\t\t</i>\n";

		pg_free_result($result);
	}
 	$objconexionBD->cerrarConexion();	
	return $salida;
}

	
?>
