<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	/*
	 * Consultas encabezado principal	
	 * encabezado.php
	 */
	function consultarTipoLocalizacion($tipoID)
	{
		$salida="";		
		switch($tipoID)
		{
			case 0:	$salida="Nacional"; break;
			case 1:	$salida="Territorial/Regional"; break;
			case 2:	$salida="Departamental"; break;
			case 3:	$salida="Municipal"; break;
			default: $salida="Nacional"; break;
		}			
		return $salida;
	}

	function consultarLocalizacion($tipoID, $lugarID)
	{
		$salida="";
	    $objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();
		
		switch($tipoID)
		{
			case 0:	$salida="Nacional"; break;
			case 1:	
				$query="select \"Territorial_Division_Name\" as name from territorial_divisions where \"ID_Territorial_Division\"=".$lugarID.";";
				
				$result= $objconexionBD->enviarConsulta($query);
				while ($row =  pg_fetch_array ($result))
				{
					$salida = $row['name'];
				}
				pg_free_result($result);				
				
			break;
			case 2:	
				$query="select departament_name as name from departaments where \"ID_departament\"=".$lugarID.";";
				
				$result= $objconexionBD->enviarConsulta($query);
				while ($row =  pg_fetch_array ($result))
				{
					$salida = $row['name'];
				}
				pg_free_result($result);
			break;
			case 3:	
				$query="select city_name, departament_name from cities natural join departaments where \"ID_cities\"=".$lugarID.";";
				
				$result= $objconexionBD->enviarConsulta($query);
				while ($row =  pg_fetch_array ($result))
				{
					$salida = $row['city_name']."/".$row['departament_name'];
				}
				pg_free_result($result);
			break;
			default: 
				$salida="Nacional"; 
			break;
		}
			
		$objconexionBD->cerrarConexion();	
		return $salida;
	}
	

	function consultarBandaTrabajo($bandaID)
	{
	    $objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();	
		
		$salida = "";
		$query="select frequency_bands_name, frequency_bands_range from frequency_bands where \"ID_frequency_bands\"=".$bandaID.";";

		$result= $objconexionBD->enviarConsulta($query);
		while ($row =  pg_fetch_array ($result))
		{
			$salida = $row['frequency_bands_name']."/".$row['frequency_bands_range'];
		}
		pg_free_result($result);
		
		$objconexionBD->cerrarConexion();	
		return $salida;	
	}	
	function consultarRangoTrabajo($rangoID)
	{
	    $objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();	
		
		$salida = "";

		$query="select frequency_ranks_name,channels_number,max_channels_per_operator from frequency_ranks where \"ID_frequency_ranks\"=".$rangoID.";";

		$result= $objconexionBD->enviarConsulta($query);
		while ($row =  pg_fetch_array ($result))
		{
			$salida = $row['frequency_ranks_name'];
		}
		pg_free_result($result);
		
		$objconexionBD->cerrarConexion();	
		return $salida;	
	}
	
	function consultarNumeroCanales($rangoID)
	{
	    $objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();	
		
		$salida = "";

		$query="select frequency_ranks_name,channels_number,max_channels_per_operator from frequency_ranks where \"ID_frequency_ranks\"=".$rangoID.";";

		$result= $objconexionBD->enviarConsulta($query);
		while ($row =  pg_fetch_array ($result))
		{
			$salida = $row['channels_number'];
		}
		pg_free_result($result);
		
		$objconexionBD->cerrarConexion();	
		return $salida;
	}
	
	function consultarTopeCanales($rangoID)
	{
	    $objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();	
		
		$salida = "";

		$query="select frequency_ranks_name,channels_number,max_channels_per_operator from frequency_ranks where \"ID_frequency_ranks\"=".$rangoID.";";

		$result= $objconexionBD->enviarConsulta($query);
		while ($row =  pg_fetch_array ($result))
		{
			$salida = $row['max_channels_per_operator'];
		}
		pg_free_result($result);
		
		$objconexionBD->cerrarConexion();	
		return $salida;
	}
	/*
	 * Consultas propia de cada solución
	 */
	function consultarOperador($operadorID)
	{
	    $objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();	
		
		$salida = "";
		
		$query="select operators_name from operators where \"ID_Operator\"=".$operadorID.";";

		$result= $objconexionBD->enviarConsulta($query);
		while ($row =  pg_fetch_array ($result))
		{
			$salida = $row['operators_name'];
		}
		pg_free_result($result);
		
		$objconexionBD->cerrarConexion();	
		return $salida;
		
	}
?>
