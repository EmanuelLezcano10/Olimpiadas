<?php
session_start();

$id = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Si ya existe, sumar cantidad
if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id] += $cantidad;
} else {
    $_SESSION['carrito'][$id] = $cantidad;
}

header("Location: ver_carrito.php");
exit;
?>