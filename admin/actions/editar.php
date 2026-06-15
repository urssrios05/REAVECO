<?php

require_once("../../includes/conexion_actions.php");

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = (int) ($_POST['id'] ?? 0);
    $titulo = trim($_POST['titulo'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');

    if ($id <= 0 || $titulo === '' || $categoria === '' || $descripcion === '') {
        die("Datos invalidos");
    }

    $stmt = $conexion->prepare("
        UPDATE reaveco_imagenes 
        SET titulo = ?, categoria = ?, descripcion = ?
        WHERE id = ?
    ");

    $stmt->bind_param("sssi", $titulo, $categoria, $descripcion, $id);
    $stmt->execute();

    header("Location: ../admin.php");
    exit();
}
?>

