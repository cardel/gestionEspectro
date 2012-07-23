<?php
	$file = $_POST['file'];
	$nombreArchivo = $_POST['nombreArchivo'];
	$userID = = $_POST['userID'];
	$destino = "/var/www/html/site/gestionEspectro/salidas/".$userID."/".$nombreArchivo;
	exec("cp ".$file." ".$destino);
	
?>
