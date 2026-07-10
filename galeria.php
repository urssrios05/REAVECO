<?php include("includes/includes_galeria.php"); ?>
<!DOCTYPE HTML>
<html>
<?php include("includes/head.php"); ?>

<body>
<!-- Header -->
<div id="header-wrapper">
	<header id="header" class="container">
	<!-- Logo -->
		<div id="logo">
			<h1><a href="index.php"><img src="images/logo.png" alt=""></a></h1>
			<span></span>
		</div>
	<!-- Navefacion -->
		<nav id="nav">
		<ul>
			<li><a href="index.php">Inicio</a></li>
 			<li class="current"><a href="galeria.php">Galeria</a></li>                                   
			<li><a href="acerca.php">Acerca de nosotros</a></li>
			<li><a href="contacto.php">Contacto</a></li>
			<li><a href="https://www.eucomex.com.mx/portafolio/productos/" target="_blank" rel="noopener noreferrer" >Productos</a></li>
		</ul>
		</nav>

	</header>
</div>

<div id="main-wrapper">
	<div class="container">
		<div id="content">

		<h2>Galeria</h2>

		<!-- FILTROS -->
		<div class="filters">

		<a href="galeria.php?categoria=all"
		class="filter <?php echo ($categoria == 'all') ? 'active' : ''; ?>">
		Todos
		</a>

		<a href="galeria.php?categoria=manzana"
		class="filter <?php echo ($categoria == 'manzana') ? 'active' : ''; ?>">
		Manzana
		</a>

		<a href="galeria.php?categoria=naranja"
		class="filter <?php echo ($categoria == 'naranja') ? 'active' : ''; ?>">
		Naranja
		</a>

		<a href="galeria.php?categoria=platano"
		class="filter <?php echo ($categoria == 'platano') ? 'active' : ''; ?>">
		Plátano
		</a>

		</div>

		<!-- GALERÍA -->
		<div class="gallery">

		<?php while($row = $result->fetch_assoc()): ?>

		<?php
			$archivo = htmlspecialchars($row['archivo'], ENT_QUOTES, 'UTF-8');
			$titulo = htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8');

			// ⚠️ IMPORTANTE: NO pisamos $categoria
			$catItem = htmlspecialchars($row['categoria'], ENT_QUOTES, 'UTF-8');

			$meses = [
				1 => 'enero', 2 => 'febrero', 3 => 'marzo',
				4 => 'abril', 5 => 'mayo', 6 => 'junio',
				7 => 'julio', 8 => 'agosto', 9 => 'septiembre',
				10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
			];

			$fechaObj = new DateTime($row['fecha']);
			$fechaFormateada = $fechaObj->format('d') . ' de ' .
							$meses[(int)$fechaObj->format('n')] . ' de ' .
							$fechaObj->format('Y');

			$fecha = htmlspecialchars($fechaFormateada, ENT_QUOTES, 'UTF-8');
			$descripcion = htmlspecialchars($row['descripcion'], ENT_QUOTES, 'UTF-8');
		?>

		<div class="item" data-category="<?php echo $catItem; ?>">

			<img src="images/galeria/<?php echo $archivo; ?>"
				loading="lazy"
				alt="<?php echo $titulo; ?>"
				class="gallery-img"

				data-imagen="images/galeria/<?php echo $archivo; ?>"
				data-titulo="<?php echo $titulo; ?>"
				data-categoria="<?php echo $catItem; ?>"
				data-fecha="<?php echo $fecha; ?>"
				data-descripcion="<?php echo $descripcion; ?>">

			<div class="overlay">
				<h3><?php echo $titulo; ?></h3>
			</div>

		</div>

		<?php endwhile; ?>

		<?php include("includes/modal_galeria.php"); ?>

		</div>

		<!-- PAGINACIÓN -->
		<div class="pagination">

		<?php if ($pagina > 1): ?>
			<a href="galeria.php?categoria=<?php echo $categoria; ?>&pagina=<?php echo $pagina - 1; ?>">← Anterior</a>
		<?php endif; ?>

		<?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
			<a href="galeria.php?categoria=<?php echo $categoria; ?>&pagina=<?php echo $i; ?>"
			class="<?php echo ($i == $pagina) ? 'active' : ''; ?>">
				<?php echo $i; ?>
			</a>
		<?php endfor; ?>

		<?php if ($pagina < $totalPaginas): ?>
			<a href="galeria.php?categoria=<?php echo $categoria; ?>&pagina=<?php echo $pagina + 1; ?>">
				Siguiente →
			</a>
		<?php endif; ?>

		</div>

		</div>
	</div>
</div>

<?php include("includes/footer.php"); ?>
<?php include("includes/scripts.php"); ?>

<script src="assets/js/galeria.js"></script>

</body>
</html>