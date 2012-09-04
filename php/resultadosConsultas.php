<?php
$accion = $_POST["accion"];

if($accion=="operador")
{
	$divisionTerritorial = $_POST["selectTerritorialDivision"];
	$departamento = $_POST["selectDepartaments"];
	$municipio = $_POST["selectCities"];
	$operador = $_POST["operador"];
		
	echo $divisionTerritorial."<br/>";
	echo $departamento."<br/>";
	echo $municipio."<br/>";
	echo $operador."<br/>";
}
?>
