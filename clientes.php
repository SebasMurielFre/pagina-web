<?php
$page_title = "Nuestros Clientes - PROINVESTEC SA";
include 'config/database.php';
include 'includes/header.php';

// Manejar envío de nuevo testimonio
if ($_POST && isset($_POST['add_testimonial'])) {
    $name = trim($_POST['name']);
    $company = trim($_POST['company']);
    $rating = (int)$_POST['rating'];
    $comment = trim($_POST['comment']);
    
    if (!empty($name) && !empty($company) && !empty($comment) && $rating >= 1 && $rating <= 5) {
        try {
            // Usar CURRENT_TIMESTAMP para almacenar fecha y hora actual
            $stmt = $pdo->prepare("INSERT INTO testimonials (name, company, rating, comment, date) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)");
            $stmt->execute([$name, $company, $rating, $comment]);
            $success_message = "¡Testimonio añadido exitosamente!";
        } catch (PDOException $e) {
            $error_message = "Error al guardar el testimonio: " . $e->getMessage();
        }
    } else {
        $error_message = "Por favor, completa todos los campos correctamente.";
    }
}

// Obtener testimonios
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 9;
$offset = ($page - 1) * $per_page;

try {
    // Contar total de testimonios
    $count_stmt = $pdo->query("SELECT COUNT(*) FROM testimonials");
    $total_testimonials = $count_stmt->fetchColumn();
    $total_pages = ceil($total_testimonials / $per_page);
    
    // Obtener testimonios de la página actual ordenados por fecha y hora descendente
    $stmt = $pdo->prepare("SELECT * FROM testimonials ORDER BY date DESC LIMIT ? OFFSET ?");
    $stmt->execute([$per_page, $offset]);
    $testimonials = $stmt->fetchAll();
} catch (PDOException $e) {
    $testimonials = [];
    $error_message = "Error al cargar testimonios: " . $e->getMessage();
}
?>

<main>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary to-primary/80 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Nuestros Clientes</h1>
                <p class="text-xl max-w-3xl mx-auto">
                    Conoce las experiencias de quienes ya confían en nuestros servicios
                </p>
            </div>
        </div>
    </section>

    <!-- Testimonios -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Testimonios</h2>
                <p class="text-lg text-gray-600">Más de 5,000 clientes satisfechos nos respaldan</p>

                <?php if (isset($success_message)): ?>
                    <div class="mt-4 p-3 bg-green-100 text-green-700 rounded-md"><?php echo $success_message; ?></div>
                <?php endif; ?>

                <?php if (isset($error_message)): ?>
                    <div class="mt-4 p-3 bg-red-100 text-red-700 rounded-md"><?php echo $error_message; ?></div>
                <?php endif; ?>

                <button id="add-testimonial-btn" class="mt-4 bg-secondary text-black hover:bg-secondary/90 px-6 py-2 rounded-lg font-semibold transition-colors">
                    <i class="fas fa-plus mr-2"></i>Añadir Testimonio
                </button>
            </div>

            <!-- Modal para añadir testimonio -->
            <div id="testimonial-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold">Añadir Nuevo Testimonio</h3>
                        <button id="close-modal" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    
                    <form method="POST" class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo</label>
                            <input type="text" id="name" name="name" required class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Empresa</label>
                            <input type="text" id="company" name="company" required class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">Calificación</label>
                            <select id="rating" name="rating" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option value="5">5 estrellas</option>
                                <option value="4">4 estrellas</option>
                                <option value="3">3 estrellas</option>
                                <option value="2">2 estrellas</option>
                                <option value="1">1 estrella</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Comentario</label>
                            <textarea id="comment" name="comment" required rows="4" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                        </div>
                        
                        <button type="submit" name="add_testimonial" class="w-full bg-primary hover:bg-primary/90 text-white py-2 rounded-md font-semibold transition-colors">
                            Añadir Testimonio
                        </button>
                    </form>
                </div>
            </div>

            <!-- Grid de testimonios -->
            <?php if (empty($testimonials)): ?>
                <div class="text-center py-12">
                    <p class="text-lg text-gray-600">No hay testimonios disponibles en este momento.</p>
                    <p class="text-gray-600 mt-2">¡Sé el primero en compartir tu experiencia!</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    <?php foreach ($testimonials as $testimonial): ?>
                        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                            <div class="mb-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="font-semibold text-lg"><?php echo htmlspecialchars($testimonial['name']); ?></h3>
                                    <div class="flex">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <i class="fas fa-star <?php echo $i <= $testimonial['rating'] ? 'text-secondary' : 'text-gray-300'; ?>"></i>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600 mb-4"><?php echo htmlspecialchars($testimonial['company']); ?></p>
                            </div>
                            <p class="text-gray-600 italic">"<?php echo htmlspecialchars($testimonial['comment']); ?>"</p>
                            <div class="text-xs text-gray-400 mt-2 text-right">
                                <?php 
                                // Formatear fecha y hora
                                $datetime = new DateTime($testimonial['date']);
                                echo $datetime->format('d/m/Y H:i');
                                ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Paginación -->
                <?php if ($total_pages > 1): ?>
                    <div class="flex justify-center items-center space-x-4">
                        <?php if ($page > 1): ?>
                            <a href="?page=<?php echo $page - 1; ?>" class="bg-white border border-gray-300 text-gray-700 hover:bg-primary hover:text-white px-4 py-2 rounded-md transition-colors">
                                <i class="fas fa-chevron-left mr-2"></i>Anterior
                            </a>
                        <?php endif; ?>

                        <div class="flex space-x-2">
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <a href="?page=<?php echo $i; ?>" 
                                   class="px-3 py-2 rounded-md transition-colors <?php echo $i == $page ? 'bg-primary text-white' : 'bg-white border border-gray-300 text-gray-700 hover:bg-primary hover:text-white'; ?>">
                                    <?php echo $i; ?>
                                </a>
                            <?php endfor; ?>
                        </div>

                        <?php if ($page < $total_pages): ?>
                            <a href="?page=<?php echo $page + 1; ?>" class="bg-white border border-gray-300 text-gray-700 hover:bg-primary hover:text-white px-4 py-2 rounded-md transition-colors">
                                Siguiente<i class="fas fa-chevron-right ml-2"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Estadísticas -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <h3 class="text-4xl font-bold text-primary mb-2">5,000+</h3>
                    <p class="text-gray-600">Clientes Satisfechos</p>
                </div>
                <div>
                    <h3 class="text-4xl font-bold text-primary mb-2">5,000+</h3>
                    <p class="text-gray-600">Certificados Emitidos</p>
                </div>
                <div>
                    <h3 class="text-4xl font-bold text-primary mb-2">99.9%</h3>
                    <p class="text-gray-600">Tiempo de Actividad</p>
                </div>
                <div>
                    <h3 class="text-4xl font-bold text-primary mb-2">24/7</h3>
                    <p class="text-gray-600">Soporte Técnico</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">¿Quieres ser nuestro próximo cliente satisfecho?</h2>
            <p class="text-xl mb-8">Únete a miles de empresas que ya confían en nuestros servicios</p>
            <a href="contacto.php" class="bg-secondary text-black hover:bg-secondary/90 transition-all duration-300 px-8 py-3 rounded-lg font-semibold">
                Contactar Ahora
            </a>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
