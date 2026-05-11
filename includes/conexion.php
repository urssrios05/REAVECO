<?php
// 🔐 Sesión (una sola vez)
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params(600);
    session_start();
}

// ⏱️ Control de tiempo
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 600)) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

$_SESSION['last_activity'] = time();

// 🔌 Conexión a BD
$conexion = new mysqli("localhost", "root", "", "reaveco_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// 👇 IMPORTANTE para acentos
$conexion->set_charset("utf8");
?>