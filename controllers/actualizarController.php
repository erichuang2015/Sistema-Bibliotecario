<?php 

	include_once("../models/Conexion.php");

	$id = $_POST['id'];
	$nombreAnterior = $_POST['nombreAnterior'];
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$existencia = $_POST['existencia'];

	$set = ["Nombre" => $nombre,
			"Descripcion" => $descripcion,
			"Existencia" => $existencia];

	$datos = $conexion->UpdateQuery("libros", $set, "Nombre", $nombreAnterior);

	header("Location:../views/administrador.php");

 ?>