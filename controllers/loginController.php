<?php 

	include_once("../models/Conexion.php");

	$usuario = addslashes($_POST['usuario']);
	$password = addslashes($_POST['contrasenia']);
	$recordar = $_POST['recordar'];

	$passwordBBDD = array_column($conexion->SelectQuery(['Password'],"usuarios","Apodo",$usuario), "Password");

	if (password_verify($password, $passwordBBDD[0])) {
		
		try {
			session_start();

			//Recuperando toda la información principal del usuario que ha iniciado sesión.
			$datos = $conexion->SelectQuery(['Nombres,Apellidos,Apodo,Email,FechaNacimiento,Edad,Sexo,Permisos'],"usuarios","Apodo",$usuario);

			$_SESSION['nombres'] = $datos[0]['Nombres'];
			$_SESSION['apellidos'] = $datos[0]['Apellidos'];
			$_SESSION['apodo'] = $datos[0]['Apodo'];
			$_SESSION['email'] = $datos[0]['Email'];
			$_SESSION['nacimiento'] = $datos[0]['FechaNacimiento'];
			$_SESSION['edad'] = $datos[0]['Edad'];
			$_SESSION['sexo'] = $datos[0]['Sexo'];
			$_SESSION['permisos'] = $datos[0]['Permisos'];

			if ($recordar == "on") {
				setcookie("usuario", $_SESSION['nombres'],time()+604800);
			}

			header("Location: ../views/inicio.php");

		} catch (PDOException $e) {
			
			die("Error ". $e->getMessage() . "En línea " . $e->getLine());
		}
	} else {

		header("Location: ../views/login.php");
	}

 ?>