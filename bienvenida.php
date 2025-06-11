<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Bienvenido, <?php echo htmlspecialchars($_SESSION["nombre"]); ?>!</h2>
<p>Has iniciado sesión como <?php echo htmlspecialchars($_SESSION["tipo_usuario"]); ?>.</p>
<a href="logout.php">Cerrar sesión</a>
