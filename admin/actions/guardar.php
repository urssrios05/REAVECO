<?php
require_once("../../includes/conexion_actions.php");
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = trim($_POST['titulo'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');

    if ($titulo === '' || $categoria === '' || $descripcion === '') {
        die("Todos los campos son obligatorios");
    }

    if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        die("Error al subir la imagen");
    }

    // 📁 carpeta destino
    $carpeta = "../../images/galeria/";

    // 📸 imagen temporal
    $nombreTmp = $_FILES['imagen']['tmp_name'];

    $infoImagen = getimagesize($nombreTmp);
    if ($infoImagen === false) {
        die("El archivo debe ser una imagen valida");
    }

    // 🏷️ nombre optimizado
    $nombreArchivo = "reaveco_img_" . uniqid() . ".jpg";

    // 📏 obtener dimensiones originales
    list($ancho, $alto) = $infoImagen;

    if ($ancho <= 0 || $alto <= 0) {
        die("La imagen no tiene dimensiones validas");
    }

    // 📐 tamaño máximo
    $nuevoAncho = min(1200, $ancho);

    // mantener proporción
    $nuevoAlto = ($alto / $ancho) * $nuevoAncho;

    // 🖼️ crear imagen original
    $imagenOriginal = imagecreatefromstring(file_get_contents($nombreTmp));
    if (!$imagenOriginal) {
        die("No se pudo procesar la imagen");
    }

    // 🖼️ nuevo lienzo
    $imagenNueva = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

    // 🔄 redimensionar
    imagecopyresampled(
        $imagenNueva,
        $imagenOriginal,
        0, 0, 0, 0,
        $nuevoAncho,
        $nuevoAlto,
        $ancho,
        $alto
    );

    // 💾 guardar optimizada
    imagejpeg($imagenNueva, $carpeta . $nombreArchivo, 75);

    // 🧹 liberar memoria
    imagedestroy($imagenOriginal);
    imagedestroy($imagenNueva);

    // 🗃️ guardar en BD
    $stmt = $conexion->prepare("
        INSERT INTO reaveco_imagenes
        (titulo, categoria, descripcion, archivo)
        VALUES (?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "ssss",
        $titulo,
        $categoria,
        $descripcion,
        $nombreArchivo
    );

    $stmt->execute();

    // 🔙 volver al admin
    header("Location: ../admin.php");
    exit();
}
?>
