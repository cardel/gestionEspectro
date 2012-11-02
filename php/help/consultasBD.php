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
 <p class='estiloTitulo'>Ayuda consultas a Base de datos</p>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Aspectos generales</a></li>
			<li><a href="#tabs-2">Seleccionar zona geogrática</a></li>
			<li><a href="#tabs-3">Filtrar por operador</a></li>
			<li><a href="#tabs-4">Filtrar por banda</a></li>
		</ul>
		<div id="tabs-1">
			<p style="font-size:12px;">
			<ol>
				<li>Existen dos tipos de consultas básicas</li>
				<ul>
					<li>Asignación por operador en una zona determinada.</li>
					<li>Asignación por banda o rango de frecuencia en una zona determinada.</li>
				</ul>
				<li>Usted puede elegir consultar a nivel nacional, en una entidad territorial, departamento o municipio.</li>
				<li>Las consultas requiren un poco de tiempo en desplegarse debido a que presentan información considerable, considere usar una conexión de al menos 516 kbps.</li>
			</ol>
			</p>
		</div>
		
		<div id="tabs-2">
			<img src="/site/gestionEspectro/php/help/consultasBD/ConsultasGeografica.png" />
			
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
						<td>Seleccionar territorio</td>
						<td>Usted puede seleccionar un territorio determinado</td>
					</tr>
					<tr>
						<td>Seleccionar departamento</td>
						<td>Usted puede seleccionar un departamento que está dentro de un territorio determinado</td>
					</tr>
					<tr>
						<td>Seleccionar municipio</td>
						<td>Usted puede seleccionar un municipio que está dentro de un departamento determinado</td>
					</tr>
					<tr>
						<td>Selección nacional</td>
						<td>Si ha seleccionado un territorio y desea volver a la selección nacional debe usar este botón</td>
					</tr>
					</tbody>
			</table>
		</div>
		<div id="tabs-3">
			<img src="/site/gestionEspectro/php/help/consultasBD/FiltroPorOperador.png" />
			
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
						<td>Seleccionar operador</td>
						<td>Seleccione un operador del cúal desee conocer su asignación en una zona determinada.</td>
					</tr>
					<tr>
						<td>Consulta por operador</td>
						<td>Despliega la consulta de las asignaciones totales de un operador en una zona determinada.</td>
					</tr>
					</tbody>
			</table>
		</div>
		<div id="tabs-4">
			<img src="/site/gestionEspectro/php/help/consultasBD/FiltroPorBanda.png" />
			
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
						<td>Seleccionar banda de frecuencia</td>
						<td>Seleccione una banda de frecuencia donde desea realizar la consulta.</td>
					</tr>
					<tr>
						<td>Seleccione un rango de frecuencia</td>
						<td>Seleccione una banda de frecuencia donde desea realizar la consulta. Si selecciona todos la consulta se realizará en todas los rangos dentro de la banda que usted ha seleccionado</td>
					</tr>
					<tr>
						<td>Consulta por frecuencia</td>
						<td>Despliega la consulta de las asignaciones totales dentro de una banda o rango seleccionado en una zona determinada.</td>
					</tr>	
					</tbody>
			</table>
		</div>
</div>	
	<span style="font-size: 12px;">Universidad del Valle. Grupo de investigación AVISPA. 2012</span>

</body>
</html>
