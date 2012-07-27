<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	$tipoConsulta = $_POST["consulta"];
	$idConsulta = $_POST["idConsulta"];
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();

	if($tipoConsulta=='divisionTerritorial')
	{
	   echo "<select id=\"selectTerritorialDivision\" onchange=\"javascript:borrarDepartamentos();\">";
	   $query="select \"ID_Territorial_Division\", initcap(\"Territorial_Division_Name\") as Territorial_Division_Name from territorial_divisions";
	   
	   $result= $objconexionBD->enviarConsulta($query);
	   while ($row =  pg_fetch_array ($result))
	   {
		  print ("<option value=$row[ID_Territorial_Division]>");
		  print ("$row[territorial_division_name]");
		  print ("</option>\n");		
		}
		echo "</select>";
		echo "<a href=\"#\" onclick=\"javascript:consultarDepartamentos();\"> Seleccionar departamento </a>";
		pg_free_result($result);			
	}
	else{
		if($tipoConsulta=='departamentos')
		{
		   echo "<select id=\"selectDepartaments\" onchange=\"javascript:borrarMunicipios();\">";
		   $query="select * from departaments where \"ID_Territorial_Division\"=".$idConsulta.";";
		   
		   $result= $objconexionBD->enviarConsulta($query);
		   while ($row =  pg_fetch_array ($result))
		   {
			  print ("<option value=$row[ID_departament]>");
			  print ("$row[departament_name]");
			  print ("</option>\n");		
			}
			echo "</select>";
			echo "<a href=\"#\" onclick=\"javascript:consultarMunicipios();\"> Seleccionar municipio </a>";
			pg_free_result($result);			
		}
		else
		{
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
			else
			{
				if($tipoConsulta=='bandas')
				{	
				   echo "<select id=\"selectBands\">";
				   $query="select * from frequency_bands where \"ID_frequency_bands\" >= 4";
				   
				   print ("<option value=-1>");
				   print ("Seleccionar");
				   print ("</option>\n");					   
				   
				   $result= $objconexionBD->enviarConsulta($query);
				   while ($row =  pg_fetch_array ($result))
				   {
					  print ("<option value=$row[ID_frequency_bands]>");
					  print ("$row[frequency_bands_name]");
					  print ("</option>\n");		
					}
					echo "</select>";	
					pg_free_result($result);				
				}
				else
				{
					if($tipoConsulta=='rangos' && $idConsulta>=0)
					{	
					   echo "<select id=\"selectRanks\" onchange=\"javascript:consultarRangos();\">";
					   $query="select * from frequency_ranks where \"ID_frequency_bands\"=".$idConsulta.";";
					   
					   $result= $objconexionBD->enviarConsulta($query);
					   while ($row =  pg_fetch_array ($result))
					   {
						  print ("<option value=$row[ID_frequency_bands]>");
						  print ("$row[frequency_ranks_name]");
						  print ("</option>\n");		
						}
						echo "</select>";	
						pg_free_result($result);				
					}
					else
					{
							if($idConsulta<=0) echo " ";
					}					
				}				
				
			}
		
		}		
	}

   
   $objconexionBD->cerrarConexion();		
?>
