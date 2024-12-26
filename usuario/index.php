<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="stylesheet" href="../Styles/style.css">
  <?php include '../templates/head.php' ?>
  <title>Valka - Entrenamiento Calisténico</title>
</head>

<body class="bg-[#1a1a1a]">

  <?php include '../templates/header.php'; ?>
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
      <img src="../assets/imagenes/login2.png" alt="Background image"
        class="absolute inset-0 w-full h-full object-cover">
      <div class="relative text-center text-white">
        <h1 class="text-10xl md:text-8xl font-extrabold font-baloo uppercase tracking-tight leading-none">
          <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-200 to-orange-500">
            Valka Workout
          </span>
        </h1>
      </div>
    </div>
  </main>




  <?php include '../templates/footer.php'; ?>


  <script src="../script.js"></script>
</body>

</html>