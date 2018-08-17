<?php 

	try {
		
		$insert = array("Texto 1","Texto 2");
		$columnas = array("Campo1");
		$values_imploded = implode("','",$insert);
		$keys_imploded = implode("",$columnas);

		$query = "INSERT INTO tabla1($keys_imploded) VALUES('Hola')";
		
		echo $query . "<br>";		
		echo $values_imploded;

		$conexion = new PDO('mysql:host=localhost;dbname=prueba','root','');

		$cons_prep = $conexion->prepare($query);
		$cons_prep->execute();

	} catch (PDOException $e) {
		
		die("Error " . $e->getMessage() . " en la línea " . $e->getLine());
	}

 ?>