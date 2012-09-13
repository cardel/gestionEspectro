<?
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	/*
	 * Consultar nombre de un servicio por su ID
	 */
	function consultarNombreServicio($idServicio)
	{
		$objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();
		
		$query= "select * from services where \"ID_service\"=".$idServicio.";";
		$result= $objconexionBD->enviarConsulta($query);
	
		while ($row =  pg_fetch_array ($result))
		{
			$res = $row["services_name"];
		}
		pg_free_result($result);
		
		$objconexionBD->cerrarConexion();
		
	}
	/*
	 * Consultar descripción de un servicio por su ID
	 */
	function consultarDescripcionServicio($idServicio)
	{
		$objconexionBD = new conexionBD();
		$objconexionBD->abrirConexion();
		
		$query= "select * from services where \"ID_service\"=".$idServicio.";";
		$result= $objconexionBD->enviarConsulta($query);
	
		while ($row =  pg_fetch_array ($result))
		{
			$res = $row["services_description"];
		}
		pg_free_result($result);
		
		$objconexionBD->cerrarConexion();		
		
	}
?>
