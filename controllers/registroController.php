<?php 

	require_once("../models/Conexion.php");

	$nombres = $_POST["nombres"];
	$apellidos = $_POST["apellidos"];
	$nom_usuario = $_POST["usuario"];
	$contra = $_POST["contrasenia"];
	$email = $_POST["correo"];
	$diaCumple = $_POST["dia"];
	$mesCumple = $_POST["mes"];
	$anioCumple = $_POST["anio"];
	$edad = date("Y") - $anioCumple;
	$sexo = $_POST["genero"];

	//Cifrando ontraseña

	try {
		
		$valores = [":nombres, :apellidos, :apodo, :contra, :email, :nacimiento, :edad, :sexo"];

		$conexion->InsertQuery("usuarios",  null,);

	} catch (PDOException $e) {
		die();
	}

 ?>