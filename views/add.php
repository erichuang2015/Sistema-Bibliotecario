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
		<form action="../controllers/addController.php" method="post" enctype="multipart/form-data" id="add">
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
				<option value="autores">Autores </option>
			<?php 

				$autores = $conexion->SelectQuery(null,"autores");

				foreach ($autores as $autor): ?>
					<option value="<?php echo $autor['Id_Autor'] ?>"><?php echo $autor['Nombres']; ?></option>
				<?php endforeach;
			 ?>
			</select>
			<select class="camposAdd" id="categoria" name="categoria" ">
				<option value="categoria">Categoría principal</option>
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
	<script type="text/javascript">
		(function(){
			var formulario = document.getElementById("add");

			formulario.addEventListener("submit",function(e){
				let imagen = document.getElementById("imagen");
				let autores = document.getElementById("autores");
				let categoria = document.getElementById("categoria");

				if (imagen.value == "" || autores.value == "autores" || categoria.value == "categoria") {
					e.preventDefault();
				}
			});
		}())
	</script>
</body>
</html>