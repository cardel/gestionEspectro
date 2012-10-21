<?php

/*
 * Este archivo toma una solución dada en un archivo de salida y la inserta en la base de datos
 * Carlos Andres Delgado 2012
 */
require ("/var/www/html/site/gestionEspectro/php/consultasAplicacion.php");

$objconexionBD = new conexionBD();
$objconexionBD->abrirConexion();

$file = $_POST['file'];
$solucionInteres = (int)$_POST['solucion'];

echo "<p class='estilo'>Insertar salida en Base de datos</p>\n";

$solucion = simplexml_load_file($file);

$head = $solucion->head;

//Datos básicos
$tipoGeografico=$head->geograficAssignationType;
$idGeografico= $head->geograficAssignationID;
$rangoDeFrecuencia = $head->frequencyRank;
$numeroDeSoluciones = $head->numSolutions;	

$soluciones = $solucion->solution;		

foreach($soluciones as $sol)
{
	$id = (int) $sol->attributes()->id;	
	if($solucionInteres==$id)
	{	
		$report = $sol->report;

		echo "<p class='estilo'>Ingresar información en BD</p>\n";
		/*
		 * Asignacion es nacional
		 */
		if($tipoGeografico==0)
		{
			echo "<p style='font-size: 12pt;' >La asignación es a nivel nacional</p>\n";
			
			
			$query="select id_channels_assignations, id_channels_assignations_national from channel_assignations_national where id_channels_assignations in (select id_channels_assignations from channels_assignations where  \"ID_channels\" in (select \"ID_channels\" from channels where \"ID_frequency_ranks\"=".$rangoDeFrecuencia."));";
			echo "<p style='font-size: 12pt;' >Borrando asignación actual ... OK</p>\n";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
				//Borrar de tabla channel_assignations_national 
				$query2 = "DELETE FROM channel_assignations_national WHERE id_channels_assignations=".$row['id_channels_assignations'].";";
				$objconexionBD->enviarConsulta($query2);		

				$query2 = "DELETE FROM channels_assignations WHERE id_channels_assignations=".$row['id_channels_assignations'].";";
				$objconexionBD->enviarConsulta($query2);						
			}
			
			pg_free_result($result);	
						
			//Obtener maximo ID
			
			$maximoID;
			$query="select max(id_channels_assignations) as max from channels_assignations;";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
				$maximoID=$row['max'];					
			}
			pg_free_result($result);	
			//Nuevo ID
			$maximoID++;
			
			//Crear nueva asignación
			echo "<p style='font-size: 12pt;' >Creando nueva asignación ... OK</p>\n";
			
			//Insertar en tablas nacionales
			foreach($report->operator as $operator)
			{
				$idOperador = $operator->attributes()->name;
				
				//Averiguar id channel	
				$idChannel = 0;			
				$query="select min(\"ID_channels\") as min from channels where \"ID_frequency_ranks\"=".$rangoDeFrecuencia.";";
				$result= $objconexionBD->enviarConsulta($query);
				
				while ($row =  pg_fetch_array ($result))
				{
					$idChannel=$row['min'];					
				}	
				pg_free_result($result);	

				
				$channels = $operator->channels;
				foreach($channels->channel as $channel) 
				{
					
					if($channel==1)
					{						
						//Insertar en asignaciones generales
						$query1= "insert into channels_assignations (id_channels_assignations, \"ID_Operator\", \"ID_channels\") values (".$maximoID.",".$idOperador.",".$idChannel.");";
						
						$objconexionBD->enviarConsulta($query1);		
						
						//Insertar en asignaciones nacionales
						$query2= "insert into channel_assignations_national (id_channels_assignations) values (".$maximoID.");";
						$objconexionBD->enviarConsulta($query2);	
						
						//Aumentar ID
						$maximoID++;
					}
					$idChannel++;	

				}
				
			}
			echo "<p style='font-size: 12pt;' >Operación completa</p>\n";			
		}	
		/*
		 * Asignacion es territorial
		 */
		if($tipoGeografico==1)
		{
			//$idGeografico
			echo "<p style='font-size: 12pt;' >La asignación es a nivel territorial</p>\n";
			
			$query="select id_channels_assignations, id_channels_assignations_per_territorialdivision from channel_assignations_per_territorialdivision where id_channels_assignations in (select id_channels_assignations from channels_assignations where  \"ID_channels\" in (select \"ID_channels\" from channels where \"ID_frequency_ranks\"=".$rangoDeFrecuencia.")) and \"ID_Territorial_Division\"=".$idGeografico.";";
			

			echo "<p style='font-size: 12pt;' >Borrando asignación actual  ... OK</p>\n";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
				//Borrar de tabla channel_assignations_per_territorialdivision 
				$query1 = "DELETE FROM channel_assignations_per_territorialdivision WHERE id_channels_assignations=".$row['id_channels_assignations'].";";
				$objconexionBD->enviarConsulta($query1);		
				
				$query2 = "DELETE FROM channels_assignations WHERE id_channels_assignations=".$row['id_channels_assignations'].";";
				$objconexionBD->enviarConsulta($query2);						
			}
			
			//Obtener maximo ID
			
			$maximoID;
			$query="select max(id_channels_assignations) as max from channels_assignations;";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
				$maximoID=$row['max'];					
			}
			pg_free_result($result);	
			//Nuevo ID
			$maximoID++;
			
			//Crear nueva asignación
			echo "<p style='font-size: 12pt;' >Creando nueva asignación ... OK</p>\n";
			
			
			//Insertar en tablas territoriales
			foreach($report->operator as $operator)
			{
				$idOperador = $operator->attributes()->name;
				
				//Averiguar id channel	
				$idChannel = 0;			
				$numeroCanal = 0;
				$query="select min(\"ID_channels\") as min from channels where \"ID_frequency_ranks\"=".$rangoDeFrecuencia.";";
				$result= $objconexionBD->enviarConsulta($query);
				
				while ($row =  pg_fetch_array ($result))
				{
					$idChannel=$row['min'];					
				}	
				pg_free_result($result);				
				$channels = $operator->channels;
				
				foreach($channels->channel as $channel) 
				{
					$numeroCanal++;					
					
					if($channel==1)
					{		
										
						//Aqui toca verificar si la asignación es nacional y avisar como un warning
						
						//Buscar si el canal está asignado
						$query = "select id_channels_assignations from channels_assignations where \"ID_channels\" =".$idChannel.";";
						$result= $objconexionBD->enviarConsulta($query);
					
						$idAsignado=-1;
						$idAsignado =  pg_fetch_array ($result);

						pg_free_result($result);
						
						$encontro=-1;
						
						//Si el canal esta asignado busquelo
						foreach($idAsignado as $encuentraID)
						{
							$query = "select id_channels_assignations from channel_assignations_national where id_channels_assignations=".$encuentraID.";";
							$result= $objconexionBD->enviarConsulta($query);
							while ($row =  pg_fetch_array ($result))
							{
								$encontro=$row['id_channels_assignations'];					
							}					
							pg_free_result($result);								
							
						}
						//Si no encuentra asigne, de otra forma diga que no se puede
						if($encontro==-1)
						{							
							//Insertar en asignaciones generales
							$query1= "insert into channels_assignations (id_channels_assignations, \"ID_Operator\", \"ID_channels\") values (".$maximoID.",".$idOperador.",".$idChannel.");";
							$objconexionBD->enviarConsulta($query1);		
							
							//Insertar en asignaciones territoriales
							$query2= "insert into channel_assignations_per_territorialdivision (id_channels_assignations, \"ID_Territorial_Division\") values (".$maximoID.",".$idGeografico.");";
							$objconexionBD->enviarConsulta($query2);	
							//Aumentar ID
							$maximoID++;	
						}
						else
						{
							echo "<p>Alerta: El canal ".$numeroCanal." pertenece a una asignación nacional</p>";
						}			
											

					}	
					$idChannel++;

				}
				
			}
			echo "<p style='font-size: 12pt;' >Operación completa</p>\n";		
				
		}
		
		/*
		 * Asignacion es departamental
		 */
		if($tipoGeografico==2)
		{
			//$idGeografico
			echo "<p style='font-size: 12pt;' >La asignación es a nivel departamental</p>\n";
			
			
			$query="select id_channels_assignations, id_channels_assignations_per_departament from channel_assignations_per_departament where id_channels_assignations in (select id_channels_assignations from channels_assignations where  \"ID_channels\" in (select \"ID_channels\" from channels where \"ID_frequency_ranks\"=".$rangoDeFrecuencia.")) and \"ID_departament\"=".$idGeografico.";";
			
			
			
			echo "<p style='font-size: 12pt;' >Borrando asignación actual  ... OK</p>\n";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
				//Borrar de tabla channel_assignations_per_territorialdivision 
				$query1 = "DELETE FROM channel_assignations_per_departament WHERE id_channels_assignations=".$row['id_channels_assignations'].";";
				$objconexionBD->enviarConsulta($query1);		
				
				$query2 = "DELETE FROM channels_assignations WHERE id_channels_assignations=".$row['id_channels_assignations'].";";
				$objconexionBD->enviarConsulta($query2);						
			}
			
			//Obtener maximo ID
			
			$maximoID;
			$query="select max(id_channels_assignations) as max from channels_assignations;";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
				$maximoID=$row['max'];					
			}
			pg_free_result($result);	
			//Nuevo ID
			$maximoID++;
			
			//Crear nueva asignación
			echo "<p style='font-size: 12pt;' >Creando nueva asignación ... OK</p>\n";
			
			
			//Insertar en tablas territoriales
			foreach($report->operator as $operator)
			{
				$idOperador = $operator->attributes()->name;
				
				//Averiguar id channel	
				$idChannel = 0;			
				$numeroCanal = 0;
				$query="select min(\"ID_channels\") as min from channels where \"ID_frequency_ranks\"=".$rangoDeFrecuencia.";";
				$result= $objconexionBD->enviarConsulta($query);
				
				while ($row =  pg_fetch_array ($result))
				{
					$idChannel=$row['min'];					
				}	
				pg_free_result($result);				
				$channels = $operator->channels;
				
				foreach($channels->channel as $channel) 
				{
					$numeroCanal++;					
					
					if($channel==1)
					{		
										
						//Aqui toca verificar si la asignación es nacional y avisar como un warning
						
						//Buscar si el canal está asignado
						$query = "select id_channels_assignations from channels_assignations where \"ID_channels\" =".$idChannel.";";
						$result= $objconexionBD->enviarConsulta($query);
					
						$idAsignado=-1;
						$idAsignado =  pg_fetch_array ($result);

						pg_free_result($result);
						
						$encontro=-1;
						
						//Si el canal esta asignado busquelo a nivel nacional
						foreach($idAsignado as $encuentraID)
						{
							$query = "select id_channels_assignations from channel_assignations_national where id_channels_assignations=".$encuentraID.";";
							$result= $objconexionBD->enviarConsulta($query);
							while ($row =  pg_fetch_array ($result))
							{
								$encontro=$row['id_channels_assignations'];					
							}					
							pg_free_result($result);								
							
						}
						//Si no encuentra asigne, de otra forma diga que no se puede
						if($encontro==-1)
						{	
							
							//Busque el ID de la zona del departamento
							$idTerritorial=-1;
							
							$query="select \"ID_Territorial_Division\" as idter from departaments where \"ID_departament\" =".$idGeografico.";";						
							$result= $objconexionBD->enviarConsulta($query);	
							while ($row =  pg_fetch_array ($result))
							{
								$idTerritorial= $row['idter'];
							}	
							pg_free_result($result);
							
							
							//Si el canal esta asignado busquelo a nivel territorial
							foreach($idAsignado as $encuentraID)
							{
								$query = "select id_channels_assignations from channel_assignations_per_territorialdivision where id_channels_assignations=".$encuentraID." and \"ID_Territorial_Division\"=".$idTerritorial.";";
								$result= $objconexionBD->enviarConsulta($query);
								while ($row =  pg_fetch_array ($result))
								{
									$encontro=$row['id_channels_assignations'];					
								}					
								pg_free_result($result);								
								
							}
							if($encontro==-1)
							{
								//Insertar en asignaciones generales
								$query1= "insert into channels_assignations (id_channels_assignations, \"ID_Operator\", \"ID_channels\") values (".$maximoID.",".$idOperador.",".$idChannel.");";
								
								$objconexionBD->enviarConsulta($query1);		
								
								//Insertar en asignaciones departamentales
								$query2= "insert into channel_assignations_per_departament (id_channels_assignations, \"ID_departament\") values (".$maximoID.",".$idGeografico.");";
								$objconexionBD->enviarConsulta($query2);	
								
								//Aumentar ID
								$maximoID++;
													}
							else
							{
								//Lo encontro a nivel nacional
								echo "<p>Alerta: El canal ".$numeroCanal." pertenece a una asignación territorial</p>";
							}									
								
						}
						else
						{
							//Lo encontro a nivel nacional
							echo "<p>Alerta: El canal ".$numeroCanal." pertenece a una asignación nacional</p>";
						}			
											

					}	
					$idChannel++;

				}
				
			}
			echo "<p style='font-size: 12pt;' >Operación completa</p>\n";						
		}
		
		if($tipoGeografico==3)
		{
			echo "<p style='font-size: 12pt;' >La asignación es a nivel municipal</p>\n";
			
			//Borrar asignaciones en esa banda en el municipio
			$query="select id_channels_assignations, id_channels_assignations_per_city from channel_assignations_per_city where id_channels_assignations in (select id_channels_assignations from channels_assignations where  \"ID_channels\" in (select \"ID_channels\" from channels where \"ID_frequency_ranks\"=".$rangoDeFrecuencia.")) and \"ID_departament\"=".$idGeografico.";";
			
			
			
			echo "<p style='font-size: 12pt;' >Borrando asignación actual  ... OK</p>\n";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
				//Borrar de tabla channel_assignations_per_territorialdivision 
				$query1 = "DELETE FROM channel_assignations_per_departament WHERE id_channels_assignations=".$row['id_channels_assignations'].";";
				$objconexionBD->enviarConsulta($query1);		
				
				$query2 = "DELETE FROM channels_assignations WHERE id_channels_assignations=".$row['id_channels_assignations'].";";
				$objconexionBD->enviarConsulta($query2);						
			}
			
			//Obtener maximo ID
			
			$maximoID;
			$query="select max(id_channels_assignations) as max from channels_assignations;";
			$result= $objconexionBD->enviarConsulta($query);
			
			while ($row =  pg_fetch_array ($result))
			{
				$maximoID=$row['max'];					
			}
			pg_free_result($result);	
			//Nuevo ID
			$maximoID++;
			
			//Crear nueva asignación
			echo "<p style='font-size: 12pt;' >Creando nueva asignación ... OK</p>\n";
			
			
			//Insertar en tablas territoriales
			foreach($report->operator as $operator)
			{
				$idOperador = $operator->attributes()->name;
				
				//Averiguar id channel	
				$idChannel = 0;			
				$numeroCanal = 0;
				$query="select min(\"ID_channels\") as min from channels where \"ID_frequency_ranks\"=".$rangoDeFrecuencia.";";
				$result= $objconexionBD->enviarConsulta($query);
				
				while ($row =  pg_fetch_array ($result))
				{
					$idChannel=$row['min'];					
				}	
				pg_free_result($result);				
				$channels = $operator->channels;
				
				foreach($channels->channel as $channel) 
				{
					$numeroCanal++;					
					
					if($channel==1)
					{		
										
						//Aqui toca verificar si la asignación es nacional y avisar como un warning
						
						//Buscar si el canal está asignado
						$query = "select id_channels_assignations from channels_assignations where \"ID_channels\" =".$idChannel.";";
						$result= $objconexionBD->enviarConsulta($query);
					
						$idAsignado=-1;
						$idAsignado =  pg_fetch_array ($result);

						pg_free_result($result);
						
						$encontro=-1;
						
						//Si el canal esta asignado busquelo a nivel nacional
						foreach($idAsignado as $encuentraID)
						{
							$query = "select id_channels_assignations from channel_assignations_national where id_channels_assignations=".$encuentraID.";";
							$result= $objconexionBD->enviarConsulta($query);
							while ($row =  pg_fetch_array ($result))
							{
								$encontro=$row['id_channels_assignations'];					
							}					
							pg_free_result($result);								
							
						}
						//Si no encuentra asigne, de otra forma diga que no se puede
						if($encontro==-1)
						{	
							//Busqueda el ID del departamento del municipio
							$idDepartamental=-1;
							
							$query="select \"ID_departament\" as idter from cities where \"ID_cities\" =".$idGeografico.";";						
							$result= $objconexionBD->enviarConsulta($query);	
							while ($row =  pg_fetch_array ($result))
							{
								$idDepartamental= $row['idter'];
							}	
							pg_free_result($result);							
							
							//Busque el ID de la zona del departamento
							$idTerritorial=-1;
							
							$query="select \"ID_Territorial_Division\" as idter from departaments where \"ID_departament\" =".$idDepartamental.";";						
							$result= $objconexionBD->enviarConsulta($query);	
							while ($row =  pg_fetch_array ($result))
							{
								$idTerritorial= $row['idter'];
							}	
							pg_free_result($result);
							
							
							//Si el canal esta asignado busquelo a nivel territorial
							foreach($idAsignado as $encuentraID)
							{
								$query = "select id_channels_assignations from channel_assignations_per_territorialdivision where id_channels_assignations=".$encuentraID." and \"ID_Territorial_Division\"=".$idTerritorial.";";
								$result= $objconexionBD->enviarConsulta($query);
								while ($row =  pg_fetch_array ($result))
								{
									$encontro=$row['id_channels_assignations'];					
								}					
								pg_free_result($result);								
								
							}
							if($encontro==-1)
							{
								//Si el canal esta asignado a nivel departamental
								$query = "select id_channels_assignations from channel_assignations_per_departament where id_channels_assignations=".$encuentraID." and \"ID_departament\"=".$idDepartamental.";";
								$result= $objconexionBD->enviarConsulta($query);
								
								while ($row =  pg_fetch_array ($result))
								{
									$encontro=$row['id_channels_assignations'];					
								}					
								pg_free_result($result);	
								
								
								
								if($encontro==-1)
								{
									//Insertar en asignaciones generales
									$query1= "insert into channels_assignations (id_channels_assignations, \"ID_Operator\", \"ID_channels\") values (".$maximoID.",".$idOperador.",".$idChannel.");";
									
									$objconexionBD->enviarConsulta($query1);		
									
									//Insertar en asignaciones municipales
									$query2= "insert into channel_assignations_per_city (id_channels_assignations, \"ID_cities\") values (".$maximoID.",".$idGeografico.");";
									$objconexionBD->enviarConsulta($query2);	
									
									//Aumentar ID
									$maximoID++;
								}
								else
								{
									//Lo encontro a nivel territorial
									echo "<p>Alerta: El canal ".$numeroCanal." pertenece a una asignación departamental</p>";
								}	
								
							}
							else
							{
								//Lo encontro a nivel territorial
								echo "<p>Alerta: El canal ".$numeroCanal." pertenece a una asignación territorial</p>";
							}									
								
						}
						else
						{
							//Lo encontro a nivel nacional
							echo "<p>Alerta: El canal ".$numeroCanal." pertenece a una asignación nacional</p>";
						}			
											

					}	
					$idChannel++;

				}
				
			}
			echo "<p style='font-size: 12pt;' >Operación completa</p>\n";										
		}

	}

}


$objconexionBD->cerrarConexion();
?>
