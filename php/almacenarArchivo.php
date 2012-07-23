<?php
	$file = $_POST['file'];
	$nombreArchivo = $_POST['nombreArchivo'];
	$userID = $_POST['userID'];
	$destino = "/var/www/html/site/gestionEspectro/salidas/".$userID."/".$nombreArchivo;
	exec("echo cp ".$file." ".$destino." >> tmp.txt ");
	exec("cp ".$file." ".$destino);
	
?>
