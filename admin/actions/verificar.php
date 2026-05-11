<?php
require_once("../../includes/conexion_actions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Buscar usuario
    $stmt = $conexion->prepare("SELECT * FROM reaveco_usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {

        $user = $resultado->fetch_assoc();

        // Verificar contraseña
        if (password_verify($password, $user['password'])) {

            $_SESSION['admin'] = $user['usuario'];

            header("Location: ../admin.php");
            exit();

        } else {
            header("Location: ../index.php?error=1");
            exit();
        }

    } else {
        header("Location: ../index.php?error=1");
        exit();
    }

} else {
    header("Location: ../index.php");
    exit();
}
?>