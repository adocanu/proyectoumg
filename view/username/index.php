<?php
require_once "../head/head.php";
require_once "../../controller/usernameController.php";
$obj = new usernameController();
$rows = $obj->index();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Título</title>
    <link rel="stylesheet" href="../view/username/styles.css"> <!-- Cambia "/ruta/a/tu/archivo/styles.css" por la ruta correcta a tu archivo CSS -->
</head>
<body>
    <div class="mb-3">
        <a href="/proyecto/view/username/create.php" class="btn btn-info">Agregar nuevo usuario</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" style="font-style: italic;">Id</th>
                <th scope="col" style="font-style: italic;">Nombre</th>
                <th scope="col" style="font-style: italic;">Dirección</th>
                <th scope="col" style="font-style: italic;">Teléfono</th>
                <th scope="col" style="font-style: italic;">Correo Electrónico</th>
                <th scope="col" style="font-style: italic;">Estado</th>
                <th scope="col" style="font-style: italic;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if($rows): ?>
                <?php foreach($rows as $row): ?>
                    <tr>
                        <th><?= $row[0] ?></th>
                        <th><?= $row[1] ?></th>
                        <th><?= $row[2] ?></th> <!-- Dirección -->
                        <th><?= $row[3] ?></th> <!-- Teléfono -->
                        <th><?= $row[4] ?></th> <!-- Correo Electrónico -->
                        <th><?= $row[5] ?></th> <!-- Estado -->
                        <th>
                            <a href="#" class="btn btn-warning" style="font-style: italic;" data-bs-toggle="modal" data-bs-target="#modalVer<?= $row[0] ?>">Ver</a>
                            <a href="#" class="btn btn-dark" style="font-style: italic;" onclick="openEditModal(<?= $row[0] ?>)">Modificar</a>
                            <button class="btn btn-danger" style="font-style: italic;" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row[0] ?>">Eliminar</button>
                            <!-- Modal para ver detalles -->
                            <div class="modal fade" id="modalVer<?= $row[0] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detalles del usuario</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Detalles del usuario -->
                                            <p>ID: <?= $row[0] ?></p>
                                            <p>Nombre: <?= $row[1] ?></p>
                                            <p>Dirección: <?= $row[2] ?></p>
                                            <p>Teléfono: <?= $row[3] ?></p>
                                            <p>Correo Electrónico: <?= $row[4] ?></p>
                                            <p>Estado: <?= $row[5] ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Modal de eliminación -->
                            <div class="modal fade" id="exampleModal<?= $row[0] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el registro?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Una vez eliminado no se podrá recuperar el registro.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <a href="/proyecto/view/username/delete.php?id=<?= $row[0] ?>" class="btn btn-danger">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center" style="font-style: italic;">No hay registros actualmente</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Modal para editar usuario -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="editModalBody">
                    <!-- Aquí se cargará el contenido de edit.php -->
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function openEditModal(id) {
            // Obtener el contenido de edit.php mediante AJAX
            $.ajax({
                url: '/proyecto/view/username/edit.php?id=' + id,
                success: function(data) {
                    // Colocar el contenido de edit.php dentro del modal
                    $('#editModalBody').html(data);
                    // Mostrar el modal
                    $('#editModal').modal('show');
                }
            });
        }
    </script>
</body>
</html>
<?php
require_once("c://xampp/htdocs/proyecto/view/head/footer.php");
?>
