<?php 

	require_once("../models/Conexion.php");

	$datos = $conexion->SelectQuery(null, "libros", "Id_Libro", $_GET['id']);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<title>Borrar libro | Sistema Bibliotecario</title>
	<link rel="stylesheet" type="text/css" href="../views/css/fuentes.css">
	<link rel="stylesheet" type="text/css" href="../views/css/nav.css">
	<link rel="stylesheet" type="text/css" href="../views/css/searchbar.css">
	<link rel="stylesheet" type="text/css" href="../views/css/borrar.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<header>
		<?php include("../views/nav.php"); ?>
	</header>
	<section class="main">
		<h1 id="h1">¿Desea eliminar este libro?</h1>
		<br><br>
		<div id="libro">
			<h2 id="h2"><?php echo $datos[0]['Nombre'] ?></h2>
			<img id="img" src="imagenes/libro-default.jpg">
			<a id="button" href="../controllers/borrarlibroController.php?id=<?php echo $_GET['id']?>"><button>Eliminar</button></a>
		</div>
	</section>
</body>
</html>