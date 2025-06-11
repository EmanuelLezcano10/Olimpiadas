<?php
require_once '../config/db.php';

$sql = "SELECT p.*, c.nombre_categoria 
        FROM Productos p
        LEFT JOIN Categorias_Productos c ON p.id_categoria = c.id_categoria";

$resultado = $conexion->query($sql);

echo "<h2>Listado de Productos</h2>";

while ($fila = $resultado->fetch_assoc()) {
    echo "ID: " . $fila['id_producto'] . "<br>";
    echo "Nombre: " . $fila['nombre_producto'] . "<br>";
    echo "Descripción: " . $fila['descripcion'] . "<br>";
    echo "Precio: $" . $fila['precio_unitario'] . "<br>";
    echo "Stock: " . $fila['stock_disponible'] . "<br>";
    echo "Categoría: " . $fila['nombre_categoria'] . "<br><hr>";
}
?>