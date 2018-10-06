<?php 

	include_once("../models/Conexion.php");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<title>Añadir libro | Sistema bibliotecario</title>
	<link rel="stylesheet" type="text/css" href="../views/css/fuentes.css">
	<link rel="stylesheet" type="text/css" href="../views/css/nav.css">
	<link rel="stylesheet" type="text/css" href="../views/css/searchbar.css">
	<link rel="stylesheet" type="text/css" href="../views/css/actualizar.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<header>
		<?php include_once("../views/nav.php") ?>
	</header>
	<section class="main">
		<form action="../controllers/addController.php" method="post">
			<label for="nombre">Nombre</label>
			<input type="text" id="nombre">
			<label for="descripcion">Descripción</label>
			<textarea id="descripcion"></textarea>
			<label for="existencia">Libros disponibles</label>
			<input type="number" value="0" id="existencia">
			<select name="autores" id="autores">
				<option>Autores</option>
			<?php 

				$autores = $conexion->SelectQuery(null,"autores");

				foreach ($autores as $autor): ?>
					<option value="<?php echo $autor['Id_Autor'] ?>"><?php echo $autor['Nombres']; ?></option>
				<?php endforeach;
			 ?>
			</select>
			<select name="categoria" id="categoria">
				<option>Categoría</option>
			<?php 

				$categorias = $conexion->SelectQuery(null,"categorias");

				foreach ($categorias as $categoria): ?>
					<option value="<?php echo $categoria['Id_Autor'] ?>"><?php echo $categoria['Nombres']; ?></option>
				<?php endforeach;
			 ?>
			</select>
		</form>
	</section>
	<footer></footer>
</body>
</html>