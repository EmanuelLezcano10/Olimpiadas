<?php
$host = "localhost";
$usuario = "root";
$contrasena = ""; // Cambia si usas contraseña
$base_datos = "olimpiadas";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
