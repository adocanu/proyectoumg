<?php
require_once("c://xampp/htdocs/proyecto/view/head/head.php");
require_once("c://xampp/htdocs/proyecto/controller/usernameController.php");
$obj = new usernameController();
$user = $obj->show($_GET['id']);
?>
<form action="update.php" method="post" autocomplete="off">
    <h2>Modificando Registro</h2>
    <div class="mb-3 row">
        <label for="staticId" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
            <input type="text" name="id" readonly class="form-control-plaintext" id="staticId" value="<?= $user['id'] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control" id="inputNombre" value="<?= $user['nombre'] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputDireccion" class="col-sm-2 col-form-label">Dirección</label>
        <div class="col-sm-10">
            <input type="text" name="direccion" class="form-control" id="inputDireccion" value="<?= $user['direccion'] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputTelefono" class="col-sm-2 col-form-label">Teléfono</label>
        <div class="col-sm-10">
            <input type="text" name="telefono" class="form-control" id="inputTelefono" value="<?= $user['telefono'] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputCorreo" class="col-sm-2 col-form-label">Correo Electrónico</label>
        <div class="col-sm-10">
            <input type="email" name="correo_electronico" class="form-control" id="inputCorreo" value="<?= $user['correo_electronico'] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputEstado" class="col-sm-2 col-form-label">Estado</label>
        <div class="col-sm-10">
            <select name="estado" class="form-select" id="inputEstado">
                <option value="Activo" <?= $user['estado'] == 'Activo' ? 'selected' : '' ?>>Activo</option>
                <option value="Inactivo" <?= $user['estado'] == 'Inactivo' ? 'selected' : '' ?>>Inactivo</option>
            </select>
        </div>
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar" onclick="redirectToIndex()">
        <a class="btn btn-danger" href="index.php?id=<?= $user['id'] ?>">Cancelar</a>
    </div>
</form>
<script>
    function redirectToIndex() {
        window.location.href = "index.php";
    }
</script>
<?php
require_once("c://xampp/htdocs/proyecto/view/head/footer.php");
?>
