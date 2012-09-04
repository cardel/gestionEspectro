<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	$tipoConsulta = $_POST["consulta"];
	
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();

	if($tipoConsulta=='operadores')
	{
	   echo "<select name=\"operadores\">";
	   $query="select \"ID_Operator\" as id, operators_name from operators;";
	   
	   $result= $objconexionBD->enviarConsulta($query);
	   while ($row =  pg_fetch_array ($result))
	   {
		  print ("<option value=$row[id]>");
		  print ("$row[operators_name]");
		  print ("</option>\n");		
		}
		echo "</select>";
		pg_free_result($result);			
	}
	
	if($tipoConsulta=='crearPostParaListas')
	{	
	   $selectBand = $_POST["selectBand"];
	   $selectRanks = $_POST["selectRanks"];
	   $selectTerritorialDivision = $_POST["selectTerritorialDivision"];
	   $selectDepartaments = $_POST["selectDepartaments"];
	   $selectCities = $_POST["selectCities"];
	   
	   echo "<input type=\"hidden\"	name=\"selectBandForm\" value=".$selectBand." />";
	   echo "<input type=\"hidden\"	name=\"selectRanksForm\" value=".$selectRanks." />";
	   echo "<input type=\"hidden\"	name=\"selectTerritorialDivisionForm\" value=".$selectTerritorialDivision." />";
	   echo "<input type=\"hidden\"	name=\"selectDepartamentsForm\" value=".$selectDepartaments." />";
	   echo "<input type=\"hidden\"	name=\"selectCitiesForm\" value=".$selectCities." />";
	   
	}	
	$objconexionBD->cerrarConexion();
?>
