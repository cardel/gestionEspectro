
<?php
	$archivo = $_POST['archivo'];
	$lugar = $_POST['lugar'];
	exec("rm -f ".$file);	
	
	if($lugar==1) echo "<script><window.locationf=\"http://http://avispa.univalle.edu.co/site/?q=node/47\"/script>";
?>


