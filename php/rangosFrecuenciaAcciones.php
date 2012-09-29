<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	
	/*
	 * Listar bandas de frecuencia
	 */
	function listarBandas()
	{
		$objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();

	    $res="";
		$res.= "<select name=\"selectBands\"\">";
	    $query="select * from frequency_bands where \"ID_frequency_bands\" >= 4";  
				   
	   
	    $result= $objconexionBD->enviarConsulta($query);
	    while ($row =  pg_fetch_array ($result))
	    {
	 	  $res.= ("<option value=$row[ID_frequency_bands]>");
		  $res.= ($row["frequency_bands_name"]." ".$row["frequency_bands_range"]);
		  $res.= ("</option>\n");		
	 	}
		$res.= "</select>";	
		pg_free_result($result);
		$objconexionBD->cerrarConexion();	
		return $res;
	}
	/*
	 * Listar rangos de frecuencia de acuerdo a una banda
	 */
	function listaRangos($idBanda)
	{
		$objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();
	    $res.= "<select id=\"selectRanks\" name=\"selectRanks\" onchange=\"javascript:mostrarParametros();\">";
	    $query="select * from frequency_ranks where \"ID_frequency_bands\"=".$idConsulta.";";
					   
	    $result= $objconexionBD->enviarConsulta($query);
	    while ($row =  pg_fetch_array ($result))
	    {
	 	  $res.= ("<option value=$row[ID_frequency_ranks]>");
	 	  $res.= ($row["frequency_ranks_name"]);
		  $res.= ("</option>\n");		
	 	}
	 	$res.= "</select>";			
		
		$objconexionBD->cerrarConexion();
		return $res;
	}
	
	/*
	 * Retornar nombre banda
	 */
	function nombreBanda($idBanda)
	{
		$objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();

	    $res="";
	    $query="select * from frequency_bands where \"ID_frequency_bands\" >= ".$idBanda;  				   
	   
	    $result= $objconexionBD->enviarConsulta($query);
	    while ($row =  pg_fetch_array ($result))
	    {
		  $res = $row["frequency_bands_name"];
	 	}
		pg_free_result($result);
		$objconexionBD->cerrarConexion();	
		return $res;
	}
	
	/*
	 * Obtener rangos de banda
	 */
	function obtenerBandasPorOperador($idBanda)
	{
		$objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();
		$res = "";
		$res.= "<table width='100%' id='tabla9' border='1'>\n";		
		$res.= "<thead>\n";
		$res.= "<tr>\n";
		$res.= "<th>Rango de frecuencia</th>\n";
		$res.= "<th>Máximo número de canales por operador</th>\n";
		$res.= "<th>Frecuencia inicial (Hz)</th>\n";
		$res.= "<th>Frecuencia final (Hz)</th>\n";
		$res.= "<th>Número de canales</th>\n";
		$res.= "<th>Separación mínima</th>\n";
		$res.= "<th>Descripción</th>\n";
		$res.= "<th>Acciones</th>\n";
		$res.= "</tr>\n";
		$res.= "</thead>\n";
		$res.= "<tbody>\n";
		
		$query="select * from frequency_ranks where \"ID_frequency_bands\"=".$idBanda.";";
						   
		$result= $objconexionBD->enviarConsulta($query);
		   
		while ($row =  pg_fetch_array ($result))
		{
			$res.= "<tr>"; 
			$res.= "<td>".$row[frequency_ranks_name]."</td>";
			$res.= "<td>".$row[max_channels_per_operator]."</td>";
			$res.= "<td>".$row["frequency_begin_Hz"]."</td>";
			$res.= "<td>".$row["frequency_end_Hz"]."</td>";
			$res.= "<td>".$row[channels_number]."</td>";
			$res.= "<td>".$row[channel_separation]."</td>";
			$res.= "<td>".$row[frequency_ranks_description]."</td>";
			$res.= "<td><a href=\"/site/?q=node/51&&idRango=".$row["ID_frequency_ranks"]."&&idBanda=".$idBanda."\" >Editar</a></td>";
			$res.= "</tr>";	
		}

		$res.= "</tbody>\n";
		$res.= "<tfoot>\n";
		$res.= "<tr>\n";
		$res.= "<th>Rango de frecuencia</th>\n";
		$res.= "<th>Máximo número de canales por operador</th>\n";
		$res.= "<th>Frecuencia inicial (Hz)</th>\n";
		$res.= "<th>Frecuencia final (Hz)</th>\n";
		$res.= "<th>Separación mínima</th>\n";
		$res.= "<th>Descripción</th>\n";
		$res.= "<th>Acciones</th>\n";
		$res.= "</tr>\n";
		$res.= "</tfoot>\n";
		$res.= "</table>\n";		

		
		//Activar jtables
		 $res.=  "<script>$('#tabla9').dataTable( {
			\"sPaginationType\": \"full_numbers\",
			 \"oLanguage\": {
					\"sUrl\": \"js/spanish.txt\"
				}
			} );
			
			</script>";
		
		pg_free_result($result);
		$objconexionBD->cerrarConexion();
		return $res;
	}
	
	/*
	 * Obtener datos de un rango específico.
	 */ 
	function datosEditarRangoFrecuencia($idFrecuencia)
	{
		$res = "";
		$objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();
		
		$query="select * from frequency_ranks where \"ID_frequency_ranks\"=".$idFrecuencia.";";
						   
		$result= $objconexionBD->enviarConsulta($query);
		   
		while ($row =  pg_fetch_array ($result))
		{
			$res = $row;
		}
		
		return $res;
	}
	
	/*
	 * Obtener canales asociados a un rango
	 */
	 
	function obtenerCanalesPorRango($idBanda, $idRango)
	{
		$objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();
		$res = "";
		$res.= "<table width='100%' id='tabla9' border='1'>\n";		
		$res.= "<thead>\n";
		$res.= "<tr>\n";
		$res.= "<th>Número de canal</th>\n";
		$res.= "<th>Descripción del canal</th>\n";
		$res.= "<th>Frecuencia de transmisión (Hz)</th>\n";
		$res.= "<th>Frecuencia de recepción (Hz)</th>\n";
		$res.= "<th>¿Está reservado?</th>\n";
		$res.= "<th>¿Está deshabilitado?</th>\n";
		$res.= "<th>Acciones</th>\n";
		$res.= "</tr>\n";
		$res.= "</thead>\n";
		$res.= "<tbody>\n";
		
		$query="select * from channels where \"ID_frequency_ranks\"=".$idRango.";";
						   
		$result= $objconexionBD->enviarConsulta($query);
		   
		while ($row =  pg_fetch_array ($result))
		{
			$res.= "<tr>"; 
			$res.= "<td>".$row["channel_number"]."</td>";
			$res.= "<td>".$row["channel_description"]."</td>";
			$res.= "<td>".$row["TxFrequency"]."</td>";
			$res.= "<td>".$row["RxFrequency"]."</td>";
			$res.= "<td>".$row["reserved"]."</td>";
			$res.= "<td>".$row["disabled"]."</td>";
			$res.= "<td><a href=\"/site/?q=node/52&&idChannel=".$row["ID_channels"]."&&idRango=".$idRango."&&idBanda=".$idBanda."\" >Editar</a></td>";
			$res.= "</tr>";	
		}

		$res.= "</tbody>\n";
		$res.= "<tfoot>\n";
		$res.= "<tr>\n";
		$res.= "<th>Número de canal</th>\n";
		$res.= "<th>Descripción del canal</th>\n";
		$res.= "<th>Frecuencia de transmisión</th>\n";
		$res.= "<th>Frecuencia de recepción</th>\n";
		$res.= "<th>¿Está reservado?</th>\n";
		$res.= "<th>¿Está deshabilitado?</th>\n";
		$res.= "<th>Acciones</th>\n";
		$res.= "</tr>\n";
		$res.= "</tfoot>\n";
		$res.= "</table>\n";		

		
		//Activar jtables
		 $res.=  "<script>$('#tabla9').dataTable( {
			\"sPaginationType\": \"full_numbers\",
			 \"oLanguage\": {
					\"sUrl\": \"js/spanish.txt\"
				}
			} );
			
			</script>";
		
		pg_free_result($result);
		$objconexionBD->cerrarConexion();
		return $res;
	}
	/*
	 * Obtener información por canal
	 */
	function obtenerInformacionCanal($idChannel)
	{
		$objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();
		
		$res="";
		$query="select * from channels where \"ID_channels\"=".$idChannel.";";
						   
		$result= $objconexionBD->enviarConsulta($query);
		   
		while ($row =  pg_fetch_array ($result))
		{
			$res = $row;
		}
	
		
		pg_free_result($result);
		$objconexionBD->cerrarConexion();
		return $res;
	}
?>
