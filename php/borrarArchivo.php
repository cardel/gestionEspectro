
<?php
	$archivo = $_GET['archivo'];
	$lugar = $_GET['lugar'];
	exec("rm -f ".$archivo);	
	echo "<script>alert(\"Archivo borrado correctamente\");</script>";
	
	if($lugar==1) echo "<script>window.location=\"http://avispa.univalle.edu.co/site/?q=node/47\";</script>";
?>


