<?php
require_once __DIR__ . '/../.env.php';

$conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conexion->connect_error) {
    die(" Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>
