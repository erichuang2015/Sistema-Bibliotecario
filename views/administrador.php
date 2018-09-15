<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>Administrador | Sistema bibliotecario</title>
	<link rel="stylesheet" type="text/css" href="css/administrador.css">
	<link rel="stylesheet" type="text/css" href="../views/css/aside.css">
	<link rel="stylesheet" type="text/css" href="../views/css/nav.css">
	<link rel="stylesheet" type="text/css" href="../views/css/searchbar.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<header>
		<?php include '../views/nav.php'; ?>
	</header>
	<section class="main">
		<h1 id="cateLibrostxt">Categoría de libros</h1>
		<?php include '../views/aside.php'; ?>
		<div class="editarlibros">
			<div class="libro">
				<div class="img">
					<img src="imagenes/libro-default.jpg">
				</div>
				<div id="infolibro">
					<h2>Nombre del libro</h2>
					<p>Descripcion del libro: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia quasi odit tenetur ut, eum consequatur at recusandae qui quia. Illo repellat, reiciendis minima qui nesciunt quis ad iste nihil mollitia.</p>
				</div>
				<div class="botones">
					<button id="editar">Editar</button>
					<button id="borrar">Eliminar</button>
				</div>
				<br>
				<hr>
				<br>
			</div>
		</div>
		<!--<div class="rate">
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
		</div>-->
	</section>
	<footer>
		
	</footer>
</body>
</html>