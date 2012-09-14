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
		$res.= "<select id=\"selectBands\" name=\"selectBands\"\">";
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
?>
