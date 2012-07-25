<?php

   #Conectamos con PostgreSQL
   $objconexionBD = new conexionBD();
   $objconexionBD->abrirConexion();

   echo "<select id=\"territorialdivision\">";
   $query="select \"ID_Territorial_Division\", initcap(\"Territorial_Division_Name\") as Territorial_Division_Name from  territorial_divisions order by \"ID_Territorial_Division\" desc;";
   $result= $objconexionBD->enviarConsulta($conexion, $query);
   while ($row =  pg_fetch_array ($result))
   {
      print ("<option value=$row[ID_Territorial_Division]>");
      print ("$row[territorial_division_name]");
      print ("</option>\n");		
    }
    pg_free_result($result);
   $objconexionBD->cerrarConexion();
?>
	
