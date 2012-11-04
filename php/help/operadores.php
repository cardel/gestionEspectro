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
			<li><a href="#tabs-1">Acciones sobre operador</a></li>
			<li><a href="#tabs-2">Lista de Operadores</a></li>
		</ul>
		<div id="tabs-1">
			<img src="/site/gestionEspectro/php/help/operadores/Operador.png" />

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
						<td>Registrar operador</td>
						<td>
							<ul style="text-align:'right';">
								<li>Nombre operador: En este campo usted puede designar el nombre del nuevo operador.</li>
								<li>Agregar o quitar servicios: Cada operador debe tener asociado uno o más servicios, para esto usted puede buscar un servicio de la lista y hacer clic en agregar.</li>
								<li>Guardar: crea un nuevo operador con el nombre y servicios especificados.</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td>Editar operador</td>
						<td>En la lista de los operadores registrados usted puede proceder a editar alguno haciendo clic en el botón editar</td>
					</tr>	
					</tbody>
			</table>

		</div>
		
		<div id="tabs-2">
			<img src="/site/gestionEspectro/php/help/operadores/OperadorEditar.png" />
			
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
						<td>Nombre operador</td>
						<td>Usted puede cambiar el nombre del operador, para que la operación se complete debe dar en guardar</td>
					</tr>
					<tr>
						<td>Agregar servicio</td>
						<td>Puede agregar un servicio seleccionandolo de la lista y haciendo clic en agregar.</td>
					</tr>
					<tr>
						<td>Quitar servicio</td>
						<td>Dentro de la lista de los servicios que presta el operador se puede eliminar haciendo clic en el botón "Eliminar" correspondiete al servicio registrado</td>
					</tr>
					<tr>
						<td>Regresar</td>
						<td>Permite regresar a la pantalla principal de gestión de operadores.</td>
					</tr>
					</tbody>
			</table>
		</div>
</div>	
	<span style="font-size: 12px;">Universidad del Valle. Grupo de investigación AVISPA. 2012</span>

</body>
</html>
