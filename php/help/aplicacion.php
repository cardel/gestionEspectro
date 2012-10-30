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
			<li><a href="#tabs-2">Iteraciones</a></li>
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
										<td>Se busca minimizar el número de canales que quedan inútiles debido a la separación.</td>
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
									<tr>
										<td>Asignar primero al inicio de la banda</td>
										<td>Se toman los requerimientos en orden de llegada, se busca asignar al inicio de la banda</td>
									</tr>
									<tr>
										<td>Asignar primero al final de la banda</td>
										<td>Se toman los requerimientos en orden de llegada, se busca asignar al final de la banda</td>
									</tr>
									<tr>
										<td>Asignar primero al inicio de la banda a operadores con asignación</td>
										<td>Se toman los requerimientos, se ordenan de acuerdo al orden de llegada y primero a los operadores que tienen asignación en la banda, se busca asignar al inicio de la banda</td>
									</tr>
									<tr>
										<td>Asignar primero al final de la banda a operadores con asignación</td>
										<td>Se toman los requerimientos, se ordenan de acuerdo al orden de llegada y primero a los operadores que tienen asignación en la banda, se busca asignar al final de la banda</td>
									</tr>
									<tr>
										<td>Asignar primero al inicio de la banda a operadores sin asignación</td>
										<td>Se toman los requerimientos, se ordenan de acuerdo al orden de llegada y primero a los operadores que no tienen asignación en la banda, se busca asignar al inicio de la banda</td>
									</tr>
									<tr>
										<td>Asignar primero al final de la banda a operadores sin asignación</td>
										<td>Se toman los requerimientos, se ordenan de acuerdo al orden de llegada y primero a los operadores que no tienen asignación en la banda, se busca asignar al final de la banda</td>
									</tr>
									<tr>
										<td>Asignar primero al inicio de la banda a operadores con mayores requerimientos</td>
										<td>Se toman los requerimientos, se ordenan de acuerdo al orden de llegada y primero a los operadores solicitan más canales, se busca asignar al inicio de la banda</td>
									</tr>
									<tr>
										<td>Asignar primero al final de la banda a operadores con mayores requerimientos</td>
										<td>Se toman los requerimientos, se ordenan de acuerdo al orden de llegada y primero a los operadores solicitan más canales, se busca asignar al final de la banda</td>
									</tr>
									<tr>
										<td>Asignar primero al inicio de la banda a operadores con menores requerimientos</td>
										<td>Se toman los requerimientos, se ordenan de acuerdo al orden de llegada y primero a los operadores solicitan menos canales, se busca asignar al inicio de la banda</td>
									</tr>
									<tr>
										<td>Asignar primero al final de la banda a operadores con menores requerimientos</td>
										<td>Se toman los requerimientos, se ordenan de acuerdo al orden de llegada y primero a los operadores solicitan menos canales, se busca asignar al final de la banda</td>
									</tr>
								</tbody>
							</table>							
						</td>
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
						<td>Tiempo de ejecución</td>
						<td>Es el máximo tiempo de ejecución del programa en segundos</td>
					</tr>
					<tr>
						<td>Número máximo de soluciones por iteración</td>
						<td>Es el máximo número de soluciones posibles que la aplicación entrega en los informes de salida</td>
					</tr>
					<tr>
						<td>Nivel de recomputación</td>
						<td>Es la distancia entre los nodos que son almacenados en memoria a medida que se explora el árbol de búsqueda generado, esto significa un ahorro en memoria para entradas muy grandes pero se requiere más tiempo ya que si hay backtraking se debe recalcular los nodos que no han sido almacenados en memoria.</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div id="tabs-2">
			<img src="/site/gestionEspectro/php/help/aplicacion/Flexibilidad.png" />
			
			<p style="border: 1pt; font-size: 12px;" align="justify">Usted puede seleccionar de 1 a 6 iteraciones de una ejecución del programa, en cada una de ellas se puede seleccionar distintos parámetros para flexibilizar las restricciones de tal manera no tengan efecto, con esto se puede comparar las soluciones que existen al eliminar una o varias restricciones del problema.</p>
			
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
						<td>No considerar separación</td>
						<td>Se ignora la separación de canales en la solución</td>
					</tr>
					<tr>
						<td>No considerar tope</td>
						<td>Es posible asignar a un operador más canales de los permitidos en la banda</td>
					</tr>
					<tr>
						<td>Canales de los operadores que solicitan asignación se pueden mover</td>
						<td>Si un operador solicita canales y posee canales asignados en la banda, su asignación actual puede moverse</td>
					</tr>
					<tr>
						<td>Número de operadores por canal</td>
						<td>Si el número es mayor que 1 es posible que un canal puede tener asignado más de un operador, aplicar sólo en casos donde es físicamente posible realizar una asignación de éste tipo</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div id="tabs-3">
			<img src="/site/gestionEspectro/php/help/aplicacion/Resultados.png" />
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
						<td>Descargar XML</td>
						<td>Permite visualizar y descargar el XML de salida generado en la iteración actual</td>
					</tr>
					<tr>
						<td>Almacenar XML</td>
						<td>Permite almacenar el XML de salida generado para que pueda ser insertado en la base de datos posteriormente</td>
					</tr>
				</tbody>
			</table>		
		</div>
	</div>
	<span style="font-size: 12px;">Universidad del Valle. Grupo de investigación AVISPA. 2012</span>

</body>
</html>
