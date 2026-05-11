<?php
require_once("../../includes/conexion_actions.php");
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];

    // 📁 carpeta destino
    $carpeta = "../../images/galeria/";

    // 📸 imagen temporal
    $nombreTmp = $_FILES['imagen']['tmp_name'];

    // 🏷️ nombre optimizado
    $nombreArchivo = "reaveco_img_" . uniqid() . ".jpg";

    // 📏 obtener dimensiones originales
    list($ancho, $alto) = getimagesize($nombreTmp);

    // 📐 tamaño máximo
    $nuevoAncho = 1200;

    // mantener proporción
    $nuevoAlto = ($alto / $ancho) * $nuevoAncho;

    // 🖼️ crear imagen original
    $imagenOriginal = imagecreatefromstring(file_get_contents($nombreTmp));

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
        (titulo, categoria, archivo) 
        VALUES (?, ?, ?)
    ");

    $stmt->bind_param("sss", $titulo, $categoria, $nombreArchivo);

    $stmt->execute();

    // 🔙 volver al admin
    header("Location: ../admin.php");
    exit();
}
?>