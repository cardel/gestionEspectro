<?php
require ("/var/www/html/site/gestionEspectro/php/operadoresAcciones.php");
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
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/operadores.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'gestionEspectro/php/drupaljs/consultas.js');

	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/tabsAppSum.js');
	drupal_add_css($path = 'gestionEspectro/php/drupalcss/estilosFormGestion.css', $type = 'module', $media = 'all', $preprocess = TRUE);
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
	echo "<p class='estiloTitulo'>Administración de operadores</p>\n";
	echo '<p style="text-align:left";><a class="iframe" href="http://avispa.univalle.edu.co/~cardel/proyInv/ayudaSecuenciamientoAviones/ayuda.php"><img border="0" src="files/HelpIcon.gif" width="50" height="50"><br/>Ayuda</a></p>';

	
	
?>
<p class='estilo'>Registrar Operador</p>

<div id="formularioHTML">
	<form action="/site/?q=node/41" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">		
		<div class="form-item" id="edit-pesoNumeroBloques-wrapper">
			<label for="edit-pesoNumeroBloques">Nombre operador: </label>
			<input type="text" maxlength="64" name="nombreOperador" size="30" value="Operador" class="form-text"/>
			<div class="description">
				Ingrese el nombre del operador
			</div>			
		</div>
	<div id="formulario" >
		<p class='estilo'>Agregar o quitar servicios</p>
		<input type="hidden" id="cant_campos" name="cant_campos" value="0" />
		<input type="hidden" id="enviar" name="enviar" value="1" />
		<fieldset class="estiloFormFieldset">
			<legend class="estiloFormLeyenda">Gestión de servicios</legend>
			<div class="top">
				<label class="estiloFormLabel" for="nombreOperador">Seleccione servicio:</label>
				<div id="divServicios" class="div_texbox"></div>
			</div>
		</fieldset>
		<div class="button_div">    
			<input type="button" id="btnAgregar" name="btnAgregar" value="Agregar servicio" class="buttons_aplicar" onclick="agregarFila(document.getElementById('cant_campos'));" />
		</div>
		<fieldset class="estiloFormFieldset">
			<legend class="estiloFormLeyenda">
				Servicios que presta el operador
			</legend>
			<div class="clear"></div>
			<div id="form3" class="form-horiz">
				<table width="100%" id="tblDetalle" class="listado">
					<thead>
						<tr>
							<th>Nombre servicio</th>
							<th>Acción</th>
						</tr>

					</thead>
					<tbody id="tbDetalle">
					</tbody>
				</table>
				<div class="button_div">  
					<input type="submit" id="btnAgregar" name="btnAgregar" value="Guardar" class="buttons_OK" />
				</div>
			</div>    
		</fieldset>
		</div>
	</form>
</div>


<p class='estilo'>Lista de operadores registrados</p>;

<script>consultarOperadores();</script>
<div id="divOperadores"></div>


<?php
	$cant_campos=$_POST["cant_campos"];
	$btnAgregar=$_POST["btnAgregar"];
	if($cant_campos>0 && $btnAgregar=="Guardar")
	{
		$nombreOperador = $_POST["nombreOperador"];
		$servicios = array();
		
		for($i=0; $i<$cant_campos; $i++)
		{
				$servicios[$i]=$_POST["servicio_".$i];
		}
		
		echo nuevoOperador($nombreOperador, $servicios);
	}
	else
	{
		echo "nooks";
	}
	
}
?>

