<?php 

	include_once '../models/Conexion.php';

	$libros = $conexion->SelectQuery(null, "libros", null, null);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Sistema Bibliotecario | Inicio</title>
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
	<link rel="stylesheet" type="text/css" href="../views/css/index.css">
	<link rel="stylesheet" type="text/css" href="../views/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../views/css/fuentes.css">
	<link rel="stylesheet" type="text/css" href="../views/css/aside.css">
	<link rel="stylesheet" type="text/css" href="../views/css/nav.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<header>
	<?php include("../views/nav.php"); ?>
	</header>
	<aside><?php include("../views/aside.php"); ?></aside>
	<main>
		<h2 class="letra">Todos nuestros libros</h2>
		<br><br>
	<?php for ($i=0; $i < count($libros); $i++): ?>
		<div class="row">
			<div class="col-sm-4 books">
				<div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="imagenes/portadas/<?php echo $libros[$i]['Imagen'] ?>" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title"><?php echo $libros[$i]['Nombre_Libro'] ?></h5>
				    <p class="card-text"><?php echo $libros[$i]['Descripcion'] ?></p>
				    <a href="#" class="btn btn-primary">Go somewhere</a>
				  </div>
				</div>
			</div>
		</div>
	<?php endfor ?>
	</main>
	<script src="../views/js/jquery.js"></script>
	<script src="../views/js/bootstrap.min.js"></script>
</body>
</html>