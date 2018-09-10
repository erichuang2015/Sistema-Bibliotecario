<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../views/css/login.css">
	<link rel="stylesheet" type="text/css" href="../views/css/fuentes.css">
	<link rel="stylesheet" type="text/css" href="../views/css/hint.min.css">
	<link rel="stylesheet" type="text/css" href="../views/css/animate.css">
</head>
<body>
	
	<div class="login">
		<form action="../controllers/loginController.php" method="post" class="login2"  >
			<h1>Iniciar Sesión</h1>
			<br>
			<label for="usuario"><p><b>Nombre de Usuario</b></p>
			</label>
			<?php if (isset($_GET['errLogin'])): ?>
			<div style="width: 100%" class="hint--top hint--always hint--error hint--large" aria-label="Contraseña o correo incorrecto. Inténtalo de nuevo...">
				<input type="text" class="inputLogin animated shake" name="usuario" placeholder= "Usuario" id="usuario" required autocomplete="off" title="Ingresa tu correo electrónico">
			</div>
			<?php else: ?>
				<input type="text" class="inputLogin" name="usuario" placeholder= "Usuario" id="usuario" required autocomplete="off" title="Ingresa tu correo electrónico">
			<?php endif ?>
						
			<label for="contrasenia"> <p><b>Contraseña</b></p>
			<input type="password" class="inputLogin" name="contrasenia" placeholder="Contraseña" id="contrasenia" required autocomplete="off">
			</label>
			<br>
			<input type="checkbox" name="recordar" id="recordar"><label for="recordar">Recordar aquí</label>
			<br>
			<input type="submit" value="Iniciar sesión" id="submit" class="hint--bottom" aria-label="Something to say...">
			<a href="registro.php">Registrarse</a>
		</form>
	</div>	
</body>
</html>

<?php 

	if (isset($_GET['registro'])) { ?>
		
	<script type="text/javascript">
		alert("Usuario ingresado correctamente");
	</script>
	
	<?php
	}

 ?>
