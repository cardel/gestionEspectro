<?php

/*
 * Este archivo toma una solución dada en un archivo de salida y la inserta en la base de datos
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
					$idChannel++;
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

				}
				
			}
			echo "<p style='font-size: 12pt;' >Operación completa</p>\n";			
		}	

		if($tipoGeografico==1)
		{
			//$idGeografico
			echo "<p style='font-size: 12pt;' >La asignación es a nivel territorial</p>\n";
			
			$query="select id_channels_assignations, id_channels_assignations_per_territorialdivision from channel_assignations_per_territorialdivision where id_channels_assignations in (select id_channels_assignations from channels_assignations where  \"ID_channels\" in (select \"ID_channels\" from channels where \"ID_frequency_ranks\"=".$rangoDeFrecuencia."));";
			
			echo $query;
			
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
							echo "<br/>".$query1."<br/>";
							$objconexionBD->enviarConsulta($query1);		
							
							//Insertar en asignaciones nacionales
							$query2= "insert into channel_assignations_per_territorialdivision (id_channels_assignations, \"ID_Territorial_Division\") values (".$maximoID.",".$idGeografico.");";
							$objconexionBD->enviarConsulta($query2);	
							echo $query2."<br/>";
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
		

		if($tipoGeografico==2)
		{
			//$idGeografico
			echo "<p style='font-size: 12pt;' >La asignación es a nivel departamental</p>\n";
				
		}
		
		if($tipoGeografico==3)
		{
			//$idGeografico
			echo "<p style='font-size: 12pt;' >La asignación es a nivel municipal</p>\n";
				
		}

	}

}

/*
 * Por cada operador
 * Depende del tipo de asignación
 * 
 * 1. Nacionales
 * 2. Territorial
 * 3. Departamental
 * 4. Municipal
 * 
 * << Necesario consultar IDs de cada caso>>
 */

$objconexionBD->cerrarConexion();
?>
