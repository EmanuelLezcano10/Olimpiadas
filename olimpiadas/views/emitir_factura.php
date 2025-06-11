<?php
require_once '../config/db.php';

// Obtener ventas que aún no tienen factura
$sql = "SELECT v.id_venta, v.total_venta, p.id_pedido 
        FROM Ventas v 
        LEFT JOIN Facturas f ON v.id_venta = f.id_venta
        INNER JOIN Pedidos p ON v.id_pedido = p.id_pedido
        WHERE f.id_factura IS NULL";

$resultado = $conexion->query($sql);
?>

<h2>Emitir Factura</h2>
<form action="../controllers/facturaController.php" method="POST">
    <label>Venta sin facturar:</label>
    <select name="id_venta" required>
        <?php while ($row = $resultado->fetch_assoc()) { ?>
            <option value="<?= $row['id_venta'] ?>">
                Venta #<?= $row['id_venta'] ?> | Pedido #<?= $row['id_pedido'] ?> | Total: $<?= $row['total_venta'] ?>
            </option>
        <?php } ?>
    </select><br><br>
    <button type="submit">Generar Factura</button>
</form>