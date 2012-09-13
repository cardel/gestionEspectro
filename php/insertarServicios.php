<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	$nodo = $_POST["nodo"];
	$nombreServicio = $_POST["nombreServicio"];
	$descripcionServicio = $_POST["descripcionServicio"];

	$objconexionBD = new conexionBD();
	$objconexionBD->abrirConexion();

	$query= "insert into services (services_name, services_description) values ('".$nombreServicio."','".$descripcionServicio."');";
	$objconexionBD->enviarConsulta($query);		

	$objconexionBD->cerrarConexion();
	
	if($nodo==45)
	{
		echo "<script>alert('Procedimiento realizado con exito');</script>";
		echo "<script>window.location=\"http://avispa.univalle.edu.co/site/?q=node/45\";</script>";
	}
	
?>
