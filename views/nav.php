<?php 
	session_start();

 ?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style type="text/css">
	ul {
		padding: 0px;
	}
</style>

<div class="nav container-fluid">
	<img src="../views/imagenes/books-icon.png">
	<ul>
		<li><a href="index.php">Inicio</a></li>
	</ul>
	<?php if (isset($_SESSION['nombres'])){
		echo "<span id='lector'>Lector: " . $_SESSION['nombres'] . " " . $_SESSION['apellidos'] . "</span>";
	} else {
		echo "<span id='bienvenido'>Bienvenid@</span>";
	}
	?>
	<div class="searchbar">
		<form action="resultados.php" method="get" id="busqueda">
			<button type="submit" id="search">
				<li class="fas fa-search"></li>
			</button>
			<input type="text" name="query" id="query" placeholder="Busca un libro..." autocomplete="off">
		</form>
	</div>
	<?php if (!isset($_SESSION['nombres'])): ?>
	<a id="aLogin" href="login.php">
		<button id="login">Iniciar Sesión</button>
	</a>
	<?php endif ?>
</div>
<script type="text/javascript">
	(function(){

		var busqueda = document.getElementById("busqueda");
		var query = document.getElementById("query");

		busqueda.addEventListener("submit", function(e) {
			if (query.value == "") {
				e.preventDefault();
			}
		});

	}())
</script>