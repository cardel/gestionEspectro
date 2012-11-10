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
 <p class='estiloTitulo'>Ayuda gestión de rangos de frecuencia</p>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Selección banda</a></li>
			<li><a href="#tabs-2">Agregar rango de frecuencia</a></li>
			<li><a href="#tabs-3">Listar rangos de frecuencia</a></li>
			<li><a href="#tabs-4">Editar rango de frecuencia</a></li>
			<li><a href="#tabs-5">Lista de canales registrados</a></li>
			<li><a href="#tabs-6">Editar canal</a></li>
		</ul>
		<div id="tabs-1">
			<img src="/site/gestionEspectro/php/help/rangosFrecuencia/SeleccionBanda.png" />
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
					<td>Seleccionar Banda</td>
					<td>En este campo usted deberá seleccionar una banda de frecuencia y dar clic en seleccionar para ver los rangos de frecuencia asociados a la banda.</td>
				</tr>
				<tr>
					<td>Mostrar/Ocultar formulario</td>
					<td>Esta opción le permite desplegar u ocultar el formulario para registrar un nuevo rango de frecuencia asociado a la banda de frecuencia seleccionada.</td>
				</tr>
				<tr>
					<td>Mostrar/Ocultar lista</td>
					<td>Permite ocultar o mostrar la lista de rangos de frecuencia registrados en la banda de frecuencia seleccionada.</td>
				</tr>	
				</tbody>
			</table>
		</div>
		<div id="tabs-2">
			<img src="/site/gestionEspectro/php/help/rangosFrecuencia/AgregarRangoFrecuencia.png" />
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
					<td>Rango de frecuencias</td>
					<td>En este campo usted podrá dar el nombre al rango de frecuencia, ejemplo Banda de 800Mhz o 45kHz-50kHz.</td>
				</tr>
				<tr>
					<td>Máximo número de canales por operador</td>
					<td>Es el número máximo de canales que un operador puede tener asignado en ese rango de frecuencia.</td>
				</tr>
				<tr>
					<td>Frecuencia inicial (Hz)</td>
					<td>Es el valor mínimo en Hz que puede tener el rango de frecuencia.</td>
				</tr>
				<tr>
					<td>Frecuencia final (Hz)</td>
					<td>Es el valor máximo en Hz que puede tener el rango de frecuencia.</td>
				</tr>
				<tr>
					<td>Número de canales</td>
					<td>Es el número de canales que posee el rango de frecuencia.</td>
				</tr>
				<tr>
					<td>Separación mínima</td>
					<td>Es la separación mínima en canales que debe existir entre dos operadores diferentes.</td>
				</tr>
				<tr>
					<td>Descripción rango de frecuencia</td>
					<td>Es la descripción informativa del rango de frecuencia a registrar.</td>
				</tr>
				<tr>
					<td>Descripción canales de rango de frecuencia</td>
					<td>Es la descripción informativa de los canales pertenecientes rango de frecuencia a registrar, si desea una descripción particular para cada canal, usted podrá editarlos cuando la frecuencia ya esté registrada.</td>
				</tr>
				<tr>
					<td>Ecuaciones frecuencias de transmisión de los canales del rango</td>
					<td>
						<ul style="text-align:'right';">
							<li>Frecuencia base Tx: Es la frecuencia base en Hz que tiene el rango de frecuencia, es un número entero.</li>
							<li>Multiplicador: Es el operador por el cual se indica la variación del incremento o decremento de la frecuencia de transmisión de cada uno de los canales, numerados de 1 a n, donde n es el número de canales del rango de frecuencia.</li>
							<li>Frecuencia corrimiento: Es el incremento o decremento de la frecuencia de transmisión de cada uno de los canales, numerados de 1 a n, donde n es el número de canales del rango de frecuencia.</li>
							<li>Divisor: Es el operador por el cual se indica la variación en términos fraccionarios (divide al multiplicador que es un número entero) del incremento o decremento de la frecuencia de transmisión de cada uno de los canales, numerados de 1 a n, donde n es el número de canales del rango de frecuencia.</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>Ecuaciones frecuencias de recepción de los canales del rango</td>
					<td>
						<ul style="text-align:'right';">
							<li>Multiplicador1: Es el operador por el cual se indica la variación de la frecuencia de recepción con respecto a la frecuencia de transmisión.<li>
							<li>Divisor: Es el operador por el cual se indica la variación en términos fraccionarios (divide al multiplicador1 que es un número entero) de la frecuencia de recepción con respecto a la frecuencia de transmisión.</li>
							<li>Multiplicador2: Es el operador por el cual se indica la variación del incremento o decremento de la frecuencia de recepción de cada uno de los canales con respecto a la frecuencia de recepción base, numerados de 1 a n, donde n es el número de canales del rango de frecuencia.</li>
							<li>Frecuencia corrimiento: Es el incremento o decremento de la frecuencia de recepción de cada uno de los canales, numerados de 1 a n, donde n es el número de canales del rango de frecuencia.</li>
							<li>Divisor: Es el operador por el cual se indica la variación en términos fraccionarios (divide al multiplicador2 que es un número entero) del incremento o decremento de la frecuencia de recepción de cada uno de los canales, numerados de 1 a n, donde n es el número de canales del rango de frecuencia.</li>
						</ul>
					</td>
				</tr>					
				</tbody>
			</table>
		</div>		
		<div id="tabs-3">
			<img src="/site/gestionEspectro/php/help/rangosFrecuencia/FrecuenciasRegistradas.png" />
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
					<td>En los diferentes cambios se muestra información relevante de cada uno de los rangos de frecuencia asociados a la banda seleccionada.</td>
				</tr>
				<tr>
					<td>Acciones</td>
					<td>Al hacer clic en editar, se despliega un formulario que le permite a usted editar los parámetros del rango de frecuencia seleccionado.</td>
				</tr>
				</tbody>
			</table>
		</div>
		<div id="tabs-4">
			<img src="/site/gestionEspectro/php/help/rangosFrecuencia/EditarRangoFrecuencia.png" />
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
					<td>Regresar</td>
					<td>Permite regresar a la página anterior, sin aplicar cambios en el rango de frecuencia seleccionado.</td>
				</tr>
				<tr>
					<td>Rango de frecuencias</td>
					<td>En este campo usted podrá editar el nombre al rango de frecuencia, ejemplo Banda de 800Mhz o 45kHz-50kHz.</td>
				</tr>
				<tr>
					<td>Máximo número de canales por operador</td>
					<td>Permite editar el número máximo de canales que un operador puede tener asignado en ese rango de frecuencia.</td>
				</tr>
				<tr>
					<td>Frecuencia inicial (Hz)</td>
					<td>Permite editar el valor mínimo en Hz que puede tener el rango de frecuencia.</td>
				</tr>
				<tr>
					<td>Frecuencia final (Hz)</td>
					<td>Permite editar el valor máximo en Hz que puede tener el rango de frecuencia.</td>
				</tr>
				<tr>
					<td>Separación mínima</td>
					<td>Permite editar la separación mínima en canales que debe existir entre dos operadores diferentes.</td>
				</tr>
				<tr>
					<td>Descripción rango de frecuencia</td>
					<td>Permite editar la descripción informativa del rango de frecuencia a registrar.</td>
				</tr>
				<tr>
					<td>Guardar</td>
					<td>Almacena en el sistema los cambios introducidos al rango de frecuencia seleccionado.</td>
				</tr>
				</tbody>
			</table>
		</div>
		<div id="tabs-5">
			<img src="/site/gestionEspectro/php/help/rangosFrecuencia/Canales.png" />
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
					<td>En los diferentes cambios se muestra información relevante de cada uno de los canales asociados a un rango de frecuencia seleccionado.</td>
				</tr>
				<tr>
					<td>Acciones</td>
					<td>Al hacer clic en editar, se despliega un formulario que le permite a usted editar los parámetros del canal seleccionado.</td>
				</tr>	
				</tbody>
			</table>
		</div>
		<div id="tabs-6">
			<img src="/site/gestionEspectro/php/help/servicios/EditarCanal.png" />
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
					<td>Regresar</td>
					<td>Permite regresar a la página anterior, sin aplicar cambios en el canal seleccionado.</td>
				</tr>
				<tr>
					<td>Frecuencia transmisión (Hz)</td>
					<td>Permite editar el valor de la frecuencia de transmisión en Hz del canal.</td>
				</tr>
				<tr>
					<td>Frecuencia recepción (Hz)</td>
					<td>Permite editar el valor de la frecuencia de recepción en Hz del canal.</td>
				</tr>
				<tr>
					<td>¿Está reservado?</td>
					<td>Permite marcar o desmarcar el canal como reservado.</td>
				</tr>
				<tr>
					<td>¿Está deshabilitado?</td>
					<td>Permite marcar o desmarcar el canal como deshabilitado.</td>
				</tr>
				<tr>
					<td>Descripción canal</td>
					<td>Permite editar la descripción informativa de los canal seleccionado.</td>
				</tr>
				<tr>
					<td>Guardar</td>
					<td>Almacena los cambios realizados en el canal seleccionado.</td>
				</tr>	
				</tbody>
			</table>
		</div>	
</div>	
	<span style="font-size: 12px;">Universidad del Valle. Grupo de investigación AVISPA. 2012</span>

</body>
</html>
