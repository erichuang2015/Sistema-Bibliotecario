<?php 
	if (isset($_SESSION['usuario'])) {
		header("Location: ../index.php");
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="../views/css/registro.css">
	<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/fuentes.css">
	<link rel="stylesheet" type="text/css" href="css/hint.min.css">
	<?php if (isset($_GET['dateW'])): ?>
		<link rel="stylesheet" type="text/css" href="../views/css/alerta_cumpleaños.css">
	<?php endif ?>
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
					<input type="text" class="inputRegistro" name="usuario" placeholder="Nombre de Usuario" id="usuario" autocomplete="off">
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
				<?php if (isset($_GET['dateW'])): ?>
				<div class="hint--right hint--error hint--always" aria-label="Debes ingresar una fecha de cumpleaños válida">
					<?php include("../views/fecha_de_nacimiento.html"); ?>
				</div>
				<?php else: ?>
					<?php include("../views/fecha_de_nacimiento.html"); ?>
				<?php endif ?>
				<br><br>
				<div class="radio">
					<input type="radio" name="genero" value="M" id="hombre" class="inputGenero"><label for="hombre">Hombre</label>
					<input type="radio" name="genero" value="F" id="mujer" class="inputGenero" checked><label for="mujer">Mujer</label>
				</div>
			</div>
			<br>
			<input type="submit" value="Registrarse" id="submit">
		</form>
</body>
</html>