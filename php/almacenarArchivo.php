<?php
	$nombreArchivo = $_POST['nombreArchivo'];
	$destino = "/var/www/html/site/gestionEspectro/salidas";
	exec("cp ".$nombreArchivo." ".$destino);
?>
