<?php
$page_title = "Manuales y Tutoriales - PROINVESTEC SA";
include 'includes/header.php';

// Configuración de paginación
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 6;
$offset = ($page - 1) * $per_page;

// Array completo de manuales
$all_manuals = [
    [
        'id' => '1',
        'title' => 'Manual de Activación de Contraseñas',
        'description' => 'Guía paso a paso para activar contraseñas de la firma electrónica.',
        'icon' => 'fas fa-desktop',
        'type' => 'PDF',
        'updated' => '2022-01-15'
    ],
    [
        'id' => '2',
        'title' => 'Manual de Descarga y Uso de la Firma Electrónica - Windows',
        'description' => 'Instrucciones detalladas para descargar y usar la firma electrónica en Windows.',
        'icon' => 'fas fa-desktop',
        'type' => 'PDF',
        'updated' => '2022-01-15'
    ],
    [
        'id' => '3',
        'title' => 'Manual para Identificar Firmas Desconocidas',
        'description' => 'Instrucciones detalladas para reconocer firmas desconocidas en Adobe Reader.',
        'icon' => 'fas fa-desktop',
        'type' => 'PDF',
        'updated' => '2020-04-21'
    ],
    [
        'id' => '4',
        'title' => 'Manual para cambio de Extensión .PFX a .P12',
        'description' => 'Instrucciones detalladas para cambiar el formato del certificado de firma electrónica.',
        'icon' => 'fas fa-desktop',
        'type' => 'PDF',
        'updated' => '2021-07-01'
    ],
    [
        'id' => '5',
        'title' => 'Manual Configuración de  Firma EC en iOS',
        'description' => 'Guía para uso de Firma EC para dispositivos iOS.',
        'icon' => 'fas fa-desktop',
        'type' => 'PDF',
        'updated' => '2022-01-15'
    ],
    [
        'id' => '6',
        'title' => 'Manual para Desbloquear Contraseña PIN',
        'description' => 'Guía para desbloquear PIN a través del uso del PUK.',
        'icon' => 'fas fa-desktop',
        'type' => 'PDF',
        'updated' => '2020-04-21'
    ],
    [
        'id' => '7',
        'title' => 'Manual Uso Firma EC',
        'description' => 'Guía de uso de Firma EC para diferentes Sistemas Operativos.',
        'icon' => 'fas fa-desktop',
        'type' => 'PDF',
        'updated' => '2020-10-01'
    ],
    [
        'id' => '8',
        'title' => 'Manual Recuperación Contraseña Plataforma',
        'description' => 'Guía que permite recuperar contraseña para acceso a la plataforma de ANFAC.',
        'icon' => 'fas fa-desktop',
        'type' => 'PDF',
        'updated' => '2022-01-15'
    ]
];

// Calcular paginación
$total_manuals = count($all_manuals);
$total_pages = max(1, ceil($total_manuals / $per_page)); // Asegurar al menos 1 página

// Validar página actual
if ($page < 1) $page = 1;
if ($page > $total_pages) $page = $total_pages;

// Obtener manuales para la página actual
$manuals = array_slice($all_manuals, $offset, $per_page);
?>

