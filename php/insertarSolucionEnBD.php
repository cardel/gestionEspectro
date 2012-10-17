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
$rangoDeFrecuencia = $head->especificBand;
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
					
				//Borrar tablas nacionales	
				echo $rangoDeFrecuencia."<br/>";
				
				//Insertar en tablas nacionales
				foreach($report->operator as $operator)
				{
					echo "Operador: ".consultarOperador($operator->attributes()->name)."\n";

					$channels = $operator->channels;
					foreach($channels->channel as $channel) 
					{
						echo $channel."\n";						

					}
					echo "<br/>";
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
