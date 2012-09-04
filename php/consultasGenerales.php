<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	$tipoConsulta = $_POST["consulta"];
	
    $objconexionBD = new conexionBD();
    $objconexionBD->abrirConexion();

	if($tipoConsulta=='operadores')
	{
	   echo "<select id=\"operadores\">";
	   $query="select \"ID_Operator\" as id, operators_name from operators;";
	   
	   $result= $objconexionBD->enviarConsulta($query);
	   while ($row =  pg_fetch_array ($result))
	   {
		  print ("<option value=$row[id]>");
		  print ("$row[operators_name]");
		  print ("</option>\n");		
		}
		echo "</select>";
		pg_free_result($result);			
	}
	
		
	$objconexionBD->cerrarConexion();
?>
