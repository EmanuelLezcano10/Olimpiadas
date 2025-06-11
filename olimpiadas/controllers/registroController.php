<?php
require_once __DIR__ . '/../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $tipo = $_POST['tipo_usuario'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellido, email, contraseña, telefono, tipo_usuario)
                                VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nombre, $apellido, $email, $contraseña, $telefono, $tipo);

    if ($stmt->execute()) {
        echo "✅ Usuario registrado.";
    } else {
        echo "❌ Error: " . $conexion->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
