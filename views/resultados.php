<?php 
	
	include_once("../models/Conexion.php");

	if (!isset($_GET['query']) || $_GET['query'] == "") {
		header("Location:index.php");
		exit();
	}

	$libros = $conexion->SelectQuery(null,"libros","Nombre_Libro",$_GET['query']);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo $_GET['query']; ?> | Sistema bibliotecario</title>
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
</head>
<body>
	<header>
		<?php include("nav.php"); ?>
	</header>
	<aside><?php include 'aside.php'; ?></aside>
	<main>
		<h1 id="header">Resultados para: "<?php echo $_GET['query']; ?>"</h1>
		<br><br>
		<section class="libros">
		<?php foreach ($libros as $libro): ?>
			<div class="resultados">
				<img class="resultadosImg" src="<?php echo "imagenes/portadas/".$libro['Imagen']; ?>">
				<h2 class="resultadosTitulo"><?php echo $libro['Nombre_Libro'] ?></h2>
				<div class="resultadosDescripcion"><?php echo $libro['Descripcion'] ?></div>
				<br><br>
				<a class="resultadosVer" href="libro.php?idLibro=<?php echo $libro['Id_Libro'] ?>">Ver libro</a>
				<a class="resultadosEncargar" href="encargo.php?">Encargar Libro</a>	
			</div>
			<br><br>
			<hr>
			<br>
		<?php endforeach ?>
		<?php if (count($libros) == 0): ?>
			<br><br>
			<section id="noResultados">
				<span id="text">No hay libros disponibles</span>
			</section>
		<?php endif ?>
		</section>
	</main>
	<footer></footer>
</body>
</html>