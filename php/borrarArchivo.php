
<?php
	$archivo = $_POST['archivo'];
	$lugar = $_POST['lugar'];
	exec("rm -f ".$archivo);	
	echo "<script>alert(\"Archivo borrado correctamente\");</script>";
	if($lugar==1) echo "<script>window.locationf=\"http://http://avispa.univalle.edu.co/site/?q=node/47\"/script>";
?>


