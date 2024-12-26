<?php
session_start();
require_once '../config/conexion.php'; // Asegúrate de que este archivo establezca correctamente la conexión a la base de datos
require_once '../persistencia/UsuarioBD.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    setcookie('cuenta_expirada', 'true', time() + 3600, '/');
    header('Location: ../index.php');
    exit();
}

$usuarioId = $_SESSION['user_id']; // Obtener el ID del usuario de la sesión

// Pasar la conexión a la clase UsuarioBD
$usuarioBD = new UsuarioBD($conn);
$usuario = $usuarioBD->obtenerUsuarioPorId($usuarioId);

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit();
}
// Después de actualizar el tipo de usuario en la base de datos
if ($usuario['tipo_usuario'] !== $_SESSION['tipo_usuario']) {
    // Actualizar el valor en la sesión si cambió en la base de datos
    $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../templates/head.php' ?>
    <link rel="stylesheet" href="../Styles/style.css">
    <link rel="stylesheet" href="style-perfil.css">
    <link rel="icon" href="componentes/logoValka.png" type="image/x-icon">
    <title>Valka - Perfil</title>
</head>

<body>


    <?php include '../templates/header.php'; ?>

    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4 mb-75">
        <div class="bg-white shadow-md rounded-lg overflow-hidden max-w-lg w-full mb-75">
            <!-- Header del perfil -->
            <div class="bg-black text-white py-4 px-6">
                <h1 class="text-2xl font-bold">Perfil de Usuario</h1>
            </div>

            <!-- Contenido del perfil -->
            <div class="p-6 space-y-4">
                <!-- Información general -->
                <div>
                    <h3 class="text-xl font-semibold">ID: <?php echo $usuario['id']; ?></h3>
                    <p class="text-gray-600">Nombre: <span class="font-medium"><?php echo $usuario['nombre']; ?></span>
                    </p>
                    <p class="text-gray-600">Apellido: <span
                            class="font-medium"><?php echo $usuario['apellido']; ?></span></p>
                </div>

                <!-- Información adicional -->
                <div class="space-y-2">
                    <p class="text-gray-600">Email: <span class="font-medium"><?php echo $usuario['email']; ?></span>
                    </p>
                    <p class="text-gray-600">Tipo de Usuario: <span
                            class="font-medium"><?php echo $usuario['tipo_usuario']; ?></span></p>
                    <p class="text-gray-600">Fecha de Registro: <span
                            class="font-medium"><?php echo $usuario['fecha_registro']; ?></span></p>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-gray-600">Peso: <span class="font-medium"><?php echo $usuario['peso']; ?>
                                kg</span></p>
                        <p class="text-gray-600">Altura: <span class="font-medium"><?php echo $usuario['altura']; ?>
                                m</span></p>
                    </div>
                    <p class="text-gray-600">Tiempo Entrenando: <span
                            class="font-medium"><?php echo $usuario['tiempo_entrenando']; ?></span></p>
                    <p class="text-gray-600">Objetivos SMART:</p>
                    <p class="text-gray-600 bg-gray-100 p-4 rounded-lg shadow-inner text-sm">
                        <?php echo nl2br($usuario['objetivos_smart']); ?>
                    </p>
                </div>

                <!-- Botón para activar edición -->
                <div class="mt-6">
                    <button id="edit-btn"
                        class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors">
                        Editar Perfil
                    </button>
                </div>

                <!-- Formulario para editar el perfil (oculto inicialmente) -->
                <div id="edit-form" class="mt-6 hidden">
                    <h2 class="text-lg font-semibold text-gray-700">Editar Perfil</h2>
                    <form action="actualizar_perfil.php" method="POST" class="space-y-4">
                        <div class="flex flex-col">
                            <label for="nombre" class="text-gray-600">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" value="<?php echo $usuario['nombre']; ?>"
                                class="border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-black">
                        </div>
                        <div class="flex flex-col">
                            <label for="apellido" class="text-gray-600">Apellido:</label>
                            <input type="text" name="apellido" id="apellido" value="<?php echo $usuario['apellido']; ?>"
                                class="border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-black">
                        </div>
                        <div class="flex flex-col">
                            <label for="email" class="text-gray-600">Email:</label>
                            <input type="email" name="email" id="email" value="<?php echo $usuario['email']; ?>"
                                class="border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-black">
                        </div>
                        <div class="flex flex-col">
                            <label for="peso" class="text-gray-600">Peso:</label>
                            <input type="number" name="peso" id="peso" value="<?php echo $usuario['peso']; ?>"
                                class="border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-black">
                        </div>
                        <div class="flex flex-col">
                            <label for="altura" class="text-gray-600">Altura:</label>
                            <input type="number" step="0.01" name="altura" id="altura"
                                value="<?php echo $usuario['altura']; ?>"
                                class="border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-black">
                        </div>
                        <div class="flex flex-col">
                            <label for="objetivos_smart" class="text-gray-600">Objetivos SMART:</label>
                            <textarea name="objetivos_smart" id="objetivos_smart"
                                class="border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-black"><?php echo $usuario['objetivos_smart']; ?></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors">Guardar
                                Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mostrar el formulario de edición al hacer clic en el botón "Editar"
        document.getElementById('edit-btn').addEventListener('click', function () {
            var form = document.getElementById('edit-form');
            if (form.classList.contains('hidden')) {
                form.classList.remove('hidden');
                form.classList.add('block');
            } else {
                form.classList.remove('block');
                form.classList.add('hidden');
            }
        });
    </script>





    <?php include '../templates/footer.php'; ?>
</body>

</html>