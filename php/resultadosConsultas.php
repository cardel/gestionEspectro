<?php
require ("/var/www/html/site/gestionEspectro/php/consultasAplicacion.php");

$objconexionBD = new conexionBD();
$objconexionBD->abrirConexion();


$accion = $_POST["accion"];

if($accion=="operador")
{
	$divisionTerritorial = $_POST["selectTerritorialDivision"];
	$departamento = $_POST["selectDepartaments"];
	$municipio = $_POST["selectCities"];
	$operador = $_POST["operadorSel"];
	
    echo "<table width='100%' id='tabla1' class='tabla' border='1'>\n";		
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th class='estilo'>Banda de frecuencia</th>\n";
	echo "<th class='estilo'>Rango de frecuencia</th>\n";
	echo "<th class='estilo'>Canales asignados</th>\n";
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
			$lugar="territorial_divisions";
		}
		else
		{
			if($municipio==-1)
			{
				$tipoAsignacion = "channel_assignations_per_departament";
				$lugar="departaments";
			}
			else
			{
				$tipoAsignacion = "channel_assignations_per_city";
				$lugar="cities";
			}
		}		
	}
	
	echo "<tr><td class='estilo'>1</td><td class='estilo'>2</td><td class='estilo'>3</td></tr>";
	
	$query = "";
	/*
	 * select * from channels_assignations natural join channel_assignations_national where "ID_Operator"=10;
	  select * from channels_assignations natural join channel_assignations_per_territorialdivision natural join territorial_divisions where "ID_Operator"=10 and "ID_Territorial_Division"=2;

	 */
	
	echo "</tbody>\n";
    echo "</table>\n";	
	
	echo $divisionTerritorial."<br/>";
	echo $departamento."<br/>";
	echo $municipio."<br/>";
	echo $operador."<br/>";
	
	//Activar jtables
	echo "<script>	$('#tabla1').dataTable( {
            \"oLanguage\": {
                \"sUrl\": \"js/spanish.txt\"
            }
        } );</script>";
}

$objconexionBD->cerrarConexion();
?>
