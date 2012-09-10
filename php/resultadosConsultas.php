<?php
require ("/var/www/html/site/gestionEspectro/php/consultasAplicacion.php");

$objconexionBD = new conexionBD();
$objconexionBD->abrirConexion();


$accion = $_POST["accion"];
$idConsulta=1;

if($accion=="rangosBD" || $accion=="bandasBD") $idConsulta = $_POST["idConsulta"];

if($accion=="operador")
{
	$divisionTerritorial = $_POST["selectTerritorialDivision"];
	$departamento = $_POST["selectDepartaments"];
	$municipio = $_POST["selectCities"];
	$operador = $_POST["operadorSel"];
	
    echo "<table width='100%' id='tabla1' border='1'>\n";		
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Rango de frecuencia</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";
	
	$tipoAsignacion = "";
	$lugar="";
	
	if($divisionTerritorial==-1)
	{
		$tipoAsignacion = "channel_assignations_national";
		$lugar="";
	}
	else
	{			
		if($departamento==-1)
		{
			$tipoAsignacion = "channel_assignations_per_territorialdivision";
			$lugar=" and \"ID_Territorial_Division\"=".$divisionTerritorial." ";
		}
		else
		{
			if($municipio==-1)
			{
				$tipoAsignacion = "channel_assignations_per_departament";
				$lugar=" and \"ID_departament\" =".$departamento." ";
			}
			else
			{
				$tipoAsignacion = "channel_assignations_per_city";
				$lugar=" and \"ID_cities\"=".$municipio." ";
			}
		}		
	}
	
	
	
	$query = "select channel_number, frequency_ranks_name, channel_description from channels_assignations natural join channels natural join frequency_ranks natural join ".$tipoAsignacion." where \"ID_Operator\"=".$operador."  ".$lugar." order by \"ID_frequency_ranks\",\"ID_channels\";";

	$result= $objconexionBD->enviarConsulta($query);
	while ($row =  pg_fetch_array ($result))
	{
	  echo "<tr>";
	  echo "<td>".$row["channel_number"]."</td>";
	  echo "<td>".$row["frequency_ranks_name"]."</td>";
	  echo "<td>".$row["channel_description"]."</td>";
	  echo "</tr>";
	}

	echo "</tbody>\n";
	echo "<tfoot>\n";
	echo "<tr>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Rango de frecuencia</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "</tr>\n";
	echo "</tfoot>\n";
    echo "</table>\n";	

	//Activar jtables
	 echo "<script>$('#tabla1').dataTable( {
	    \"sPaginationType\": \"full_numbers\",
        \"oLanguage\": {
                \"sUrl\": \"js/spanish.txt\"
            }
        } );

        </script>";
     pg_free_result($result);
}


if($accion=="territorio")
{
	$divisionTerritorial = $_POST["selectTerritorialDivision"];
	$departamento = $_POST["selectDepartaments"];
	$municipio = $_POST["selectCities"];
	
    echo "<table width='100%' id='tabla1' border='1'>\n";		
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Rango de frecuencia</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "<th>Operador</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";
	
	$tipoAsignacion = "";
	$lugar="";
	
	if($divisionTerritorial==-1)
	{
		$tipoAsignacion = "channel_assignations_national";
		$lugar="";
	}
	else
	{			
		if($departamento==-1)
		{
			$tipoAsignacion = "channel_assignations_per_territorialdivision";
			$lugar=" and \"ID_Territorial_Division\"=".$divisionTerritorial." ";
		}
		else
		{
			if($municipio==-1)
			{
				$tipoAsignacion = "channel_assignations_per_departament";
				$lugar=" and \"ID_departament\" =".$departamento." ";
			}
			else
			{
				$tipoAsignacion = "channel_assignations_per_city";
				$lugar=" and \"ID_cities\"=".$municipio." ";
			}
		}		
	}
	
	
	$query = "select channel_number, operators_name, frequency_ranks_name, channel_description from channels_assignations natural join channels natural join frequency_ranks natural join ".$tipoAsignacion." natural join operators where true ".$lugar." order by \"ID_frequency_ranks\",\"ID_channels\";";

	$result= $objconexionBD->enviarConsulta($query);
	while ($row =  pg_fetch_array ($result))
	{
	  echo "<tr>";
	  echo "<td>".$row["channel_number"]."</td>";
	  echo "<td>".$row["frequency_ranks_name"]."</td>";
	  echo "<td>".$row["channel_description"]."</td>";
	  echo "<td>".$row["operators_name"]."</td>";
	  echo "</tr>";
	}

	echo "</tbody>\n";
	echo "<tfoot>\n";
	echo "<tr>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Rango de frecuencia</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "<th>Operador</th>\n";
	echo "</tr>\n";
	echo "</tfoot>\n";
    echo "</table>\n";		

	
	//Activar jtables
	 echo "<script>$('#tabla1').dataTable( {
	    \"sPaginationType\": \"full_numbers\",
         \"oLanguage\": {
                \"sUrl\": \"js/spanish.txt\"
            }
        } );</script>";

	pg_free_result($result);
}


