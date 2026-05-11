<?php
require_once("../../includes/conexion_actions.php");
session_destroy();

header("Location: ../index.php");
exit();
?>