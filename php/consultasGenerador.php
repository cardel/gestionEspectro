<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	$tipoConsulta = $_POST["consulta"];
	$idConsulta = $_POST["idConsulta"];
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();

	echo "entro";

	if($idConsulta=='departamentos')
	{
	   echo "<select id=\"selectDepartaments\" onchange=\"javascript:consultarMunicipios();\">";
	   $query="select * from departaments where \"ID_Territorial_Division\"=".$idConsulta.";";
	   
	   $result= $objconexionBD->enviarConsulta($query);
	   while ($row =  pg_fetch_array ($result))
	   {
		  print ("<option value=$row[ID_departament]>");
		  print ("$row[departament_name]");
		  print ("</option>\n");		
		}
		echo "</select>";
		pg_free_result($result);			
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
			echo "</select>";	
			pg_free_result($result);				
		}
	
	}
   
   $objconexionBD->cerrarConexion();		
?>
