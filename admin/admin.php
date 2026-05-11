<?php
	require_once("../includes/conexion.php");

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

// 🚫 evitar cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Reaveco/Admin</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="icon" href="../images/icono.ico">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>


	<!-- SIDEBAR -->
	 
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-dashboard'></i>
			<span class="text">Reaveco|Dash</span>
		</a>
		
			<label for="switch-mode" class="switch-mode"></label>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-image' ></i>
					
					<span class="text">Galeria</span>
				</a>
			</li>
		</ul>

		<ul class="side-menu">
			<li>
				<a href="#">
					<i></i>
					<span class="text"></span>
				</a>
			</li>
			<li>
				<a href="actions/logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">cerrar sesión</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link"></a>
			<form action="#"> </form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
		</nav>
		<!-- NAVBAR -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Administrador de galeria</h1>
					<ul class="breadcrumb">
					</ul>
				</div>
			</div>

			<div class="table-data">

				<div class="todo">
					<div class="head">
						<h3>Carga de imagenes</h3>
					</div>
					<ul class="todo-list">
						<form action="actions/guardar.php" method="POST" enctype="multipart/form-data" class="form-upload">

							<input type="text" name="titulo" placeholder="Título" required>
							
							<select type="select" name="categoria" placeholder="Categoria" required>
								<option disabled selected>Categoria</option>
								<option value="manzana">Manzana</option>
								<option value="naranja">Naranja</option>
								<option value="platano">Plátano</option>
							</select>

							<!-- INPUT FILE -->
							<input type="file" name="imagen" id="imagenInput" required>

							<!-- PREVIEW -->
							<div class="preview-container">
								<img id="preview">
							</div>

							<button type="submit">Subir imagen</button>

						</form>
					</ul>
				</div>

				<div class="order">
					<div class="head">
						<h3>Editor de imágenes</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>Imagen</th>
								<th>Título</th>
								<th>Categoría</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM reaveco_imagenes ORDER BY id DESC";
							$result = $conexion->query($sql);

							while($row = $result->fetch_assoc()):
							?>
							<tr>
								<td>
									<img src="../images/galeria/<?php echo $row['archivo']; ?>" width="80" style="border-radius:8px;">
								</td>

								<td><?php echo $row['titulo']; ?></td>

								<td><?php echo $row['categoria']; ?></td>

								<td>
									<a href="#"
									class="btn-editar"
									data-id="<?php echo $row['id']; ?>"
									data-titulo="<?php echo $row['titulo']; ?>"
									data-categoria="<?php echo $row['categoria']; ?>">
									✏️
									</a>
									|
									<a href="actions/eliminar.php?id=<?php echo $row['id']; ?>" 
									onclick="return confirm('¿Eliminar imagen?')">🗑️</a>
								</td>
							</tr>
						<?php endwhile; ?>

						</tbody>
					</table>

				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	 <?php include("actions/modal_editar.php"); ?>
	<script src="../assets/js/admin.js"></script>
</body>
</html>