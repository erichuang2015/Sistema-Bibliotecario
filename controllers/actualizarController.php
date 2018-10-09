<?php 

	include_once("../models/Conexion.php");

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$existencia = $_POST['existencia'];
	$imagen = $_FILES['imagen']['name'];

	if ($imagen != "" || $imagen != null) {
		
		//Trabajando con imagen
		$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . "/Sistema-Bibliotecario/views/imagenes/portadas/";

		$extension_imagen = explode(".", $_FILES['imagen']['name']);
		$nombre_separado = explode(" ", $nombre);
		$nombre_nuevo_imagen = $nombre_separado[count($nombre_separado)-1];
		$nombre_con_extension = $nombre_nuevo_imagen . "." . $extension_imagen[1];

		unlink($nombre_con_extension);

		move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $nombre_con_extension);

		$set = ["Nombre" => $nombre,
				"Descripcion" => $descripcion,
				"Existencia" => $existencia,
				"Imagen" => $nombre_con_extension];
	} else {

		$set = ["Nombre" => $nombre,
				"Descripcion" => $descripcion,
				"Existencia" => $existencia];
	}

	$conexion->UpdateQuery("libros", $set, "Id_Libro", $id);

	header("Location:../views/administrador.php");

 ?>