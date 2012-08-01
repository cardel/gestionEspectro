<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	$tipoConsulta = $_POST["consulta"];
	$idConsulta = $_POST["idConsulta"];
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();

	if($tipoConsulta=='divisionTerritorial')
	{
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
		echo "<a href=\"#\" id=\"consultarDepartamentos\" onclick=\"javascript:consultarDepartamentos();\"> Seleccionar departamento </a>";
		echo "</div>";
		pg_free_result($result);			
	}
	else{
		if($tipoConsulta=='departamentos')
		{
		   echo "<select id=\"selectDepartaments\" name=\"selectDepartaments\" onchange=\"javascript:borrarMunicipios();\">";
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
			echo "<a href=\"#\" id=\"consultarMunicipios\" onclick=\"javascript:consultarMunicipios();\"> Seleccionar municipio </a>";
			echo "</div>";
			pg_free_result($result);			
		}
		else
		{
			if($tipoConsulta=='municipios')
			{	
			   echo "<select id=\"selectCities\" name=\"selectCities\">";
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
				   echo "<select id=\"selectBands\" name=\"selectBands\" onchange=\"javascript:consultarRangos();\">";
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
					   echo "<select id=\"selectRanks\" name=\"selectRanks\" onchange=\"javascript:mostrarParametros();\">";
					   $query="select * from frequency_ranks where \"ID_frequency_bands\"=".$idConsulta.";";
					   print ("<option value=-1>");
					   print ("Seleccionar");
					   print ("</option>\n");	
					   				   
					   $result= $objconexionBD->enviarConsulta($query);
					   while ($row =  pg_fetch_array ($result))
					   {
						  print ("<option value=$row[ID_frequency_ranks]>");
						  print ("$row[frequency_ranks_name]");
						  print ("</option>\n");		
						}
						echo "</select>";	


						pg_free_result($result);				
					}
					else
					{
							if($idConsulta<=0) echo " ";
							
							if($tipoConsulta=='numCanalesEnBanda' && $idConsulta>=0)
							{
								$query="select channels_number from frequency_ranks where \"ID_frequency_ranks\" =".$idConsulta.";";
								$result= $objconexionBD->enviarConsulta($query);
							    while ($row =  pg_fetch_array ($result))
							    {
								  print ("$row[channels_number]");
								}
							}
							if($tipoConsulta=='numCanalesEnBandaForm' && $idConsulta>=0)
							{
								$query="select channels_number from frequency_ranks where \"ID_frequency_ranks\" =".$idConsulta.";";
								$result= $objconexionBD->enviarConsulta($query);
							    while ($row =  pg_fetch_array ($result))
							    {
								  echo "<input type=\"hidden\" name=\"numeroCanales\" value=".$row[channels_number]."/>";
								}
							}
								

							if($tipoConsulta=='serviciosEnBanda' && $idConsulta>=0)
							{
							   echo "<ul>";
							   $query="select services_name from services_by_frequency_ranks natural join services where \"ID_frequency_ranks\"=".$idConsulta.";";
											   
							   $result= $objconexionBD->enviarConsulta($query);
							   while ($row =  pg_fetch_array ($result))
							   {
								  print ("<li>");
								  print ("$row[services_name]");
								  print ("</li>\n");		
								}
								echo "</ul>";	
								pg_free_result($result);									
							}

							if($tipoConsulta=='topeOperadorBanda' && $idConsulta>=0)
							{
								$query="select max_channels_per_operator from frequency_ranks where \"ID_frequency_ranks\" =".$idConsulta.";";
								$result= $objconexionBD->enviarConsulta($query);
							    while ($row =  pg_fetch_array ($result))
							    {
								  print ("$row[max_channels_per_operator]");
								}
							}	
			

							if($tipoConsulta=='serviciosPorOperador')
							{	
							   echo "<select id=\"selOperador\" name=\"selOperador\" class=\"textbox txtFec\">";
							   $query="select * from operators where \"ID_Operator\" in ( select DISTINCT (\"ID_Operator\") from operators natural join services_by_operator where \"ID_service\" in (select \"ID_service\" from services_by_frequency_ranks where \"ID_frequency_ranks\"=".$idConsulta."));";	
							   
							   print ("<option value=-1>");
							   print ("Seleccionar");
							   print ("</option>\n");	
											   
							   $result= $objconexionBD->enviarConsulta($query);
							   while ($row =  pg_fetch_array ($result))
							   {
								  print ("<option value=$row[ID_Operator]>");
								  print ("$row[operators_name]");
								  print ("</option>\n");		
								}
								echo "</select>";	


								pg_free_result($result);				
							}						
							
							
				
					}					
				}				
				
			}
		
		}		
	}

   
   $objconexionBD->cerrarConexion();		
?>
