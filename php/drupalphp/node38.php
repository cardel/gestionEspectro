<?php
	drupal_add_css($path = 'css/datatable.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'gestionEspectro/php/drupalcss/estilosFormGestion.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_set_html_head('<script type="text/javascript" src="https://www.google.com/jsapi"></script>');
	drupal_add_css($path = 'sites/all/libraries/jquery.ui/themes/default/ui.all.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shCore.js');
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/syntaxhighlighter/scripts/shBrushXml.js');
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shCore.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_css($path = 'js/syntaxhighlighter/styles/shThemeDefault.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	drupal_add_js(drupal_get_path('module', 'mymodule') . 'js/colorBoxU.js');
	echo "<p class='estiloTitulo'>Generador de entradas XML</p>\n";
	echo '<p style="text-align:left";><a class="iframe" href="http://avispa.univalle.edu.co/~cardel/proyInv/ayudaSecuenciamientoAviones/ayuda.php"><img border="0" src="files/HelpIcon.gif" width="50" height="50"><br/>Ayuda</a></p>';
	drupal_add_css($path = 'gestionEspectro/php/drupalcss/botonesEspectro.css', $type = 'module', $media = 'all', $preprocess = TRUE);
	
	if(!is_dir("/var/www/html/site/gestionEspectro/entradas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/entradas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidas/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidas/".$user->uid, 0755);
	if(!is_dir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid)) mkdir("/var/www/html/site/gestionEspectro/salidasTemp/".$user->uid, 0755);
?>
<form action="/site/?q=node/38" method="post">
	<p class='estilo'>Selección geográfica</p>

	Usted puede seleccionar en que lugar se va realizar el proceso de asignación del espectro:

	<ul>
		<li>Para nivel nacional no debe realizar ninguna selección geográfica</li>
		<li>A nivel regional seleccione la región especifica</li>
		<li>A nivel departamental seleccione el departamento dentro de la región especifíca</li>
		<li>A nivel local seleccione el municipio dentro del departamento especifíco</li>
	</ul>	

	<script language="javascript">
	function borrarDepartamentos(){
		$("#departamentos").html(" ");      
		$("#municipios").html(" ");       
	}
	function borrarMunicipios(){
		$("#municipios").html(" ");       
	}
	</script>

	<a href="#" id="consultarDivisionTerritorial" onclick="javascript:consultarDivisionTerritorial();"> Seleccionar división territorial </a>

	<script language="javascript">
	function consultarDivisionTerritorial(){ 
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'divisionTerritorial', idConsulta: 0 }, function(data){
			$("#territorialDivision").html(data);
			$("#departamentos").html("");
			$("#municipios").html("");
		});  
	}
	</script>	

	<div id="territorialDivision"></div>

	<script language="javascript">
	function consultarDepartamentos(){ 
		var selector = $('#selectTerritorialDivision').val();
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'departamentos', idConsulta: selector }, function(data){
			$("#departamentos").html(data);
			$("#municipios").html("");
		});  
	}
	</script>

	<div id="departamentos"></div>

	<script language="javascript">
	function consultarMunicipios(){    
		var selector = $('#selectDepartaments').val();
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'municipios', idConsulta: selector }, function(data){
			$("#municipios").html(data);
		});         
	}
	</script>

	<div id="municipios"></div>	
		
	<p class='estilo'>Selección banda</p>

	<script language="javascript">
	function consultarBandas(){    
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'bandas', idConsulta: 0 }, function(data){
			$("#bandas").html(data);
		});      
	}
	consultarBandas();
	</script>

	<div id="bandas"></div>	

	<script language="javascript">
	function consultarRangos(){  
		var selector = $('#selectBands').val();
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'rangos', idConsulta: selector }, function(data){
			$("#rangos").html(data);
		});   
		$("#serviciosBanda").html(" "); 
		$("#numCanales").html(" ");  
		$("#botonRequerimientos").css("display", "none");     
	}
	</script>

	<div id="rangos"></div>	


	<script language="javascript">
	function mostrarParametros(){  
		var selector = $('#selectRanks').val();
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'numCanalesEnBanda', idConsulta: selector }, function(data){
			$("#numCanales").html(data);
		});	
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'serviciosEnBanda', idConsulta: selector }, function(data){
			$("#serviciosBanda").html(data);
		});  
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'topeOperadorBanda', idConsulta: selector }, function(data){
			$("#topeOperadorBanda").html(data);
		});    
		
		$("#botonRequerimientos").css("display", "block");
	}
	
	</script>

	<table border="0">
	<tr>
	<td>Número de canales en la banda:</td><td id="numCanales"></td>
	</tr>
	<tr>
	<td>Servicios en la banda:</td><td id="serviciosBanda"></td>
	</tr>
	<tr>
	<td>Tope por operador en la banda:</td><td id="topeOperadorBanda"></td>
	</tr>
	</table>
	
	<script type="text/javascript">
	function crearRequerimiento()
	{
		$("#formulario").css("display", "block");
		$('#selectBands').attr('disabled','disabled');
		$('#selectRanks').attr('disabled','disabled');
		$('#selectTerritorialDivision').attr('disabled','disabled');
		$('#selectDepartaments').attr('disabled','disabled');
		$('#selectCities').attr('disabled','disabled');
		$('#consultarDivisionTerritorial').click(new function("alert('Opción deshabilitada');"));
		$('#consultarDepartamentos').click(new function("alert('Opción deshabilitada');"));
		$('#consultarMunicipios').click(new function("alert('Opción deshabilitada');"));
	}
	</script>
	<div id="botonRequerimientos">
	<input type="button" class="botonrojo" style="block:none;" value="Crear requerimientos" onClick="javascript:crearRequerimiento();" id="req"/>
	</div>

	<script type="text/javascript">

	function agregarFila(obj){

        var numeroCanales = $("#numeroCanales").val();
		var operador = $("#selOperador").val();
		var esNumero = isNaN(numeroCanales);
		
		if(operador>=1 && !esNumero && numeroCanales>0)
		{
			var textoOperador = $("#selOperador option:selected").text();
			var oId = $("#cant_campos").val();
			$("#cant_campos").val(parseInt($("#cant_campos").val()) + 1);

			$("#selOperador").find("option:selected").attr('disabled', true);
			$("#selOperador").find("option:selected").attr('selected', false);
			$("#selOperador option[value=-1]").attr("selected",true);
			
			var strHtml1 = "<td>" + textoOperador + '<input type="hidden" id="operador_' + oId + '" name="operador_' + oId + '" value="' + operador + '"/></td>';
			var strHtml2 = "<td>" + numeroCanales + '<input type="hidden" id="numRequerido_' + oId + '" name="numRequerido_' + oId + '" value="' + numeroCanales + '"/></td>' ;
			var strHtml3 = '<td><img src="gestionEspectro/php/drupalimages/delete.png" width="16" height="16" alt="Eliminar" onclick="if(confirm(\'Realmente desea eliminar este requerimiento?\')){eliminarFila(' + oId + ');}"/>';
			strHtml3 += '<input type="hidden" id="hdnIdCampos_' + oId +'" name="hdnIdCampos[]" value="' + oId + '" /></td>';
			var strHtmlTr = "<tr id='rowDetalle_" + oId + "'></tr>";
			var strHtmlFinal = strHtml1 + strHtml2 + strHtml3;
			//tambien se puede agregar todo el HTML de una sola vez.
			//var strHtmlTr = "<tr id='rowDetalle_" + oId + "'>" + strHtml1 + strHtml2 + "</tr>";
			$("#tbDetalle").append(strHtmlTr);
			//si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
			$("#rowDetalle_" + oId).html(strHtmlFinal);	
			$("#numeroCanales").val(0);	
			
		}
		else
		{
			alert("Debe seleccionar un operador e ingresar un n\xfamero v\xe1lido para los requerimientos");
		}	

        return false;
	}
	function eliminarFila(oId){
	    $("#rowDetalle_" + oId).remove();	
		$("#selOperador option[value="+oId+"]").attr('disabled', false);
		("#numeroCanales").val(0);	
		return false;
	}

	</script>
	<div id="formulario" style="display:none;">
		<p class='estilo'>Creación requerimientos</p>
		<input type="hidden" id="cant_campos" name="cant_campos" value="0" />
		<input type="hidden" id="enviar" name="enviar" value="1" />
	<fieldset class="estiloFormFieldset">
		<legend class="estiloFormLeyenda">Gestión de requerimiento</legend>
		<div class="top">
		<label class="estiloFormLabel" for="numeroCanales">Seleccione operador:</label>
			<div class="div_texbox">
				<select id="selOperador" name="selOperador" class="textbox txtFec">
					<option value="-1">Seleccione</option>
					<option value="1">Movistar</option>
					<option value="2">Tigo</option>
					<option value="3">Une</option>
				</select>
			</div>
		<label class="estiloFormLabel" for="numeroCanales">Número de canales requeridos:</label>
		 <div class="div_texbox"><input type="text" id="numeroCanales" name="numeroCanales" value=0 class="textbox" /></div>
		</div>
	</fieldset>
	<div class="button_div">    
		<input type="button" id="btnAgregar" name="btnAgregar" value="Agregar" class="buttons_aplicar" onclick="agregarFila(document.getElementById('cant_campos'));" />
		<input type="submit" id="btnAgregar" name="btnAgregar" value="Guardar" class="buttons_OK" />
	</div>
	<fieldset class="estiloFormFieldset">
		<legend class="estiloFormLeyenda">
			Detalle de Requerimientos
		</legend>
		<div class="clear"></div>
		<div id="form3" class="form-horiz">
		<table width="100%" id="tblDetalle" class="listado">
			<thead>
				<tr>
					<th>Operador</th>
					<th>Número de canales requeridos</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody id="tbDetalle">
			</tbody>
		</table>
		</div>    
	</fieldset>
	</div>

<?php
	if( $_POST["enviar"]==1)
	{
		$numeroCampos = $_POST["cant_campos"];
		$operadores = array();
		$requerimientos = array();
		
		for($i=0; $i<$numeroCampos; $i++)
		{
			$auxOp = $_POST["operador_".$i];
			
			if($auxOP != null)
			{
				$operadores[$i]=$auxOp;			
				$auxReq = $_POST["numRequerido_".$i];
				$requerimientos[$i]=$auxReq;			
			}

		}
		echo "<br/>numeroCampos<br/>";
		echo $numeroCampos;
		echo "Operadores<br/>";
		print_r($operadores);
		echo "Requerimientos<br/>";
		print_r($requerimientos);		
		
	}

?>
