
<?php
class usernameController {
    private $model;
    public function __construct() {
        require_once("c://xampp/htdocs/proyecto/model/usernameModel.php");
        $this->model = new usernameModel();
    }
    public function guardar($nombre, $direccion, $telefono, $correo_electronico, $estado) {
        $id = $this->model->insertar($nombre, $direccion, $telefono, $correo_electronico, $estado);
        return ($id != false) ? $id : false;
    }
    public function show($id) {
        return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
    }
    public function index() {
        return ($this->model->index()) ? $this->model->index() : false;
    }
    public function update($id, $nombre, $direccion, $telefono, $correo_electronico, $estado) {
        return ($this->model->update($id, $nombre, $direccion, $telefono, $correo_electronico, $estado) != false) ? header("Location:index.php?id=".$id) : header("Location:index.php");
    }
    public function delete($id) {
        return ($this->model->delete($id)) ? header("Location:index.php") : header("Location:show.php?id=".$id);
    }
}
?>
