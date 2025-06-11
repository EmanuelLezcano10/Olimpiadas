<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_venta = $_POST['id_venta'];
    $estado = 'pendiente';
    $fecha_emision = date('Y-m-d H:i:s');

    $stmt = $conexion->prepare("INSERT INTO Facturas (id_venta, estado_factura, fecha_emision) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $id_venta, $estado, $fecha_emision);

    if ($stmt->execute()) {
        echo "✅ Factura generada correctamente. ID: " . $conexion->insert_id;
    } else {
        echo "❌ Error al generar factura: " . $conexion->error;
    }

    $stmt->close();
    $conexion->close();
}
?>