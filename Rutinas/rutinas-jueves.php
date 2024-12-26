<?php
/*
Template Name: Rutina Jueves
*/

get_header();
//  obteniendo valores del día lunes
    // Nivel 1 
        $user_id = get_current_user_id();
        $rutina_lunesNivel1= get_field('nivel_1_jueves', 'user_' . $user_id);
        $descripcion_lunesNivel1 = get_field('nivel1_jueves_description', 'user_' . $user_id);
       
    // nivel 2
        $nivel_2_lunes  = get_field('nivel_2_jueves', 'user_' . $user_id);
        $descripcion_lunesNivel2 = get_field('nivel2_jueves_description', 'user_' . $user_id);
    // nivel 3 
        $nivel_3_lunes  = get_field('nivel_3_jueves', 'user_' . $user_id);
        $nivel3_lunes_description= get_field('nivel3_jueves_description', 'user_' . $user_id);
    // nivel 4
        $nivel_4_lunes  = get_field('nivel_4_jueves', 'user_' . $user_id);
        $descripcion_lunesNivel4 = get_field('nivel4_jueves_description', 'user_' . $user_id);
    // nivel 5
        $nivel_5_lunes  = get_field('nivel_5_jueves', 'user_' . $user_id);
        $descripcion_lunesNivel5 = get_field('nivel5_jueves_description', 'user_' . $user_id);
    // nivel 6
        $nivel_6_lunes  = get_field('nivel_6_jueves', 'user_' . $user_id);
        $descripcion_lunesNivel6 = get_field('nivel6_jueves_description', 'user_' . $user_id);


?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Rutina - Jueves</title>
    <link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/Rutinas/page-rutinas.css" />

</head>

