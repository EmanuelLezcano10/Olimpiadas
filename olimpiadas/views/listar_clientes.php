<?php
require_once '../config/db.php';

$sql = "SELECT c.id_cliente, u.nombre, u.apellido, c.direccion, c.fecha_registro
        FROM Clientes c
        INNER JOIN Usuarios u ON c.id_usuario = u.id_usuario";

$resultado = $conexion->query($sql);

echo "<h2>Listado de Clientes</h2>";
while ($fila = $resultado->fetch_assoc()) {
    echo "ID Cliente: " . $fila['id_cliente'] . "<br>";
    echo "Nombre: " . $fila['nombre'] . " " . $fila['apellido'] . "<br>";
    echo "Dirección: " . $fila['direccion'] . "<br>";
    echo "Fecha de Registro: " . $fila['fecha_registro'] . "<br><hr>";
}
?>