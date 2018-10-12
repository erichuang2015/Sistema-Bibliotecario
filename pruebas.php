<?php 

	include_once("models/Conexion.php");

	$datos = $conexion->execQuery("SHOW CREATE TABLE libros", null);

	var_dump($datos);

 ?>