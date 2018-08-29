<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="css/registro.css">
	<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
</head>
<body>
	<div class="registro">
		<form action="" method="post" class="registro2">
			<h1>Registrarse</h1>
			<br>
			<h3>Nombres</h3>
			<label for="nombre">
				<input type="text" name="nombre" placeholder="Nombre" id="nombre">
			</label>
			<br><br>
			<h3>Apellidos</h3>
			<label for="apellidos">
				<input type="text" name="apellidos" placeholder="Apellidos" id="apellidos">
			</label>
			<br><br>
			<h3>Escriba un nombre de Usuario:</h3>
			<label for="usuario"></label>
				<input type="text" name="usuario" placeholder="Nombre de Usuario" id="usuario" required="">
			</label>
			<br><br>
			<h3>Escriba su contraseña:</h3>
			<label for="contraseña" >
				<input type="password" name="contraseña" placeholder="Contraseña" id="contraseña" required="">
			</label>
			<br><br>
			<h3>Escriba su correo electrónico:</h3>
			<label for="correo">
				<input type="email" name="correo" placeholder="Correo electrónico" id="correo" required="">
			</label>
			<input type="checkbox">Recibir notificaciones
			<br><br>
			<input type="submit" value="Registrarse">
		</form>
	</div>
	
</body>
</html>