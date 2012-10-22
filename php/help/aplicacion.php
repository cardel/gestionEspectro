<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<?
$variables = $_POST["feed_item_length"];?>

<html>
<head>
	<META HTTP-EQUIV="Content-Type" content="text/html; charset=utf-8"/>

<title></title>
</head>
<body>
	
<?php

if($variables!=null){
	echo '<script > location.href="#distribuidor";</script>';
}
?>
	
<style type="text/css">
table.tableStyle-table {border: 1px solid #CCC; font-family: Verdana, Verdana, Geneva, sans-serif; font-size: 12px;} 
.tableStyle-table td {padding: 4px; margin: 3px; border: 1px solid #ccc;} 
.tableStyle-table th {background-color: #70A7DC; color: #FFF; font-weight: bold; font-size: 16px} </style>

<div style="border: 1pt;" align="center">

<h2><strong><em>Secuenciamiento de aviones</em></strong></h2>

<img src="aplicacion.png"  alt="imagen de la aplicaci&oacute;n web" />
<a name='distribuidor'></a>
<table class="tableStyle-table" width="60%">
<tr class="tableStyle-firstrow" ><th>Componente</th><th>Descripci&oacute;n</th></tr> 

<tr><td width="20%">Seleccion de archivo </td><td width="80%">Componente que permite hacer una seleccion de un archivo desde el computador del usuario, este archivo lleva el formato de la entrada, para saber mas acerca de el formato de la entrada ver en: documentacion informe de entrada secuenciamiento de aviones. </td></tr> 
<tr><td>Seleccion de entrada definida</td><td>Existe una serie de entradas predefinidas, tomadas de "beasley-examples", basta con seleccionar  la que desea usar para correr el programa. </td></tr> 

<tr><td>  Seleccion de estrategia de distribuci&oacute;n 
</td><td> 

<FORM action="ayuda.php" method="post">
	<select name="feed_item_length" onchange="this.form.submit();" >
	<option value="0" <?php if($variables==0) echo "selected='selected'" ; ?> >Distribuidor #1</option>
	<option value="1" <?php if($variables==1) echo "selected='selected'"; ?> >Distribuidor #2</option>
	<option value="2"<?php if($variables==2) echo "selected='selected'"; ?> >Distribuidor #3-1</option>
	<option value="3"<?php if($variables==3) echo "selected='selected'"; ?> >Distribuidor #3-2</option>
	<option value="4"<?php if($variables==4) echo "selected='selected'"; ?> >Busqueda por programacion lineal</option>
	<option value="5" <?php if($variables==5) echo "selected='selected'"; ?> >Busqueda aleatoria con generador local</option>
	</select>
	 
</FORM>

<?

if ($variables==0) {
    
    echo 
"<p><I>Distribuidor #1:  </I> 

<B>Seleccion de variable:</B> Menor dominio, Se selecciona la variable que tenga el menor dominio.

<B>Seleccion de valores:</B>  Mejor mitad, Partir el dominio de la variable en 2 y tomar la mitad en la que se
encuentre el tiempo favorito del avi&oacute;n.


 <p>";


};


if ($variables==1) {
    echo "<p><I>Distribuidor #2:  </I> 
<B>Seleccion de variable:</B> Se selecciona la variable cuyo avi&oacute;n correspondiente est&eacute;
m&aacute;s a la izquierda, es decir, aquel que tenga el menor tiempo favorito.

<B>Seleccion de valores:</B>M&aacute;s cercano al favorito, Si es posible, se toma el tiempo favorito, sino, se aplican
varias reglas. La idea b&aacute;sica es partir el dominio de la variable en 2 y seleccionar la
mitad que est&eacute; m&aacute;s cercana al tiempo favorito.

<p> ";
};
if ($variables==2) {

    echo "<p><I>Distribuidor #3-1:</I> 
<B>Seleccion de variable: </B>M&aacute;s costoso primero, Se utiliza una heur&iacute;stica para saber cual es el avi&oacute;n que (dadas
las caracter&iacute;sticas de su dominio y sus costos por aterrizar antes o despu&eacute;s) sea m&aacute;s
costoso de planificar en un tiempo diferente a su tiempo favorito.

<B>Seleccion de valores : </B> Mejor mitad, Partir el dominio de la variable en 2 y tomar la mitad en la que se
encuentre el tiempo favorito del avi&oacute;n.

</p> ";
}


if ($variables==3) {
    echo "<p><I>Distribuidor #3-2:</I>
<B> Seleccion de variable : </B> M&aacute;s costoso primero, Se utiliza una heur&iacute;stica para saber cual es el avi&oacute;n que (dadas las caracter&iacute;sticas de su dominio y sus costos por aterrizar antes o despu&eacute;s) sea m&aacute;s
costoso de planificar en un tiempo diferente a su tiempo favorito.

<B>Seleccion de valores : </B>M&aacute;s cercano al favorito, Si es posible, se toma el tiempo favorito, sino, se aplican
varias reglas. La idea b&aacute;sica es partir el dominio de la variable en 2 y seleccionar la
mitad que est&eacute; m&aacute;s cercana al tiempo favorito.</p>";

}

if ($variables==4) {
    echo "<p><I>Distribuidor Lineal:</I>   
<B>Seleccion de variables: </B> Se utiliza programaci&oacute;n lineal para resolver el problema (lineal)
y entonces seleccionar de las variables que no dieron soluci&oacute;n entera, la mejor usando alguna de las otras t&eacute;cnicas.

<B>Seleccion de valores:</B> Se parte el dominio de la variable en 2 partes no iguales. Para partir el dominio se toma en cuenta la soluci&oacute;n lineal x.

</p> ";
}

if ($variables==5) {
    echo "<p><I>Distribuidor aleatorio:</I>  <B> Seleccion de variables: </B> Se selecciona aleatoriamente la variable que se considere mejor.

<B> Selecci&oacute;n de valor aleatorio: </B> Se toma del dominio, un valor aleatorio.<p>";
}


?>

</td></tr>


<tr><td>Numero de Pistas</td><td>En este campo se ingresa un numero entero, con la cantidad de pistas para la solucion.</td></tr>
<tr><td>Nivel de recomputacion</td><td>
Se basa en el ahorro de memoria una recomputation de 1 indica que no hay ahorro
de memoria, si se toma una recomputation de 2 ahorra un 50 % de la memoria pero consume mas
procesador.
</td></tr>

<tr><td>Tiempo de ejecucion </td><td>
Como su nombre indica, dado que hay entradas que pueden tardar  tiempos bastante grandes en encontrar una solucion optima, la aplicacion recibe este tiempo  para detenerse, una ves termine,  y arrojar la solucion de menor costo que haya encontrado en ese tiempo.
</td></tr>


</table>

<span style="font-size: 12px;">Grupo de investigaci&oacute;n AVISPA</span>

</div>


</body>
</html>
