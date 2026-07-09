<?php
require_once("includes/conexion_frond.php");

$porPagina = 12;

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;

$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'all';

$inicio = ($pagina - 1) * $porPagina;

// WHERE dinámico
$where = "";

if ($categoria != 'all') {
    $where = "WHERE categoria = '" . $conexion->real_escape_string($categoria) . "'";
}

// total
$totalQuery = $conexion->query("SELECT COUNT(*) as total FROM reaveco_imagenes $where");
$total = $totalQuery->fetch_assoc()['total'];

$totalPaginas = ceil($total / $porPagina);

// query final
$sql = "SELECT * FROM reaveco_imagenes $where ORDER BY id DESC LIMIT $porPagina OFFSET $inicio";
$result = $conexion->query($sql);
?>
