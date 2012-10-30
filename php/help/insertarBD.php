<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<?
$variables = $_POST["feed_item_length"];?>

<html>
<head>
	<META HTTP-EQUIV="Content-Type" content="text/html; charset=utf-8"/>
	<title>Ayuda aplicación CCP</title>	
	<link type="text/css" rel="stylesheet" href="/site/gestionEspectro/php/drupaljs/jquery-ui/css/smoothness/jquery-ui-1.9.0.custom.css" />	
	<link type="text/css" rel="stylesheet" href="/site/css/estilos.css" />
	
	<style type="text/css">table.tableStyle-table {border: 1px solid #CCC; font-family: Verdana, Verdana, Geneva, sans-serif; font-size: 12px;} .tableStyle-table td {padding: 4px; margin: 3px; border: 1px solid #ccc;} .tableStyle-table th {background-color: #70A7DC; color: #FFF; font-weight: bold; font-size: 16px} </style>

	
	<script type="text/javascript" src="/site/gestionEspectro/php/drupaljs/jquery/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="/site/gestionEspectro/php/drupaljs/jquery-ui/js/jquery-ui-1.9.0.custom.js"></script>
	<script type="text/javascript" src="/site/gestionEspectro/php/help/aplicacion/funciones.js"></script>
	
</head>
<body>	
 <p class='estiloTitulo'>Ayuda aplicación CCP</p>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Selección geográfica</a></li>
			<li><a href="#tabs-2">Selección de banda</a></li>
		</ul>
		<div id="tabs-1">
			<img src="/site/gestionEspectro/php/help/insertarBD/Entrada.png" />
			<table class="tableStyle-table" width="80%">
				<thead>
				<tr>
					<th>
						Función
					</th>
					<th>
						Descripción
					</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td>Seleccionar archivo</td>
						<td>Usted podrá elegir un archivo de salida si salida definida es "ninguna"</td>
					</tr>
					<tr>
						<td>Salida definida</td>
						<td>Elegir una salida almacenada en el sistema.</td>
					</tr>					
				</tbody>
			</table>
		</div>
		
		<div id="tabs-2">
			<img src="/site/gestionEspectro/php/help/insertarBD/ElegirSolucion.png" />
			
			<table class="tableStyle-table" width="80%">
				<thead>
				<tr>
					<th>
						Función
					</th>
					<th>
						Descripción
					</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td>Ver solución</td>
						<td>Permite visualizar la solución seleccionada.</td>
					</tr>
					<tr>
						<td>Insertar solución en Base de datos</td>
						<td>Permite insertar en la base de datos la solución seleccionada. Tenga cuidado, esta acción borra la selección actual.</td>
					</tr>
				</tbody>
			</table>
		</div>
</div>	
	<span style="font-size: 12px;">Universidad del Valle. Grupo de investigación AVISPA. 2012</span>

</body>
</html>
