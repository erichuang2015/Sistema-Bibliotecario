<?php 

	include_once("../models/Conexion.php");

	if (!isset($_GET['idLibro'])) {
		header("Location:index.php");
		exit();
	}

	$datos = $conexion->SelectQuery(null, "libros", "Id_Libro", $_GET['idLibro']);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo $datos[0]['Nombre_Libro'] ?> | Sistema bibliotecario </title>
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
	<link rel="stylesheet" type="text/css" href="../views/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../views/css/fuentes.css">
	<link rel="stylesheet" type="text/css" href="../views/css/aside.css">
	<link rel="stylesheet" type="text/css" href="../views/css/nav.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../views/css/resultados.css">
	<link rel="stylesheet" type="text/css" href="../views/css/libro.css">
</head>
<body>
	<header>
	<?php include("../views/nav.php"); ?>
	</header>
	<section class="main">
		<h1 id="bookName"><?php echo $datos[0]['Nombre_Libro'] ?></h1>
		<?php include("../views/aside.php"); ?>
		<?php include("libro_prueba.html"); ?>
		<div class="rate">
			<div class="comentarios">
				<h2>Comentarios</h2>
				<div class="foto">
					<img src="imagenes/default.png">
				</div>
				<span class="nomUsuario">Nombre usuario</span>
				<div class="texto">
					<p>Iris por favor ponganos buena nota :'v no sea mala onda, hasta comentarios pusimos xd</p>
				</div>
				<hr>
				<br>
				<div class="foto">
					<img src="imagenes/default.png">
				</div>
				<span class="nomUsuario">Nombre usuario</span>
				<div class="texto">
					<p>Iris por favor ponganos buena nota :'v no sea mala onda, hasta comentarios pusimos xd</p>
				</div>
				<hr>
				<br>
				<div class="foto">
					<img src="imagenes/default.png">
				</div>
				<span class="nomUsuario">Nombre usuario</span>
				<div class="texto">
					<p>Iris por favor ponganos buena nota :'v no sea mala onda, hasta comentarios pusimos xd</p>
				</div>
				<hr>
				<br>
				<div class="foto">
					<img src="imagenes/default.png">
				</div>
				<span class="nomUsuario">Nombre usuario</span>
				<div class="texto">
					<p>Iris por favor ponganos buena nota :'v no sea mala onda, hasta comentarios pusimos xd</p>
				</div>
				<hr>
				<br>
			</div>
		</div>
	</section>
	<footer></footer>
</body>
</html>