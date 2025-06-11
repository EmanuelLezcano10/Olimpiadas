<form action="../controllers/actualizarEstadoFactura.php" method="POST">
    <input type="number" name="id_factura" placeholder="ID Factura" required><br>
    <select name="estado_factura">
        <option value="pagada">Pagada</option>
        <option value="vencida">Vencida</option>
        <option value="pendiente">Pendiente</option>
    </select><br>
    <button type="submit">Actualizar Estado</button>
</form>