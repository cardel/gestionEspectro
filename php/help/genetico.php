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
 <p class='estiloTitulo'>Ayuda aplicación por algortimo genético</p>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Configuración</a></li>
			<li><a href="#tabs-2">Resultados</a></li>
		</ul>
		<div id="tabs-1">
			<img src="/site/gestionEspectro/php/help/genetico/genetico.png" />
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
					<tr>
						<td>Selección entrada</td>
						<td>Usted puede ingresar un archivo que cumpla con el formato XML de la aplicación, en ese caso no debe seleccionar entrada definida</td>
					</tr>
					<tr>
						<td>Entrada definida</td>
						<td>Usted puede ingresar un archivo creado en el generador de entradas, sí realiza una selección en este campo si ha seleccionado un archivo de entrada, éste no será tomado en cuenta.</td>
					</tr>
					<tr>
						<td>Peso número de bloques</td>
						<td>Es el peso que posee el factor de número de bloques en el costo total en una solución</td>
					</tr>
					<tr>
						<td>Peso máximo bloque de canales libres</td>
						<td>Es el peso que posee el factor de la diferencia entre número total de canales y el tamaño del mayor bloque libre en el costo total en una solución</td>
					</tr>
					<tr>
						<td>Peso número de canales inútiles</td>
						<td>Es el peso que posee el factor del número de canales inutilizados y el tamaño del mayor bloque libre en el costo total en una solución</td>
					</tr>
					<tr>
						<td>Población inicial</td>
						<td>Es la población inicial con que inicia el algortimo genético.</td>
					</tr>
					<tr>
						<td>Probablidad cruce</td>
						<td>Es la probabilidad de cruce que tiene un individuo seleccionado durante una generación.</td>
					</tr>
					<tr>
						<td>Probabilidad mutación</td>
						<td>Es la probabilidad de mutación que tienen los individuos generados en la probabilidad de cruce.</td>
					</tr>
					<tr>
						<td>Tiempo de ejecución</td>
						<td>Es el tiempo de ejecución del programa en segundos</td>
					</tr>
					<tr>
						<td>Número de soluciones</td>
						<td>Es el número de soluciones posibles que la aplicación entrega en los informes de salida</td>
					</tr>
					<tr>
						<td>Número de ejecuciones</td>
						<td>La selección puede ser de tipo: Nacional, territorial, departamental o municipal</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div id="tabs-2">
			<img src="/site/gestionEspectro/php/help/genetico/ResultadosGenetico.png" />
			
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
						<td>En esta usted podrá seleccionar sobre las bandas de frecuencia para mostrar los rangos de frecuencia asociados a ellas.</td>
					</tr>
					<tr>
						<td>Seleccionar rango de frecuencia</td>
						<td>Usted podrá seleccionar un rango de frecuencia asociado a una banda seleccionada</td>
					</tr>
					<tr>
						<td>Crear requerimientos	</td>
						<td>Una vez usted esté seguro de la banda y región territorial seleccionada usted podrá crear los requerimientos de entrada para la aplicación</td>
					</tr>
				</tbody>
			</table>
		</div>
</div>	
	<span style="font-size: 12px;">Universidad del Valle. Grupo de investigación AVISPA. 2012</span>

</body>
</html>
