function consultarServiciosList(){  
	$.post("gestionEspectro/php/resultadosConsultas.php", { accion: 'serviciosList' }, function(data){
		$("#divServicios").html(data);
	});   
}

consultarServiciosList();

