<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
   #Conectamos con PostgreSQL
   $objconexionBD = new conexionBD();
   $objconexionBD->abrirConexion();

   echo "<select id=\"selectTerritorialdivision\" onclick=\"consultarDepartamentos()\">";
   $query="select \"ID_Territorial_Division\", initcap(\"Territorial_Division_Name\") as Territorial_Division_Name from  territorial_divisions order by \"ID_Territorial_Division\" desc;";
   
   $result= $objconexionBD->enviarConsulta($query);
   while ($row =  pg_fetch_array ($result))
   {
      print ("<option value=$row[ID_Territorial_Division]>");
      print ("$row[territorial_division_name]");
      print ("</option>\n");		
    }
   pg_free_result($result);
   $objconexionBD->cerrarConexion();
 ?>  
	<script language="javascript">
	function consultarDepartamentos(){    
		var selector = $('#selectTerritorialdivision').val();
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'departamentos', idConsulta: selector }, function(data){
			$("#mostrarDepartamentos").html(data);
		});         
	}
	</script>
	
	<div id="mostrarDepartamentos"></div>

	<script language="javascript">
	function consultarMunicipios(){    
		var selector = $('#selectDepartaments').val();
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'municipios', idConsulta: selector }, function(data){
			$("#mostrarMunicipios").html(data);
		});         
	}
	</script>
	
	<div id="mostrarMunicipios"></div>	
	
