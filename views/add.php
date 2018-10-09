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
	<link rel="stylesheet" type="text/css" href="css/add.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<header>
		<?php include_once("../views/nav.php") ?>
	</header>
	<section class="main">
		<h1 id="titulo">Añadir un libro</h1>
		<form action="../controllers/addController.php" method="post" enctype="multipart/form-data">
			<label class="camposAdd" for="nombre">Nombre: </label>
			<input class="camposAdd" type="text" id="nombre" name="nombre" required autocomplete="off">
			<br>
			<label class="camposAdd" for="descripcion">Descripción: </label><br>
			<textarea class="camposAdd" id="descripcion" name="descripcion" rows="5" cols="50" required></textarea>
			<br>
			<label class="camposAdd" for="existencia">Libros disponibles: </label>
			<input class="camposAdd" type="number" value="0" id="existencia" name="existencia" required>
			<br><br>
			<select class="camposAdd" id="autores" name="autores">
				<option>Autores </option>
			<?php 

				$autores = $conexion->SelectQuery(null,"autores");

				foreach ($autores as $autor): ?>
					<option value="<?php echo $autor['Id_Autor'] ?>"><?php echo $autor['Nombres']; ?></option>
				<?php endforeach;
			 ?>
			</select>
			<select class="camposAdd" id="categoria" name="categoria" ">
				<option>Categoría principal</option>
			<?php 

				$categorias = $conexion->SelectQuery(null,"categorias");

				foreach ($categorias as $categoria): ?>
					<option value="<?php echo $categoria['Id_Categoria'] ?>"><?php echo $categoria['Nombre']; ?></option>
				<?php endforeach;
			 ?>
			</select>
			<br><br>
			<label for="imagen" id="imagenLabel" class="camposAdd">Imagen: </label>
			<input type="file" name="imagen" class="camposAdd" id="imagen" required>
			<br>
			<input type="submit" value="Añadir libro" class="camposAdd" id="aniadirBtn">
		</form>
	</section>
	<footer></footer>
</body>
</html>