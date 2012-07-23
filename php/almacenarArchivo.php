<?php
	global $user
	$file = $_POST['file'];
	$nombreArchivo = $_POST['nombreArchivo'];
	$destino = "/var/www/html/site/gestionEspectro/salidas/".$user->id."/".$nombreArchivo;
	exec("cp ".$file." ".$destino);
	
?>
