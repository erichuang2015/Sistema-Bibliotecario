<?php 

	require_once("../models/Conexion.php");

	$nombres = $_POST["nombres"];
	$apellidos = $_POST["apellidos"];
	$nom_usuario = $_POST["usuario"];
	$contra = $_POST["contrasenia"];
	$email = $_POST["correo"];
	//Fecha de nacimiento
	$diaCumple = $_POST["dia"];
	$mesCumple = $_POST["mes"];
	$anioCumple = $_POST["anio"];
	$born = $diaCumple."".$mesCumple."".$anioCumple;

	$edad = date("Y") - $anioCumple;
	$sexo = $_POST["genero"];

	//Cifrando ontraseña
	$p_cifrada = password_hash($contra, PASSWORD_DEFAULT, array("cost"=>12));

	try {
		
		$valores = [":nombres, :apellidos, :apodo, :contra, :email, :nacimiento, :edad, :sexo"];

		$marcadores = [":nombres" => $nombres, ":apellidos" => $apellidos, ":apodo" => $nom_usuario, ":contra" => $p_cifrada, ":email" =>  $email, ":nacimiento" => $born, ":edad" => $edad, ":sexo" => $sexo];

		$conexion->InsertQuery("usuarios", $valores, null, $marcadores);

		header("location:../views/login.php");

	} catch (PDOException $e) {
		die();
	}

 ?>