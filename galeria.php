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

									<div class="item" data-category="<?php echo $row['categoria']; ?>">

										<img src="images/galeria/<?php echo $row['archivo']; ?>" 
											 loading="lazy"
										     alt="">

										<div class="overlay">
										<h3><?php echo $row['titulo']; ?></h3>
										</div>

									</div>

									<?php endwhile; ?>

									</div>

						</div>
					</div>
				</div>

			<!-- Footer -->
			 <?php include("includes/footer.php"); ?>
			</div>
            <!-- Scripts --> 
            <?php include("includes/scripts.php"); ?>


	</body>
</html>