<body>

    <main class="container">
         <a class="back-btn" onclick="goBack()">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
        <div class="week-selector">

            <div class="week-selector__buttons"> <button onclick="showWeek(1)" class="level-low">
                  <img src="https://plus.unsplash.com/premium_photo-1673210887551-1b3dac70ef6d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Nivel 1" >
               <span>Nivel 1</span></button>

            </div>

            <div class="week-selector__buttons">
                <button onclick="showWeek(2)" class="level-low">
                  <img src="https://images.unsplash.com/photo-1520334363269-c1b342d17261?q=80&w=1982&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Nivel 2" >
               <span>Nivel 2</span></button>
            </div>

            <div class="week-selector__buttons">
                <button onclick="showWeek(3)" class="level-low">
                  <img src="https://plus.unsplash.com/premium_photo-1672280853228-604ce42fb7cc?q=80&w=1957&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Nivel 3" >
               <span>Nivel 3</span></button>
            </div>

            <div class="week-selector__buttons">
                <button onclick="showWeek(4)" class="level-medium">
                  <img src="https://images.unsplash.com/photo-1616895844967-bfe9b7428edb?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Nivel 4" >
                <span>Nivel 4</span></button>
            </div>

            <div class="week-selector__buttons">
                <button onclick="showWeek(5)"  class="level-medium">
                  <img src="https://galdeanofit.com/wp-content/uploads/2024/03/fondos-con-lastre.jpg" alt="Nivel 5" >
               <span>Nivel 5</span></button>
            </div>

            <div class="week-selector__buttons">
                <button onclick="showWeek(6)"  class="level-advanced">
                  <img src="https://images.unsplash.com/photo-1598266663439-2056e6900339?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Nivel 6"><span>Nivel 6</span>
                  </button>
            </div>

        </div>

        <div id="week-1" class="content">
            <p>
                <?php        if ($rutina_lunesNivel1 && $descripcion_lunesNivel1) {
                  echo '<h3><strong> ' . wp_kses_post($rutina_lunesNivel1) . '</strong></h3>';
                echo '<p>' . wp_kses_post($descripcion_lunesNivel1) . '</p>';
                echo 'Video de ayuda:' . ($enlace_nivel_1) ;
          } else {
                echo '<p>No se ha asignado ninguna rutina.</p>';
          }?>


            </p>
        </div>

        <div id="week-2" class="content">
            <p>
                <?php        
            if ($nivel_2_lunes && $descripcion_lunesNivel2) {
                   echo '<h3><strong> ' . wp_kses_post($nivel_2_lunes) . '</strong></h3>';
                echo '<p>' . wp_kses_post($descripcion_lunesNivel2) . '</p>';
                
        }   else {
                echo '<p>No se ha asignado ninguna rutina.</p>';
          }?>
            </p>
        </div>

        <div id="week-3" class="content">
            <p>
                <?php        
            if ($nivel_3_lunes && $nivel3_lunes_description) {
                   echo '<h3><strong> ' . wp_kses_post($nivel_3_lunes) . '</strong></h3>';
                   echo '<p>' . wp_kses_post($nivel3_lunes_description) . '</p>';
                   echo '<p><strong>Video:</strong> ' . wp_kses_post($enlace_nivel_1) . '</p>';
                  
        }   else {
                echo '<p>No se ha asignado ninguna rutina.</p>';
          }?>


            </p>
        </div>

        <div id="week-4" class="content">
            <p>
                <?php        
            if ($nivel_4_lunes && $descripcion_lunesNivel4) {
                   echo '<h3><strong> ' . wp_kses_post($nivel_4_lunes) . '</strong></h3>';
                echo '<p>' . wp_kses_post($descripcion_lunesNivel4) . '</p>';
        }   else {
                echo '<p>No se ha asignado ninguna rutina.</p>';
          }?>


            </p>
        </div>

        <div id="week-5" class="content">

            <p>
                <?php        
            if ($nivel_5_lunes && $descripcion_lunesNivel5) {
                 echo '<h3><strong> ' . wp_kses_post($nivel_5_lunes) . '</strong></h3>';
                echo '<p>' . wp_kses_post($descripcion_lunesNivel5) . '</p>';
        }   else {
                echo '<p>No se ha asignado ninguna rutina.</p>';
          }?>


            </p>
        </div>

        <div id="week-6" class="content">

            <p>
                <?php        
            if ($nivel_6_lunes && $descripcion_lunesNivel6) {
                echo '<h3><strong> ' . wp_kses_post($nivel_6_lunes) . '</strong></h3>';
                echo '<p>' . wp_kses_post($descripcion_lunesNivel6) . '</p>';
        }   else {
                echo '<p>No se ha asignado ninguna rutina.</p>';
          }?>


            </p>
        </div>
    </main>
    
       <nav id="navbar" class="bottom-nav navbar">
        <a href="#"><i class="fas fa-arrow-left" onclick="goBack()"></i></a> 
        <a href="/home"><i class="fas fa-home"></i></a>
        <a href="/cuenta"><i class="fas fa-user"></i></a>
    </nav>


    <script>
        function showWeek(week) {
            // Oculta todas las semanas
            const weeks = document.querySelectorAll('.content');
            weeks.forEach(function (weekElement) {
                weekElement.classList.remove('active');
            });

            // Muestra la semana seleccionada
            document.getElementById('week-' + week).classList.add('active');

            // Oculta los botones de selección con una animación hacia la izquierda
            document.querySelector('.week-selector').style.transform = 'translateX(-130%)';
            
            // Muestra el botón de volver
            document.querySelector('.back-btn').classList.add('visible');
        }

        function goBack() {
            // Muestra los botones de selección
            document.querySelector('.week-selector').style.transform = 'translateX(0)';

            // Oculta el contenido activo
            const weeks = document.querySelectorAll('.content');
            weeks.forEach(function (weekElement) {
                weekElement.classList.remove('active');
            });

            // Oculta el botón de volver
            document.querySelector('.back-btn').classList.remove('visible');
        }
    </script>

</body>

</html>

<?php get_footer(); ?>