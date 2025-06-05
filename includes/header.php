<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'PROINVESTEC SA'; ?></title>
    <meta name="description" content="PROINVESTEC SA: Líderes en firmas electrónicas, certificados digitales y facturación electrónica en Ecuador. Soluciones 100% seguras y avaladas por el SRI para empresas y personas.">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="firma electrónica Ecuador, certificado digital SRI, facturación electrónica Quito, Proinvestec, comprobantes electrónicos">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#1e3a8a',
                        'secondary': '#fbbf24',
                        'accent': '#000000'
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-24"> <!-- Aumentado de h-16 a h-24 para hacer el header más alto -->
                <div class="flex items-center">
                    <a href="index.php" class="flex items-center">
                        <img src="assets/img/logo-proinvestec.png" alt="PROINVESTEC SA" class="h-16"> <!-- Logo con altura aumentada -->
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="text-gray-700 hover:text-primary px-3 py-2 text-base font-medium transition-colors">Inicio</a>
                    <a href="nosotros.php" class="text-gray-700 hover:text-primary px-3 py-2 text-base font-medium transition-colors">Nosotros</a>
                    <a href="productos.php" class="text-gray-700 hover:text-primary px-3 py-2 text-base font-medium transition-colors">Productos</a>
                    <a href="clientes.php" class="text-gray-700 hover:text-primary px-3 py-2 text-base font-medium transition-colors">Clientes</a>
                    <a href="contacto.php" class="text-gray-700 hover:text-primary px-3 py-2 text-base font-medium transition-colors">Contacto</a>
                    <a href="manuales.php" class="text-gray-700 hover:text-primary px-3 py-2 text-base font-medium transition-colors">Manuales</a>
                    <a href="faq.php" class="text-gray-700 hover:text-primary px-3 py-2 text-base font-medium transition-colors">FAQ</a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-primary">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="md:hidden hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                    <a href="index.php" class="block px-3 py-2 text-gray-700 hover:text-primary text-base">Inicio</a>
                    <a href="nosotros.php" class="block px-3 py-2 text-gray-700 hover:text-primary text-base">Nosotros</a>
                    <a href="productos.php" class="block px-3 py-2 text-gray-700 hover:text-primary text-base">Productos</a>
                    <a href="clientes.php" class="block px-3 py-2 text-gray-700 hover:text-primary text-base">Clientes</a>
                    <a href="contacto.php" class="block px-3 py-2 text-gray-700 hover:text-primary text-base">Contacto</a>
                    <a href="manuales.php" class="block px-3 py-2 text-gray-700 hover:text-primary text-base">Manuales</a>
                    <a href="faq.php" class="block px-3 py-2 text-gray-700 hover:text-primary text-base">FAQ</a>
                </div>
            </div>
        </div>
    </nav>
