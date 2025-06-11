<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio_unitario'];
    $stock = $_POST['stock_disponible'];
    $id_categoria = $_POST['id_categoria'];

    $stmt = $conexion->prepare("INSERT INTO Productos 
        (nombre_producto, descripcion, precio_unitario, stock_disponible, id_categoria) 
        VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param("ssdii", $nombre, $descripcion, $precio, $stock, $id_categoria);

    if ($stmt->execute()) {
        echo "✅ Producto creado correctamente.";
    } else {
        echo "❌ Error: " . $conexion->error;
    }

    $stmt->close();
    $conexion->close();
}
?>