<?php
	$idServicio=$GET_["id"];
?>
<div id="formularioHTML">
	<form action="#" accept-charset="UTF-8" method="post" id="test" enctype="multipart/form-data">		
		<div class="form-item" id="edit-pesoNumeroBloques-wrapper">
			<label>Nombre servicio: </label>
			<input type="text" size="64" name="nombreServicio" value="<?php echo consultarNombreServicio($idServicio);?>" class="form-text"/>
			<div class="description">
				Editar el nombre del servicio, recuerde en no usar uno ya existente.
			</div>			
		</div>	
		<div class="form-item" id="edit-pesoNumeroBloques-wrapper">
			<label>Descripción servicio: </label>
			<textarea cols="64" rows="10" name="descripcionServicio" ><?php echo consultarDescripcionServicio($idServicio); ?></textarea>
			<div class="description">
				Edite la descripción del nuevo servicio
			</div>			
		</div>	
		<input type="hidden" name="nodo" value="45"/>
		<div>  
			<input type="submit" value="Guardar" class="buttons_OK" />
		</div>
	</form>
</div>
