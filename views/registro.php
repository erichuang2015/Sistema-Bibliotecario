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
	<div class="registro">
		<form action="../controllers/loginController.php" method="post" class="registro2">
			<h1>Registrarse</h1>
			<br>
			<label for="nombres">
				<h3>Nombres</h3>
			</label>
				<input type="text" class="inputRegistro" name="nombres" placeholder="Nombres" id="nombres" autocomplete="off">
			<br><br>
			<label for="apellidos">
				<h3>Apellidos</h3>
			</label>
				<input type="text" class="inputRegistro" name="apellidos" placeholder="Apellidos" id="apellidos" autocomplete="off">
			<br><br>
			<label for="usuario">
				<h3>Escriba un nombre de Usuario:</h3>
			</label>
				<input type="text" class="inputRegistro" name="usuario" placeholder="Nombre de Usuario" id="usuario" required autocomplete="off">
			<br><br>
			<label for="contraseña">
				<h3>Escriba su contraseña:</h3>
			</label>
				<input type="password" class="inputRegistro" name="contraseña" placeholder="Contraseña" id="contraseña" required autocomplete="off">
			<br><br>
			<label for="correo">
				<h3>Escriba su correo electrónico:</h3>
			</label>
				<input type="email" class="inputRegistro" name="correo" placeholder="Correo electrónico" id="correo" required autocomplete="off">
			<input type="checkbox" name="notis" id="notis" value="si"><label for="notis">Recibir notificaciones</label>
			<br><br>
			<div class="radio">
			<input type="radio" id="hombre" name="genero" value="M"><label for="hombre">Hombre</label>
			<input type="radio" id="mujer" name="genero" value="F"><label for="mujer">Mujer</label>
			</div>
			<input type="submit" value="Registrarse">
		</form>
	</div>
	
</body>
</html>