<main>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary to-primary/80 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Manuales y Tutoriales</h1>
                <p class="text-xl max-w-3xl mx-auto">
                    Descarga nuestros manuales detallados y aprende a usar tu firma electrónica
                </p>
                <div class="mt-6 text-lg">
                    <span class="bg-white/20 px-4 py-2 rounded-full">
                        📚 <?php echo $total_manuals; ?> manuales disponibles
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Manuales Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Documentación Disponible</h2>
                <p class="text-lg text-gray-600">
                    Encuentra toda la información que necesitas para instalar y usar tu certificado digital
                </p>
                <div class="mt-4 text-sm text-gray-500">
                    Mostrando <?php echo count($manuals); ?> de <?php echo $total_manuals; ?> manuales 
                    (Página <?php echo $page; ?> de <?php echo $total_pages; ?>)
                </div>
            </div>

            <?php if (empty($manuals)): ?>
                <div class="text-center py-12">
                    <i class="fas fa-file-alt text-6xl text-gray-400 mb-4"></i>
                    <p class="text-lg text-gray-600">No hay manuales disponibles en esta página.</p>
                    <a href="?page=1" class="mt-4 inline-block bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg transition-colors">
                        Ir a la primera página
                    </a>
                </div>
            <?php else: ?>
                <!-- Grid de manuales -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    <?php foreach ($manuals as $manual): ?>
                        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                            <div class="flex items-center mb-4">
                                <i class="<?php echo $manual['icon']; ?> text-4xl text-primary mr-4"></i>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold"><?php echo htmlspecialchars($manual['title']); ?></h3>
                                    <div class="flex items-center space-x-2 mt-1">
                                        <span class="text-xs bg-secondary text-black px-2 py-1 rounded"><?php echo htmlspecialchars($manual['type']); ?></span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($manual['description']); ?></p>
                            <div class="text-xs text-gray-500 mb-4">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                Actualizado: <?php echo date('d/m/Y', strtotime($manual['updated'])); ?>
                            </div>
                            <button onclick="downloadManual('<?php echo htmlspecialchars($manual['id']); ?>', '<?php echo htmlspecialchars($manual['title']); ?>')" 
                                    class="w-full bg-primary hover:bg-primary/90 text-white py-2 rounded-md font-semibold transition-colors flex items-center justify-center">
                                <i class="fas fa-download mr-2"></i>Descargar Manual
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Paginación - Siempre visible incluso con pocos manuales -->
                <div class="flex flex-col items-center space-y-4">
                    <!-- Información de paginación -->
                    <div class="text-sm text-gray-600">
                        Página <?php echo $page; ?> de <?php echo $total_pages; ?> 
                        (<?php echo $total_manuals; ?> manuales en total)
                    </div>
                    
                    <!-- Controles de paginación -->
                    <div class="flex justify-center items-center space-x-2">
                        <!-- Botón Primera página -->
                        <a href="?page=1" class="bg-white border border-gray-300 text-gray-700 hover:bg-primary hover:text-white px-3 py-2 rounded-md transition-colors <?php echo $page <= 1 ? 'opacity-50 cursor-not-allowed' : ''; ?>" title="Primera página" <?php echo $page <= 1 ? 'aria-disabled="true"' : ''; ?>>
                            <i class="fas fa-angle-double-left"></i>
                        </a>

                        <!-- Botón Anterior -->
                        <a href="?page=<?php echo max(1, $page - 1); ?>" class="bg-white border border-gray-300 text-gray-700 hover:bg-primary hover:text-white px-4 py-2 rounded-md transition-colors <?php echo $page <= 1 ? 'opacity-50 cursor-not-allowed' : ''; ?>" <?php echo $page <= 1 ? 'aria-disabled="true"' : ''; ?>>
                            <i class="fas fa-chevron-left mr-2"></i>Anterior
                        </a>

                        <!-- Números de página -->
                        <div class="flex space-x-1">
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <a href="?page=<?php echo $i; ?>" 
                                   class="px-3 py-2 rounded-md transition-colors <?php echo $i == $page ? 'bg-primary text-white' : 'bg-white border border-gray-300 text-gray-700 hover:bg-primary hover:text-white'; ?>">
                                    <?php echo $i; ?>
                                </a>
                            <?php endfor; ?>
                        </div>

                        <!-- Botón Siguiente -->
                        <a href="?page=<?php echo min($total_pages, $page + 1); ?>" class="bg-white border border-gray-300 text-gray-700 hover:bg-primary hover:text-white px-4 py-2 rounded-md transition-colors <?php echo $page >= $total_pages ? 'opacity-50 cursor-not-allowed' : ''; ?>" <?php echo $page >= $total_pages ? 'aria-disabled="true"' : ''; ?>>
                            Siguiente<i class="fas fa-chevron-right ml-2"></i>
                        </a>

                        <!-- Botón Última página -->
                        <a href="?page=<?php echo $total_pages; ?>" class="bg-white border border-gray-300 text-gray-700 hover:bg-primary hover:text-white px-3 py-2 rounded-md transition-colors <?php echo $page >= $total_pages ? 'opacity-50 cursor-not-allowed' : ''; ?>" title="Última página" <?php echo $page >= $total_pages ? 'aria-disabled="true"' : ''; ?>>
                            <i class="fas fa-angle-double-right"></i>
                        </a>
                    </div>

                    <!-- Navegación rápida -->
                    <div class="flex items-center space-x-2 text-sm">
                        <span class="text-gray-600">Ir a página:</span>
                        <select onchange="goToPage(this.value)" class="border border-gray-300 rounded px-2 py-1 text-sm">
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <option value="<?php echo $i; ?>" <?php echo $i == $page ? 'selected' : ''; ?>>
                                    <?php echo $i; ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Información Adicional -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-center">
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <i class="fas fa-file-alt text-6xl text-secondary mb-4"></i>
                    <h3 class="text-xl font-bold mb-4">Documentación Actualizada</h3>
                    <p class="text-gray-600">
                        Nuestros manuales se actualizan constantemente para incluir las últimas funcionalidades
                    </p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <i class="fas fa-shield-alt text-6xl text-secondary mb-4"></i>
                    <h3 class="text-xl font-bold mb-4">Descarga Segura</h3>
                    <p class="text-gray-600">
                        Todos nuestros archivos están protegidos y libres de virus para tu seguridad
                    </p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <i class="fas fa-cogs text-6xl text-secondary mb-4"></i>
                    <h3 class="text-xl font-bold mb-4">Soporte Técnico</h3>
                    <p class="text-gray-600">
                        Si tienes dudas, nuestro equipo técnico está disponible 24/7 para ayudarte
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Estadísticas de manuales -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-primary mb-4">Estadísticas de Manuales</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <h3 class="text-4xl font-bold text-primary mb-2"><?php echo $total_manuals; ?></h3>
                    <p class="text-gray-600">Manuales Disponibles</p>
                </div>
                <div>
                    <h3 class="text-4xl font-bold text-primary mb-2">24/7</h3>
                    <p class="text-gray-600">Disponibilidad</p>
                </div>
                <div>
                    <h3 class="text-4xl font-bold text-primary mb-2">100%</h3>
                    <p class="text-gray-600">Gratuitos</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">¿Necesitas ayuda personalizada?</h2>
            <p class="text-xl mb-8">Nuestros expertos pueden ayudarte con la instalación y configuración</p>
            <a href="contacto.php" class="bg-secondary text-black hover:bg-secondary/90 px-8 py-3 rounded-lg font-semibold transition-all duration-300">
                Contactar Soporte Técnico
            </a>
        </div>
    </section>
