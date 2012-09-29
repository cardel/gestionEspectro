<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");

	$idRango = $_POST["idRango"];
	$idBanda = $_POST["idBanda"];
	$idChannel = $_POST["idChannel"];
	
	$nodo = $_POST["nodo"];
	
	$frecuenciaTX = $_POST["frecuenciaTX"];
	$frecuenciaRX = $_POST["frecuenciaRX"];	
	
	$reservado = $_POST["reservado"];
	$deshabilidado = $_POST["deshabilidado"];
	
	if(empty($reservado)) $reservado='f';
	else $reservado='t';
	
	if(empty($deshabilidado)) $deshabilidado='f';
	else $deshabilidado='t';
			
	$descripcionCanal = $_POST["descripcionCanal"];
	
	$objconexionBD = new conexionBD();
	$objconexionBD->abrirConexion();

	$query = "UPDATE channels SET channel_description='".$descripcionCanal."', \"TxFrequency\"=".$frecuenciaTX.", \"RxFrequency\"=".$frecuenciaRX.", reserved='".$reservado."' , disabled ='".$deshabilidado."' where \"ID_channels\"=".$idChannel.";";
	
	$objconexionBD->enviarConsulta($query);		

	$objconexionBD->cerrarConexion();

	if($nodo==52)
	{
		echo "<script>alert('Procedimiento realizado con exito');</script>";
		echo "<script>window.location=\"http://avispa.univalle.edu.co/site/?q=node/52&&idChannel=".$idChannel."&&idRango=".$idRango."&&idBanda=".$idBanda."\";</script>";
	}
?>
