<?php 

	require_once("../models/Conexion.php");
	$conexion = new Conexion();

	$nombres = $_POST["nombres"];
	$apellidos = $_POST["apellidos"];
	$nom_usuario = $_POST["usuario"];
	$contra = $_POST["contraseña"];
	$email = $_POST["correo"];
	//$edad;
	//$sexo;
	$notificaciones = $_POST["notis"];

	echo "$notificaciones";

 ?>