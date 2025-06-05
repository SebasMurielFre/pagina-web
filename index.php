<?php
$page_title = "PROINVESTEC SA - Firmas Electrónicas y Certificados Digitales";
include 'includes/header.php';
?>

<main>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary to-primary/80 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center animate-fadeInUp">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Firmas Electrónicas <span class="text-secondary">Seguras</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                    Especialistas en certificados digitales y sistemas de facturación electrónica. Soluciones confiables para
                    personas naturales y jurídicas.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="contacto.php" class="bg-secondary text-black hover:bg-secondary/90 transition-all duration-300 px-8 py-3 rounded-lg font-semibold">
                        Contactar Ahora
                    </a>
                    <a href="productos.php" class="border-2 border-white text-white hover:bg-white hover:text-primary transition-all duration-300 px-8 py-3 rounded-lg font-semibold">
                        Ver Productos
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quiénes Somos -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">¿Quiénes Somos?</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    PROINVESTEC SA es una Autoridad de Registro, calificada como tercero vinculado de ANFAC AUTORIDAD DE CERTIFICACIÓN ECUADOR C.A; acreditada por la Agencia de Regulación y Control de las Telecomunicaciones ARCOTEL para la emisión de certificados de firma electrónica.
                </p>
            </div>
        </div>
    </section>

    <!-- Nuestros Productos -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Nuestros Productos</h2>
                <p class="text-lg text-gray-600">Soluciones digitales para cada necesidad</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <i class="fas fa-file-alt text-4xl text-primary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Persona Natural</h3>
                    <p class="text-gray-600">Certificado digital para personas naturales sin RUC</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <i class="fas fa-users text-4xl text-primary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Persona Natural con RUC</h3>
                    <p class="text-gray-600">Ideal para emprendedores y profesionales independientes</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <i class="fas fa-shield-alt text-4xl text-primary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Persona Jurídica</h3>
                    <p class="text-gray-600">Certificados para empresas y organizaciones</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <i class="fas fa-bolt text-4xl text-primary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Sistema de Facturación</h3>
                    <p class="text-gray-600">Plataforma completa de facturación electrónica</p>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="productos.php" class="bg-primary hover:bg-primary/90 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300">
                    Ver Todos los Productos
                </a>
            </div>
        </div>
    </section>

    <!-- Por Qué Elegirnos -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">¿Por Qué Elegirnos?</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <i class="fas fa-check-circle text-6xl text-secondary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Certificación Oficial</h3>
                    <p class="text-gray-600">Somos una entidad certificadora autorizada por ARCOTEL</p>
                </div>

                <div class="text-center">
                    <i class="fas fa-shield-alt text-6xl text-secondary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Máxima Seguridad</h3>
                    <p class="text-gray-600">Tecnología de encriptación de última generación</p>
                </div>

                <div class="text-center">
                    <i class="fas fa-clock text-6xl text-secondary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Soporte 24/7</h3>
                    <p class="text-gray-600">Atención personalizada todos los días del año</p>
                </div>

                <div class="text-center">
                    <i class="fas fa-users text-6xl text-secondary mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Experiencia Comprobada</h3>
                    <p class="text-gray-600">Más de 10,000 clientes satisfechos nos respaldan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">¿Listo para digitalizar tu empresa?</h2>
            <p class="text-xl mb-8">
                Obtén tu firma electrónica hoy mismo y comienza a firmar documentos de forma segura
            </p>
            <a href="contacto.php" class="bg-secondary text-black hover:bg-secondary/90 transition-all duration-300 px-8 py-3 rounded-lg font-semibold">
                Contactar Ahora
            </a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
