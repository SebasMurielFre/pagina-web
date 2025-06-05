<?php
$page_title = "Nosotros - PROINVESTEC SA";
include 'includes/header.php';

$teamMembers = [
    [
        'name' => 'Catalina Freire',
        'position' => 'Gerente General',
        'experience' => '6 años',
        'specialization' => 'Dirección Estratégica y Liderazgo Organizacional',
        'linkedin' => 'https://linkedin.com',
        'photo' => 'assets/img/team/catalina-freire.png'
    ],
    [
        'name' => 'Dalma Roqué',
        'position' => 'Asesora Comercial',
        'experience' => '5 años',
        'specialization' => 'Desarrollo de Estrategias de Ventas y Fidelización de Clientes',
        'linkedin' => 'https://www.linkedin.com/in/dalma-roqu%C3%A9-p%C3%A9rez-475b1b20b?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_contact_details%3BUZbyQdnbSfSHb3SyFYPmZQ%3D%3D',
        'photo' => 'assets/img/team/dalma-roque.jpeg'
    ],
    [
        'name' => 'Sebastián Muriel',
        'position' => 'Gerente de TI',
        'experience' => '4 años',
        'specialization' => 'Desarrollo de Software y Ciberseguridad',
        'linkedin' => 'https://www.linkedin.com/public-profile/settings?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_self_edit_contact-info%3BGnKVtX95RFyfViiAIs%2BZig%3D%3D',
        'photo' => 'assets/img/team/sebastian-muriel.jpeg'
    ]
];

$values = [
    [
        'icon' => 'fas fa-award',
        'title' => 'Excelencia',
        'description' => 'Nos comprometemos a brindar servicios de la más alta calidad, superando las expectativas de nuestros clientes.'
    ],
    [
        'icon' => 'fas fa-heart',
        'title' => 'Confidencialidad',
        'description' => 'Protegemos la información de nuestros clientes con los más altos estándares de seguridad y privacidad.'
    ],
    [
        'icon' => 'fas fa-bullseye',
        'title' => 'Compromiso',
        'description' => 'Estamos dedicados al éxito de nuestros clientes, ofreciendo soluciones personalizadas y efectivas.'
    ],
    [
        'icon' => 'fas fa-eye',
        'title' => 'Innovación',
        'description' => 'Adoptamos las últimas tecnologías para ofrecer soluciones digitales de vanguardia.'
    ]
];
?>

