<?php
require_once("c://xampp/htdocs/proyecto/view/head/head.php");
require_once("c://xampp/htdocs/proyecto/controller/usernameController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $obj = new usernameController();

    // Recuperar los datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $correo_electronico = isset($_POST['correo']) ? $_POST['correo'] : null;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : null;

    if ($nombre && $direccion && $telefono && $correo_electronico && $estado) {
        // Guardar los datos en la base de datos
        $result = $obj->guardar($nombre, $direccion, $telefono, $correo_electronico, $estado);

        if ($result) {
            // Redireccionar a la página de inicio
            header("Location: index.php");
            exit();
        } else {
            // Mostrar un mensaje de error si falla la inserción
            echo "Error al guardar el usuario.";
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
}
?>

<form action="create.php" method="POST" autocomplete="off">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del usuario</label>
        <input type="text" name="nombre" required class="form-control" id="nombre">
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" name="direccion" required class="form-control" id="direccion">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" name="telefono" required class="form-control" id="telefono">
    </div>
    <div class="mb-3">
        <label for="correo" class="form-label">Correo Electrónico</label>
        <input type="email" name="correo" required class="form-control" id="correo">
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select name="estado" class="form-select" id="estado">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a class="btn btn-danger" href="index.php">Cancelar</a>
</form>

<?php
require_once("c://xampp/htdocs/proyecto/view/head/footer.php");
?>
