<?php

require_once("../../includes/conexion_actions.php");

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];

    $stmt = $conexion->prepare("
        UPDATE reaveco_imagenes 
        SET titulo = ?, categoria = ?
        WHERE id = ?
    ");

    $stmt->bind_param("ssi", $titulo, $categoria, $id);
    $stmt->execute();

    header("Location: ../admin.php");
    exit();
}
?>

