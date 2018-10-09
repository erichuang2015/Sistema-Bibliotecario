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
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="imagenes/books-icon.png">
	<link rel="apple-touch-icon" sizes="60x60" href="imagenes/books-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="imagenes/books-icon.png">
	<link rel="apple-touch-icon" sizes="76x76" href="imagenes/books-icon.png">
	<link rel="apple-touch-icon" sizes="114x114" href="imagenes/books-icon.png">
	<link rel="apple-touch-icon" sizes="120x120" href="imagenes/books-icon.png">
	<link rel="apple-touch-icon" sizes="144x144" href="imagenes/books-icon.png">
	<link rel="apple-touch-icon" sizes="152x152" href="imagenes/books-icon.png">
	<link rel="apple-touch-icon" sizes="180x180" href="imagenes/books-icon.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="imagenes/books-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="imagenes/books-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="imagenes/books-icon.png">
	<link rel="icon" type="image/png" sizes="16x16" href="imagenes/books-icon.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="imagenes/books-icon.png">
	<meta name="theme-color" content="#ffffff">

	<!-- Hojas de estilo -->
	<link rel="stylesheet" type="text/css" href="../views/css/aside.css">
	<link rel="stylesheet" type="text/css" href="../views/css/fuentes.css">
	<link rel="stylesheet" type="text/css" href="../views/css/nav.css">
	<link rel="stylesheet" type="text/css" href="../views/css/searchbar.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../views/css/administrador.css">
</head>
<body>
	<header>
		<?php include '../views/nav.php'; ?>
	</header>
	<section class="main">
		<h1 id="cateLibrostxt">Categoría de libros</h1>
		<a href="add.php"><button class="agregar">Agregar libro</button></a>
		<?php include '../views/aside.php'; ?>
		<div class="editarlibros">
			<?php if (count($datos) == 0): ?>
				<h2>No hay libros</h2>
			<?php endif ?>
			<?php foreach ($datos as $datoLibro): ?>
			<div class="libro">
				<div class="img">
					<img src="imagenes/portadas/<?php echo $datoLibro['Imagen']; ?>">
				</div>
				<div id="infolibro">
					<h2 class="nombrelibro"><?php echo $datoLibro['Nombre'] ?></h2>
					<p class="descripcion"><?php echo $datoLibro['Descripcion'] ?></p>
					<span id="existencia">En existencia: <?php echo $datoLibro['Existencia'] ?></span>
				</div>
				<br>
				<div class="botones">
					<a href="../views/actualizar.php?id=<?php echo $datoLibro['Id_Libro']; ?>"><button id="editar">Editar</button></a>
					<a href="../views/borrar.php?id=<?php echo $datoLibro['Id_Libro']; ?>"><button id="borrar">Eliminar</button></a>
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