<main>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary to-primary/80 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Nosotros</h1>
                <p class="text-xl max-w-3xl mx-auto">
                    Conoce más sobre PROINVESTEC SA, nuestra historia, equipo y valores
                </p>
            </div>
        </div>
    </section>

    <!-- Sobre la Empresa -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-primary mb-6">¿Qué es PROINVESTEC SA?</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        PROINVESTEC SA es una empresa ecuatoriana especializada en la emisión de certificados digitales y firmas
                        electrónicas, así como en el desarrollo de sistemas de facturación electrónica. Fundada con el objetivo
                        de digitalizar los procesos empresariales, nos hemos consolidado como líderes en el mercado
                        de certificación digital.
                    </p>
                    <p class="text-lg text-gray-600">
                        Nos enfocamos en brindar soluciones tecnológicas seguras, confiables y fáciles de usar, que permitan a
                        nuestros clientes optimizar sus procesos de negocio y cumplir con las normativas legales vigentes en
                        materia de documentos electrónicos.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="assets/img/firma-electronica-ilustracion.png" 
                         alt="Firma Electrónica - PROINVESTEC SA" 
                         class="rounded-lg shadow-lg w-full max-w-md hover:scale-105 transition-transform duration-300">
                </div>
            </div>
        </div>
    </section>

    <!-- Misión y Visión -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Misión -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-blue-200">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-500 p-3 rounded-full mr-4">
                            <i class="fas fa-bullseye text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-blue-800">Misión</h3>
                    </div>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Facilitar la transformación digital de empresas y personas mediante la provisión de certificados
                        digitales y firmas electrónicas seguras, contribuyendo al desarrollo tecnológico del país y la
                        modernización de los procesos documentales.
                    </p>
                </div>

                <!-- Visión -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-green-200">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-500 p-3 rounded-full mr-4">
                            <i class="fas fa-eye text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-green-800">Visión</h3>
                    </div>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Ser la empresa líder en certificación digital en Ecuador, reconocida por la excelencia en nuestros
                        servicios, la innovación tecnológica y nuestro compromiso con la seguridad y confiabilidad de las
                        soluciones que ofrecemos.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Equipo -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Nuestro Equipo</h2>
                <p class="text-lg text-gray-600">Profesionales altamente capacitados comprometidos con tu éxito</p>
            </div>

            <!-- Contenedor centrado para las tarjetas -->
            <div class="flex justify-center">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl">
                    <?php foreach ($teamMembers as $member): ?>
                        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                            <div class="mb-4 overflow-hidden rounded-full w-40 h-40 mx-auto border-4 border-gray-100 shadow-md">
                                <img src="<?php echo htmlspecialchars($member['photo']); ?>" 
                                     alt="<?php echo htmlspecialchars($member['name']); ?>" 
                                     class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                            </div>
                            <h3 class="text-xl font-bold mb-2"><?php echo htmlspecialchars($member['name']); ?></h3>
                            <p class="text-primary font-semibold mb-2"><?php echo htmlspecialchars($member['position']); ?></p>
                            <p class="text-sm text-gray-600 mb-2">
                                <strong>Experiencia:</strong> <?php echo htmlspecialchars($member['experience']); ?>
                            </p>
                            <p class="text-sm text-gray-600 mb-4">
                                <strong>Especialización:</strong> <?php echo htmlspecialchars($member['specialization']); ?>
                            </p>
                            <a href="<?php echo htmlspecialchars($member['linkedin']); ?>" target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center bg-white border border-gray-300 text-gray-700 hover:bg-primary hover:text-white px-4 py-2 rounded-md transition-colors">
                                <i class="fab fa-linkedin mr-2"></i>LinkedIn
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Valores -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Nuestros Valores</h2>
                <p class="text-lg text-gray-600">Los principios que guían nuestro trabajo diario</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php 
                $valueColors = [
                    ['from' => 'purple-50', 'to' => 'purple-100', 'border' => 'purple-200', 'icon' => 'purple-500', 'text' => 'purple-800'],
                    ['from' => 'pink-50', 'to' => 'pink-100', 'border' => 'pink-200', 'icon' => 'pink-500', 'text' => 'pink-800'],
                    ['from' => 'indigo-50', 'to' => 'indigo-100', 'border' => 'indigo-200', 'icon' => 'indigo-500', 'text' => 'indigo-800'],
                    ['from' => 'teal-50', 'to' => 'teal-100', 'border' => 'teal-200', 'icon' => 'teal-500', 'text' => 'teal-800']
                ];
                ?>
                <?php foreach ($values as $index => $value): ?>
                    <?php $colors = $valueColors[$index]; ?>
                    <div class="bg-gradient-to-br from-<?php echo $colors['from']; ?> to-<?php echo $colors['to']; ?> p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 text-center border border-<?php echo $colors['border']; ?>">
                        <div class="bg-<?php echo $colors['icon']; ?> p-3 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <i class="<?php echo $value['icon']; ?> text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-<?php echo $colors['text']; ?>"><?php echo htmlspecialchars($value['title']); ?></h3>
                        <p class="text-gray-700"><?php echo htmlspecialchars($value['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Estadísticas -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Nuestros Logros</h2>
                <p class="text-lg text-gray-600">Números que reflejan nuestro compromiso y experiencia</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200">
                    <h3 class="text-4xl font-bold text-blue-600 mb-2">5,000+</h3>
                    <p class="text-gray-700 font-semibold">Clientes Satisfechos</p>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl border border-green-200">
                    <h3 class="text-4xl font-bold text-green-600 mb-2">5,000+</h3>
                    <p class="text-gray-700 font-semibold">Certificados Emitidos</p>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl border border-purple-200">
                    <h3 class="text-4xl font-bold text-purple-600 mb-2">99.9%</h3>
                    <p class="text-gray-700 font-semibold">Tiempo de Actividad</p>
                </div>
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-xl border border-orange-200">
                    <h3 class="text-4xl font-bold text-orange-600 mb-2">5</h3>
                    <p class="text-gray-700 font-semibold">Años de Experiencia</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">¿Quieres formar parte de nuestro equipo?</h2>
            <p class="text-xl mb-8">Únete a nosotros y ayuda a transformar el futuro digital de Ecuador</p>
            <a href="contacto.php" class="bg-secondary text-black hover:bg-secondary/90 transition-all duration-300 px-8 py-3 rounded-lg font-semibold">
                Contáctanos
            </a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
