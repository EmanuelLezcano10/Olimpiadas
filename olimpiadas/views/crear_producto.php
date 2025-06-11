[0:13, 11/6/2025] ….: <?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio_unitario'];
    $stock = $_POST['stock_disponible'];
    $id_categoria = $_POST['id_categoria'];

    $stmt = $conexion->prepare("INSERT INTO Productos 
        (nombre_producto, descripcion, precio_unitario, stock_disponible, id_categoria) 
        VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param("ssdii", $nombre, $descripcion, $precio, $stock, $id_categoria);

    if ($stmt->execute()) {
        echo "✅ Producto creado correctamente.";
    } else {
        echo "❌ Error: " . $conexion->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
[0:14, 11/6/2025] ….: <?php
require_once '../config/db.php';

// Traer las categorías
$categorias = $conexion->query("SELECT id_categoria, nombre_categoria FROM Categorias_Productos");
?>

<form action="../controllers/productosController.php" method="POST">
    <label>Nombre del producto:</label>
    <input type="text" name="nombre_producto" required><br>

    <label>Descripción:</label>
    <textarea name="descripcion" required></textarea><br>

    <label>Precio unitario:</label>
    <input type="number" name="precio_unitario" step="0.01" required><br>

    <label>Stock disponible:</label>
    <input type="number" name="stock_disponible" required><br>

    <label>Categoría:</label>
    <select name="id_categoria" required>
        <?php while ($cat = $categorias->fetch_assoc()) { ?>
            <option value="<?= $cat['id_categoria'] ?>"><?= $cat['nombre_categoria'] ?></option>
        <?php } ?>
    </select><br>

    <button type="submit">Crear producto</button>
</form>