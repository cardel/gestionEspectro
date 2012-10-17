<?php
require ("/var/www/html/site/gestionEspectro/php/consultasAplicacion.php");

$objconexionBD = new conexionBD();
$objconexionBD->abrirConexion();

$file = $_POST['file'];
$solucion = $_POST['solucion'];

echo "<p class='estilo'>Insertar salida en Base de datos</p>\n";


$objconexionBD->cerrarConexion();
?>
