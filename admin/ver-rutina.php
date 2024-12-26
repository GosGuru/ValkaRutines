<?php
include '../config/conexion.php';

$stmt = $pdo->query("
SELECT r.id, r.routine_name, e.ejercicio_titulo, e.reps, e.tiempo_reps, e.peso, e.descanso, e.tipo_ejercicio 
FROM wp_rutina r 
LEFT JOIN wp_rutina_ejercicios e ON r.id = e.rutina_id
");


$wp_rutinas = $stmt->fetchAll(PDO::FETCH_OBJ);

// Consulta para obtener los ejercicios
$stmt = $pdo->query("
    SELECT e.id, e.ejercicio_titulo, e.reps, e.tiempo_reps, e.peso, e.descanso, e.tipo_ejercicio, e.orden
    FROM wp_rutina_ejercicios e
");

// Guardar los ejercicios en la variable $ejercicios
$ejercicios = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<head>
    <?php include '../templates/head.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Valka - Rutinas</title>
</head>

<body class="bg-[#1a1a1a]">


    <?php include '../templates/header(admin).php'; ?>

    <?php

    echo '<div class="container mx-auto px-4 py-6">';
    if (!empty($wp_rutinas)) {
        echo '<h2 class="text-3xl font-extrabold mb-6 text-gray-100">Rutinas creadas</h2>';
        echo '<div class="overflow-x-auto bg-gray-900 rounded-lg shadow-lg p-4">';
        echo '<table class="min-w-full table-auto border-collapse border border-gray-700">';
        echo '<thead>';
        echo '<tr class="bg-gray-800 text-gray-300">';
        echo '<th class="px-4 py-3 border border-gray-600 text-left">ID</th>';
        echo '<th class="px-4 py-3 border border-gray-600 text-left">Nombre de la Rutina</th>';
        echo '<th class="px-4 py-3 border border-gray-600 text-left">Tipo de Ejercicio</th>';
        echo '<th class="px-4 py-3 border border-gray-600 text-left">Ejercicio</th>';
        echo '<th class="px-4 py-3 border border-gray-600 text-left">Reps</th>';
        echo '<th class="px-4 py-3 border border-gray-600 text-left">Tiempo/Reps</th>';
        echo '<th class="px-4 py-3 border border-gray-600 text-left">Peso</th>';
        echo '<th class="px-4 py-3 border border-gray-600 text-left">Descanso</th>';
        echo '<th class="px-4 py-3 border border-gray-600 text-left">Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody class="bg-gray-700">';

        foreach ($wp_rutinas as $rutina) {
            echo '<tr class="hover:bg-gray-600 text-gray-200">';
            echo '<td class="px-4 py-3 border border-gray-600">' . htmlspecialchars($rutina->id) . '</td>';
            echo '<td class="px-4 py-3 border border-gray-600">' . htmlspecialchars($rutina->routine_name) . '</td>';
            echo '<td class="px-4 py-3 border border-gray-600">' . htmlspecialchars($rutina->tipo_ejercicio) . '</td>';
            echo '<td class="px-4 py-3 border border-gray-600">' . htmlspecialchars($rutina->ejercicio_titulo) . '</td>';
            echo '<td class="px-4 py-3 border border-gray-600">' . htmlspecialchars($rutina->reps) . '</td>';
            echo '<td class="px-4 py-3 border border-gray-600">' . htmlspecialchars($rutina->tiempo_reps) . '</td>';
            echo '<td class="px-4 py-3 border border-gray-600">' . htmlspecialchars($rutina->peso) . '</td>';
            echo '<td class="px-4 py-3 border border-gray-600">' . htmlspecialchars($rutina->descanso) . '</td>';
            echo '<td class="px-4 py-3 border border-gray-600 text-blue-400">';
            echo '<a href="#" class="mr-2 hover:text-blue-500 editar-rutina" data-id="' . $rutina->id . '">Editar</a>';
            echo '<a href="#" class="eliminar-rutina" data-id="' . htmlspecialchars($rutina->id) . '">Eliminar</a>';
            echo '<a href="#" class="duplicar-rutina" data-id="' . htmlspecialchars($rutina->id) . '">Duplicar</a>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<p class="text-gray-400">No hay rutinas creadas.</p>';
    }
    echo '</div>';
    ?>
</body>

<?php include '../templates/footer.php'; ?>