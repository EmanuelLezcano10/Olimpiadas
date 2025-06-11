<form action="../controllers/registroController.php" method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required><br>
    <input type="text" name="apellido" placeholder="Apellido" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="contraseña" placeholder="Contraseña" required><br>
    <input type="text" name="telefono" placeholder="Teléfono"><br>
    <select name="tipo_usuario">
        <option value="cliente">Cliente</option>
        <option value="jefe_ventas">Jefe de Ventas</option>
    </select><br>
    <button type="submit">Registrarse</button>
</form>