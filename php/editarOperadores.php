<?php
	$nodo = $_POST["nodo"];
	$tipo = $_POST["tipo"];
	$operador = $_POST["operador"];

	$objconexionBD = new conexionBD();
	$objconexionBD->abrirConexion();
	
	if($tipo=="cambiarNombreOperador")
	{
		$nombreOperador = $_POST["nombreOperador"];
		$query ="UPDATE operators SET operators_name = '".$nombreOperador."' WHERE \"ID_Operator\"=".$operador;
		$objconexionBD->enviarConsulta($query);
	}
	
	if($tipo=="agregarServicio")
	{
		$servicio = $_POST["servicesOp"];
		$query= "insert into services_by_operator (\"ID_Operator\", \"ID_service\") values (".$operador.",".$servicio.");";
		$objconexionBD->enviarConsulta($query);		
		
	}

	$objconexionBD->cerrarConexion();
	
	if($nodo==49)
	{
		echo "<script>alert('Procedimiento realizado con exito');</script>";
		echo "<script>window.locationf=\"http:/http://avispa.univalle.edu.co/site/?q=node/49&&idOperador=".$operador.";</script>";
	}
	
?>