if($accion=="bandasBD")
{	
   echo "<select id=\"selectBands\" onchange=\"javascript:consultarRangosBD();\">";
   $query="select * from frequency_bands where \"ID_frequency_bands\" >= 4";
   
   print ("<option value=-1>");
   print ("Seleccionar");
   print ("</option>\n");					   
   
   $result= $objconexionBD->enviarConsulta($query);
   while ($row =  pg_fetch_array ($result))
   {
	  print ("<option value=$row[ID_frequency_bands]>");
	  print ($row["frequency_bands_name"]." ".$row["frequency_bands_range"]);
	  print ("</option>\n");		
	}
	echo "</select>";

	pg_free_result($result);
}
				
					

if($accion=="rangosBD" && $idConsulta>=0)
{	
	echo "<select id=\"selectRanks\" name=\"selectRanks\" >";
	$query="select * from frequency_ranks where \"ID_frequency_bands\"=".$idConsulta.";";
	print ("<option value=-1>");
	print ("Seleccionar");
	print ("</option>\n");	
				   
	$result= $objconexionBD->enviarConsulta($query);
	while ($row =  pg_fetch_array ($result))
	{
	  print ("<option value=$row[ID_frequency_ranks]>");
	  print ($row["frequency_ranks_name"]);
	  print ("</option>\n");		
	}
	echo "</select>";	
	echo "<br/>";
    echo "<input type=\"button\" class=\"botonazul\" value=\"Consultar por frecuencia\" onclick=\"javascript:asignacionFrecuencias();\">";
	pg_free_result($result);				
}


