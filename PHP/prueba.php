<?php 

	try {
		
		$campoEvaluar = "Campo1";
		$condicional = "Condici%n";

		$query = "DELETE FROM tabla1 WHERE $campoEvaluar LIKE '$condicional'";
		
		echo $query . "<br>";

		$conexion = new PDO('mysql:host=localhost;dbname=prueba','root','');

		$cons_prep = $conexion->prepare($query);
		$cons_prep->execute();

	} catch (PDOException $e) {
		
		die("Error " . $e->getMessage() . " en la línea " . $e->getLine());
	}

 ?>