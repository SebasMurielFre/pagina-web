<?php
$page_title = "Productos - PROINVESTEC SA";
include 'includes/header.php';

$products = [
    [
        'title' => 'Firma Electrónica - Persona Natural',
        'description' => 'Certificado digital para personas naturales sin RUC',
        'icon' => 'fas fa-file-alt',
        'features' => [
            'Validez legal completa',
            'Fácil instalación',
            'Compatible con todos los navegadores',
            'Vigencia de 3 años'
        ],
        'requirements' => [
            'DNI vigente',
            'Correo electrónico personal',
            'Número de teléfono móvil',
            'Foto actual tipo carnet'
        ],
        'price' => 'Desde S/ 150'
    ],
    [
        'title' => 'Firma Electrónica - Persona Natural con RUC',
        'description' => 'Ideal para emprendedores y profesionales independientes',
        'icon' => 'fas fa-users',
        'features' => [
            'Incluye datos del RUC',
            'Perfecta para facturación',
            'Respaldo legal completo',
            'Soporte técnico incluido'
        ],
        'requirements' => [
            'DNI vigente',
            'RUC activo y habido',
            'Constancia de inscripción en SUNAT',
            'Correo electrónico empresarial',
            'Poder vigente (si aplica)'
        ],
        'price' => 'Desde S/ 200'
    ],
    [
        'title' => 'Firma Electrónica - Persona Jurídica',
        'description' => 'Certificados para empresas y organizaciones',
        'icon' => 'fas fa-building',
        'features' => [
            'Múltiples representantes',
            'Gestión centralizada',
            'Reportes de uso',
            'Integración con sistemas ERP'
        ],
        'requirements' => [
            'Ficha RUC actualizada',
            'Vigencia de poderes',
            'DNI del representante legal',
            'Constitución de la empresa',
            'Última declaración jurada'
        ],
        'price' => 'Desde S/ 350'
    ],
    [
        'title' => 'Sistema de Facturación Electrónica',
        'description' => 'Plataforma completa de facturación electrónica',
        'icon' => 'fas fa-bolt',
        'features' => [
            'Emisión automática',
            'Integración con SUNAT',
            'Reportes en tiempo real',
            'Almacenamiento en la nube'
        ],
        'requirements' => [
            'RUC activo',
            'Clave SOL de SUNAT',
            'Certificado digital',
            'Conexión a internet estable'
        ],
        'price' => 'Desde S/ 50/mes'
    ]
];

$whyChooseUs = [
    [
        'icon' => 'fas fa-handshake',
        'title' => 'Atención Personalizada',
        'description' => 'Cada cliente recibe un trato único y personalizado según sus necesidades específicas'
    ],
    [
        'icon' => 'fas fa-lock',
        'title' => 'Confidencialidad Total',
        'description' => 'Protegemos tu información con los más altos estándares de seguridad y privacidad'
    ],
    [
        'icon' => 'fas fa-phone',
        'title' => 'Soporte 24/7',
        'description' => 'Nuestro equipo técnico está disponible las 24 horas para resolver cualquier consulta'
    ],
    [
        'icon' => 'fas fa-award',
        'title' => 'Certificación Oficial',
        'description' => 'Somos una entidad certificadora autorizada y reconocida por INDECOPI'
    ],
    [
        'icon' => 'fas fa-shield-alt',
        'title' => 'Máxima Seguridad',
        'description' => 'Utilizamos tecnología de encriptación de última generación para proteger tus documentos'
    ],
    [
        'icon' => 'fas fa-clock',
        'title' => 'Entrega Rápida',
        'description' => 'Procesamos y entregamos tu certificado digital en menos de 24 horas hábiles'
    ]
];
?>

<main>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary to-primary/80 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Nuestros Productos</h1>
                <p class="text-xl max-w-3xl mx-auto">
                    Soluciones digitales completas para todas tus necesidades de certificación
                </p>
            </div>
        </div>
    </section>

    <!-- Productos -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-16">
                <?php foreach ($products as $index => $product): ?>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center <?php echo $index % 2 === 1 ? 'lg:flex-row-reverse' : ''; ?>">
                        <div class="<?php echo $index % 2 === 1 ? 'lg:order-2' : ''; ?>">
                            <div class="bg-white p-8 rounded-lg shadow-lg">
                                <div class="flex items-center mb-6">
                                    <i class="<?php echo $product['icon']; ?> text-4xl text-primary mr-4"></i>
                                    <div>
                                        <h3 class="text-2xl font-bold"><?php echo htmlspecialchars($product['title']); ?></h3>
                                        <p class="text-lg text-gray-600"><?php echo htmlspecialchars($product['description']); ?></p>
                                    </div>
                                </div>
                                
                                <div class="mb-6">
                                    <h4 class="font-semibold text-lg mb-3">Características:</h4>
                                    <ul class="space-y-2">
                                        <?php foreach ($product['features'] as $feature): ?>
                                            <li class="flex items-center">
                                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                                <span><?php echo htmlspecialchars($feature); ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                
                                <div class="mb-6">
                                    <p class="text-2xl font-bold text-primary"><?php echo htmlspecialchars($product['price']); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="<?php echo $index % 2 === 1 ? 'lg:order-1' : ''; ?>">
                            <div class="bg-white p-8 rounded-lg shadow-lg">
                                <h4 class="text-xl font-bold mb-4">Requisitos para <?php echo htmlspecialchars($product['title']); ?></h4>
                                <ul class="space-y-3">
                                    <?php foreach ($product['requirements'] as $requirement): ?>
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-secondary mr-2 mt-1"></i>
                                            <span><?php echo htmlspecialchars($requirement); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Por Qué Elegirnos -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">¿Por Qué Elegirnos?</h2>
                <p class="text-lg text-gray-600">
                    Razones que nos convierten en tu mejor opción para certificación digital
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($whyChooseUs as $reason): ?>
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                        <i class="<?php echo $reason['icon']; ?> text-6xl text-secondary mb-4"></i>
                        <h3 class="text-xl font-bold mb-4"><?php echo htmlspecialchars($reason['title']); ?></h3>
                        <p class="text-gray-600"><?php echo htmlspecialchars($reason['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">¿Necesitas ayuda para elegir?</h2>
            <p class="text-xl mb-8">Nuestros expertos te ayudarán a encontrar la solución perfecta para ti</p>
            <a href="contacto.php" class="bg-secondary text-black hover:bg-secondary/90 px-8 py-3 rounded-lg font-semibold transition-all duration-300">
                Contactar Asesor
            </a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
