<?php
require_once '../config/conexion.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$message = '';
$message_type = ''; // success or error
$redirect = false;  // Controla si debe redirigir

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['usuario_nombre'] = $user['nombre'];
            $_SESSION['tipo_usuario'] = $user['tipo_usuario'];
            $message = "Inicio de sesión exitoso. Bienvenido, " . $user['nombre'];
            $message_type = 'success';
            $redirect = true; // Marca para redirigir después
        } else {
            $message = "Contraseña incorrecta.";
            $message_type = 'error';
        }
    } else {
        $message = "No existe una cuenta con ese email.";
        $message_type = 'error';
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <?php include '../templates/head.php' ?>
    <link rel="stylesheet" href="../assets/Styles/style-form.css">
    <link rel="stylesheet" href="../assets/Styles/style.css">
    <title>Valka - Ingreso</title>

    <script>
        function validarFormulario(event) {
            event.preventDefault(); // Evita que el formulario se envíe automáticamente

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Verificar si los campos están vacíos
            if (email === '' || password === '') {
                alert('Todos los campos son obligatorios.');
                return;
            }

            // Verificar formato de email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Por favor, ingresa un correo electrónico válido.');
                return;
            }

            // Aquí puedes agregar más validaciones si es necesario

            // Si todo es correcto, envía el formulario
            document.getElementById('loginForm').submit();
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('loginForm').addEventListener('submit', validarFormulario);
        });
    </script>

</head>

<body>
    <?php include '../templates/header.php'; ?>

    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-r from-[#1f2937] via-[#2c3e50] to-[#4b5563]">
        <div class="w-full max-w-md p-8 space-y-6 bg-gray-900 rounded-lg shadow-2xl">
            <h2 class="text-3xl font-extrabold text-white text-center">Inicio de Sesión</h2>

            <!-- Muestra el mensaje de éxito o error -->
            <?php if (!empty($message)): ?>
                <div id="message" class="p-4 mb-4 rounded-lg 
                <?php echo $message_type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'; ?> 
                transition transform duration-300 ease-in-out">
                    <p class="text-center font-semibold"><?php echo $message; ?></p>
                </div>
            <?php endif; ?>

            <form id="loginForm" action="" method="post" class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email:</label>
                    <input type="email" id="email" name="email" required
                        class="w-full mt-1 px-4 py-2 bg-gray-800 text-gray-300 border border-gray-700 rounded-md focus:ring-orange-500 focus:border-orange-500" />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Contraseña:</label>
                    <input type="password" id="password" name="password" required
                        class="w-full mt-1 px-4 py-2 bg-gray-800 text-gray-300 border border-gray-700 rounded-md focus:ring-orange-500 focus:border-orange-500" />
                </div>
                <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
                    Iniciar Sesión
                </button>
                <div class="text-center">
                    <span class="text-gray-400">¿No tienes cuenta?
                        <a href="register.php" class="text-orange-500 hover:underline font-bold">¡Regístrate aquí!</a>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <!-- Animación con JavaScript para que el mensaje se desplace hacia arriba y desaparezca luego de unos segundos -->
    <script>
        setTimeout(() => {
            const message = document.getElementById('message');
            if (message) {
                message.classList.add('opacity-0', 'translate-y-4');
                setTimeout(() => message.style.display = 'none', 600); // 600ms para coincidir con la transición
            }
        }, 4000); // Desaparece después de 4 segundos

        // Redirige si el login fue exitoso después de 2 segundos
        <?php if ($redirect): ?>
            setTimeout(() => {
                window.location.href = '../usuario/index.php'; // Cambia la URL a la página deseada
            }, 2000);
        <?php endif; ?>
    </script>

    <?php include '../templates/footer.php'; ?>
</body>

</html>