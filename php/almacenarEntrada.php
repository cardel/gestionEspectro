<?php
	$file = $_POST['file'];
	$nombreArchivo = $_POST['nombreArchivo'];
	$userID = $_POST['userID'];
	$destino = "/var/www/html/site/gestionEspectro/entradas/".$userID."/".$nombreArchivo;
	exec("cp -f ".$file." ".$destino);	
?>
