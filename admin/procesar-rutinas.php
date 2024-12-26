<?php
require_once '../config/conexion.php'; // Asegúrate de que la ruta sea correcta
session_start();



function get_users()
{
    global $conn; // Usamos la conexión global definida en el archivo conexion.php

    // Consulta para obtener los usuarios
    $sql = "SELECT id, nombre, apellido FROM usuario";
    $result = mysqli_query($conn, $sql);

    // Si la consulta falla, imprime el error
    if (!$result) {
        die("Error en la consulta SQL: " . mysqli_error($conn)); // Imprimir error SQL
    }

    // Array para almacenar los usuarios
    $users = [];

    if (mysqli_num_rows($result) > 0) {
        // Recorrer los resultados y guardarlos en el array
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    } else {
        echo "No se encontraron usuarios.";
    }

    return $users;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../templates/head.php'; ?>
    <title>Valka - Formulario de Rutinas</title>
    <style>
        body form {
            color: #000 !important;
        }
    </style>
</head>

<body>
    <?php include '../templates/header.php'; ?>
    <form class="form__rutine max-w-3xl mx-auto p-6 bg-white shadow-md rounded-md" method="POST">
        <h2 class="text-2xl font-semibold mb-6 text-center">Agregar Rutina</h2>
        <input type="hidden" name="action" value="procesar_rutina">

        <!-- Nombre de la Rutina -->
        <div class="mb-4">
            <label for="routine-name" class="block text-gray-700">Nombre de la Rutina:</label>
            <input type="text" id="routine-name" name="routine_name"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                required>
        </div>

        <!-- Asignar a Usuario -->
        <div class="mb-4">
            <label for="user_id" class="block text-gray-700">Asignar a Usuario:</label>
            <select name="user_id" id="user_id"
                class="w-full px-3 py-2 border border-gray-300 dark:text-slate-500 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                required>
                <option value="">Selecciona un usuario</option>
                <?php
                // Obtener los usuarios y mostrarlos en el select
                $users = get_users();
                foreach ($users as $user) {
                    echo '<option value="' . $user['id'] . '">' . $user['nombre'] . ' ' . $user['apellido'] . '</option>';
                }
                ?>
            </select>
        </div>

        <!-- Nivel -->
        <div class="mb-4">
            <label for="nivel" class="block text-gray-700">Nivel:</label>
            <select id="nivel" name="nivel"
                class="w-full px-3 py-2 border border-gray-300 dark:text-slate-500 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                required>
                <option value="1">Nivel 1</option>
                <option value="2">Nivel 2</option>
                <option value="3">Nivel 3</option>
                <option value="4">Nivel 4</option>
                <option value="5">Nivel 5</option>
                <option value="6">Nivel 6</option>
            </select>
        </div>

        <!-- Día -->
        <div class="mb-4">
            <label for="dia" class="block text-gray-700">Día:</label>
            <select id="dia" name="dia"
                class="w-full px-3 py-2 dark:text-slate-500 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                required>
                <option value="lunes">Lunes</option>
                <option value="martes">Martes</option>
                <option value="miercoles">Miércoles</option>
                <option value="jueves">Jueves</option>
                <option value="viernes">Viernes</option>
                <option value="sabado">Sábado</option>
                <option value="domingo">Domingo</option>
            </select>
        </div>

        <!-- Calentamiento Específico -->
        <div class="mb-6">
            <h3 class="text-xl font-medium text-gray-800 mb-4">Calentamiento Específico</h3>
            <div id="warmup" class="space-y-4">
                <div class="routine-item grid grid-cols-2 gap-4">
                    <div>
                        <label for="warmup-exercise-title" class="block text-gray-700">Título del Ejercicio:</label>
                        <input type="text" id="warmup-exercise-title" name="warmup_exercise_title[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="warmup-reps" class="block text-gray-700">Series:</label>
                        <input type="text" id="warmup-reps" name="warmup_reps[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="warmup-time" class="block text-gray-700">Tiempo/Reps:</label>
                        <input type="text" id="warmup-time" name="warmup_time[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="warmup-weight" class="block text-gray-700">Peso (si aplica):</label>
                        <input type="text" id="warmup-weight" name="warmup_weight[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="warmup-rest" class="block text-gray-700">Descanso:</label>
                        <input type="text" id="warmup-rest" name="warmup_rest[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="warmup-comments" class="block text-gray-700">Comentarios:</label>
                        <textarea id="warmup-comments" name="warmup_comments[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                    </div>
                </div>
            </div>
            <button type="button" onclick="agregarEjercicio('warmup')"
                class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500">Agregar otro
                calentamiento</button>
        </div>

        <!-- Rutina -->
        <div class="mb-6">
            <h3 class="text-xl font-medium text-gray-800 mb-4">Rutina</h3>
            <div id="routine" class="space-y-4">
                <div class="routine-item grid grid-cols-2 gap-4">
                    <div>
                        <label for="routine-exercise-title" class="block text-gray-700">Título del Ejercicio:</label>
                        <input type="text" id="routine-exercise-title" name="routine_exercise_title[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="routine-reps" class="block text-gray-700">Series:</label>
                        <input type="text" id="routine-reps" name="routine_reps[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="routine-time" class="block text-gray-700">Tiempo/Reps:</label>
                        <input type="text" id="routine-time" name="routine_time[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="routine-weight" class="block text-gray-700">Peso (si aplica):</label>
                        <input type="text" id="routine-weight" name="routine_weight[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="routine-rest" class="block text-gray-700">Descanso:</label>
                        <input type="text" id="routine-rest" name="routine_rest[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="routine-comments" class="block text-gray-700">Comentarios o Circuito drop
                            set:</label>
                        <textarea id="routine-comments" name="routine_comments[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                    </div>
                </div>
            </div>
            <button type="button" onclick="agregarEjercicio('routine')"
                class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500">Agregar otra rutina</button>
        </div>

        <!-- Estiramientos -->
        <div class="mb-6">
            <h3 class="text-xl font-medium text-gray-800 mb-4">Estiramientos Principales</h3>
            <div id="stretch" class="space-y-4">
                <div class="routine-item grid grid-cols-2 gap-4">
                    <div>
                        <label for="stretch-exercise-title" class="block text-gray-700">Título del Ejercicio:</label>
                        <input type="text" id="stretch-exercise-title" name="stretch_exercise_title[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="stretch-reps" class="block text-gray-700">Series:</label>
                        <input type="text" id="stretch-reps" name="stretch_reps[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="stretch-time" class="block text-gray-700">Tiempo/Reps:</label>
                        <input type="text" id="stretch-time" name="stretch_time[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="stretch-weight" class="block text-gray-700">Peso (si aplica):</label>
                        <input type="text" id="stretch-weight" name="stretch_weight[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="stretch-rest" class="block text-gray-700">Descanso:</label>
                        <input type="text" id="stretch-rest" name="stretch_rest[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="stretch-comments" class="block text-gray-700">Comentarios:</label>
                        <textarea id="stretch-comments" name="stretch_comments[]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                    </div>
                </div>
            </div>
            <button type="button" onclick="agregarEjercicio('stretch')"
                class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500">Agregar otro
                estiramiento</button>
        </div>

        <!-- Botón Guardar Rutinas -->
        <button type="submit"
            class="w-full py-3 bg-green-600 text-white font-semibold rounded-md hover:bg-green-500 focus:ring focus:ring-green-300">
            Guardar Rutinas
        </button>
    </form>


    <script>
        function agregarEjercicio(seccion) {
            const container = document.getElementById(seccion);
            const newExercise = document.createElement('div');
            newExercise.classList.add('routine-item', 'transition-all', 'duration-500', 'ease-in-out', 'transform', '-translate-y-10', 'opacity-0');

            // Estilo y estructura de los nuevos inputs
            newExercise.innerHTML = `
            <div class="mb-4">
                <label for="${seccion}_exercise_title" class="block text-gray-700">Título del Ejercicio:</label>
                <input type="text" name="${seccion}_exercise_title[]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="${seccion}_reps" class="block text-gray-700">Series:</label>
                <input type="text" name="${seccion}_reps[]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="${seccion}_time" class="block text-gray-700">Tiempo/Reps:</label>
                <input type="text" name="${seccion}_time[]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="${seccion}_weight" class="block text-gray-700">Peso (si aplica):</label>
                <input type="text" name="${seccion}_weight[]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="${seccion}_rest" class="block text-gray-700">Descanso:</label>
                <input type="text" name="${seccion}_rest[]" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="${seccion}_comments" class="block text-gray-700">Comentarios:</label>
                <textarea name="${seccion}_comments[]" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
        `;

            // Agregar el nuevo ejercicio al contenedor
            container.appendChild(newExercise);

            // Animación de deslizamiento
            setTimeout(() => {
                newExercise.classList.remove('-translate-y-10', 'opacity-0');
                newExercise.classList.add('translate-y-0', 'opacity-100');
            }, 10);
        }
    </script>


    <?php include '../templates/footer.php'; ?>
</body>

</html>
<?php
// Incluir el archivo de conexión con la ruta correcta
include '../config/conexion.php';


if (isset($_SESSION['user_id'])) {
    $usuarioId = $_SESSION['user_id'];
} else {
    echo '
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">No se ha iniciado sesión correctamente o no hay ID de usuario en la sesión.</span>
    </div>';
    exit(); // Detener la ejecución si no está logueado
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    // Iniciar la transacción
    $conn->begin_transaction();

    try {
        // Validar los datos del formulario
        $routine_name = $conn->real_escape_string($_POST['routine_name']);
        $nivel = intval($_POST['nivel']);
        $dia = $conn->real_escape_string($_POST['dia']);
        $routine_data = ''; // Asignar un valor al campo routine_data (ajustar si es necesario)

        // Insertar la rutina en la tabla wp_rutina
        $sql = "INSERT INTO wp_rutina (routine_name, routine_data, nivel, dia, usuario_id) 
                    VALUES ('$routine_name', '$routine_data', $nivel, '$dia', $usuarioId)";

        if ($conn->query($sql) === TRUE) {
            $rutina_id = $conn->insert_id;  // Obtener el ID de la rutina insertada

            // **Calentamientos**
            if (isset($_POST['warmup_exercise_title'])) {
                for ($i = 0; $i < count($_POST['warmup_exercise_title']); $i++) {
                    if (!empty($_POST['warmup_exercise_title'][$i])) {
                        $warmup_title = $conn->real_escape_string($_POST['warmup_exercise_title'][$i]);
                        $warmup_reps = $conn->real_escape_string($_POST['warmup_reps'][$i]);
                        $warmup_time = $conn->real_escape_string($_POST['warmup_time'][$i]);
                        $warmup_weight = $conn->real_escape_string($_POST['warmup_weight'][$i]);
                        $warmup_rest = $conn->real_escape_string($_POST['warmup_rest'][$i]);
                        $warmup_comments = $conn->real_escape_string($_POST['warmup_comments'][$i]);

                        // Insertar en la tabla wp_rutina_ejercicios
                        $sql_ejercicio = "INSERT INTO wp_rutina_ejercicios (rutina_id, tipo_ejercicio, ejercicio_titulo, reps, tiempo_reps, peso, descanso, comentarios)
                                              VALUES ($rutina_id, 'calentamiento', '$warmup_title', '$warmup_reps', '$warmup_time', '$warmup_weight', '$warmup_rest', '$warmup_comments')";

                        if (!$conn->query($sql_ejercicio)) {
                            throw new Exception("Error al insertar calentamiento: " . $conn->error);
                        }
                    }
                }
            }

            // **Rutina**
            if (isset($_POST['routine_exercise_title'])) {
                for ($i = 0; $i < count($_POST['routine_exercise_title']); $i++) {
                    if (!empty($_POST['routine_exercise_title'][$i])) {
                        $routine_title = $conn->real_escape_string($_POST['routine_exercise_title'][$i]);
                        $routine_reps = $conn->real_escape_string($_POST['routine_reps'][$i]);
                        $routine_time = $conn->real_escape_string($_POST['routine_time'][$i]);
                        $routine_weight = $conn->real_escape_string($_POST['routine_weight'][$i]);
                        $routine_rest = $conn->real_escape_string($_POST['routine_rest'][$i]);
                        $routine_comments = $conn->real_escape_string($_POST['routine_comments'][$i]);

                        // Insertar en la tabla wp_rutina_ejercicios
                        $sql_ejercicio = "INSERT INTO wp_rutina_ejercicios (rutina_id, tipo_ejercicio, ejercicio_titulo, reps, tiempo_reps, peso, descanso, comentarios)
                                              VALUES ($rutina_id, 'rutina', '$routine_title', '$routine_reps', '$routine_time', '$routine_weight', '$routine_rest', '$routine_comments')";

                        if (!$conn->query($sql_ejercicio)) {
                            throw new Exception("Error al insertar rutina: " . $conn->error);
                        }
                    }
                }
            }

            // **Estiramientos**
            if (isset($_POST['stretch_exercise_title'])) {
                for ($i = 0; $i < count($_POST['stretch_exercise_title']); $i++) {
                    if (!empty($_POST['stretch_exercise_title'][$i])) {
                        $stretch_title = $conn->real_escape_string($_POST['stretch_exercise_title'][$i]);
                        $stretch_reps = $conn->real_escape_string($_POST['stretch_reps'][$i]);
                        $stretch_time = $conn->real_escape_string($_POST['stretch_time'][$i]);
                        $stretch_weight = $conn->real_escape_string($_POST['stretch_weight'][$i]);
                        $stretch_rest = $conn->real_escape_string($_POST['stretch_rest'][$i]);
                        $stretch_comments = $conn->real_escape_string($_POST['stretch_comments'][$i]);

                        // Insertar en la tabla wp_rutina_ejercicios
                        $sql_ejercicio = "INSERT INTO wp_rutina_ejercicios (rutina_id, tipo_ejercicio, ejercicio_titulo, reps, tiempo_reps, peso, descanso, comentarios)
                                              VALUES ($rutina_id, 'estiramiento', '$stretch_title', '$stretch_reps', '$stretch_time', '$stretch_weight', '$stretch_rest', '$stretch_comments')";

                        if (!$conn->query($sql_ejercicio)) {
                            throw new Exception("Error al insertar estiramientos: " . $conn->error);
                        }
                    }
                }
            }

            // Confirmar la transacción
            $conn->commit();
            echo "Rutina agregada correctamente.";
        } else {
            throw new Exception("Error al insertar la rutina: " . $conn->error);
        }
    } catch (Exception $e) {
        // Deshacer la transacción en caso de error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}


// Cerrar la conexión
$conn->close();
?>