<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../templates/head.php' ?>
    <title>Valka - Rutinas</title>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('menu-items').classList.toggle('hidden');
        });
    </script>
    <style>
        body {
            background: #1a1919;
            height: 100vh;
            color: #f4f4f4;
        }

        #foter {
            bottom: 0;
            position: absolute;
            width: 100%;
        }

        .contenedor {
            display: flex;
            flex-direction: column;
            align-items: center;
            align-content: flex-start;
            justify-content: flex-start;
            margin: 35px 35px;
            flex-wrap: wrap;
        }

        .contenedor__title {
            font-size: 24px;
            margin-top: 30px;
            margin-left: 35px;
            margin-bottom: -20px;
        }

        .container__days {
            background-color: #333;
            padding: 10px 20px;
            margin: 5px 0;
            border-radius: 5px;
            display: flex;
            align-items: center;
            width: 200px;
            justify-content: flex-start;
        }

        .container__days a {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
        }

        .container__days a:hover {
            scale: 1.09;
            filter: blur(.6px);

        }

        .container__days i {
            margin-right: 10px;
        }
    </style>
</head>

<body class=" bg-gray-60">
    <?php include '../templates/header.php'; ?>
    <h1 class="contenedor__title">Seleccione un día de rutina</h1>
    <main class="contenedor">

        <div class="container__days">
            <a href="rutinas-lunes.php" class="text-white flex items-center">
                <i class="fas fa-sun"></i> Lunes
            </a>
        </div>
        <div class="container__days">
            <a href="rutinas-martes.php" class="text-white flex items-center">
                <i class="fas fa-cloud"></i> Martes
            </a>
        </div>
        <div class="container__days">
            <a href="rutinas-miercoles.php" class="text-white flex items-center">
                <i class="fas fa-umbrella"></i> Miércoles
            </a>
        </div>
        <div class="container__days">
            <a href="rutinas-jueves.php" class="text-white flex items-center">
                <i class="fas fa-snowflake"></i> Jueves
            </a>
        </div>
        <div class="container__days">
            <a href="rutinas-viernes.php" class="text-white flex items-center">
                <i class="fas fa-smile"></i> Viernes
            </a>
        </div>
    </main>

    <!-- Asegúrate de incluir Font Awesome para los iconos -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


    <?php include '../templates/footer.php'; ?>
</body>

</html>