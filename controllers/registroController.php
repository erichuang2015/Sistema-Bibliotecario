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

		$marcadores = array(":nombres" => $nombres, ":apellidos" => $apellidos, ":apodo" => $nom_usuario, ":contra" => $p_cifrada, ":email" =>  $email, ":nacimiento" => $born, ":edad" => $edad, ":sexo" => $sexo);

		$arrayOptions = array(
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_EMULATE_PREPARES=>FALSE,
			PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'",
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
		);

		$conexion = new PDO("mysql:host=localhost;dbname=usuarios","root","", $arrayOptions);

		$conexion->prepare($query);

		header("location:../views/login.php");

	} catch (PDOException $e) {
		die();
	}

 ?>