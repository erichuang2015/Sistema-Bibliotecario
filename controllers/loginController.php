<?php 

	include_once("../models/Conexion.php");

	$usuario = addslashes($_POST['usuario']);
	$password = addslashes($_POST['contrasenia']);

	$passwordBBDD = $conexion->SelectQuery(['password'],"usuarios","Apodo",$usuario);

	if (password_verify($password, $passwordBBDD)) {
		
		session_start();
		$_SESSION['usuario'] = $usuario;
	} else {

		header("Location: ../views/login.php");
	}

 ?>