<?php

	if (!isset($_GET['idcategoria'])){
		header("Location: index.php"); 
		exit();
	}

	include_once("../models/Conexion.php");

	$sql = "SELECT * FROM libros INNER JOIN categorias ON libros.Id_Categoria = categorias.Id_Categoria WHERE libros.Id_Categoria = " . $_GET['idcategoria'] . "";
	$datos = $conexion->execQuery($sql,null);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title><?php echo $datos[0]['Nombre'] ?> | Sistema bibliotecario</title>
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
	<link rel="stylesheet" href="css/categorias.css">
</head>
<body>
	<header>
		<?php include '../views/nav.php'; ?>
	</header>
	<aside><?php include '../views/aside.php'; ?></aside>
	<main>
		<div class="container books">
			<h1 id="titulo">Categoría: <?php echo $datos[0]['Nombre'] ?></h1>
			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="imagenes/portadas/muerte.jpg" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $datos[0]['Nombre_Libro']; ?></h5>
			    <p class="card-text"><?php echo $datos[0]['Descripcion']; ?></p>
			    <a href="#" class="btn btn-success">Leer Libro</a>
			    <a href="#" class="btn btn-danger">Encargar libro</a>
			  </div>
			</div>
		</div>
	</main>
</body>
</html>
