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
			<li><a href="#tabs-3">Creación de requerimientos</a></li>
			<li><a href="#tabs-4">Resultados</a></li>
		</ul>
		<div id="tabs-1">
			<img src="/site/gestionEspectro/php/help/generador/TipoSeleccion.png" />
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
						<td>Tipo de selección</td>
						<td>La selección puede ser de tipo: Nacional, territorial, departamental o municipal</td>
					</tr>
					<tr>
						<td>Niveles de selección</td>
						<td>Dependiendo de la selección que usted realizar, se filtran los datos de acuerdo a la selección, por ejemplo si selecciona departamento Antioquia, sólo podrá seleccionar municipios que están dentro de ese departamento.</td>
					</tr>					
				</tbody>
			</table>
		</div>
		
		<div id="tabs-2">
			<img src="/site/gestionEspectro/php/help/generador/SeleccionBanda.png" />
			
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
		<div id="tabs-3">
			<img src="/site/gestionEspectro/php/help/generador/Requerimientos.png" />
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
						<td>Gestión de requerimientos</td>
						<td>En este campo usted puede ingresar un operador e indicar cuantos canales necesita en el rango de frecuencia seleccionado.</td>
					</tr>
					<tr>
						<td>Detalles de requerimientos</td>
						<td>Es una lista de los requerimientos que se van agregando, usted puede eliminar requerimientos sí desea hacerlo.</td>
					</tr>
					<tr>
						<td>Enviar</td>
						<td>Envía los requerimientos creados al generador para que sea creada la entrada XML para la aplicación.</td>
					</tr>
				</tbody>
			</table>		
	</div>
	<div id="tabs-4">
		<img src="/site/gestionEspectro/php/help/generador/ResultadosGenerador.png" />
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
					<td>Descargar XML Generado</td>
					<td>Permite desplegar el XML generado para que pueda ser visualizado o almacenado por el usuario en su equipo</td>
				</tr>
				<tr>
					<td>Almacenar XML generado</td>
					<td>Permite almacenar el XML generado de tal forma sea una entrada definida en la aplicación.</td>
				</tr>
				
			</tbody>
		</table>
	</div>
</div>	
	<span style="font-size: 12px;">Universidad del Valle. Grupo de investigación AVISPA. 2012</span>

</body>
</html>
