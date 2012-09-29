<?php
require ("/var/www/html/site/gestionEspectro/php/rangosFrecuenciaAcciones.php");

global $user;

if($user->uid==0)
{
	echo "<script>alert('Debe estar autenticado en el sistema para poder ver \xe9sta p\xe1gina');</script>";
	echo "<script>location.href='http://avispa.univalle.edu.co/site/';</script>";
}
else{
	jquery_ui_add('ui.tabs');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'dataTables/media/js/jquery.dataTables.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/jtables.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/tabsAppSum.js');
	//drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/rangosFrecuencia.js');
	drupal_set_html_head('<script type="text/javascript" src="https://www.google.com/jsapi"></script>');
	drupal_add_css($path = 'css/estilos.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'css/datatable.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'gestionEspectro/php/drupalcss/botonesEspectro.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'sites/all/libraries/jquery.ui/themes/default/ui.all.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shCore.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shBrushXml.js');
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shCore.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shThemeDefault.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/colorBoxU.js');
	echo "<p class='estiloTitulo'>Administración de Rangos de frecuencia</p>\n";
	echo '<p style="text-align:left";><a class="iframe" href="http://avispa.univalle.edu.co/~cardel/proyInv/ayudaSecuenciamientoAviones/ayuda.php"><img border="0" src="files/HelpIcon.gif" width="50" height="50"><br/>Ayuda</a></p>';
	
	
?>

<p class='estilo'>Seleccione banda</p>

Por favor seleccione una banda de frecuencia y haga clic en seleccionar.

<div id="formularioHTML">
	<form action="/site/?q=node/46" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">		
		<div class="form-item" id="edit-pesoNumeroBloques-wrapper">
			<label>Seleccione banda: </label>
			<?php echo listarBandas(); ?>
			<div class="description">
				Seleccione una banda de frecuencia para listar sus rangos asociados
			</div>	
			<input type="hidden" name="accion" value="enviar"/>		
		</div>	
		<div>  
			<input type="submit" id="botonSeleccionar" value="Seleccionar" class="buttons_OK" />
		</div>
	</form>
</div>

<?php
	$idBanda = $_GET["idBanda"];
	$accion = $_POST["accion"];
	$selectBands = $_POST["selectBands"];
	
	if(!(empty($idBanda))){
		$accion="enviar";
		$selectBands=$idBanda;
	}	
	
	if($accion=="enviar")
	{
		echo "<p class='estilo'>Rangos de frecuencia asociados a banda: ".nombreBanda($selectBands)."</p>";		
	
		echo "<p class='estilo'>Añadir rango de frecuencia</p>";
		
		echo "<p>Por favor haga clic en Mostrar/Ocultar para ver u ocultar el formulario para agregar un nuevo rango de frecuencia en la banda seleccionada.</p>";	
		
		echo "<input type=button class=\"botonrojo\" onClick=\"$('#agregarRango').toggle(100);\" value=\"Mostrar/Ocultar Formulario\" />\n";

		?>
		<div id="agregarRango" style="display: none;">
			<div id="formularioHTML">
				<form action="/site/gestionEspectro/php/insertFrecuencyRank.php" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">		
					<input type="hidden" name="idBanda" value="<?echo $selectBands?>" >
					<div class="form-item">
						<label>Rango de frecuencias: </label>
						<input type="text" size="64" name="rangoFrecuencias" value="Rango" class="form-text"/>
						<div class="description">
							Indique el rango de frecuencias de la nueva banda. Ejemplo: 10kHz - 20kHz.
						</div>			
					</div>	
					<div class="form-item">
						<label>Máximo número de canales por operador: </label>
						<input type="text" size="64" name="maxCanalesOperador" value="0" class="form-text"/>
						<div class="description">
							Máximo número de canales permitido por operador en la banda, debe ser mayor que 0.
						</div>			
					</div>	
					<div class="form-item" >
						<label>Frecuencia inicial (Hz): </label>
						<input type="text" size="64" name="frecuenciaInicial" value="0" class="form-text"/>
						<div class="description">
							Ingrese la frecuencia inicial de la banda en Hz. Debe ser menor que la frecuencia final y mayor que 0.
						</div>			
					</div>	
					<div class="form-item">
						<label>Frecuencia final (Hz): </label>
						<input type="text" size="64" name="frecuenciaFinal" value="0" class="form-text"/>
						<div class="description">
							Ingrese la frecuencia final de la banda en Hz. Debe ser mayor que la frecuencia inicial.
						</div>			
					</div>	
					<div class="form-item" >
						<label>Número de canales: </label>
						<input type="text" size="64" name="numeroCanales" value="0" class="form-text"/>
						<div class="description">
							Ingrese el número de canales en el rango de frecuencias, una vez creada la banda podrá editarlos.
						</div>			
					</div>	
					<div class="form-item">
						<label>Separación mínima: </label>
						<input type="text" size="64" name="separacion" value="0" class="form-text"/>
						<div class="description">
							Indique la seperación mínima entre canales de operadores diferentes.
						</div>			
					</div>	
					<div class="form-item">
						<label>Descripción rango de frecuencia: </label>
						<textarea cols="64" rows="10" name="descripcioNRango" >Ingrese descripción rango de frecuencia</textarea>
						<div class="description">
							Ingrese la descripción del nuevo rango de frecuencia
						</div>			
					</div>
					<div class="form-item">
						<label>Descripción de canales rango de frecuencia: </label>
						<textarea cols="64" rows="10" name="descripcioNCanal" >Ingrese descripción de los canales</textarea>
						<div class="description">
							Ingrese la descripción de los canales del rango, esto aplica para todos los canales pero puede ser editado posteriormente.
						</div>			
					</div>
					<div class="form-item">							
						<label>Ingrese las ecuaciones de frecuencias de transmisión de los canales </label>
						<table>
							<thead>
								<tr>										
									<th>Frecuencia base Tx</th>
									<th></th>
									<th>Multiplicador</th>
									<th></th>
									<th></th>
									<th></th>
									<th>Frecuencia corrimiento</th>
									<th></th>
									<th>Divisor</th>
								</tr>
							</thead>
							<tbody>
									<tr>
										<td><input type="text" size="10" name="frecuenciaBaseTx" value="1" class="form-text"/> </td>
										<td>+</td>
										<td><input type="text" size="10" name="mutiplicadorTx" value="1" class="form-text"/></td>
										<td>*</td>
										<td>n</td>
										<td>*</td>
										<td><input type="text" size="10" name="frecuenciaCorrimientoTx" value="1" class="form-text"/></td>
										<td>/</td>
										<td><input type="text" size="10" name="divisorTx" value="1" class="form-text"/></td>
								</tr>				
							</tbody>
						</table>
						<div class="description">
							Ingrese la formula de la frecuencia de transmisión de los canales. En todos los campos debe ingresar enteros mayores o iguales que 0, n es el número consecutivo del canal.
						</div>			
					</div>
					<div class="form-item">							
						<label>Ingrese las ecuaciones de frecuencias de recepción de los canales </label>
						<table>
							<thead>
								<tr>										
									<th>Multiplicador</th>
									<th></th>
									<th></th>
									<th></th>
									<th>Divisor</th>
									<th></th>
									<th>Multiplicador</th>
									<th></th>
									<th></th>
									<th></th>
									<th>Frecuencia corrimiento</th>
									<th></th>
									<th>Divisor</th>
								</tr>
							</thead>
							<tbody>
									<tr>
										<td><input type="text" size="10" name="multiplicador1Rx" value="1" class="form-text"/> </td>
										<td>*</td>
										<td>Frecuencia base Tx</td>
										<td>/</td>
										<td><input type="text" size="10" name="divisor1Rx" value="1" class="form-text"/></td>
										<td>+</td>
										<td><input type="text" size="10" name="mutiplicador2Rx" value="1" class="form-text"/></td>
										<td>*</td>
										<td>n</td>
										<td>*</td>
										<td><input type="text" size="10" name="frecuenciaCorrimientoRx" value="1" class="form-text"/></td>
										<td>/</td>
										<td><input type="text" size="10" name="divisor2Rx" value="1" class="form-text"/></td>
								</tr>				
							</tbody>
						</table>
						<div class="description">
							Ingrese la formula de la frecuencia de transmisión de los canales. . En todos los campos debe ingresar enteros mayores o iguales que 0, n es el número consecutivo del canal.
						</div>			
					</div>
					<input type="hidden" name="nodo" value="46"/>
					<div>  
						<input type="submit" value="Guardar" class="buttons_OK" />
					</div>
				</form>
			</div>
		</div>
		<?php
		echo "<p class='estilo'>Lista de frecuencias registradas</p>";
		echo "<p>Por favor haga clic en Mostrar/Ocultar para ver u ocultar la lista de rangos de frecuencia asociados a la banda seleccionada.</p>";	

		echo "<input type=button class=\"botonazul\" onClick=\"$('#listaRangos').toggle(100);\" value=\"Mostrar/Ocultar Lista\" />\n";
		?>		

		<div id="listaRangos" style="display: none;">
		<?php
		echo obtenerBandasPorOperador($selectBands);
		?>
		</div>
		<?php
	}
}
?>
