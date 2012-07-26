<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	$tipoConsulta = $POST_["consulta"];
	$idConsulta = $POST_["idConsulta"];
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();

	if($idConsulta=='departamentos')
	{
	   echo "<select id=\"selectDepartaments\" onclick=\"consultarMunicipios();\">";
	   $query="select * from departaments where \"ID_Territorial_Division\"=".$idConsulta.";";
	   
	   $result= $objconexionBD->enviarConsulta($query);
	   while ($row =  pg_fetch_array ($result))
	   {
		  print ("<option value=$row[ID_departament]>");
		  print ("$row[departament_name]");
		  print ("</option>\n");		
		}			
	}
	else
	{
		if($idConsulta=='municipios')
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
		}
		
	}
   pg_free_result($result);
   $objconexionBD->cerrarConexion();		
?>