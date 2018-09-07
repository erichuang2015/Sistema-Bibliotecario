<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../views/css/login.css">
	<link rel="stylesheet" type="text/css" href="../views/css/fuentes.css">
</head>
<body>
	
	<div class="login">
		<form action="../controllers/loginController.php" method="post" class="login2"  >
			<h1>Iniciar Sesión</h1>
			<br>
			<label for="usuario"><p><b>Nombre de Usuario</b></p>
			<input type="text" class="inputLogin" name="usuario" placeholder= "Usuario" id="usuario" required autocomplete="off">
			</label>			
			<label for="contrasenia"> <p><b>Contraseña</b></p>
			<input type="password" class="inputLogin" name="contrasenia" placeholder="Contraseña" id="contrasenia" required autocomplete="off">
			</label>
			<br>
			<input type="submit" value="Iniciar sesión" id="submit">
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
