<?php
$page_title = "Preguntas Frecuentes - PROINVESTEC SA";
include 'includes/header.php';

$faqCategories = [
    'general' => [
        'title' => 'Información General',
        'icon' => 'fas fa-question-circle',
        'faqs' => [
            [
                'question' => '¿Qué es una firma electrónica?',
                'answer' => 'Una firma electrónica es un mecanismo criptográfico que permite identificar al firmante de un documento electrónico y garantizar que el contenido no ha sido modificado desde el momento de la firma.'
            ],
            [
                'question' => '¿Para qué sirve un certificado digital?',
                'answer' => 'Un certificado digital sirve para identificar de manera única a una persona o entidad en el mundo digital, permitiendo firmar documentos electrónicos, autenticarse en sistemas y cifrar información de manera segura.'
            ],
            [
                'question' => '¿Es legal firmar documentos con firma electrónica en Ecuador?',
                'answer' => 'Sí, en Ecuador es legal firmar documentos con firma electrónica avanzada (certificada por un proveedor autorizado por ARCOTEL), que tiene la misma validez que una firma manuscrita según la Ley de Comercio Electrónico (2002-67). La firma electrónica simple también es válida, pero con menor fuerza probatoria. Se usa en trámites públicos, contratos y facturas electrónicas.'
            ]
        ]
    ],
    'uso' => [
        'title' => 'Uso y Aplicación',
        'icon' => 'fas fa-file-alt',
        'faqs' => [
            [
                'question' => '¿Cómo uso mi firma electrónica?',
                'answer' => 'Para usar tu firma electrónica, debes instalar el certificado en tu dispositivo, abrir el documento que deseas firmar con un software compatible como Adobe Reader o Firma EC y seleccionar la opción de firma digital.'
            ],
            [
                'question' => '¿Cómo verifico si un documento está firmado correctamente?',
                'answer' => 'Puedes verificar la firma abriendo el documento firmado en Adobe Reader o en el aplicativo de Firma EC. Aparecerá un ícono que indica si la firma es válida y quién la realizó.'
            ]
        ]
    ],
    'seguridad' => [
        'title' => 'Seguridad',
        'icon' => 'fas fa-shield-alt',
        'faqs' => [
            [
                'question' => '¿Qué pasa si olvido la contraseña de mi certificado?',
                'answer' => 'Si olvidas la contraseña de tu certificado, podrás recuperar a través del código PUK. En el caso de ya no tenerlo deberá solicitar la emisión de un nuevo certificado. Por seguridad, las contraseñas no son almacenadas en nuestros servidores.'
            ],
            [
                'question' => '¿Puedo usar mi certificado en varios dispositivos?',
                'answer' => 'Sí, puedes instalar tu certificado en múltiples dispositivos (computadora, laptop, tablet). Te proporcionamos instrucciones detalladas para cada tipo de dispositivo.'
            ],
            [
                'question' => '¿Qué pasa si mi certificado es comprometido?',
                'answer' => 'Si sospechas que tu certificado ha sido comprometido, contacta inmediatamente a nuestro soporte para revocar el certificado actual y emitir uno nuevo.'
            ]
        ]
    ],
    'movil' => [
        'title' => 'Dispositivos Móviles',
        'icon' => 'fas fa-mobile-alt',
        'faqs' => [
            [
                'question' => '¿Puedo firmar documentos desde mi celular?',
                'answer' => 'Sí, existe diferentes aplicativos móviles que te permite firmar documentos desde tu smartphone o tablet de manera segura y fácil.'
            ]
        ]
    ],
    'gestion' => [
        'title' => 'Gestión y Soporte',
        'icon' => 'fas fa-cogs',
        'faqs' => [
            [
                'question' => '¿Cuánto tiempo dura un certificado digital?',
                'answer' => 'Los certificados digitales tienen una vigencia de acuerdo al tiempo que fue contratada la firma electrónica, ya sea para personas naturales y jurídicas. Antes del vencimiento, te notificaremos para renovarlo.'
            ],
            [
                'question' => '¿Cómo renuevo mi certificado digital?',
                'answer' => 'Te notificaremos 60 días antes del vencimiento. Puedes renovar contactando a nuestro equipo de soporte.'
            ],
            [
                'question' => '¿Puedo revocar mi certificado digital?',
                'answer' => 'Sí, puedes solicitar la revocación de tu certificado en caso de compromiso de seguridad, pérdida del dispositivo, o cambio de datos personales.'
            ],
            [
                'question' => '¿Qué soporte técnico ofrecen?',
                'answer' => 'Ofrecemos soporte técnico 24/7 a través de teléfono, email, chat en línea y WhatsApp. También tenemos documentación detallada.'
            ]
        ]
    ]
];

