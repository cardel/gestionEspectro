<?php
require ("/var/www/html/site/gestionEspectro/php/consultasAplicacion.php");

$objconexionBD = new conexionBD();
$objconexionBD->abrirConexion();


$accion = $_POST["accion"];
$idConsulta = $_POST["idConsulta"];

if($accion=="operador")
{
	$divisionTerritorial = $_POST["selectTerritorialDivision"];
	$departamento = $_POST["selectDepartaments"];
	$municipio = $_POST["selectCities"];
	$operador = $_POST["operadorSel"];
	
    echo "<table width='100%' id='tabla1' class='tabla' border='1'>\n";		
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th class='estilo'>Canal</th>\n";
	echo "<th class='estilo'>Rango de frecuencia</th>\n";
	echo "<th class='estilo'>Descripción canal</th>\n";
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
	  echo "<td class='estilo'>".$row["channel_number"]."</td>";
	  echo "<td class='estilo'>".$row["frequency_ranks_name"]."</td>";
	  echo "<td class='estilo'>".$row["channel_description"]."</td>";
	  echo "</tr>";
	}

	echo "</tbody>\n";
	echo "<tfoot>\n";
	echo "<tr>\n";
	echo "<th class='estilo'>Canal</th>\n";
	echo "<th class='estilo'>Rango de frecuencia</th>\n";
	echo "<th class='estilo'>Descripción canal</th>\n";
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


if($accion=="territorio")
{
	$divisionTerritorial = $_POST["selectTerritorialDivision"];
	$departamento = $_POST["selectDepartaments"];
	$municipio = $_POST["selectCities"];
	
    echo "<table width='100%' id='tabla1' class='tabla' border='1'>\n";		
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th class='estilo'>Canal</th>\n";
	echo "<th class='estilo'>Rango de frecuencia</th>\n";
	echo "<th class='estilo'>Descripción canal</th>\n";
	echo "<th class='estilo'>Operador</th>\n";
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
	  echo "<td class='estilo'>".$row["channel_number"]."</td>";
	  echo "<td class='estilo'>".$row["frequency_ranks_name"]."</td>";
	  echo "<td class='estilo'>".$row["channel_description"]."</td>";
	  echo "<td class='estilo'>".$row["operators_name"]."</td>";
	  echo "</tr>";
	}

	echo "</tbody>\n";
	echo "<tfoot>\n";
	echo "<tr>\n";
	echo "<th class='estilo'>Canal</th>\n";
	echo "<th class='estilo'>Rango de frecuencia</th>\n";
	echo "<th class='estilo'>Descripción canal</th>\n";
	echo "<th class='estilo'>Operador</th>\n";
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
	echo "<select id=\"selectRanks\" name=\"selectRanks\" onchange=\"javascript:mostrarParametros();\">";
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

    echo "<input type=\"button\" class=\"botonazul\" value=\"Consultar por frecuencia\" onclick=\"javascript:\">";
	pg_free_result($result);				
	}
$objconexionBD->cerrarConexion();
?>
