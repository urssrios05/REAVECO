<?php
require_once("../../includes/conexion_actions.php");

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../admin.php");
    exit();
}

$imagenesInicio = [
    'mision' => '../../images/inicio/pic01.jpg',
    'vision' => '../../images/inicio/pic02.jpg',
    'valores' => '../../images/inicio/pic03.jpg'
];

$seccion = $_POST['seccion'] ?? '';

if (!isset($imagenesInicio[$seccion])) {
    die("Seccion invalida");
}

if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
    die("Error al subir la imagen");
}

$nombreTmp = $_FILES['imagen']['tmp_name'];
$infoImagen = getimagesize($nombreTmp);

if ($infoImagen === false) {
    die("El archivo debe ser una imagen valida");
}

list($ancho, $alto) = $infoImagen;

if ($ancho <= 0 || $alto <= 0) {
    die("La imagen no tiene dimensiones validas");
}

$imagenOriginal = imagecreatefromstring(file_get_contents($nombreTmp));

if (!$imagenOriginal) {
    die("No se pudo procesar la imagen");
}

$rutaDestino = $imagenesInicio[$seccion];
$nuevoAncho = 768;
$nuevoAlto = 608;

$escala = max($nuevoAncho / $ancho, $nuevoAlto / $alto);
$anchoRecorte = (int) round($nuevoAncho / $escala);
$altoRecorte = (int) round($nuevoAlto / $escala);
$origenX = (int) max(0, round(($ancho - $anchoRecorte) / 2));
$origenY = (int) max(0, round(($alto - $altoRecorte) / 2));

$imagenNueva = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

imagecopyresampled(
    $imagenNueva,
    $imagenOriginal,
    0, 0, $origenX, $origenY,
    $nuevoAncho,
    $nuevoAlto,
    $anchoRecorte,
    $altoRecorte
);

imagejpeg($imagenNueva, $rutaDestino, 80);

imagedestroy($imagenOriginal);
imagedestroy($imagenNueva);

header("Location: ../admin.php?msg=inicio_actualizado");
exit();
?>
