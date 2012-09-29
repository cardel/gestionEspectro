<?php

	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	$nodo = $_POST["nodo"];
	$idBanda = $_POST["idBanda"];
	$rangoFrecuencias = $_POST["rangoFrecuencias"];
	$maxCanalesOperador = $_POST["maxCanalesOperador"];
	$frecuenciaInicial = $_POST["frecuenciaInicial"];
	$frecuenciaFinal = $_POST["frecuenciaFinal"];
	$separacion = $_POST["separacion"];
	$descripcioNRango = $_POST["descripcioNRango"];

	$objconexionBD = new conexionBD();
	$objconexionBD->abrirConexion();

	$query = "UPDATE frequency_ranks SET frequency_ranks_name='".$rangoFrecuencias."', frequency_ranks_description='".$descripcioNRango."', \"frequency_begin_Hz\"=".$frecuenciaInicial.", \"frequency_end_Hz\"=".$frecuenciaFinal.", max_channels_per_operator=".$maxCanalesOperador.", channel_separation=".$separacion." where \"ID_frequency_ranks\"=".$idBanda.";";
	
	$objconexionBD->enviarConsulta($query);		

	$objconexionBD->cerrarConexion();

	if($nodo==51)
	{
		echo "<script>alert('Procedimiento realizado con exito');</script>";
		echo "<script>window.location=\"http://avispa.univalle.edu.co/site/?q=node/51&&idRango=".$idBanda."\";</script>";
	}
?>
