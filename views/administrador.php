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