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
	 
	<section id="sidebar" class="hide">
		<a href="#" class="brand">
			<i class='bx bxs-dashboard'></i>
			<span class="text">Reaveco|Dash</span>
		</a>
		
			<label for="switch-mode" class="switch-mode"></label>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-image' ></i>
					
					<span class="text">Imagenes</span>
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
					<i class='bx bxs-exit' ></i>
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
					<h1>Administrador de imagenes</h1>
					<ul class="breadcrumb">
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Imagenes de inicio</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>Seccion</th>
								<th>Imagen actual</th>
								<th>Nueva imagen</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$imagenesInicio = [
								'mision' => ['titulo' => 'Mision', 'archivo' => 'pic01.jpg'],
								'vision' => ['titulo' => 'Vision', 'archivo' => 'pic02.jpg'],
								'valores' => ['titulo' => 'Valores', 'archivo' => 'pic03.jpg']
							];

							foreach ($imagenesInicio as $seccion => $imagenInicio):
								$tituloInicio = htmlspecialchars($imagenInicio['titulo'], ENT_QUOTES, 'UTF-8');
								$archivoInicio = htmlspecialchars($imagenInicio['archivo'], ENT_QUOTES, 'UTF-8');
								$seccionInicio = htmlspecialchars($seccion, ENT_QUOTES, 'UTF-8');
							?>
							<tr>
								<td><?php echo $tituloInicio; ?></td>
								<td>
									<img class="admin-thumb admin-thumb-home" src="../images/inicio/<?php echo $archivoInicio; ?>?v=<?php echo filemtime("../images/inicio/" . $imagenInicio['archivo']); ?>" alt="<?php echo $tituloInicio; ?>">
								</td>
								<td>
									<form action="actions/actualizar_inicio.php" method="POST" enctype="multipart/form-data" class="form-upload">
										<input type="hidden" name="seccion" value="<?php echo $seccionInicio; ?>">
										<input type="file" name="imagen" accept="image/*" required>
										<button type="submit">Actualizar</button>
									</form>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="table-data">

				<div class="todo">
					<div class="head">
						<h3>Imagenes de galeria</h3>
					</div>
					<ul class="todo-list">
						<form action="actions/guardar.php" method="POST" enctype="multipart/form-data" class="form-upload">

							<select type="select" name="categoria" placeholder="Categoria" required>
								<option disabled selected>Categoria</option>
								<option value="manzana">Manzana</option>
								<option value="naranja">Naranja</option>
								<option value="platano">Plátano</option>
							</select>
							<input type="text" name="titulo" placeholder="Título" required>
							<textarea type="text" placeholder="descripcion" required name="descripcion"></textarea>


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
								<th>descripcion</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM reaveco_imagenes ORDER BY id DESC";
							$result = $conexion->query($sql);

							while($row = $result->fetch_assoc()):
								$id = (int) $row['id'];
								$archivo = htmlspecialchars($row['archivo'], ENT_QUOTES, 'UTF-8');
								$titulo = htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8');
								$categoria = htmlspecialchars($row['categoria'], ENT_QUOTES, 'UTF-8');
								$descripcion = htmlspecialchars($row['descripcion'], ENT_QUOTES, 'UTF-8');
							?>
							<tr>
								<td>
									<img class="admin-thumb admin-thumb-gallery" src="../images/galeria/<?php echo $archivo; ?>" alt="<?php echo $titulo; ?>">
								</td>

								<td><?php echo $titulo; ?></td>

								<td><?php echo $categoria; ?></td>

								<td><?php echo $descripcion; ?></td>							

								<td>
									<a href="#"
									class="btn-editar"
									data-id="<?php echo $id; ?>"
									data-titulo="<?php echo $titulo; ?>"
									data-categoria="<?php echo $categoria; ?>"
									data-descripcion="<?php echo $descripcion; ?>">
									✏️
									</a>
									|
									<a href="actions/eliminar.php?id=<?php echo $id; ?>" 
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
