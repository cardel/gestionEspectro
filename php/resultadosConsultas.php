<?php
$accion = $_POST["accion"];

if($accion=="operador")
{
	$divisionTerritorial = $_POST["selectTerritorialDivision"];
	$departamento = $_POST["selectDepartaments"];
	$municipio = $_POST["selectCities"];
	$operador = $_POST["operadorSel"];
    echo "<table width='100%' id='tabla1' class='tabla' border='1'>\n";		
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th class='estilo'>Archivo</th>\n";
	echo "<th class='estilo'>Visualizar</th>\n";
	echo "<th class='estilo'>Acción</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";
	echo "<tr><td class='estilo'>1</td><td class='estilo'>2</td><td class='estilo'>3</td></tr>";
	echo "</tbody>\n";
    echo "</table>\n";	
	
	echo $divisionTerritorial."<br/>";
	echo $departamento."<br/>";
	echo $municipio."<br/>";
	echo $operador."<br/>";
	
	echo "<script>	$('#tabla1').dataTable( {
            \"oLanguage\": {
                \"sUrl\": \"js/spanish.txt\"
            }
        } );</script>";
}
?>
