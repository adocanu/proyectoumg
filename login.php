<?php
// Mostrar todos los errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Iniciar la sesión
session_start();

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Si no tienes contraseña, déjalo vacío
$dbname = "prueba"; // Reemplaza "prueba" por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar y sanitizar entradas del formulario
    $input_username = isset($_POST['usuario']) ? $conn->real_escape_string(trim($_POST['usuario'])) : '';
    $input_password = isset($_POST['contrasena']) ? $conn->real_escape_string(trim($_POST['contrasena'])) : '';

    // Depurar: mostrar los valores capturados
    var_dump($input_username, $input_password);

    // Consulta SQL para verificar las credenciales (corregido el nombre del campo 'contraseña')
    $sql = "SELECT * FROM usuario WHERE usuario='$input_username' AND contraseña='$input_password'";
    
    // Depurar: mostrar la consulta SQL
    echo "SQL: " . $sql . "<br>";

    $result = $conn->query($sql);

    // Verificar si se encontró un usuario con las credenciales proporcionadas
    if ($result && $result->num_rows > 0) {
        // Las credenciales son correctas, iniciar sesión y redirigir al usuario al panel de administración
        $row = $result->fetch_assoc();
        $_SESSION["id_usuario"] = $row["id_usuario"]; // Guardar el ID del usuario en la sesión

        // Redirigir al usuario
        header("Location: view/username/index.php");
        exit();
    } else {
        // Las credenciales son incorrectas, mostrar un mensaje de error
        $error_message = "Usuario o contraseña incorrectos.";
    }
}

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css"> <!-- Agrega tu archivo de estilos personalizado aquí -->
    <style>
        /* Personaliza el formulario con estilos adicionales si es necesario */
        .gradient-custom {
            background: #1133cb; /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, rgb(199, 163, 23), rgba(37, 117, 252, 1)); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, rgb(208, 53, 115), rgba(37, 117, 252, 1)); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        .card {
            border: none;
            border-radius: 1rem;
        }
        .card-title {
            font-size: 15px;
            color: #fff;
        }
        .form-label {
            font-size: 22px;
            color: #fff;
        }
        .form-control {
            font-size: 15px;
            padding: 22px;
        }
        .btn-primary {
            font-size: 10px;
            padding: 12px;
        }
        .text-white-50 {
            color: rgba(243, 244, 247, 0.896);
        }
    </style>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Por favor, ingresa tu usuario y contraseña.</p>
                                <?php if (isset($error_message)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error_message; ?>
                                    </div>
                                <?php endif; ?>
                                <form action="login.php" method="post">
                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <input type="text" id="usuario" class="form-control form-control-lg" name="usuario" required>
                                        <label class="form-label" for="usuario">Usuario</label>
                                    </div>
                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <input type="password" id="contrasena" class="form-control form-control-lg" name="contrasena" required>
                                        <label class="form-label" for="contrasena">Contraseña</label>
                                    </div>
                                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">¿Olvidaste tu contraseña?</a></p>
                                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Iniciar sesión</button>
                                </form>
                            </div>
                            <div>
                                <p class="mb-0">¿No tienes una cuenta? <a href="#!" class="text-white-50 fw-bold">Regístrate</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
