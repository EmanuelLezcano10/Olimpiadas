<?php
require_once '../config/db.php';

$sql = "SELECT f.id_factura, f.fecha_emision, f.estado_factura,
               v.total_venta, v.id_venta
        FROM Facturas f
        JOIN Ventas v ON f.id_venta = v.id_venta";

$resultado = $conexion->query($sql);

echo "<h2>Listado de Facturas</h2>";

while ($f = $resultado->fetch_assoc()) {
    echo "Factura #: " . $f['id_factura'] . "<br>";
    echo "Venta #: " . $f['id_venta'] . "<br>";
    echo "Total: $" . $f['total_venta'] . "<br>";
    echo "Fecha: " . $f['fecha_emision'] . "<br>";
    echo "Estado: " . $f['estado_factura'] . "<br><hr>";
}
?>