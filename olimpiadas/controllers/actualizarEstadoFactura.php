<?php
require_once '../config/db.php';

$id = $_POST['id_factura'];
$estado = $_POST['estado_factura'];

$stmt = $conexion->prepare("UPDATE Facturas SET estado_factura = ? WHERE id_factura = ?");
$stmt->bind_param("si", $estado, $id);

if ($stmt->execute()) {
    echo " Estado actualizado.";
} else {
    echo " Error: " . $conexion->error;
}

$stmt->close();
$conexion->close();
?>