<?php

	include_once("../models/Conexion.php");

	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$existencia = $_POST['existencia'];
	$autores = $_POST['autores'];
	$categoria = $_POST['categoria'];

	$valores = [$nombre,$descripcion,$existencia,$autores,$categoria];

	$columnas = ["Nombre","Descripcion","Existencia","Id_Autor","Id_Editorial"];

	$conexion->InsertQuery("libros", $valores, $columnas, null);

	header("Location:../views/administrador.php?ba");

 ?>