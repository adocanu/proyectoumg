<?php
require_once("c://xampp/htdocs/proyecto/view/head/head.php");
require_once("c://xampp/htdocs/proyecto/controller/usernameController.php");
$obj = new usernameController();
$date = $obj->show($_GET['id']);
?>
<h2 class="text-center">Detalles del registro</h2>
<div class="pb-3">
    <a href="index.php" class="btn btn-dark">Regresar</a>
    <a href="edit.php?id=<?= $date['id'] ?>" class="btn btn-danger">Actualizar</a>
    
    <!-- Button trigger modal -->
    <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el registro?</h5>
                    <button type="button" class="btn-info" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Una vez eliminado no se podrá recuperar el registro.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                    <a href="delete.php?id=<?= $date['id'] ?>" class="btn btn-dark">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<table class="table container-fluid">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo Electronico</th>
            <th scope="col">Estado</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="col"><?= $date['id'] ?></td>
            <td scope="col"><?= $date['nombre'] ?></td>
            <td scope="col"><?= $date['direccion'] ?></td>
            <td scope="col"><?= $date['telefono'] ?></td>
            <td scope="col"><?= $date['correo_electronico'] ?></td>
            <td scope="col"><?= $date['estado'] ?></td>
        </tr>
    </tbody>
</table>

<?php
require_once("c://xampp/htdocs/proyecto/view/head/footer.php");
?>