</main>

<!-- Modal de descarga -->
<div id="download-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
        <div class="text-center">
            <i class="fas fa-download text-6xl text-primary mb-4"></i>
            <h3 class="text-xl font-bold mb-4">Preparando Descarga</h3>
            <p class="text-gray-600 mb-4">Tu manual se descargará automáticamente en unos segundos...</p>
            <div class="flex justify-center mb-4">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-primary"></div>
            </div>
            <button onclick="closeDownloadModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition-colors">
                Cerrar
            </button>
        </div>
    </div>
</div>

<script>
function downloadManual(manualId, manualTitle) {
    // Mostrar modal de descarga
    document.getElementById('download-modal').classList.remove('hidden');
    
    // Crear enlace de descarga
    const downloadUrl = `download.php?manual=${encodeURIComponent(manualId)}`;
    
    // Iniciar descarga después de un breve delay
    setTimeout(() => {
        // Crear elemento de enlace temporal
        const link = document.createElement('a');
        link.href = downloadUrl;
        link.download = '';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        
        // Cerrar modal después de iniciar descarga
        setTimeout(() => {
            closeDownloadModal();
        }, 2000);
    }, 1000);
    
    // Log para analytics (opcional)
    console.log(`Descargando manual: ${manualTitle}`);
}

function closeDownloadModal() {
    document.getElementById('download-modal').classList.add('hidden');
}

function goToPage(page) {
    if (page && page > 0) {
        window.location.href = `?page=${page}`;
    }
}

// Cerrar modal al hacer clic fuera
document.getElementById('download-modal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDownloadModal();
    }
});

// Navegación con teclado
document.addEventListener('keydown', function(e) {
    const currentPage = <?php echo $page; ?>;
    const totalPages = <?php echo $total_pages; ?>;
    
    if (e.key === 'ArrowLeft' && currentPage > 1) {
        window.location.href = `?page=${currentPage - 1}`;
    } else if (e.key === 'ArrowRight' && currentPage < totalPages) {
        window.location.href = `?page=${currentPage + 1}`;
    }
});
</script>

<?php include 'includes/footer.php'; ?>
