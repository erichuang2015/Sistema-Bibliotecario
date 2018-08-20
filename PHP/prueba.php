<?php
	
	require_once("Conexion.php");

	$prueba = new Conexion();

	$consulta = $prueba->SelectQuery(null, "tabla1");
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Pruebas</title>
 </head>
 <body>
 	
 </body>
 </html>