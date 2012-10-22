<?php
require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");

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
	echo "<th>Tipo de asignación</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";
	
	$tipoAsignacion = "";
	$lugar="";
	$termino = 0;
	$tipoAsignacionTabla;
	
	while($termino==0)
	{
		
		if($divisionTerritorial==-1)
		{
			$tipoAsignacion = "channel_assignations_national";
			$lugar="";
			$termino = -1;
			$tipoAsignacionTabla="Nacional";
		}
		
		else
		{			
			if($departamento==-1)
			{
				$tipoAsignacion = "channel_assignations_per_territorialdivision";
				$lugar=" and \"ID_Territorial_Division\"=".$divisionTerritorial." ";
				$divisionTerritorial=-1;
				$tipoAsignacionTabla="Territorial";
			}
			else
			{
				if($municipio==-1)
				{
					$tipoAsignacion = "channel_assignations_per_departament";
					$lugar=" and \"ID_departament\" =".$departamento." ";				
					
					//Consultar ID_Territorial
					$query="select \"ID_Territorial_Division\" as idter from departaments where \"ID_departament\" =".$departamento.";";						
					$result= $objconexionBD->enviarConsulta($query);	
					while ($row =  pg_fetch_array ($result))
					{
						$divisionTerritorial= $row['idter'];
					}	
					pg_free_result($result);
					$departamento=-1;
					$tipoAsignacionTabla="Departamental";
				}
				else
				{
					$tipoAsignacion = "channel_assignations_per_city";
					$lugar=" and \"ID_cities\"=".$municipio." ";				
					
					//Obtener ID departamento
					$query="select \"ID_departament\" as iddep from cities where \"ID_cities\" =".$municipio.";";	
					$result= $objconexionBD->enviarConsulta($query);	

					while ($row =  pg_fetch_array ($result))
					{
						$departamento = $row['iddep'];
					}	
					pg_free_result($result);					
					$municipio=-1;
					$tipoAsignacionTabla="Municipal";
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
		  echo "<td>".$tipoAsignacionTabla."</td>";
		  echo "</tr>";
		}
		
		
	}
	

	echo "</tbody>\n";
	echo "<tfoot>\n";
	echo "<tr>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Rango de frecuencia</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "<th>Tipo de asignación</th>\n";
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


if($accion=="frecuencia")
{
	$divisionTerritorial = $_POST["selectTerritorialDivision"];
	$departamento = $_POST["selectDepartaments"];
	$municipio = $_POST["selectCities"];
	$bandas = $_POST["bandas"];
	$rangos = $_POST["rangos"];
	
	$consultaRangosFrecuencia=" and \"ID_frequency_bands\"=".$bandas;
	
	if($rangos != -1) $consultaRangosFrecuencia=" and \"ID_frequency_ranks\"=".$rangos;
	
    echo "<table width='100%' id='tabla1' border='1'>\n";		
	echo "<thead>\n";
	echo "<tr>\n";
	if($rangos == -1) echo "<th>Rango de frecuencia</th>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "<th>Operador</th>\n";
	echo "<th>Tipo de asignación</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";
	
	$tipoAsignacion = "";
	$lugar="";
	$termino = 0;
	$tipoAsignacionTabla;
	echo $divisionTerritorial;

	while($termino==0)
	{	
		if($divisionTerritorial==-1)
		{
			$tipoAsignacion = "channel_assignations_national";
			$lugar="";
			$termino = -1;
			$tipoAsignacionTabla="Nacional";
		}
		else
		{			
			if($departamento==-1)
			{
				$tipoAsignacion = "channel_assignations_per_territorialdivision";
				$lugar=" and \"ID_Territorial_Division\"=".$divisionTerritorial." ";
				$divisionTerritorial=-1;
				$tipoAsignacionTabla="Territorial";
			}
			else
			{
				if($municipio==-1)
				{
					$tipoAsignacion = "channel_assignations_per_departament";
					$lugar=" and \"ID_departament\" =".$departamento." ";
					
					//Consultar ID_Territorial
					$query="select \"ID_Territorial_Division\" as idter from departaments where \"ID_departament\" =".$departamento.";";						
					$result= $objconexionBD->enviarConsulta($query);	
					while ($row =  pg_fetch_array ($result))
					{
						$divisionTerritorial= $row['idter'];
					}	
					pg_free_result($result);
					$departamento=-1;
					$tipoAsignacionTabla="Departamental";
				}
				else
				{
					$tipoAsignacion = "channel_assignations_per_city";
					$lugar=" and \"ID_cities\"=".$municipio." ";
					
					//Obtener ID departamento
					$query="select \"ID_departament\" as iddep from cities where \"ID_cities\" =".$municipio.";";	
					$result= $objconexionBD->enviarConsulta($query);	

					while ($row =  pg_fetch_array ($result))
					{
						$departamento = $row['iddep'];
					}	
					pg_free_result($result);					
					$municipio=-1;
					$tipoAsignacionTabla="Municipal";
				}
			}		
		}
		
		
		$query = "select channel_number, operators_name, frequency_ranks_name, channel_description from channels_assignations natural join channels natural join frequency_ranks natural join ".$tipoAsignacion." natural join operators where true ".$lugar." ".$consultaRangosFrecuencia." order by \"ID_channels\";";

		$result= $objconexionBD->enviarConsulta($query);
		while ($row =  pg_fetch_array ($result))
		{
		  echo "<tr>";
		  if($rangos == -1)  echo "<td>".$row["frequency_ranks_name"]."</td>";
		  echo "<td>".$row["channel_number"]."</td>";
		  echo "<td>".$row["channel_description"]."</td>";
		  echo "<td>".$row["operators_name"]."</td>";
		  echo "<td>".$tipoAsignacionTabla."</td>";
		  echo "</tr>";
		}
	}

	echo "</tbody>\n";
	echo "<tfoot>\n";
	echo "<tr>\n";
	if($rangos == -1) echo "<th>Rango de frecuencia</th>\n";
	echo "<th>Canal</th>\n";
	echo "<th>Descripción canal</th>\n";
	echo "<th>Operador</th>\n";
	echo "<th>Tipo de asignación</th>\n";
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
	echo "<p>Seleccione una rango de frecuencia</p>	";
	echo "<select id=\"selectRanks\" name=\"selectRanks\" >";
	$query="select * from frequency_ranks where \"ID_frequency_bands\"=".$idConsulta.";";
	print ("<option value=-1>");
	print ("Todos");
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
	  echo "<td><a href=\"?q=node/49&&idOperador=".$row["ID_Operator"]."\">Editar</a></td>";
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
/*
 * Se consultan los servicios en una tabla con la opción de editarlos
 */
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
	  echo "<td><a href=\"/site/?q=node/50&&id=".$row["ID_service"]."\" >Editar</a></td>";
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
