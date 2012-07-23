<?php
	global $user
	$nombreArchivo = $_POST['nombreArchivo'];
	$destino = "/var/www/html/site/gestionEspectro/salidas/".$user->id."/";
	exec("cp ".$nombreArchivo." ".$destino);
?>
