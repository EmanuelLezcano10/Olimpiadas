<?php
include 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    $sql = "SELECT id_usuario, contrasena, tipo_usuario, nombre FROM Usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();

        if (password_verify($contrasena, $fila["contrasena"])) {
            $_SESSION["id_usuario"] = $fila["id_usuario"];
            $_SESSION["tipo_usuario"] = $fila["tipo_usuario"];
            $_SESSION["nombre"] = $fila["nombre"];

            header("Location: bienvenida.php");
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>

<h2>Iniciar Sesión</h2>
<form method="post">
    Email: <input type="email" name="email" required><br>
    Contraseña: <input type="password" name="contrasena" required><br>
    <button type="submit">Entrar</button>
</form>
