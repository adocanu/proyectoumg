
<?php
class usernameModel {
    private $PDO;
    public function __construct() {
        require_once("c://xampp/htdocs/proyecto/config/db.php");
        $con = new db();
        $this->PDO = $con->conexion();
    }
    public function insertar($nombre, $direccion, $telefono, $correo_electronico, $estado) {
        $stament = $this->PDO->prepare("INSERT INTO username (nombre, direccion, telefono, correo_electronico, estado) VALUES (:nombre, :direccion, :telefono, :correo_electronico, :estado)");
        $stament->bindParam(":nombre", $nombre);
        $stament->bindParam(":direccion", $direccion);
        $stament->bindParam(":telefono", $telefono);
        $stament->bindParam(":correo_electronico", $correo_electronico);
        $stament->bindParam(":estado", $estado);
        return ($stament->execute()) ? $this->PDO->lastInsertId() : false;
    }
    public function show($id) {
        $stament = $this->PDO->prepare("SELECT * FROM username WHERE id = :id LIMIT 1");
        $stament->bindParam(":id", $id);
        return ($stament->execute()) ? $stament->fetch() : false;
    }
    public function index() {
        $stament = $this->PDO->prepare("SELECT * FROM username");
        return ($stament->execute()) ? $stament->fetchAll() : false;
    }
    public function update($id, $nombre, $direccion, $telefono, $correo_electronico, $estado) {
        $stament = $this->PDO->prepare("UPDATE username SET nombre = :nombre, direccion = :direccion, telefono = :telefono, correo_electronico = :correo_electronico, estado = :estado WHERE id = :id");
        $stament->bindParam(":nombre", $nombre);
        $stament->bindParam(":direccion", $direccion);
        $stament->bindParam(":telefono", $telefono);
        $stament->bindParam(":correo_electronico", $correo_electronico);
        $stament->bindParam(":estado", $estado);
        $stament->bindParam(":id", $id);
        return ($stament->execute()) ? $id : false;
    }
    public function delete($id) {
        $stament = $this->PDO->prepare("DELETE FROM username WHERE id = :id");
        $stament->bindParam(":id", $id);
        return ($stament->execute()) ? true : false;
    }
}
?>
