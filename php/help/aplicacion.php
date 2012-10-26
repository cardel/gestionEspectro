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
 <div ><p class='estiloTitulo'>Ayuda aplicación CCP</p>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Aplicación</a></li>
			<li><a href="#tabs-2">Iteracciones</a></li>
			<li><a href="#tabs-3">Resultados</a></li>
		</ul>
		<div id="tabs-1">
				<img src="/site/gestionEspectro/php/help/aplicacion/Aplicacion.jpeg" />
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
							<td>Selección entrada</td>
							<td>Usted puede ingresar un archivo que cumpla con el formato XML de la aplicación, en ese caso no debe seleccionar entrada definida</td>
						</tr>
						<tr>
							<td>Entrada definida</td>
							<td>Usted puede ingresar un archivo creado en el generador de entradas, sí realiza una selección en este campo si ha seleccionado un archivo de entrada, éste no será tomado en cuenta.</td>
						</tr>
						<tr>
							<td>Motor de búsqueda</td>
							<td>
								Usted puede seleccionar los siguientes:
								<table class="tableStyle-table" width="100%">
									<thead>
										<tr>
											<th>Motor</th>
											<th>Descripción</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td>Estrategia de distribución</td>
							<td>
								Usted puede seleccionar los siguientes:
								<table class="tableStyle-table" width="100%">
									<thead>
										<tr>
											<th>Estrategia</th>
											<th>Descripción</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Mejor costo</td>
											<td>....</td>
										</tr>
									</tbody>
								</table>							
							</td>
						</tr>
						<tr>
							<td>Peso número de bloques</td>
							<td>...</td>
						</tr>
						<tr>
							<td>Peso máximo bloque de canales libres</td>
							<td>...</td>
						</tr>
						<tr>
							<td>Peso número de canales inútiles</td>
							<td>...</td>
						</tr>
						<tr>
							<td>Tiempo de ejecución</td>
							<td>...</td>
						</tr>
						<tr>
							<td>Número máximo de soluciones por iteracción</td>
							<td>...</td>
						</tr>
						<tr>
							<td>Nivel de recomputación</td>
							<td>...</td>
						</tr>
					</tbody>
				</table>
		</div>
		
		<div id="tabs-2">
			<img src="/site/gestionEspectro/php/help/aplicacion/Flexibilidad.png" />
		</div>
		<div id="tabs-3">
			<img src="/site/gestionEspectro/php/help/aplicacion/Resultados.png" />
		</div>
	</div>
	<span style="font-size: 12px;">Universidad del Valle. Grupo de investigación AVISPA</span>

</body>
</html>
