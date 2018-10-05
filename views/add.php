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
		<form action="" method="post">
			<input type="text">
			<input type="text">
			<input type="number" value="0">
			<select name="autores" id="autores">
			<?php 

				$autores = $conexion->execQuery("SELECT Nombres, Id_Autor FROM autores INNER JOIN libros ON autores.Id_Autor = libros.Id_Autor");

				for ($i=0; $i < $autores.length; $i++): ?>
					
					<option value="<?php echo $autores[$i]["Id_Autor"] ?>"><?php echo $autores[$i]["Nombres"]; ?></option>

				<?php endfor;
			 ?>
			</select>
			<select name="" id="">
			<?php 
			

			 ?>
			</select>
		</form>
	</section>
	<footer></footer>
</body>
</html>