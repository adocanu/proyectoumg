// store.php
<?php
require_once("c://xampp/htdocs/proyecto/controller/usernameController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $correo_electronico = isset($_POST['correo_electronico']) ? $_POST['correo_electronico'] : null;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : null;

    if ($nombre && $direccion && $telefono && $correo_electronico && $estado) {
        $obj = new usernameController();
        $obj->guardar($nombre, $direccion, $telefono, $correo_electronico, $estado);
    } else {
        // Manejar el caso de datos incompletos
        echo "Por favor, complete todos los campos.";
    }
}
?>
