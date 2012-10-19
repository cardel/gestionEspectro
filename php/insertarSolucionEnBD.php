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
		echo "<p class='estilo'>Ingresar información en BD</p>\n";
		if($tipoGeografico==0)
		{
			echo "<p style='font-size: 12pt;' >La asignación es a nivel nacional</p>\n";
			$report = $sol->report;
			
			$query="select id_channels_assignations, id_channels_assignations_national from channel_assignations_national where id_channels_assignations in (select id_channels_assignations from channels_assignations where  \"ID_channels\" in (select \"ID_channels\" from channels where \"ID_frequency_ranks\"=".$rangoDeFrecuencia."));";
			echo "<p style='font-size: 12pt;' >Borrando asignación actual</p>\n";
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
			echo "<p style='font-size: 12pt;' >Creando nueva asignación</p>\n";
			echo $rangoDeFrecuencia."<br/>";
			echo $idGeografico."<br/>";
			
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
				echo "<p style='font-size: 12pt;' >Operación concluida</p>\n";
			}			
		}	

		if($tipoGeografico==1)
		{
			//$idGeografico
			echo "<p style='font-size: 12pt;' >La asignación es a nivel territorial</p>\n";
				
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
