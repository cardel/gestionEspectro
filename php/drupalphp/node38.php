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
	<div id="tipoAsignacion" style="font-size:14px; font-weight:bold;">La asignación es a nivel nacional</div>
	<br/>
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
	<div id="enlaceDivisionTerritorial">
	<a href="#" id="consultarDivisionTerritorial" onclick="javascript:consultarDivisionTerritorial();"> Seleccionar división territorial </a>
	</div>

	<script language="javascript">
	function consultarDivisionTerritorial(){ 
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'divisionTerritorial', idConsulta: 0 }, function(data){
			$("#territorialDivision").html(data);
			$("#departamentos").html("");
			$("#municipios").html("");
			$("#tipoAsignacion").html("La asignación es a nivel regional");
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
			$("#tipoAsignacion").html("La asignación es a nivel departamental");

		});  
	}
	</script>

	<div id="departamentos"></div>

	<script language="javascript">
	function consultarMunicipios(){    
		var selector = $('#selectDepartaments').val();
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'municipios', idConsulta: selector }, function(data){
			$("#municipios").html(data);
			$("#tipoAsignacion").html("La asignación es a nivel municipal");

		});         
	}
	</script>

	<div id="municipios"></div>	
		
	<p class='estilo'>Selección banda</p>
	Por favor seleccione una banda y posteriormente un rango donde desea generar el requerimiento.

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
		$("#parametrosRango").css("display", "none");   
	}
	</script>
	<div id="rangos"></div>	


	<script language="javascript">
	function mostrarParametros(){  
		var selector = $('#selectRanks').val();
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'numCanalesEnBanda', idConsulta: selector }, function(data){
			$("#numCanales").html(data);
		});	
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'numCanalesEnBandaForm', idConsulta: selector }, function(data){
			$("#numeroCanalesForm").html(data);
		});		
		
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'serviciosEnBanda', idConsulta: selector }, function(data){
			$("#serviciosBanda").html(data);
		});  
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'topeOperadorBanda', idConsulta: selector }, function(data){
			$("#topeOperadorBanda").html(data);
		});    
		
		$("#parametrosRango").css("display", "block");
		$("#botonRequerimientos").css("display", "block");
	}

	</script>
	<div id="numeroCanalesForm"></div>
	<div id="parametrosRango" style="display:none;">
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
	</div>
	<script type="text/javascript">
	function crearRequerimiento()
	{
		$("#formulario").css("display", "block");
		$('#selectBands').attr('disabled','disabled');
		$('#selectRanks').attr('disabled','disabled');
		$('#selectTerritorialDivision').attr('disabled','disabled');
		$('#selectDepartaments').attr('disabled','disabled');
		$('#selectCities').attr('disabled','disabled');
		
		$("#enlaceDivisionTerritorial").css("display", "none");
		$("#enlaceDepartamentos").css("display", "none");
		$("#enlaceMunicipios").css("display", "none");
		
		$("#botonReq").attr('disabled','disabled');
		var selector = $('#selectRanks').val();
		$.post("gestionEspectro/php/consultasGenerador.php", { consulta: 'serviciosPorOperador', idConsulta: selector }, function(data){
			$("#selectorOperator").html(data);
		});    		
		
	}
	</script>
	<div id="botonRequerimientos" style="display:none;">
	<input type="button" id="botonReq" class="botonrojo" value="Crear requerimientos" onClick="javascript:crearRequerimiento();"/>
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
			<div id="selectorOperator" class="div_texbox"></div>
		<label class="estiloFormLabel" for="numeroCanales">Número de canales requeridos:</label>
		 <div class="div_texbox"><input type="text" id="numeroCanales" name="numeroCanales" value=0 class="textbox" /></div>
		</div>
	</fieldset>
	<div class="button_div">    
		<input type="button" id="btnAgregar" name="btnAgregar" value="Agregar" class="buttons_aplicar" onclick="agregarFila(document.getElementById('cant_campos'));" />
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
			<div class="button_div">  
				<input type="submit" id="btnAgregar" name="btnAgregar" value="Enviar" class="buttons_OK" />
			</div>
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
			$auxReq = $_POST["numRequerido_".$i];
			
			if(!(empty($auxOp) || empty($auxReq)))
			{
				$operadores[$i]=$auxOp;		
				$requerimientos[$i]=$auxReq;			
			}

		}
		
		if(!(empty($requerimientos) || empty($operadores)))
		{
			$divisionTerritorial = $_POST["selectTerritorialDivision"];
			$departamento = $_POST["selectDepartaments"];
			$municipio = $_POST["selectCities"];
			$rangoSeleccionado = $_POST["selectRanksForm"];
			$bandaSeleccionada = $_POST["selectBandsForm"];
			$numeroCanales = $_POST["numeroCanalesFormulario"];
			$tipoAsignacion;
			$idAsignacion;
			
			if(empty($divisionTerritorial))
			{
					$tipoAsignacion=0;
					$idAsignacion=0;
			}
			else
			{
					if(empty($departamento))
					{
						$tipoAsignacion=1;
						$idAsignacion=$divisionTerritorial;						
					}
					else
					{
							if(empty($municipio))
							{
								$tipoAsignacion=2;
								$idAsignacion=$departamento;									
							}
							else
							{
								$tipoAsignacion=3;
								$idAsignacion=$municipio;									
							}
					}
			}
			
			//Crear XML
			$et01 = "\n<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
			$et02 = "<instance>\n";
			$et03 = "\t<presentation nbSolutions=\"?\" format=\"XCSP 2.1\">\n\t\tRepresentacion entrada de problema gestion espectro radioelectrico\n\t</presentation>\n";
			$et04 = "\t\t<dict>\n";
			
			$et05 = "\t\t\t<entry key=\"GeograficAssignationType\">\n";
			$et06 = "\t\t\t\t<i>".$tipoAsignacion."</i>\n";
			$et07 = "\t\t\t</entry>\n";
			
			$et08 = "\t\t\t<entry key=\"GeograficAssignationID\">\n";
			$et09 = "\t\t\t\t<i>".$idAsignacion."</i>\n";
			$et10 = "\t\t\t</entry>\n";			

			$et11 = "\t\t\t<entry key=\"FrecuencyBand\">\n";
			$et12 = "\t\t\t\t<i>".$rangoSeleccionado."</i>\n";
			$et13 = "\t\t\t</entry>\n";
			
			$et14 = "\t\t\t<entry key=\"EspecificBand\">\n";
			$et15 = "\t\t\t\t<i>".$bandaSeleccionada."</i>\n";
			$et16 = "\t\t\t</entry>\n";	

			$et17 = "\t\t\t<entry key=\"NumberChannels\">\n";
			$et18 = "\t\t\t\t<i>".$numeroCanales."</i>\n";
			$et19 = "\t\t\t</entry>\n";	
			
			$et20 = "\t\t\t<entry key=\"Operators\">\n";
			$et21 = "\t\t\t\t<i>".sizeof($operadores)."</i>\n";
			$et22 = "\t\t\t</entry>\n";	
			
			$et23 = "\t\t\t<entry key=\"OperatorsOfInput\">\n";
			$et24 = "\t\t\t\t<i>".sizeof($operadores)."</i>\n";
			$et25 = "\t\t\t</entry>\n";	
			
			$et26 = "\t\t\t<entry key=\"ChannelSeparation\">\n";
			$et27 = "\t\t\t\t<i>".$bandaSeleccionada."</i>\n";
			$et28 = "\t\t\t</entry>\n";	
			
			$fin1 = "</dict>";
			$fin2 = "</instance>\n";			
            echo "<pre class='brush: xml'>\n";
			$total= $et01.$et02.$et03.$et04.$et05.$et06.$et07.$et08.$et09.$et10.$et11.$et12.$et13.$et14.$et15.$et16.$et17.$et18.$et19.$et20.$et21.$et22.$et23.$et24.$et25.$et26.$et27.$et28.$fin1.$fin2;	
            $total = str_replace("<","&lt;",$total);
            $total = str_replace(">","&gt;",$total);	
            echo $total;		
			echo "</pre>";	
		}
		else
		{
				echo "<script language=\"javascript\">alert(\"Los requerimientos están vacios, por favor ingrese por lo menos uno\");</script>";
		}
	}

?>
