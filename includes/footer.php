<!-- Footer -->
    <footer class="bg-accent text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-xl font-bold mb-4">PROINVESTEC SA</h3>
                    <p class="text-gray-300 mb-4">
                        Especialistas en firmas electrónicas y sistemas de facturación. Brindamos soluciones tecnológicas seguras
                        y confiables para tu empresa.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/share/1JL4o8DZ3d/?mibextid=wwXIfr" target="_blank" rel="noopener noreferrer" class="text-secondary hover:text-secondary/80 transition-colors">
                            <i class="fab fa-facebook text-2xl"></i>
                        </a>
                        <a href="https://www.instagram.com/proinvestec.sa?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer" class="text-secondary hover:text-secondary/80 transition-colors">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Enlaces Rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-gray-300 hover:text-secondary transition-colors">Inicio</a></li>
                        <li><a href="nosotros.php" class="text-gray-300 hover:text-secondary transition-colors">Nosotros</a></li>
                        <li><a href="productos.php" class="text-gray-300 hover:text-secondary transition-colors">Productos</a></li>
                        <li><a href="clientes.php" class="text-gray-300 hover:text-secondary transition-colors">Clientes</a></li>
                        <li><a href="contacto.php" class="text-gray-300 hover:text-secondary transition-colors">Contacto</a></li>
                        <li><a href="manuales.php" class="text-gray-300 hover:text-secondary transition-colors">Manuales</a></li>
                        <li><a href="faq.php" class="text-gray-300 hover:text-secondary transition-colors">FAQ</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Contacto</h4>
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-phone text-secondary"></i>
                            <span class="text-gray-300">+593 093 902 2211</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-envelope text-secondary"></i>
                            <span class="text-gray-300">ventas@proinvestec.com.ec</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-map-marker-alt text-secondary"></i>
                            <span class="text-gray-300">Quito, Ecuador</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-300">© 2025 PROINVESTEC SA. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Chatbot -->
    <div id="chatbot-container" class="fixed bottom-4 right-4 z-50">
        <button id="chatbot-toggle" class="bg-primary hover:bg-primary/90 text-white rounded-full w-16 h-16 shadow-lg transition-all duration-300 hover:scale-110">
            <i class="fas fa-comments text-2xl"></i>
        </button>
        
        <div id="chatbot-window" class="hidden absolute bottom-20 right-0 w-96 bg-white rounded-lg shadow-xl border-2 border-primary/20">
            <div class="bg-primary text-white p-4 rounded-t-lg flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-robot"></i>
                    <span class="font-semibold">Asistente PROINVESTEC SA</span>
                </div>
                <button id="chatbot-close" class="text-white hover:bg-white/20 rounded p-1">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="chatbot-messages" class="p-4 h-96 overflow-y-auto">
                <!-- El contenido se genera dinámicamente -->
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>
