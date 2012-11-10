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
 <p class='estiloTitulo'>Ayuda gestión de entradas XML</p>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Lista de entradas</a></li>
			<li><a href="#tabs-2">Visualizar entradas</a></li>
		</ul>
		<div id="tabs-1">
			<img src="/site/gestionEspectro/php/help/entradas/Entradas.png" />

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
						<td>Ingresar XML de entrada</td>
						<td>Permite almacenar un XML de entrada que el usuario tenga disponible en su equipo.</td>
					</tr>
					<tr>
						<td>Ver entrada</td>
						<td>Permite visualizar la entrada, para mayor información consultar "Visualizar entradas".</td>
					</tr>
					<tr>
						<td>Descargar</td>
						<td>Permite descargar la entrada en formato XML.</td>
					</tr>
					<tr>
						<td>Borrar</td>
						<td>Borra la entrada de la cuenta del usuario en el servidor.</td>
					</tr>	
					</tbody>
			</table>

		</div>
		
		<div id="tabs-2">
			<img src="/site/gestionEspectro/php/help/entradas/EntradasVista.png" />
			
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
					<td>Información</td>
					<td>Muestra la información general y los requerimientos de la entrada seleccionada.</td>
				</tr>
				<tr>
					<td>Estado bandas</td>
					<td>Permite conocer que canales están deshabilitados, reservados y asignados en subdivisiones dentro del rango de frecuencia que describe la entrada.</td>
				</tr>
				</tbody>
			</table>
		</div>
</div>	
	<span style="font-size: 12px;">Universidad del Valle. Grupo de investigación AVISPA. 2012</span>

</body>
</html>
