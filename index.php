<?php
session_start(); // Iniciar la sesión



// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['user_id'])) {
  // Verificar el tipo de usuario almacenado en la sesión
  if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'admin') {
    // Si el usuario es administrador, redirigir a admin/index.php
    header("Location: admin/index.php");
    exit(); // Detener la ejecución del script
  } else {
    // Si el usuario es normal, redirigir a usuario/index.php
    header("Location: usuario/index.php");
    exit(); // Detener la ejecución del script
  }
}


if (isset($_COOKIE['cuenta_expirada']) && $_COOKIE['cuenta_expirada'] === 'true') {
  echo '<div id="mensaje" class="mensaje"><h2>Alerta</h2>Tu cuenta ha expirado. Por favor   <a href="Formularios/login.php"> inicia sesión aquí</div>';

  setcookie('cuenta_expirada', '', time() - 3600, '/'); // Caduca inmediatamente
}



?>
<!DOCTYPE html>
<html lang="es">

<!-- ¡HEAD -->

<head>
  <?php include 'templates/head.php' ?>
  <link rel="stylesheet" href="assets/Styles/style.css">
  <title>Valka</title>
</head>
<!-- HEAD! -->

<body class="bg-[rgba(43, 43, 43, 0.96)]
">

  <header class="bg-transparent relative z-50">
    <!-- Nueva barra superior para "Ingresar" y "Registrarse" -->
    <div class="bg-black py-2">
      <div class="container mx-auto flex justify-between items-center">
        <div></div> <!-- Espacio para alinear a la derecha -->
        <div class="flex space-x-4">
          <a href="Formularios/login.php"
            class="text-white transition duration-300 hover:bg-gray-700 px-4 py-2 rounded-md">Ingresar</a>
          <a href="Formularios/register.php"
            class="bg-blue-500 text-white transition duration-300 hover:bg-blue-700 px-4 py-2 rounded-md">Registrarse</a>
        </div>
      </div>
    </div>

    <!-- Menú de navegación principal -->
    <nav class="container mx-auto px-4 py-3">
      <div class="flex flex-col md:flex-row md:justify-between md:items-center">
        <div class="flex items-center justify-between">
          <a href="#" class="text-xl font-bold text-white transition duration-300" aria-label="Inicio">
            <!-- Imagen del logo -->
            <img src="assets/imagenes/LOGO(VALKA).webp" alt="Logo Inicio" class="h-8 w-auto mr-2">
          </a>
          <button class="md:hidden focus:outline-none" id="menu-toggle" aria-label="Toggle menu">
            <i class="fas fa-bars text-white"></i>
          </button>
        </div>
        <div
          class="hidden md:flex flex-col md:flex-row mt-4 md:mt-0 space-y-4 md:space-y-0 md:space-x-6 justify-center items-center"
          id="menu-items">
          <a href="aboutme.php" class="text-white transition duration-300 hover:bg-[#26261f] px-3 py-2 rounded-md"
            aria-label="Sobre mí">
            <i class="fas fa-user mr-2"></i>Sobre mí
          </a>
          <div class="relative group">
            <button class="text-white transition duration-300 hover:bg-[#26261f] px-3 py-2 rounded-md flex items-center"
              aria-haspopup="true" aria-expanded="false">
              <span>Rutinas</span>
              <i class="fas fa-chevron-down ml-2 transform group-hover:rotate-180 transition duration-300"></i>
            </button>
            <div
              class="absolute left-0 mt-0 w-48 rounded-md bg-[#26261f] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300">
              <div class="py-1" role="menu" aria-orientation="vertical">
                <a href="Rutinas/rutinas.php" class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md"
                  role="menuitem">Rutinas</a>
                <a href="#" class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md"
                  role="menuitem">Planificador Semanal</a>
                <a href="#" class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md" role="menuitem">Objetivos
                  Mensuales</a>
              </div>
            </div>
          </div>
          <a href="#" class="text-white transition duration-300 hover:bg-[#26261f] px-3 py-2 rounded-md"
            aria-label="Cuestionario Exclusivo">
            <i class="fas fa-clipboard-list mr-2"></i>Cuestionario
          </a>
          <div class="relative group">
            <button class="text-white transition duration-300 hover:bg-[#26261f] px-3 py-2 rounded-md flex items-center"
              aria-haspopup="true" aria-expanded="false">
              <span>Cuenta</span>
              <i class="fas fa-chevron-down ml-2 transform group-hover:rotate-180 transition duration-300"></i>
            </button>
            <div
              class="absolute left-0 mt-0 w-48 rounded-md bg-[#26261f] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300">
              <div class="py-1" role="menu" aria-orientation="vertical">
                <a href="usuario/perfil.php" class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md"
                  role="menuitem">Perfil</a>
                <a href="#" class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md"
                  role="menuitem">Configuración</a>
                <a href="logica/cerrar-sesion.php" class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md"
                  role="menuitem">Cerrar sesión</a>
              </div>
            </div>
          </div>
          <div class="relative group">
            <button class="text-white transition duration-300 hover:bg-[#26261f] px-3 py-2 rounded-md flex items-center"
              aria-haspopup="true" aria-expanded="false">
              <span>Herramientas</span>
              <i class="fas fa-chevron-down ml-2 transform group-hover:rotate-180 transition duration-300"></i>
            </button>
            <div
              class="absolute left-0 mt-0 w-48 rounded-md bg-[#26261f] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300">
              <div class="py-1 " role="menu" aria-orientation="vertical">
                <a href="Rutinas/ver-rutina.php" class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md"
                  role="menuitem">Ver
                  rutinas</a>
                <a href="Rutinas/procesar-rutinas.php" class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md"
                  role="menuitem">Subir
                  rutina</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
      document.getElementById('menu-items').classList.toggle('hidden');
    });
  </script>


  <!-- <nav class=" nav">

    <div class="nav__container">

      <div class="nav__title">
        <img src="componentes/logo.png" class="nav__title--img" alt="logo valka">
      </div>

      <a href="#menu" class="nav__menu">
        <img src="./assets/menu.svg" class="nav__icon">
      </a>

      <a href="#" class="nav__menu nav__menu--second">
        <img src="./assets/close.svg" class="nav__icon ">
      </a>

      <ul class="dropdown" id="menu">

        <li class="dropdown__list">
          <a href="#" class="dropdown__link">
            <img src="./assets/house.svg" class="dropdown__icon">
            <span class="dropdown__span">Inicio</span>
          </a>
        </li>

        <li class="dropdown__list">
          <a href="Formularios/login.php" class="dropdown__link">
            <i class="fa-solid fa-right-to-bracket" style="font-size:18px;"></i>
            <span class="dropdown__span">Iniciar sesión</span>
          </a>
        </li>

        <li class="dropdown__list">
          <a href="#" class="dropdown__link">
            <img src="./assets/projects.svg" class="dropdown__icon">
            <span class="dropdown__span">Ejercicios</span>
            <img src="./assets/down.svg" class="dropdown__arrow">

            <input type="checkbox" class="dropdown__check">
          </a>
          <div class="dropdown__content">

            <ul class="dropdown__sub">

              <li class="dropdown__li">
                <a href="Rutinas/rutinas-lunes.php" class="dropdown__anchor">Calentamiento</a>
              </li>
              <li class="dropdown__li">
                <a href="Ejercicios/preentreno.html" class="dropdown__anchor">Pre-Entreno</a>
              </li>
              <li class="dropdown__li">
                <a href="Ejercicios/postentreno.html" class="dropdown__anchor">Post-Entreno</a>
              </li>

            </ul>

          </div>
        </li>

        <li class="dropdown__list">
          <a href="#" class="dropdown__link">
            <img src="./assets/email.svg" class="dropdown__icon">
            <span class="dropdown__span">Contacto</span>
            <img src="./assets/down.svg" class="dropdown__arrow">

            <input type="checkbox" class="dropdown__check">
          </a>

          <div class="dropdown__content">

            <ul class="dropdown__sub">

              <li class="dropdown__li">
                <a href="#" class="dropdown__anchor">Contact 1</a>
              </li>
              <li class="dropdown__li">
                <a href="#" class="dropdown__anchor">Contact 2</a>
              </li>


            </ul>

          </div>
        </li>

        <li class="dropdown__list">
          <a href="#" class="dropdown__link">
            <img src="./assets/help.svg" class="dropdown__icon">
            <span class="dropdown__span">Ayuda</span>
          </a>
        </li>

      </ul>

    </div>

  </nav> -->


  <main class="container__main">
    <div class="relative h-screen flex items-center justify-center">
      <img src="assets/imagenes/login2.png" alt="Background image" class="absolute inset-0 w-full h-full object-cover">
      <div class="relative text-center text-white">
        <h1 class="text-10xl md:text-8xl font-extrabold font-baloo uppercase tracking-tight leading-none">
          <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-200 to-orange-500">
            Valka Workout
          </span>
        </h1>
      </div>
    </div>
  </main>





  <!-- <div class="containerSections">
    <section id="home">
      <h1 class="title">¡Bienvenidos a <b id="colorN">Valka!</b></h1>
      <div class="image-container">
        <div class="image-item">
          <img src="Fondos/0379e7e569f3ccc98110517024f75662.jpg" alt="Image 1">
        </div>
        <div class="image-item">
          <img src="Fondos/a2af2a01775ba8c0cdb4d46612ae2738.jpg" alt="Image 2">
        </div>
        <div class="image-item">
          <img src="Fondos/f03de221715776ee8dcfd7400cc18a2f.jpg" alt="Image 3">
        </div>
      </div>


      <p>Tu destino para el entrenamiento calisténico, el desarrollo personal y más.</p>

    </section>

    <section id="about">
      <h2>¡Descubre lo que quieres lograr con <b id="colorN">Nosotros</b></h2>
      <p>Valka es una empresa dedicada a la calistenia y al desarrollo personal. Ofrecemos información educativa,
        promovemos servicios y vendemos productos para ayudarte a alcanzar tus objetivos.</p>
      <span>Haz clic <a href="/Formularios/form-index.html" id="colorN" style="text-decoration: none;"><b>Aquí</b></a>
        para completar el
        formulario</span>
    </section>

    <section id="services">
      <h2>Servicios</h2>
      <ul>
        <li>Entrenamiento personalizado</li>
        <li>Clases presenciales y en línea</li>
        <li>Consultoría en desarrollo personal</li>
      </ul>
    </section>

    <section id="products">
      <h2>Productos</h2>
      <ul>
        <li>Ropa deportiva</li>
        <li>Accesorios</li>
        <li>Suplementos</li>
      </ul>
    </section>

    <section id="classes">
      <h2>Clases</h2>
      <p>Nuestras clases están diseñadas para todos los niveles, desde principiantes hasta avanzados. Automatiza
        tus
        ejercicios y estiramientos con Valka.</p>
    </section>

    <section id="community">
      <h2>Comunidad</h2>
      <p>Únete a nuestra comunidad y accede a recursos gratuitos que te ayudarán a medir tu progreso y mejorar tu
        rendimiento.</p>
    </section>

    <section id="contact">
      <h2>Contacto</h2>
      <p>¿Tienes preguntas? Contáctanos y estaremos encantados de ayudarte.</p>
      <form action="/submit" method="post" class="form">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="message">Mensaje:</label>
        <textarea id="message" name="message" required></textarea>
        <button type="submit">Enviar</button>
      </form>
    </section>
  </div> -->


  <footer id="foter">
    <div class="footer-container">
      <div class="footer-content">
        <p>&copy; 2024 Valka. Todos los derechos reservados.</p>
        <div class="social-icons">
          <a href="https://www.instagram.com/valka_sw/" target="_blank" class="instagram">
            <img src="componentes/icons8-instagram.svg" alt="WhatsApp" width="24" height="24">
          </a>
          <a href="https://wa.me/tunumero" target="_blank" class="whatsapp">
            <img src="componentes/icons8-whatsapp.svg" alt="WhatsApp" width="24" height="24">
          </a>
        </div>
        <!-- Aquí puedes agregar más contenido al footer si lo deseas -->
      </div>
    </div>
  </footer>

  <script src="script.js"></script>
</body>

</html>