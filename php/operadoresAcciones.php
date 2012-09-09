<?php
require ("/var/www/html/site/gestionEspectro/php/consultasAplicacion.php");



//Esta función inserta un nuevo operador con sus servicios

function nuevoOperador($nombre, $servicios)
{
	$objconexionBD = new conexionBD();
	$objconexionBD->abrirConexion();
	//Obtener ID
	$idNuevo = 0;
	
	$query= "select max(\"ID_Operator\") as idmax from operators;";
	$result= $objconexionBD->enviarConsulta($query);
	
	while ($row =  pg_fetch_array ($result))
	{
	  $idNuevo = parseint($row["idmax"]);
	}
		
	pg_free_result($result);
	
	$idNuevo++;
	
	return $idNuevo;
	//Insertar nuevo operador
	
	//Insertar nuevos servicios del operador
	$objconexionBD->cerrarConexion();
	
}




?>
