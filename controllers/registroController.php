<?php 

	require_once("../models/Conexion.php");

	$nombres = htmlentities(addslashes($_POST["nombres"]));
	$apellidos = htmlentities(addslashes($_POST["apellidos"]));
	$nom_usuario = htmlentities(addslashes($_POST["usuario"]));
	$contra = htmlentities(addslashes($_POST["contrasenia"]));
	$email = htmlentities(addslashes($_POST["correo"]));
	$diaCumple = htmlentities(addslashes($_POST["dia"]));
	$mesCumple = htmlentities(addslashes($_POST["mes"]));
	$anioCumple = htmlentities(addslashes($_POST["anio"]));
	$born = $anioCumple.$mesCumple.$diaCumple;
	if (!is_numeric($born)) {
		
		header("Location: ../views/registro.php?dateW");
		exit();
	}
	$edad = intval(date("Y")) - $anioCumple;
	$sexo = htmlentities(addslashes($_POST["genero"]));
	$permisos = "Usuario";

	//Cifrando ontraseña
	$p_cifrada = password_hash($contra, PASSWORD_DEFAULT, array("cost"=>12));

	try {
		
		$valores = [":Id, :nombres, :apellidos, :apodo, :contra, :email, :nacimiento, :edad, :sexo, :nivel"];

		$marcadores = array(":Id" => null, ":nombres" => $nombres, ":apellidos" => $apellidos, ":apodo" => $nom_usuario, ":contra" => $p_cifrada, ":email" =>  $email, ":nacimiento" => $born, ":edad" => intval($edad), ":sexo" => $sexo, ":nivel" => $permisos);

		$conexion->InsertQuery("usuarios",$valores,null,$marcadores);

		header("Location:../views/login.php?registro");

	} catch (PDOException $e) {
		die();
	}

 ?>