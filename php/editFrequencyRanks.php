<?php

	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	$nodo = $_POST["nodo"];
	$idBanda = $_POST["idBanda"];
	$rangoFrecuencias = $_POST["rangoFrecuencias"];
	$maxCanalesOperador = $_POST["maxCanalesOperador"];
	$frecuenciaInicial = $_POST["frecuenciaInicial"];
	$frecuenciaFinal = $_POST["frecuenciaFinal"];
	$numeroCanales = $_POST["numeroCanales"];
	$separacion = $_POST["separacion"];
	$descripcioNRango = $_POST["descripcioNRango"];

	$objconexionBD = new conexionBD();
	$objconexionBD->abrirConexion();

	$query= "insert into services (services_name, services_description) values ('".$nombreServicio."','".$descripcionServicio."');";
	$objconexionBD->enviarConsulta($query);		

	$objconexionBD->cerrarConexion();

	if($nodo==51)
	{
	echo "<script>alert('Procedimiento realizado con exito');</script>";
	echo "<script>window.location=\"http://avispa.univalle.edu.co/site/?q=node/51&&idRango=".$idRango."\";</script>";
	}
?>
