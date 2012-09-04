<?php
$accion = $_POST["accion"];

if($accion=="operador")
{
	$divisionTerritorial = $_POST["selectTerritorialDivision"];
	$departamento = $_POST["selectDepartaments"];
	$municipio = $_POST["selectCities"];
	$operador = $_POST["operadorSel"];
		
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th class='estilo'>Archivo</th>\n";
	echo "<th class='estilo'>Visualizar</th>\n";
	echo "<th class='estilo'>Acción</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";
	echo "</tbody>\n";
    echo "</table>\n";	
	
	echo $divisionTerritorial."<br/>";
	echo $departamento."<br/>";
	echo $municipio."<br/>";
	echo $operador."<br/>";
}
?>
