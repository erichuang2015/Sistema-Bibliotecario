<?php 
	session_start();
	require_once("../models/Conexion.php");

	$datos = $conexion->SelectQuery(null, "libros", null, null);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>Administrador | Sistema bibliotecario</title>
	<link rel="stylesheet" type="text/css" href="css/administrador.css">
	<link rel="stylesheet" type="text/css" href="../views/css/aside.css">
	<link rel="stylesheet" type="text/css" href="../views/css/fuentes.css">
	<link rel="stylesheet" type="text/css" href="../views/css/nav.css">
	<link rel="stylesheet" type="text/css" href="../views/css/searchbar.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<header>
		<?php include '../views/nav.php'; ?>
	</header>
	<section class="main">
		<h1 id="cateLibrostxt">Categoría de libros</h1>
		<?php if ($_SESSION['permisos'] == "administrador"): ?>
			<button>En este botón va a ir "Agregar nuevo libro"</button>
		<?php endif ?>
		<?php include '../views/aside.php'; ?>
		<div class="editarlibros">
			<?php foreach ($datos as $datoLibro): ?>
			<div class="libro">
				<div class="img">
					<img src="imagenes/libro-default.jpg">
				</div>
				<div id="infolibro">
					<h2><?php echo $datoLibro['Nombre'] ?></h2>
					<p><?php echo $datoLibro['Descripcion'] ?></p>
				</div>
				<div class="botones">
					<a href="../views/actualizar.php?id=<?php echo $datoLibro['Id_Libro']; ?>"><button id="editar">Editar</button></a>
					<button id="borrar">Eliminar</button>
				</div>
				<br>
				<hr>
				<br>
			</div>
			<?php endforeach ?>
		</div>
	</section>
	<footer>
		
	</footer>
</body>
</html>