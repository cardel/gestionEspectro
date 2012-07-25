<?php

/*
 * Autor: Carlos A Delgado 
 * Basado en proyecto de WWW 2011 (Clase creada por Danny Zamorano)
 * Clase que sirve como interfaz para la comunicación con
 * la base de datos.
 * Acciones
 * 1. Abrir conexión
 * 2. Ejecutar una sentencia (INSERT, UPDATE, DELETE)
 * 3. Enviar un consulta (SELECT)
 * 4. Cerrar conexión
 */

class conexionBD {

    private $servidor;
    private $base;
    private $usuario;
    private $contrasena;
    private $conexion;

    function __construct() {
		//Datos conexión
		$servidor = 'localhost';
		$base = 'dbtgespectro';
		$usuario = 'drupal';
		$contrasena = 'EKLm0p43';
    }

    function __destruct() {
        
    }

    function abrirConexion() {
        $this->conexion = pg_connect("host=$servidor dbname=$base user=$tusuario password=$contrasena");
        if ($this->conexion == false)
            return false;            
        return true;
    }

    function cerrarConexion() {
        return pg_close($this->conexion);
    }

    function enviarConsulta($consulta) {
        $resultado = pg_query($this->conexion, $consulta);
        return $resultado;
    }

    function ejecutarSentencia($sentencia) {
        return pg_execute($this->conexion, $sentencia);
    }

}

?>
