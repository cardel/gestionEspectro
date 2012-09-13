<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	$nodo = $_POST["nodo"];
	$nombreServicio = $_POST["nombreServicio"];
	$descripcionServicio = $_POST["descripcionServicio"];
	$idServicio = $_POST["idServicio"];

	$objconexionBD = new conexionBD();
	$objconexionBD->abrirConexion();

	$query= "UPDATE services SET services_name='".$nombreServicio."', services_description='".$descripcionServicio."' WHERE \"ID_service\"=".$idServicio.";";
	$objconexionBD->enviarConsulta($query);		

	$objconexionBD->cerrarConexion();
	
	if($nodo==50)
	{
		echo "<script>alert('Procedimiento realizado con exito');</script>";
		echo "<script>window.location=\"http://avispa.univalle.edu.co/site/?q=node/45\";</script>";
	}
	
?>
