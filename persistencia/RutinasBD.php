<style>
    #message_log {
        margin-top: 50px;
    }
</style>
<?php
require_once '../config/conexion.php';

session_start();


// Función que agrupa las rutinas y las muestra
function mostrar_rutinas_agrupadas($rutinas)
{
    if (!empty($rutinas)) {
        // Agrupar las rutinas para evitar repeticiones
        $rutinas_agrupadas = [];
        foreach ($rutinas as $rutina) {
            $rutinas_agrupadas[$rutina->rutina_id]['routine_name'] = $rutina->routine_name;
            $rutinas_agrupadas[$rutina->rutina_id]['ejercicios'][] = [
                'titulo' => $rutina->ejercicio_titulo,
                'tiempo' => $rutina->tiempo_reps,
                'peso' => $rutina->peso,
                'descanso' => $rutina->descanso,
                'comentarios' => $rutina->comentarios  // Comentarios
            ];
        }

        // Mostrar las rutinas agrupadas
        foreach ($rutinas_agrupadas as $rutina_id => $data) {
            echo '<div class="routine-item">';
            echo '<h2>' . htmlspecialchars($data['routine_name']) . '</h2>';

            if (!empty($data['ejercicios'])) {
                foreach ($data['ejercicios'] as $ejercicio) {
                    echo '<div class="container_details">';
                    echo '<h3 class="exercise-title">' . htmlspecialchars($ejercicio['titulo']) . '</h3>';
                    echo '<div class="details">';
                    echo '<span class="reps">Tiempo/Reps: ' . htmlspecialchars($ejercicio['tiempo']) . '</span>';
                    echo '<span class="time">Peso: ' . htmlspecialchars($ejercicio['peso']) . '</span>';
                    echo '<span class="rest">Descanso: ' . htmlspecialchars($ejercicio['descanso']) . '</span>';

                    if (!empty($ejercicio['comentarios'])) {
                        echo '<span class="comments">' . htmlspecialchars($ejercicio['comentarios']) . '</span>';
                    }

                    echo '</div>'; // Cerrar details
                    echo '</div>'; // Cerrar container_details
                }
            } else {
                echo '<p>No hay ejercicios asignados a esta rutina.</p>';
            }

            echo '</div>'; // Cerrar routine-item
        }
    } else {
        echo '
        <div class="bg-blue-100 border border-blue-300 text-blue-800 px-3 py-3 rounded-lg shadow-lg mt-10 mx-auto max-w-lg text-center" role="alert">
          <span class="block sm:inline">No tienes rutinas asignadas.</span>
        </div>';
    }
}

// backend
function obtener_rutinas_por_nivel($nivel, $dia)
{
    global $pdo;

    if ($pdo === null) {
        throw new Exception('La conexión a la base de datos no está configurada.');
    }



    if (isset($_SESSION['user_id'])) {
        $usuarioId = $_SESSION['user_id'];
        $current_user_id = $usuarioId;



        // Consulta SQL para obtener las rutinas por nivel y día
        $stmt = $pdo->prepare("
            SELECT r.id as rutina_id, r.routine_name, e.ejercicio_titulo, e.tiempo_reps, e.peso, e.descanso, e.comentarios 
            FROM wp_rutina r
            LEFT JOIN wp_rutina_ejercicios e ON r.id = e.rutina_id 
            WHERE r.usuario_id = :user_id AND r.nivel = :nivel AND r.dia = :dia
        ");

        $stmt->execute([
            ':user_id' => $current_user_id,
            ':nivel' => $nivel,
            ':dia' => $dia,  // Filtrar por el día que pasas como parámetro
        ]);

        $rutinas = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Retornar un array vacío si no hay rutinas
        return $rutinas ?: [];

    } else {
        echo '
        <div class="bg-blue-100 border border-blue-300 text-blue-800 px-4 py-3 rounded-lg shadow-lg mt-10 mx-auto max-w-lg text-center" role="alert">
          <span class="block sm:inline">Por favor, <a href="../Formularios/login.php" class="text-blue-600 underline">inicia sesiónb</a> o <a href="../Formularios/register.php" class="text-blue-600 underline">regístrate</a> para acceder a tus rutinas personalizadas.</span>
        </div>';
    }
}

?>