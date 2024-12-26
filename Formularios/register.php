<?php

include_once '../persistencia/usuarioBD.php'

    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include '../templates/head.php' ?>
    <link rel="stylesheet" href="../assets/Styles/style-form.css">
    <link rel="stylesheet" href="../assets/Styles/style.css">
    <title>Valka - Registro</title>

</head>

<?php include '../templates/header.php' ?>


<body>

    <div
        class="min-h-screen max-w-full flex items-center justify-center bg-gradient-to-r from-[#1f2937] via-[#2c3e50] to-[#4b5563]">
        <div
            class="w-full  max-w-md p-8 space-y-6 bg-gray-900 rounded-lg shadow-2xl transform transition duration-300 hover:scale-105">
            <h2 class="text-3xl font-extrabold text-white text-center">Registro de Usuario</h2>
            <form id="registerForm" action="../logica/procesar_register.php" method="post" class="space-y-4">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-300">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required
                        class="w-full mt-1 px-4 py-2 bg-gray-800 text-gray-300 border border-gray-700 rounded-md focus:ring-orange-500 focus:border-orange-500 transition duration-150" />
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email:</label>
                    <input type="email" id="email" name="email" required
                        class="w-full mt-1 px-4 py-2 bg-gray-800 text-gray-300 border border-gray-700 rounded-md focus:ring-orange-500 focus:border-orange-500 transition duration-150" />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Contraseña:</label>
                    <input type="password" id="password" name="password" required
                        class="w-full mt-1 px-4 py-2 bg-gray-800 text-gray-300 border border-gray-700 rounded-md focus:ring-orange-500 focus:border-orange-500 transition duration-150" />
                </div>
                <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-md transition duration-200 shadow-md hover:shadow-lg">
                    Registrar
                </button>
                <div class="text-center">
                    <span class="text-gray-400">¿Ya tienes cuenta?
                        <a href="login.php" class="text-orange-500 hover:underline font-bold">¡Inicia Sesión aquí!</a>
                    </span>
                </div>
            </form>
        </div>
    </div>



    <?php include '../templates/footer.php' ?>
</body>

</html>