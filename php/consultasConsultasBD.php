
<?php
/*
 * Este script se utiliza para realizar las consultas auxiliares de la aplicación consultas
 */
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	$tipoConsulta = $_POST["consulta"];
	$idConsulta = $_POST["idConsulta"];
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();

	if($tipoConsulta=='divisionTerritorial')
	{
 	   echo "<input type=button class=\"botonazul\" onclick=\"javascript:consultarNacionales();\" value=\"Selección nacional\" />\n";

	   echo "<select name=\"selectTerritorialDivision\"  id=\"selectTerritorialDivision\" onchange=\"javascript:borrarDepartamentos();\">";
	   $query="select \"ID_Territorial_Division\", initcap(\"Territorial_Division_Name\") as Territorial_Division_Name from territorial_divisions";
	   
	   $result= $objconexionBD->enviarConsulta($query);
	   while ($row =  pg_fetch_array ($result))
	   {
		  print ("<option value=$row[ID_Territorial_Division]>");
		  print ("$row[territorial_division_name]");
		  print ("</option>\n");		
		}
		echo "</select>";
		echo "<div id=\"enlaceDepartamentos\">";
 	    echo "<input type=button class=\"botonverde\" onclick=\"javascript:consultarDepartamentos();\" value=\"Selecciónar departamento\" />\n";

		echo "</div>";
		pg_free_result($result);			
	}

	if($tipoConsulta=='departamentos')
	{
	   echo "<select id=\"selectDepartaments\"  onchange=\"javascript:borrarMunicipios();\">";
	   $query="select * from departaments where \"ID_Territorial_Division\"=".$idConsulta.";";
	   
	   $result= $objconexionBD->enviarConsulta($query);
	   while ($row =  pg_fetch_array ($result))
	   {
		  print ("<option value=$row[ID_departament]>");
		  print ("$row[departament_name]");
		  print ("</option>\n");		
		}
		echo "</select>";
		echo "<div id=\"enlaceMunicipios\">";
 	    echo "<input type=button class=\"botonamarillo\" onclick=\"javascript:consultarMunicipios();\" value=\"Selecciónar municipio\" />\n";

		echo "</div>";
		pg_free_result($result);			
	}
	
	
	if($tipoConsulta=='municipios')
	{	
	   echo "<select id=\"selectCities\">";
	   $query="select * from cities where \"ID_departament\"=".$idConsulta.";";
	   
	   $result= $objconexionBD->enviarConsulta($query);
	   while ($row =  pg_fetch_array ($result))
	   {
		  print ("<option value=$row[ID_cities]>");
		  print ("$row[city_name]");
		  print ("</option>\n");		
		}
		echo "</select>";	
		pg_free_result($result);				
	}
?>
