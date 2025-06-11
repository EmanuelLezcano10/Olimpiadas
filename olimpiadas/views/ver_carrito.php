<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "El carrito está vacío.";
    exit;
}

$total = 0;
echo "<h2>Carrito de Compras</h2>";

foreach ($_SESSION['carrito'] as $id => $cantidad) {
    $prod = $conexion->query("SELECT * FROM Productos WHERE id_producto = $id")->fetch_assoc();
    $subtotal = $prod['precio_unitario'] * $cantidad;
    $total += $subtotal;

    echo "{$prod['nombre_producto']} x $cantidad = $$subtotal <br>";
}

echo "<br><strong>Total: $$total</strong>";
echo "<form action='confirmar_pedido.php' method='POST'>
        <button type='submit'>Confirmar Compra</button>
      </form>";
?>