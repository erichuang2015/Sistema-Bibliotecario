<?php 

	include_once("../models/Conexion.php");

	$categorias = $conexion->SelectQuery(null, "categorias", null, null);

 ?>
<aside id="categorias">
	<h3 align="center">Categorias</h3><br>
	<?php foreach ($categorias as $categoria): ?>
		<a id="aCategorias" href="categorias.php?idcategoria=<?php echo $categoria['Id_Categoria'] ?>">
			<span id="nomCat"><?php echo $categoria['Nombre']; ?></span>
			<i class="fas fa-angle-double-right"></i>
		</a>
		<br>
	<?php endforeach ?>
</aside>