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

foreach($soluciones->solution as $sol)
{
	$id = (int) $sol->attributes()->id;	
	if($solucionInteres==$id)
	{	
		if($tipoGeografico==0)
		{
			
				
		}
		echo "ok";
		print_r($sol);
	}
	echo "ok";	
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
