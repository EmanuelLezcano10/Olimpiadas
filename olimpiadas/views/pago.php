<?php
session_start();
require_once '../config/db.php';

$id_pedido = $_GET['id_pedido']; // se pasa por URL después de confirmar

// Obtener métodos de pago
$metodos = $conexion->query("SELECT * FROM Metodos_Pago");
?>

<h2>Seleccionar método de pago para el pedido #<?= $id_pedido ?></h2>

<form action="procesar_pago.php" method="POST">
    <input type="hidden" name="id_pedido" value="<?= $id_pedido ?>">
    
    <label>Método de pago:</label>
    <select name="id_metodo_pago" required>
        <?php while ($row = $metodos->fetch_assoc()) { ?>
            <option value="<?= $row['id_metodo_pago'] ?>"><?= $row['nombre_metodo'] ?></option>
        <?php } ?>
    </select><br>

    <button type="submit">Pagar</button>
</form>