// Obtener categoría seleccionada
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'all';

// Filtrar FAQs
$filteredFAQs = [];
foreach ($faqCategories as $categoryId => $category) {
    foreach ($category['faqs'] as $faq) {
        $faq['categoryId'] = $categoryId;
        $faq['categoryTitle'] = $category['title'];
        
        // Aplicar filtro de categoría
        if ($selectedCategory === 'all' || $selectedCategory === $categoryId) {
            $filteredFAQs[] = $faq;
        }
    }
}
?>

<main>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary to-primary/80 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Preguntas Frecuentes</h1>
                <p class="text-xl max-w-3xl mx-auto">
                    Encuentra respuestas a las preguntas más comunes sobre firmas electrónicas
                </p>
            </div>
        </div>
    </section>

    <!-- Filtros -->
    <section class="py-8 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="GET" class="flex flex-col gap-4">
                <div class="flex flex-wrap gap-2">
                    <button type="submit" name="category" value="all" 
                            class="px-4 py-2 rounded-md font-semibold transition-colors <?php echo $selectedCategory === 'all' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-primary hover:text-white'; ?>">
                        Todas
                    </button>
                    <?php foreach ($faqCategories as $categoryId => $category): ?>
                        <button type="submit" name="category" value="<?php echo $categoryId; ?>" 
                                class="px-4 py-2 rounded-md font-semibold transition-colors flex items-center <?php echo $selectedCategory === $categoryId ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-primary hover:text-white'; ?>">
                            <i class="<?php echo $category['icon']; ?> mr-2"></i>
                            <?php echo htmlspecialchars($category['title']); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php if (empty($filteredFAQs)): ?>
                <div class="text-center py-12">
                    <p class="text-gray-600 text-lg">No se encontraron preguntas en esta categoría.</p>
                </div>
            <?php else: ?>
                <div class="space-y-4">
                    <?php foreach ($filteredFAQs as $index => $faq): ?>
                        <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="faq-question p-6 cursor-pointer" onclick="toggleFAQ(<?php echo $index; ?>)">
                                <div class="flex items-center justify-between">
                                    <div class="text-left">
                                        <h3 class="text-lg font-semibold"><?php echo htmlspecialchars($faq['question']); ?></h3>
                                    </div>
                                    <i id="icon-<?php echo $index; ?>" class="fas fa-chevron-down text-primary"></i>
                                </div>
                            </div>
                            <div id="answer-<?php echo $index; ?>" class="faq-answer hidden px-6 pb-6">
                                <p class="text-gray-600 leading-relaxed"><?php echo htmlspecialchars($faq['answer']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">¿No encontraste lo que buscabas?</h2>
            <p class="text-xl text-gray-600 mb-8">
                Nuestro equipo de soporte está listo para ayudarte con cualquier consulta
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <div class="bg-white p-6 max-w-sm rounded-lg shadow-lg">
                    <h3 class="text-lg font-bold mb-2">Soporte Técnico</h3>
                    <p class="text-gray-600 mb-4">Disponible 24/7 para resolver tus dudas técnicas</p>
                    <p class="font-semibold">ventas@proinvestec.com.ec</p>
                    <p class="font-semibold">+593 093 902 2211</p>
                </div>

                <div class="bg-white p-6 max-w-sm rounded-lg shadow-lg">
                    <h3 class="text-lg font-bold mb-2">Asesoría Comercial</h3>
                    <p class="text-gray-600 mb-4">Te ayudamos a elegir el producto ideal para ti</p>
                    <p class="font-semibold">ventas@proinvestec.com.ec</p>
                    <p class="font-semibold">+593 093 902 2211</p>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
function toggleFAQ(index) {
    const answer = document.getElementById('answer-' + index);
    const icon = document.getElementById('icon-' + index);
    
    if (answer.classList.contains('hidden')) {
        answer.classList.remove('hidden');
        icon.classList.remove('fa-chevron-down');
        icon.classList.add('fa-chevron-up');
    } else {
        answer.classList.add('hidden');
        icon.classList.remove('fa-chevron-up');
        icon.classList.add('fa-chevron-down');
    }
}
</script>

<?php include 'includes/footer.php'; ?>
