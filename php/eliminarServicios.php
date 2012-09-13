<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	$nodo = $_GET["nodo"];
	$tipo = $_GET["tipo"];
	$operador = $_GET["operador"];
	$servicio = $_GET["servicio"];

	$objconexionBD = new conexionBD();
	$objconexionBD->abrirConexion();
	
	if($tipo=="eliminarServicio")
	{
		$nombreOperador = $_POST["nombreOperador"];
		$query ="DELETE from services_by_operator WHERE \"ID_Operator\"=".$operador." and \"ID_service\"=".$servicio;
		$objconexionBD->enviarConsulta($query);
	}
	

	$objconexionBD->cerrarConexion();
	
	if($nodo==49)
	{
		echo "<script>alert('Procedimiento realizado con exito');</script>";
		echo "<script>window.location=\"http://avispa.univalle.edu.co/site/?q=node/49&&idOperador=".$operador."\";</script>";
	}
	
?>

