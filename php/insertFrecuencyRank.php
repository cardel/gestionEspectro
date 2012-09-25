<?php
	require ("/var/www/html/site/gestionEspectro/php/conexionBD.php");
	$objconexionBD = new conexionBD();
	$objconexionBD->abrirConexion();
	/*
	 * Este archivo sirve para insertar un nuevo rango de frecuencia en una banda deseada
	 * Tambien inserta los canales asociados a ese nuevo rango
	 */
	 $idBanda = $_POST["idBanda"];
	 $rangoFrecuencias = $_POST["rangoFrecuencias"];
	 $maxCanalesOperador = $_POST["maxCanalesOperador"];
	 $frecuenciaInicial = $_POST["frecuenciaInicial"];
	 $frecuenciaFinal = $_POST["frecuenciaFinal"];
	 $numeroCanales = $_POST["numeroCanales"];
	 $separacion = $_POST["separacion"];
	 $descripcioNRango = $_POST["descripcioNRango"];
	 $descripcioNCanal = $_POST["descripcioNCanal"];
	 
	 //Tx
	 $frecuenciaBaseTx = $_POST["frecuenciaBaseTx"];
	 
	 $mutiplicadorTx = $_POST["mutiplicadorTx"];	 
	 $frecuenciaCorrimientoTx = $_POST["frecuenciaCorrimientoTx"];
	 $divisorTx = $_POST["divisorTx"];
	 
	 //Rx
	 $multiplicador1Rx = $_POST["multiplicador1Rx"];
	 $divisor1Rx = $_POST["divisor1Rx"];
	 
	 $mutiplicador2Rx = $_POST["mutiplicador2Rx"];
	 $frecuenciaCorrimientoRx = $_POST["frecuenciaCorrimientoRx"];
	 $divisor2Rx = $_POST["divisor2Rx"]; 
	 
	 $nodo = $_POST["nodo"]; 
	 
	 //Hallar nuevo ID
	 $query = " select max(\"ID_frequency_ranks\") as max from frequency_ranks;";
	 $result= $objconexionBD->enviarConsulta($query);
	 $IdActual;
	 
	 while ($row =  pg_fetch_array ($result))
	 {
		$IdActual = $row["max"];
	 }
	 
	 $IdActual++;
	 		 
	 //Insertar rango de frecuencia
	 $query= "insert into services (\"ID_frequency_ranks\", frequency_ranks_name, \"ID_frequency_bands\", frequency_ranks_description, max_channels_per_operator, frequency_begin_Hz, frequency_end_Hz, channels_number, channel_separation) values (".$IdActual.",'".$descripcioNRango."',".$idBanda.",".$maxCanalesOperador.",".$frecuenciaInicial.",".$frecuenciaFinal.",".$separacion.",".$numeroCanales.");";
	 //$objconexionBD->enviarConsulta($query);
	echo $query."<br/>";
	 
	 for($i=0; $i<$numeroCanales; $i++)
	 {
		$n = $i+1;
		$frecuenciaTx = $frecuenciaBaseTx + $n*$mutiplicadorTx/$divisorTx;
		$frecuenciaRx = $multiplicador1Rx*$frecuenciaBaseTx/$divisor1Rx + $n*$mutiplicador2Rx*$frecuenciaCorrimientoRx/$divisor2Rx;
				 
		$query="insert into services (\"ID_frequency_ranks\", channel_description, channel_number, TxFrequency, RxFrequency, reserved, disabled) values (".$IdActual.",'".$descripcioNCanal."',".$n.",".$frecuenciaTX.",".$frecuenciaRx.",f,f);";	   
		//$objconexionBD->enviarConsulta($query); 
		echo $query."<br/>";
	 } 
	 
	 	 
	 $objconexionBD->cerrarConexion();
	
	 if($nodo==46)
	 {
		echo "<script>alert('Procedimiento realizado con exito');</script>";
		//echo "<script>window.location=\"http://avispa.univalle.edu.co/site/?q=node/46&&idRango=".$idRango."\";</script>";
	 }	 
?>



