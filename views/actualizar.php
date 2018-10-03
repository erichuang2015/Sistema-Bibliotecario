<?php 
	
	//session_start();
	require_once("../models/Conexion.php");
	// Validando entrada solo a los usuarios autorizados
	//if ("administrador" != "administrador" || !isset($_GET['id'])) {
		
	//	header("Location: Inicio1.php");
	//}

	$datos = $conexion->SelectQuery(null, "libros", "Id_Libro", $_GET['id']);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<title>Actualizar libro | Sistema bibliotecario</title>
	<link rel="stylesheet" type="text/css" href="../views/css/fuentes.css">
	<link rel="stylesheet" type="text/css" href="../views/css/nav.css">
	<link rel="stylesheet" type="text/css" href="../views/css/searchbar.css">
	<link rel="stylesheet" type="text/css" href="../views/css/actualizar.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<header>
		<?php include("../views/nav.php") ?>
	</header>
	<section class="main">
		<h1 id="titulo">Actualizar datos de libros</h1>
		<br><br>
		<hr class="hr"><hr class="hr">
		<form>
			<label for="nombre" class="camposActualizar">Nombre: </label>
			<input type="text" name="nombre" class="camposActualizar" id="nombre" value="<?php echo $datos[0]["Nombre"] ?>" placeholder="Nombre" autocomplete="off0".
			>
			<br>
			<label for="descripcion" class="camposActualizar">Descripción: </label>
			<br>
			<textarea name="descripcion" class="camposActualizar" id="descripcion" rows="4" cols="50"><?php echo $datos[0]["Descripcion"];?></textarea>
			<br>
			<label for="" class="camposActualizar">En existencia: </label>
			<input type="number" name="existencia" class="camposActualizar">
		</form>
	</section>
	<footer></footer>
</body>
</html>