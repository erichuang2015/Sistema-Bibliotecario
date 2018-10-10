<?php

	include_once("../models/Conexion.php");

	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$existencia = $_POST['existencia'];
	$autores = $_POST['autores'];
	$categoria = $_POST['categoria'];

	//Manejar la imagen
	$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . "/Sistema-Bibliotecario/views/imagenes/portadas/";

	$extension_imagen = explode(".", $_FILES['imagen']['name']);
	$nombre_separado = explode(" ", $nombre);
	$nombre_nuevo_imagen = $nombre_separado[count($nombre_separado)-1];
	$nombre_con_extension = $nombre_nuevo_imagen . "." . $extension_imagen[1];

	move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $nombre_con_extension);

	$columnas = ["Nombre","Descripcion","Existencia","Id_Autor","Id_Categoria", "Imagen"];

	$valores = [$nombre,$descripcion,$existencia,$autores,$categoria,$nombre_con_extension];

	$conexion->InsertQuery("libros", $valores, $columnas, null);

	header("Location:../views/administrador.php");

 ?>