<?php
session_start();
require_once '../config/db.php';

$id_usuario = $_SESSION['id_usuario'];

// Obtener ID cliente
$sql = "SELECT id_cliente FROM Clientes WHERE id_usuario = $id_usuario";
$res = $conexion->query($sql);
if ($res->num_rows === 0) {
    die("Cliente no encontrado.");
}
$id_cliente = $res->fetch_assoc()['id_cliente'];

$fecha = date('Y-m-d H:i:s');
$estado = 'pendiente';

// Insertar pedido
$conexion->query("INSERT INTO Pedidos (id_cliente, fecha_pedido, estado) VALUES ($id_cliente, '$fecha', '$estado')");
$id_pedido = $conexion->insert_id;

// Insertar detalle
foreach ($_SESSION['carrito'] as $id_producto => $cantidad) {
    $producto = $conexion->query("SELECT precio_unitario FROM Productos WHERE id_producto = $id_producto")->fetch_assoc();
    $precio_total = $producto['precio_unitario'] * $cantidad;

    $conexion->query("INSERT INTO Detalle_Pedidos (id_pedido, id_producto, cantidad, precio_total)
                      VALUES ($id_pedido, $id_producto, $cantidad, $precio_total)");
}

// Vaciar carrito
unset($_SESSION['carrito']);

echo "✅ Pedido confirmado. Número de pedido: $id_pedido";
?>