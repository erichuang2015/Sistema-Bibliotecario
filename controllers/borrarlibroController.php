<?php 

	include_once("../models/Conexion.php");

	$id = $_GET['id'];

	$conexion->DeleteQuery("libros","Id_Libro",$id);

	header("Location:../views/administrador.php");
 ?>