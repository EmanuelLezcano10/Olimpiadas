<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $direccion = $_POST['direccion'];
    $fecha_registro = date("Y-m-d");

    $stmt = $conexion->prepare("INSERT INTO Clientes (id_usuario, direccion, fecha_registro) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $id_usuario, $direccion, $fecha_registro);

    if ($stmt->execute()) {
        echo "✅ Cliente creado exitosamente.";
    } else {
        echo "❌ Error al registrar cliente: " . $conexion->error;
    }

    $stmt->close();
    $conexion->close();
}
?>