if($accion=="frecuencia")
{
	$bandas = $_POST["bandas"];
	$rangos = $_POST["rangos"];

	echo "<strong style=\"font-size:14px; font-weight:bold;\">Asignación nacional</strong>";

    echo "<table width='100%' id='tabla2' border='1'>\n";		
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Operador</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";
	

	$query = "select channel_number, operators_name, channel_description from channels_assignations natural join channels natural join frequency_ranks natural join channel_assignations_national natural join operators where \"ID_frequency_ranks\"=".$rangos ." order by \"ID_channels\";";

	$result= $objconexionBD->enviarConsulta($query);
	while ($row =  pg_fetch_array ($result))
	{
	  echo "<tr>";
	  echo "<td>".$row["channel_number"]."</td>";
	  echo "<td>".$row["operators_name"]."</td>";
	  echo "<td>".$row["channel_description"]."</td>";
	  echo "</tr>";
	}
	
	echo "</tbody>\n";
	echo "<tfoot>\n";
	echo "<tr>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Operador</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "</tr>\n";
	echo "</tfoot>\n";
    echo "</table>\n";		

	
	//Activar jtables
	 echo "<script>$('#tabla2').dataTable( {
	    \"sPaginationType\": \"full_numbers\",
         \"oLanguage\": {
                \"sUrl\": \"js/spanish.txt\"
            }
        } );</script>";
	
	echo "<br/>";
	echo "<br/>";
	echo "<strong style=\"font-size:14px; font-weight:bold;\">Asignación territorial/regional</strong>";

    echo "<table width='100%' id='tabla3' border='1'>\n";		
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Entidad territorial</th>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Operador</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";

	$query = "select channel_number, operators_name, channel_description, \"Territorial_Division_Name\" as namet from territorial_divisions natural join channels_assignations natural join channels natural join frequency_ranks natural join channel_assignations_per_territorialdivision natural join operators where \"ID_frequency_ranks\"=".$rangos ." order by \"ID_Territorial_Division\", \"ID_channels\";";

	
	$result= $objconexionBD->enviarConsulta($query);

	while ($row =  pg_fetch_array ($result))
	{
	  echo "<tr>";
	  echo "<td>".$row["namet"]."</td>";
	  echo "<td>".$row["channel_number"]."</td>";
	  echo "<td>".$row["operators_name"]."</td>";
	  echo "<td>".$row["channel_description"]."</td>";
	  echo "</tr>";
	}

	echo "</tbody>\n";
	echo "<tfoot>\n";
	echo "<tr>\n";
	echo "<th>Entidad territorial</th>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Operador</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "</tr>\n";
	echo "</tfoot>\n";
    echo "</table>\n";		

	
	//Activar jtables
	 echo "<script>$('#tabla3').dataTable( {
	    \"sPaginationType\": \"full_numbers\",
         \"oLanguage\": {
                \"sUrl\": \"js/spanish.txt\"
            }
        } );</script>";
 	echo "<br/>";
	echo "<br/>";       
	echo "<strong style=\"font-size:14px; font-weight:bold;\">Asignación departamental</strong>";

    echo "<table width='100%' id='tabla4' border='1'>\n";		
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Departamento</th>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Operador</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";
	pg_free_result($result);
	 


	$query = "select channel_number, operators_name, channel_description, departament_name from departaments natural join channels_assignations natural join channels natural join frequency_ranks natural join channel_assignations_per_departament natural join operators where \"ID_frequency_ranks\"=".$rangos ." order by \"ID_departament\", \"ID_channels\";";

	$result= $objconexionBD->enviarConsulta($query);
	while ($row =  pg_fetch_array ($result))
	{
	  echo "<tr>";
	  echo "<td>".$row["departament_name"]."</td>";
	  echo "<td>".$row["channel_number"]."</td>";
	  echo "<td>".$row["operators_name"]."</td>";
	  echo "<td>".$row["channel_description"]."</td>";
	  echo "</tr>";
	}

	echo "</tbody>\n";
	echo "<tfoot>\n";
	echo "<tr>\n";
	echo "<th>Departamento</th>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Operador</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "</tr>\n";
	echo "</tfoot>\n";
    echo "</table>\n";		

	
	//Activar jtables
	 echo "<script>$('#tabla4').dataTable( {
	    \"sPaginationType\": \"full_numbers\",
         \"oLanguage\": {
                \"sUrl\": \"js/spanish.txt\"
            }
        } );</script>";
 	echo "<br/>";
	echo "<br/>";       
 	echo "<strong style=\"font-size:14px; font-weight:bold;\">Asignación Municipal</strong>";

    echo "<table width='100%' id='tabla5' border='1'>\n";		
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Municipio</th>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Operador</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";
	pg_free_result($result);
	


	$query = "select channel_number, operators_name, channel_description, city_name from cities natural join channels_assignations natural join channels natural join frequency_ranks natural join channel_assignations_per_city natural join operators where \"ID_frequency_ranks\"=".$rangos ." order by \"ID_cities\", \"ID_channels\";";

	$result= $objconexionBD->enviarConsulta($query);
	while ($row =  pg_fetch_array ($result))
	{
	  echo "<tr>";
	  echo "<td>".$row["city_name"]."</td>";
	  echo "<td>".$row["channel_number"]."</td>";
	  echo "<td>".$row["operators_name"]."</td>";
	  echo "<td>".$row["channel_description"]."</td>";
	  echo "</tr>";
	}	
	
	echo "</tbody>\n";
	echo "<tfoot>\n";
	echo "<tr>\n";
	echo "<th>Municipio</th>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Operador</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "</tr>\n";
	echo "</tfoot>\n";
    echo "</table>\n";		

	
	//Activar jtables
	 echo "<script>$('#tabla5').dataTable( {
	    \"sPaginationType\": \"full_numbers\",
         \"oLanguage\": {
                \"sUrl\": \"js/spanish.txt\"
            }
        } );
        
        </script>";
	pg_free_result($result);
}


