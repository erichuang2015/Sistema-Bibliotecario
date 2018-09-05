<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="../views/css/registro.css">
	<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/fuentes.css">
</head>
<body>
		<form action="../controllers/registroController.php" method="post" class="registro2">
			<h1>Registrarse</h1>
			<br>
			<div class="mitadUno">
				<label for="nombres">
				<h3>Nombres</h3>
				</label>
					<input type="text" class="inputRegistro" name="nombres" placeholder="Nombres" id="nombres" autocomplete="off" required>
				<br><br>
				<label for="apellidos">
					<h3>Apellidos</h3>
				</label>
					<input type="text" class="inputRegistro" name="apellidos" placeholder="Apellidos" id="apellidos" autocomplete="off" required>
				<br><br>
				<label for="usuario">
					<h3>Escriba un nombre de Usuario:</h3>
				</label>
					<input type="text" class="inputRegistro" name="usuario" placeholder="Nombre de Usuario" id="usuario" required autocomplete="off">
			</div>
			<div class="mitadDos">
				<label for="contraseña">
				<h3>Escriba su contraseña:</h3>
				</label>
					<input type="password" class="inputRegistro" name="contrasenia" placeholder="Contraseña" id="contraseña" required autocomplete="off">
				<br><br>
				<label for="correo">
					<h3>Escriba su correo electrónico:</h3>
				</label>
					<input type="email" class="inputRegistro" name="correo" placeholder="Correo electrónico" id="correo" required autocomplete="off">
				</label>
				<br><br>
				<?php include("../views/fecha_de_nacimiento.html"); ?>
				<br><br>
				<div class="radio">
					<input type="radio" name="genero" value="Hombre" id="hombre" class="inputHombre"><label for="hombre">Hombre</label>
					<input type="radio" name="genero" value="Mujer" id="mujer" class="inputMujer"><label for="mujer">Mujer</label>
				</div>
			</div>
			<br>
			<input type="submit" value="Registrarse">
		</form>
</body>
</html>