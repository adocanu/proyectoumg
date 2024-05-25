<?php
require_once("c://xampp/htdocs/proyecto/controller/usernameController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo_electronico = $_POST['correo_electronico'];
    $estado = $_POST['estado'];

    $obj = new usernameController();
    $result = $obj->update($id, $nombre, $direccion, $telefono, $correo_electronico, $estado);

    if ($result) {
        header("Location: show.php?id=" . $id);
        exit();
    } else {
        echo "Error al actualizar el usuario.";
    }
}
?>