if($accion=="operadores")
{	
	$query="select * from operators;";

    echo "<table width='100%' id='tabla8' border='1'>\n";		
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Operador</th>\n";
	echo "<th>Acción</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";
				   
	$result= $objconexionBD->enviarConsulta($query);
	while ($row =  pg_fetch_array ($result))
	{
	  echo "<tr>";
	  echo "<td>".$row["operators_name"]."</td>";
	  echo "<td><a href=\"?q=node/41&&idOperador=".$row["ID_Operator"]."\">Editar</a></td>";
	  echo "</tr>";	
	}

	echo "</tbody>\n";
	echo "<tfoot>\n";
	echo "<tr>\n";
	echo "<th>Operador</th>\n";
	echo "<th>Acción</th>\n";
	echo "</tr>\n";
	echo "</tfoot>\n";
    echo "</table>\n";		

	
	//Activar jtables
	 echo "<script>$('#tabla8').dataTable( {
	    \"sPaginationType\": \"full_numbers\",
         \"oLanguage\": {
                \"sUrl\": \"js/spanish.txt\"
            }
        } );
        
        </script>";
    
	pg_free_result($result);				
}

if($accion=="servicios")
{	
	$query="select * from services;";

	
    echo "<table width='100%' id='tabla9' border='1'>\n";		
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Nombre servicio</th>\n";
	echo "<th>Descripción</th>\n";
	echo "<th>Acciones</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";
					   
	$result= $objconexionBD->enviarConsulta($query);
	while ($row =  pg_fetch_array ($result))
	{
	  echo "<tr>";
	  echo "<td>".$row["services_name"]."</td>";
	  echo "<td>".$row["services_description"]."</td>";
	  echo "<td>Editar Servicio</td>";
	  echo "</tr>";	
	}

	echo "</tbody>\n";
	echo "<tfoot>\n";
	echo "<tr>\n";
	echo "<th>Nombre servicio</th>\n";
	echo "<th>Descripción</th>\n";
	echo "<th>Acciones</th>\n";
	echo "</tr>\n";
	echo "</tfoot>\n";
    echo "</table>\n";		

	
	//Activar jtables
	 echo "<script>$('#tabla9').dataTable( {
	    \"sPaginationType\": \"full_numbers\",
         \"oLanguage\": {
                \"sUrl\": \"js/spanish.txt\"
            }
        } );
        
        </script>";
    
	pg_free_result($result);				
}
if($accion=="serviciosList")
{	
	echo "<select id=\"selServices\"  class=\"textbox txtFec\">";
   $query="select * from services;";	
   
   print ("<option value=-1>");
   print ("Seleccionar");
   print ("</option>\n");	
				   
   $result= $objconexionBD->enviarConsulta($query);
   while ($row =  pg_fetch_array ($result))
   {
	  print ("<option value=$row[ID_service]>");
	  print ("$row[services_name]");
	  print ("</option>\n");		
	}
	echo "</select>";	


	pg_free_result($result);
}


$objconexionBD->cerrarConexion();
?>
