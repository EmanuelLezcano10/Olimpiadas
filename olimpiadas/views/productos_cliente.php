<?php
session_start();
require_once '../config/db.php';

$resultado = $conexion->query("SELECT * FROM Productos");

while ($prod = $resultado->fetch_assoc()) {
    echo "<form method='POST' action='agregar_carrito.php'>";
    echo "Producto: " . $prod['nombre_producto'] . "<br>";
    echo "Precio: $" . $prod['precio_unitario'] . "<br>";
    echo "<input type='hidden' name='id_producto' value='{$prod['id_producto']}'>";
    echo "<input type='number' name='cantidad' min='1' value='1'>";
    echo "<button type='submit'>Agregar al carrito</button><hr>";
    echo "</form>";
}
?>