<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema Bibliotecario | Inicio</title>
	<link rel="stylesheet" type="text/css" href="../views/css/Inicio1.css">
	<link rel="stylesheet" type="text/css" href="../views/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../views/css/fuentes.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<div class="nav container-fluid">
		<img src="../views/imagenes/books-icon.png">
		<ul>
			<li><a href="#">Inicio</a></li>
		</ul>
		<div class="searchbar">
			<form action="" method="get">
				<button type="submit" name="buscar" id="search">
					<li class="fas fa-search"></li>
				</button>
				<input type="text" name="busqueda" id="bar" placeholder="Busca un libro..." autocomplete="off">
			</form>
	</div>
	<section>
		<aside id="categorias">
			<h3 align="center">Categorias</h3><br>
			<span id="nomCat">Nombre categoria</span>
			<i class="fas fa-angle-double-right"></i>
			<br>
			<span id="nomCat">Nombre categoria</span>
			<br>
			<span id="nomCat">Nombre categoria</span>
			<br>
			<span id="nomCat">Nombre categoria</span>
			<br>
			<span id="nomCat">Nombre categoria</span>
			<br>
			<span id="nomCat">Nombre categoria</span>
			<br>
		</aside>
	</section>


	<script src="../views/js/jquery.js"></script>
	<script src="../views/js/bootstrap.min.js"></script>
</body>
</html>