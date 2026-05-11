<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conexion = new mysqli("localhost", "root", "", "reaveco_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>