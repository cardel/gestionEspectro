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
	  $idNuevo = $row["idmax"];
	}
		
	pg_free_result($result);
	
	$idNuevo++;
	
	//Insertar nuevo operador
	
	$query= "insert into operators (operators_name) values (\"".$nombre."\");";
	$objconexionBD->enviarConsulta($query);
		
	//Insertar nuevos servicios del operador
	
	foreach ($servicios as $ser)
	{
		$query= "insert into services_by_operator (\"ID_Operator\", \"ID_service\") values (".$idNuevo.",".$ser.");";
		$objconexionBD->enviarConsulta($query);
	}
	$objconexionBD->cerrarConexion();

	return "<script>alert('Operador ingresado con éxito')</script>";
	
}




?>
