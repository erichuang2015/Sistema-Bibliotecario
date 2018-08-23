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
 	<table>
 		<tr>
 			<th>Campo1</th>
 			<th>Campo2</th>
 		</tr>
 		<?php foreach ($consulta as $columna):?>
 		<tr>
  			<td><?php echo $columna['Campo1'] ?></td>
 			<td><?php echo $columna['Campo2'] ?></td>
 		</tr>
 		<?php endforeach; ?>
 	</table>
 </body>
 </html>