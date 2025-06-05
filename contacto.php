<?php
$page_title = "Contacto - PROINVESTEC SA";

// Incluir la conexión a la base de datos
include 'config/database.php';
include 'includes/header.php';

// Manejar envío del formulario
if ($_POST && isset($_POST['send_message'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    
    // Validación básica
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error_message = "Por favor, completa todos los campos requeridos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Por favor, ingresa un email válido.";
    } else {
        // Validación adicional de seguridad
        if (strlen($name) > 100 || strlen($email) > 100 || strlen($subject) > 200 || strlen($message) > 2000) {
            $error_message = "Uno o más campos exceden la longitud máxima permitida.";
        } else {
            // Guardar en la base de datos
            try {
                $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, phone, subject, message, date) 
                                      VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
                $stmt->execute([$name, $email, $phone, $subject, $message]);
                
                $success_message = "Gracias por tu mensaje. Nos pondremos en contacto contigo pronto.";
                // Limpiar variables después del envío exitoso
                $name = $email = $phone = $subject = $message = '';
            } catch (PDOException $e) {
                $error_message = "Error al guardar tu mensaje. Por favor intenta nuevamente más tarde.";
                error_log("Error en formulario de contacto: " . $e->getMessage());
            }
        }
    }
}
?>

<main>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary to-primary/80 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Contacto</h1>
                <p class="text-xl max-w-3xl mx-auto">
                    Estamos aquí para ayudarte. Contáctanos y resolveremos todas tus dudas
                </p>
            </div>
        </div>
    </section>

    <!-- Información de Contacto -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary mb-6">Información de Contacto</h2>
                <p class="text-lg text-gray-600">
                    Ponte en contacto con nosotros a través de cualquiera de estos medios. Nuestro equipo está listo para atenderte.
                </p>
            </div>

            <!-- Grid de información de contacto - 2x2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <!-- Teléfonos -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-blue-200">
                    <div class="flex items-start space-x-4">
                        <div class="bg-blue-500 p-3 rounded-full">
                            <i class="fas fa-phone text-2xl text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-2 text-blue-800">Teléfonos</h3>
                            <p class="text-gray-700">
                                Oficina: +593 (02) 259-2262<br>
                                Móvil: +593 093 902 2211<br>
                                WhatsApp: +593 093 902 2211
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Correos -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-green-200">
                    <div class="flex items-start space-x-4">
                        <div class="bg-green-500 p-3 rounded-full">
                            <i class="fas fa-envelope text-2xl text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-2 text-green-800">Correos Electrónicos</h3>
                            <p class="text-gray-700">
                                Ventas: ventas@proinvestec.com.ec
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Horarios -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-purple-200">
                    <div class="flex items-start space-x-4">
                        <div class="bg-purple-500 p-3 rounded-full">
                            <i class="fas fa-clock text-2xl text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-2 text-purple-800">Horarios de Atención</h3>
                            <p class="text-gray-700">
                                Lunes a Viernes: 8:00 AM - 5:30 PM<br>
                                Sábados y Domingos: Cerrado<br>
                                <span class="text-purple-600 font-semibold">Soporte 24/7 disponible</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Redes Sociales -->
                <div class="bg-gradient-to-br from-pink-50 to-pink-100 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-pink-200">
                    <div class="flex items-start space-x-4">
                        <div class="bg-pink-500 p-3 rounded-full">
                            <i class="fas fa-share-alt text-2xl text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-2 text-pink-800">Síguenos en Redes Sociales</h3>
                            <p class="text-gray-700 mb-4">
                                Mantente al día con nuestras últimas noticias y actualizaciones
                            </p>
                            <div class="flex space-x-3">
                                <a href="https://www.facebook.com/share/1JL4o8DZ3d/?mibextid=wwXIfr" target="_blank" rel="noopener noreferrer" 
                                   class="bg-white border border-gray-300 text-gray-700 hover:bg-blue-600 hover:text-white p-2 rounded-lg transition-colors flex items-center">
                                    <i class="fab fa-facebook text-lg mr-1"></i>
                                    <span class="text-sm font-medium">Facebook</span>
                                </a>
                                <a href="https://www.instagram.com/proinvestec.sa?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer"
                                   class="bg-white border border-gray-300 text-gray-700 hover:bg-pink-600 hover:text-white p-2 rounded-lg transition-colors flex items-center">
                                    <i class="fab fa-instagram text-lg mr-1"></i>
                                    <span class="text-sm font-medium">Instagram</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dirección, Mapa y Formulario -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Dirección y Mapa -->
                <div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-start space-x-4 mb-6">
                            <i class="fas fa-map-marker-alt text-2xl text-primary mt-1"></i>
                            <div>
                                <h3 class="font-semibold text-lg mb-2">Nuestra Ubicación</h3>
                                <p class="text-gray-600">
                                    Av. Colón No. E4-105 entre Av. 9 de Octubre y Av. Amazonas Edificio. Solamar, 5to Piso Oficina 504<br>
                                    Quito - Ecuador<br>
                                    Código Postal: 170515
                                </p>
                            </div>
                        </div>

                        <!-- Mapa -->
                        <div class="bg-gray-200 rounded-lg overflow-hidden">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.4485495591731!2d-78.4932378!3d-0.19923649999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d59a6b9d710073%3A0x9705bc52c38963a6!2sAv.%20Crist%C3%B3bal%20Col%C3%B3n%2C%20Quito%20170515!5e0!3m2!1ses-419!2sec!4v1749014596092!5m2!1ses-419!2sec" 
                                width="600" 
                                height="450" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Ubicación PROINVESTEC SA">
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- Formulario de Contacto -->
                <div>
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold text-primary mb-2">Envíanos un Mensaje</h2>
                        <p class="text-gray-600 mb-6">
                            Completa el formulario y nos pondremos en contacto contigo lo antes posible
                        </p>

                        <?php if (isset($success_message)): ?>
                            <div class="fixed top-4 right-4 z-50 max-w-md">
                                <div class="bg-green-500 text-white p-4 rounded-lg shadow-lg border-l-4 border-green-600 animate-pulse">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-check-circle text-2xl"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-lg font-semibold">¡Mensaje Enviado!</h3>
                                            <p class="text-sm"><?php echo htmlspecialchars($success_message); ?></p>
                                        </div>
                                        <button onclick="this.parentElement.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($error_message)): ?>
                            <div class="fixed top-4 right-4 z-50 max-w-md">
                                <div class="bg-red-500 text-white p-4 rounded-lg shadow-lg border-l-4 border-red-600 animate-pulse">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-exclamation-triangle text-2xl"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-lg font-semibold">Error al Enviar</h3>
                                            <p class="text-sm"><?php echo htmlspecialchars($error_message); ?></p>
                                        </div>
                                        <button onclick="this.parentElement.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($success_message)): ?>
                            <div class="mb-6 p-6 bg-green-50 border border-green-200 rounded-lg">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-green-500 text-3xl mr-4"></i>
                                    <div>
                                        <h3 class="text-lg font-semibold text-green-800">¡Mensaje Enviado Exitosamente!</h3>
                                        <p class="text-green-700 mt-1">
                                            Hemos recibido tu mensaje y te responderemos en un plazo máximo de 24 horas hábiles.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($error_message)): ?>
                            <div class="mb-6 p-6 bg-red-50 border border-red-200 rounded-lg">
                                <div class="flex items-center">
                                    <i class="fas fa-exclamation-triangle text-red-500 text-3xl mr-4"></i>
                                    <div>
                                        <h3 class="text-lg font-semibold text-red-800">Error al Enviar el Mensaje</h3>
                                        <p class="text-red-700 mt-1"><?php echo htmlspecialchars($error_message); ?></p>
                                        <p class="text-sm text-red-600 mt-2">
                                            <strong>Alternativas:</strong> Puedes contactarnos directamente al +593 093 902 2211
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <form method="POST" class="space-y-6" novalidate>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                        Nombre Completo *
                                    </label>
                                    <input type="text" id="name" name="name" required maxlength="100"
                                           value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>"
                                           placeholder="Tu nombre completo"
                                           class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                        Teléfono
                                    </label>
                                    <input type="tel" id="phone" name="phone" maxlength="20"
                                           value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>"
                                           placeholder="Tu número de teléfono"
                                           class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                    Correo Electrónico *
                                </label>
                                <input type="email" id="email" name="email" required maxlength="100"
                                       value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"
                                       placeholder="tu@email.com"
                                       class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">
                                    Asunto *
                                </label>
                                <input type="text" id="subject" name="subject" required maxlength="200"
                                       value="<?php echo isset($subject) ? htmlspecialchars($subject) : ''; ?>"
                                       placeholder="¿En qué podemos ayudarte?"
                                       class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
                                    Mensaje *
                                </label>
                                <textarea id="message" name="message" required rows="5" maxlength="2000"
                                          placeholder="Describe tu consulta o solicitud..."
                                          class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-transparent transition-all"><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea>
                                <div class="text-right text-sm text-gray-500 mt-1">
                                    <span id="char-count">0</span>/2000 caracteres
                                </div>
                            </div>

                            <button type="submit" name="send_message" 
                                    class="w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-md font-semibold transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                                <i class="fas fa-paper-plane mr-2"></i>Enviar Mensaje
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
// Mejorar la experiencia del formulario
document.addEventListener('DOMContentLoaded', function() {
    const messageTextarea = document.getElementById('message');
    const charCount = document.getElementById('char-count');
    
    if (messageTextarea && charCount) {
        function updateCharCount() {
            const count = messageTextarea.value.length;
            charCount.textContent = count;
            
            if (count > 1800) {
                charCount.style.color = '#ef4444';
            } else if (count > 1500) {
                charCount.style.color = '#f59e0b';
            } else {
                charCount.style.color = '#6b7280';
            }
        }
        
        messageTextarea.addEventListener('input', updateCharCount);
        updateCharCount();
    }
    
    // Auto-ocultar mensajes después de 8 segundos
    setTimeout(function() {
        const notifications = document.querySelectorAll('.fixed.top-4.right-4');
        notifications.forEach(function(notification) {
            if (notification) {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(100%)';
                setTimeout(function() {
                    notification.remove();
                }, 300);
            }
        });
    }, 8000);
});
</script>

<?php include 'includes/footer.php'; ?>
