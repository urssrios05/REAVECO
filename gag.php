<?php
require_once("includes/conexion.php");

$sql = "SELECT * FROM reaveco_imagenes ORDER BY id DESC";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Galería</title>
  <link rel="stylesheet" href="assets/css/galeria.css">
</head>
<body>

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

    <img src="images/galeria/<?php echo $row['archivo']; ?>" alt="">

    <div class="overlay">
      <h3><?php echo $row['titulo']; ?></h3>
    </div>

  </div>

<?php endwhile; ?>

</div>

<script src="assets/js/galeria.js"></script>
</body>
</html>