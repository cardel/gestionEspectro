<?php
$accion = $_POST["accion"];

if($accion=="operador")
{
	$divisionTerritorial = $_POST["selectTerritorialDivisionForm"];
	$departamento = $_POST["selectDepartamentsForm"];
	$municipio = $_POST["selectCitiesForm"];
	$operador = $_POST["operador"];
		
	echo $divisionTerritorial."<br/>";
	echo $departamento."<br/>";
	echo $municipio."<br/>";
	echo $operador."<br/>";
	
}
?>
