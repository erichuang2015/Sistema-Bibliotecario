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
	if (is_numeric($diaCumple) || is_numeric($mesCumple) || is_numeric($anioCumple)) {
		
		header("Location:../views/registro.php?dateW");
	}
	$born = $anioCumple.$mesCumple.$diaCumple;

	$edad = intval(date("Y")) - $anioCumple;
	$sexo = $_POST["genero"];

	//Cifrando ontraseña
	$p_cifrada = password_hash($contra, PASSWORD_DEFAULT, array("cost"=>12));

	try {
		
		$valores = [":Id, :nombres, :apellidos, :apodo, :contra, :email, :nacimiento, :edad, :sexo"];

		$marcadores = array(":Id" => null, ":nombres" => $nombres, ":apellidos" => $apellidos, ":apodo" => $nom_usuario, ":contra" => $p_cifrada, ":email" =>  $email, ":nacimiento" => $born, ":edad" => intval($edad), ":sexo" => $sexo);

		$conexion->InsertQuery("usuarios",$valores,null,$marcadores);

		header("Location:../views/login.php?registro");

	} catch (PDOException $e) {
		die();
	}

 ?>