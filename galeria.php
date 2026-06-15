<?php
require_once("includes/conexion_frond.php");

$sql = "SELECT * FROM reaveco_imagenes ORDER BY id DESC";
$result = $conexion->query($sql);
?>

<!DOCTYPE HTML>
<html>
    <?php include("includes/head.php"); ?>
	
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
									<li><a href="https://www.eucomex.com.mx/portafolio/productos/">Productos</a></li>
								</ul>
							</nav>

					</header>
				</div>

            			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div id="content">

							<!-- Content -->

									<h2>Galeria</h2>

									<!-- FILTROS -->
									<div class="filters">
									<button class="filter active" data-filter="all">Todos</button>
									<button class="filter" data-filter="manzana">Manzana</button>
									<button class="filter" data-filter="naranja">Naranja</button>
									<button class="filter" data-filter="platano">Plátano</button>
									</div>

									<!-- GALERÍA -->
									<div class="gallery">

									<?php while($row = $result->fetch_assoc()): ?>
									<?php
										$archivo = htmlspecialchars($row['archivo'], ENT_QUOTES, 'UTF-8');
										$titulo = htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8');
										$categoria = htmlspecialchars($row['categoria'], ENT_QUOTES, 'UTF-8');
										$fecha = htmlspecialchars($row['fecha'], ENT_QUOTES, 'UTF-8');
										$descripcion = htmlspecialchars($row['descripcion'], ENT_QUOTES, 'UTF-8');
									?>

									<div class="item" data-category="<?php echo $categoria; ?>">

										<img src="images/galeria/<?php echo $archivo; ?>"
											loading="lazy"
											alt="<?php echo $titulo; ?>"
											class="gallery-img"

											data-imagen="images/galeria/<?php echo $archivo; ?>"
											data-titulo="<?php echo $titulo; ?>"
											data-categoria="<?php echo $categoria; ?>"
											data-fecha="<?php echo $fecha; ?>"
											data-descripcion="<?php echo $descripcion; ?>">

										<div class="overlay">
											<h3><?php echo $titulo; ?></h3>
										</div>

									</div>

									<?php endwhile; ?>
									
									<?php include("includes/modal_galeria.php"); ?>

									</div>

						</div>
					</div>
				</div>

			<!-- Footer -->
			 <?php include("includes/footer.php"); ?>
			</div>
            <!-- Scripts --> 
            <?php include("includes/scripts.php"); ?>
			<script src="assets/js/galeria.js"></script>


	</body>
</html>
