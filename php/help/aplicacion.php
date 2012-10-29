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
											<td>Se seleccionará como mejor solución aquella que tenga el menor costo, en este caso se toman todos los pesos para cada uno de los criterios</td>
										</tr>
										<tr>
											<td>Mejor por tamaño de bloque libre</td>
											<td>La mejor solución es aquella que posea el mayor bloque libre, en este caso la resta entre el número de canales y el tamaño del bloque libre más grande</td>
										</tr>
										<tr>
											<td>Mejor por número de bloques asignados</td>
											<td>En este caso se busca que el número de bloques asignados sea el menor posible, para que las soluciones sean bloques contiguos</td>
										</tr>
										<tr>
											<td>Mejor por número de canales inutilizables</td>
											<td>Se busca minimizar el número de canales que quedan inutiles debido a la separación.</td>
										</tr>
										<tr>
											<td>Ninguna</td>
											<td>No hay criterio para escoger la mejor solución, se calculan los costos de acuerdo a la estrategia mejor costo, pero no se usan para seleccionar la solución.</td>
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
														<option value="2"></option>
				<option value="3"></option>
				<option value="4"></option>
				<option value="5"></option>
				<option value="6"></option>
				<option value="7"></option>
				<option value="8"></option>
				<option value="9">Asignar primero al inicio de la banda a operadores con menores requerimientos</option>
				<option value="10">Asignar primero al final de la banda a operadores con menores requerimientos</option>
										<tr>
											<td>Asignar primero al final de la banda</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Asignar primero al inicio de la banda a operadores con asignación</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Asignar primero al final de la banda a operadores con asignación</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Asignar primero al inicio de la banda a operadores sin asignación</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Asignar primero al final de la banda a operadores sin asignación</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Asignar primero al inicio de la banda a operadores con mayores requerimientos</td>
											<td>....</td>
										</tr>
										<tr>
											<td>Asignar primero al final de la banda a operadores con mayores requerimientos</td>
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
