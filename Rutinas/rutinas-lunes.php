<?php
include '../persistencia/RutinasBD.php';


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../templates/head.php' ?>
    <title>Mi Rutina - Lunes</title>
    <link rel="stylesheet" href="page-rutinas.css">

</head>

<body>
    <?php include '../templates/header.php'; ?>
    <main class="container__routine">
        <a class="back-btn" onclick="goBack()">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
        <div class="week-selector">

            <div class="week-selector__buttons"> <button onclick="showWeek(1)" class="level-low">
                    <img src="https://plus.unsplash.com/premium_photo-1673210887551-1b3dac70ef6d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Nivel 1">
                    <span>Nivel 1</span></button>

            </div>

            <div class="week-selector__buttons">
                <button onclick="showWeek(2)" class="level-low">
                    <img src="https://images.unsplash.com/photo-1520334363269-c1b342d17261?q=80&w=1982&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Nivel 2">
                    <span>Nivel 2</span></button>
            </div>

            <div class="week-selector__buttons">
                <button onclick="showWeek(3)" class="level-low">
                    <img src="https://plus.unsplash.com/premium_photo-1672280853228-604ce42fb7cc?q=80&w=1957&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Nivel 3">
                    <span>Nivel 3</span></button>
            </div>

            <div class="week-selector__buttons">
                <button onclick="showWeek(4)" class="level-medium">
                    <img src="https://images.unsplash.com/photo-1616895844967-bfe9b7428edb?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Nivel 4">
                    <span>Nivel 4</span></button>
            </div>

            <div class="week-selector__buttons">
                <button onclick="showWeek(5)" class="level-medium">
                    <img src="https://galdeanofit.com/wp-content/uploads/2024/03/fondos-con-lastre.jpg" alt="Nivel 5">
                    <span>Nivel 5</span></button>
            </div>

            <div class="week-selector__buttons">
                <button onclick="showWeek(6)" class="level-advanced">
                    <img src="https://images.unsplash.com/photo-1598266663439-2056e6900339?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Nivel 6"><span>Nivel 6</span>
                </button>
            </div>
            <h3 class="objetivos__title">Objetivos de la rutina</h3>


            <div class="week-selector__buttons">
                <button onclick="showWeek(6)" class="objetivos__container-button">
                    <span>Lunes: Día de Sentadillas Pesadas</span>
                    <p class="objetivos__parrafo">Establecer una base sólida de fuerza en las piernas con enfoque en
                        sentadillas, mientras se trabaja la movilidad de tobillo y cadera
                    </p>
                </button>
            </div>

        </div>

        <?php

        for ($nivel = 1; $nivel <= 6; $nivel++) {  // Bucle para niveles del 1 al 6
            echo '<div id="week-' . $nivel . '" class="content">';

            $dia = 'lunes';  // Puedes cambiar el día según sea necesario
        
            // Obtener las rutinas para el nivel y día especificados
            $rutinas_del_dia = obtener_rutinas_por_nivel($nivel, $dia);

            // Mostrar las rutinas
            mostrar_rutinas_agrupadas($rutinas_del_dia);

            echo '</div>';
        }

        ?>



    </main>

    <nav id="navbar" class="bottom-nav navbar">
        <a href="#"><i class="fas fa-arrow-left" onclick="goBack()"></i></a>
        <a href="/home"><i class="fas fa-home"></i></a>
        <a href="/cuenta"><i class="fas fa-user"></i></a>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Obtenemos todos los botones y asignamos eventos a cada uno
            const btns = document.querySelectorAll('.btn');
            btns.forEach((btn) => {
                btn.addEventListener('click', () => toggleRoutine(btn.dataset.routine));
            });
        });

        // Función que muestra u oculta una rutina dependiendo de su estado actual
        function toggleRoutine(routineId) {
            const routineElement = document.querySelector(`#${routineId}`);
            const currentDisplay = routineElement.style.display;

            // Ocultamos todas las rutinas antes de mostrar la seleccionada
            const allRoutines = document.querySelectorAll('.routine');
            allRoutines.forEach((routine) => {
                routine.style.display = 'none';
            });

            // Cambiamos la visibilidad según el estado actual
            if (currentDisplay === 'none' || !currentDisplay) {
                routineElement.style.display = 'block';
            }
        }




        function showWeek(week) {
            const weeks = document.querySelectorAll('.content');
            weeks.forEach(function (weekElement) {
                weekElement.classList.remove('active');
            });

            document.getElementById('week-' + week).classList.add('active');
            document.querySelector('.week-selector').style.transform = 'translateX(-130%)';
            document.querySelector('.back-btn').classList.add('visible');
        }

        function goBack() {
            document.querySelector('.week-selector').style.transform = 'translateX(0)';
            const weeks = document.querySelectorAll('.content');
            weeks.forEach(function (weekElement) {
                weekElement.classList.remove('active');
            });
            document.querySelector('.back-btn').classList.remove('visible');
        }

    </script>


    <?php include '../templates/footer.php'; ?>

</body>

</html>