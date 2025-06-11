<?php
session_start();
require_once '../config/db.php';

$id_pedido = $_POST['id_pedido'];
$id_metodo_pago = $_POST['id_metodo_pago'];
$fecha_venta = date('Y-m-d H:i:s');

// Calcular total del pedido
$total = 0;
$result = $conexion->query("SELECT * FROM Detalle_Pedidos WHERE id_pedido = $id_pedido");

while ($fila = $result->fetch_assoc()) {
    $total += $fila['precio_total'];
}

// Insertar en Ventas
$conexion->query("INSERT INTO Ventas (id_pedido, fecha_venta, total_venta)
                  VALUES ($id_pedido, '$fecha_venta', $total)");

$id_venta = $conexion->insert_id;

// Insertar en Detalle_Ventas
$detalles = $conexion->query("SELECT * FROM Detalle_Pedidos WHERE id_pedido = $id_pedido");

while ($item = $detalles->fetch_assoc()) {
    $id_producto = $item['id_producto'];
    $cantidad = $item['cantidad'];
    $precio_total = $item['precio_total'];
    $monto_total = $precio_total; // se puede separar si hay impuestos

    $conexion->query("INSERT INTO Detalle_Ventas (id_venta, id_producto, id_metodo_pago, cantidad, precio_total, monto_total)
                      VALUES ($id_venta, $id_producto, $id_metodo_pago, $cantidad, $precio_total, $monto_total)");
}

// Cambiar estado del pedido a "en proceso"
$conexion->query("UPDATE Pedidos SET estado = 'en proceso' WHERE id_pedido = $id_pedido");

echo "✅ Pago registrado correctamente. ID Venta: $id_venta";
?>