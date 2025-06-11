<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
    $tipo_usuario = 'cliente';

    // Insertar en tabla Usuarios
    $sql = "INSERT INTO Usuarios (nombre, apellido, email, contrasena, telefono, tipo_usuario)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nombre, $apellido, $email, $contrasena, $telefono, $tipo_usuario);

    if ($stmt->execute()) {
        $id_usuario = $stmt->insert_id;

        // Insertar en tabla Clientes
        $direccion = $_POST["direccion"];
        $fecha_registro = date("Y-m-d");

        $sql2 = "INSERT INTO Clientes (id_usuario, direccion, fecha_registro, telefono, email)
                 VALUES (?, ?, ?, ?, ?)";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("issss", $id_usuario, $direccion, $fecha_registro, $telefono, $email);
        $stmt2->execute();

        echo "Usuario registrado correctamente. <a href='login.php'>Iniciar sesión</a>";
    } else {
        echo "Error al registrar: " . $conn->error;
    }
}
?>

<h2>Registro de Cliente</h2>
<form method="post">
    Nombre: <input type="text" name="nombre" required><br>
    Apellido: <input type="text" name="apellido" required><br>
    Email: <input type="email" name="email" required><br>
    Teléfono: <input type="text" name="telefono" required><br>
    Dirección: <input type="text" name="direccion" required><br>
    Contraseña: <input type="password" name="contrasena" required><br>
    <button type="submit">Registrarse</button>
</form>
