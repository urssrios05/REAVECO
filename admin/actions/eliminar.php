<?php
require_once("../../includes/conexion_actions.php");
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}
// Validar ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido");
}

$id = intval($_GET['id']);

// Obtener archivo
$stmt = $conexion->prepare("SELECT archivo FROM reaveco_imagenes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Imagen no encontrada");
}

$row = $result->fetch_assoc();
$archivo = basename($row['archivo']);

$ruta = "../../images/galeria/" . $archivo;

// Eliminar archivo físico (si existe)
if (file_exists($ruta)) {
    unlink($ruta);
}

// Eliminar de la BD
$stmt = $conexion->prepare("DELETE FROM reaveco_imagenes WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ../admin.php?msg=eliminado");
} else {
    echo "Error al eliminar";
}

exit();
?>
