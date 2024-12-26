<?php include $_SERVER['DOCUMENT_ROOT'] . '/valka/config/config.php'; ?>

<header class="bg-[#1a1a1a]   relative z-50">
    <nav class="container mx-auto px-4 py-3">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="flex items-center justify-between">
                <a href="<?php echo BASE_URL; ?>index.php" class="text-xl font-bold text-white transition duration-300"
                    aria-label="Inicio">
                    <!-- Imagen del logo -->
                    <img src="<?php echo BASE_URL; ?>assets/imagenes/LOGO(VALKA).webp"
                        onerror="this.onerror=null; this.src='assets/imagenes/LOGO(VALKA).webp';" alt="Logo Inicio"
                        class="h-8 w-auto mr-2">
                </a>
                <button class="md:hidden focus:outline-none" id="menu-toggle" aria-label="Toggle menu">
                    <i class="fas fa-bars text-white"></i>
                </button>
            </div>
            <div class="hidden md:flex flex-col md:flex-row mt-4 md:mt-0 space-y-4 md:space-y-0 md:space-x-6 justify-center items-center"
                id="menu-items">
                <a href="<?php echo BASE_URL; ?>aboutme.php" id="enlace"
                    class="text-white transition duration-300 hover:bg-[#26261f] px-3 py-2 rounded-md"
                    aria-label="Sobre mí">
                    <i class="fas fa-user mr-2"></i>Sobre mí
                </a>
                <div class="relative group">
                    <button
                        class="text-white transition duration-300 hover:bg-[#26261f] px-3 py-2 rounded-md flex items-center"
                        aria-haspopup="true" aria-expanded="false">
                        <span>Rutinas</span>
                        <i
                            class="fas fa-chevron-down ml-2 transform group-hover:rotate-180 transition duration-300"></i>
                    </button>
                    <div
                        class="absolute left-0 mt-0 w-48 rounded-md bg-[#26261f] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300">
                        <div class="py-1" role="menu" aria-orientation="vertical">
                            <a href="<?php echo BASE_URL; ?>Rutinas/rutinas.php"
                                class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md"
                                role="menuitem">Rutinas</a>
                            <a href="#" class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md"
                                role="menuitem">Planificador Semanal</a>
                            <a href="#" class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md"
                                role="menuitem">Objetivos Mensuales</a>
                        </div>
                    </div>
                </div>
                <a href="#" class="text-white transition duration-300 hover:bg-[#26261f] px-3 py-2 rounded-md"
                    aria-label="Cuestionario Exclusivo">
                    <i class="fas fa-clipboard-list mr-2"></i>Cuestionario
                </a>
                <div class="relative group">
                    <button
                        class="text-white transition duration-300 hover:bg-[#26261f] px-3 py-2 rounded-md flex items-center"
                        aria-haspopup="true" aria-expanded="false">
                        <span>Cuenta</span>
                        <i
                            class="fas fa-chevron-down ml-2 transform group-hover:rotate-180 transition duration-300"></i>
                    </button>
                    <div
                        class="absolute left-0 mt-0 w-48 rounded-md bg-[#26261f] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300">
                        <div class="py-1" role="menu" aria-orientation="vertical">
                            <a href="<?php echo BASE_URL; ?>usuario/perfil.php"
                                class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md"
                                role="menuitem">Perfil</a>
                            <a href="#" class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md"
                                role="menuitem">Configuración</a>
                            <a href="<?php echo BASE_URL; ?>logica/cerrar-sesion.php"
                                class="block px-4 py-2 text-white hover:bg-[#26261f] rounded-md" role="menuitem">Cerrar
                                sesión</a>
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