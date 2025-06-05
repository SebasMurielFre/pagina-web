// JavaScript principal para PROINVESTEC SA

document.addEventListener("DOMContentLoaded", () => {
  // Mobile menu toggle
  const mobileMenuButton = document.getElementById("mobile-menu-button")
  const mobileMenu = document.getElementById("mobile-menu")

  if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden")
    })
  }

  // Chatbot functionality
  const chatbotToggle = document.getElementById("chatbot-toggle")
  const chatbotWindow = document.getElementById("chatbot-window")
  const chatbotClose = document.getElementById("chatbot-close")
  const chatbotMessages = document.getElementById("chatbot-messages")

  if (chatbotToggle && chatbotWindow) {
    chatbotToggle.addEventListener("click", () => {
      chatbotWindow.classList.toggle("hidden")
    })
  }

  if (chatbotClose && chatbotWindow) {
    chatbotClose.addEventListener("click", () => {
      chatbotWindow.classList.add("hidden")
    })
  }

  // Estado del chatbot
  let chatbotState = {
    currentCategory: null,
    conversationHistory: [],
  }

  // Estructura de categorías y opciones del chatbot
  const chatbotData = {
    main: {
      title: "¿En qué puedo ayudarte?",
      options: [
        { id: "productos", text: "🛍️ Productos y Precios", icon: "fas fa-shopping-cart" },
        { id: "soporte", text: "🛠️ Soporte Técnico", icon: "fas fa-tools" },
        { id: "empresa", text: "🏢 Sobre la Empresa", icon: "fas fa-building" },
        { id: "contacto", text: "📞 Contacto", icon: "fas fa-phone" },
      ],
    },
    productos: {
      title: "Productos y Precios",
      options: [
        { id: "persona-natural", text: "👤 Persona Natural - S/ 150", response: "persona-natural" },
        { id: "persona-ruc", text: "👨‍💼 Persona Natural con RUC - S/ 200", response: "persona-ruc" },
        { id: "persona-juridica", text: "🏢 Persona Jurídica - S/ 350", response: "persona-juridica" },
        { id: "facturacion", text: "📄 Sistema Facturación - S/ 50/mes", response: "facturacion" },
        { id: "comparar", text: "⚖️ Comparar Productos", response: "comparar" },
      ],
    },
    soporte: {
      title: "Soporte Técnico",
      options: [
        { id: "instalacion", text: "💻 Ayuda con Instalación", response: "instalacion" },
        { id: "problemas", text: "🔧 Resolver Problemas", response: "problemas" },
        { id: "manuales", text: "📚 Descargar Manuales", response: "manuales" },
        { id: "contacto-soporte", text: "📞 Contactar Soporte", response: "contacto-soporte" },
        { id: "horarios", text: "🕐 Horarios de Atención", response: "horarios" },
      ],
    },
    empresa: {
      title: "Sobre PROINVESTEC SA",
      options: [
        { id: "quienes-somos", text: "ℹ️ ¿Quiénes Somos?", response: "quienes-somos" },
        { id: "certificaciones", text: "🏆 Certificaciones", response: "certificaciones" },
        { id: "experiencia", text: "📈 Nuestra Experiencia", response: "experiencia" },
        { id: "ubicacion", text: "📍 Ubicación", response: "ubicacion" },
      ],
    },
    contacto: {
      title: "Información de Contacto",
      options: [
        { id: "telefono", text: "📞 Teléfonos", response: "telefono" },
        { id: "email", text: "📧 Correos Electrónicos", response: "email" },
        { id: "direccion", text: "📍 Dirección Física", response: "direccion" },
        { id: "redes", text: "🌐 Redes Sociales", response: "redes" },
        { id: "formulario", text: "📝 Enviar Mensaje", response: "formulario" },
      ],
    },
  }

  // Respuestas del chatbot
  const chatbotResponses = {
    "persona-natural": `
      <div class="bg-blue-50 p-3 rounded-lg border-l-4 border-blue-400">
        <h4 class="font-bold text-blue-800 mb-2">🔹 Firma Electrónica - Persona Natural</h4>
        <p class="text-sm text-blue-700 mb-2"><strong>Precio:</strong> S/ 150 (vigencia 3 años)</p>
        <p class="text-sm text-blue-700 mb-2"><strong>Incluye:</strong></p>
        <ul class="text-xs text-blue-600 ml-4 list-disc">
          <li>Certificado digital personal</li>
          <li>Instalación y configuración</li>
          <li>Manual de uso</li>
          <li>Soporte técnico</li>
        </ul>
        <p class="text-sm text-blue-700 mt-2"><strong>Requisitos:</strong> DNI vigente, email personal, teléfono móvil</p>
      </div>
    `,
    "persona-ruc": `
      <div class="bg-green-50 p-3 rounded-lg border-l-4 border-green-400">
        <h4 class="font-bold text-green-800 mb-2">🔹 Firma Electrónica - Persona Natural con RUC</h4>
        <p class="text-sm text-green-700 mb-2"><strong>Precio:</strong> S/ 200 (vigencia 3 años)</p>
        <p class="text-sm text-green-700 mb-2"><strong>Ideal para:</strong> Emprendedores y profesionales independientes</p>
        <p class="text-sm text-green-700 mb-2"><strong>Incluye:</strong></p>
        <ul class="text-xs text-green-600 ml-4 list-disc">
          <li>Certificado con datos del RUC</li>
          <li>Perfecto para facturación</li>
          <li>Respaldo legal completo</li>
          <li>Soporte técnico especializado</li>
        </ul>
      </div>
    `,
    "persona-juridica": `
      <div class="bg-purple-50 p-3 rounded-lg border-l-4 border-purple-400">
        <h4 class="font-bold text-purple-800 mb-2">🔹 Firma Electrónica - Persona Jurídica</h4>
        <p class="text-sm text-purple-700 mb-2"><strong>Precio:</strong> S/ 350 (vigencia 3 años)</p>
        <p class="text-sm text-purple-700 mb-2"><strong>Para:</strong> Empresas y organizaciones</p>
        <p class="text-sm text-purple-700 mb-2"><strong>Características:</strong></p>
        <ul class="text-xs text-purple-600 ml-4 list-disc">
          <li>Múltiples representantes</li>
          <li>Gestión centralizada</li>
          <li>Reportes de uso</li>
          <li>Integración con sistemas ERP</li>
        </ul>
      </div>
    `,
    facturacion: `
      <div class="bg-yellow-50 p-3 rounded-lg border-l-4 border-yellow-400">
        <h4 class="font-bold text-yellow-800 mb-2">🔹 Sistema de Facturación Electrónica</h4>
        <p class="text-sm text-yellow-700 mb-2"><strong>Precio:</strong> S/ 50/mes</p>
        <p class="text-sm text-yellow-700 mb-2"><strong>Características:</strong></p>
        <ul class="text-xs text-yellow-600 ml-4 list-disc">
          <li>Emisión automática de comprobantes</li>
          <li>Integración directa con SUNAT</li>
          <li>Reportes en tiempo real</li>
          <li>Almacenamiento seguro en la nube</li>
          <li>Soporte técnico incluido</li>
        </ul>
      </div>
    `,
    comparar: `
      <div class="bg-gray-50 p-3 rounded-lg border-l-4 border-gray-400">
        <h4 class="font-bold text-gray-800 mb-2">⚖️ Comparación de Productos</h4>
        <div class="text-xs text-gray-700 space-y-2">
          <div><strong>Persona Natural (S/ 150):</strong> Uso personal, sin RUC</div>
          <div><strong>Persona Natural con RUC (S/ 200):</strong> Emprendedores, facturación básica</div>
          <div><strong>Persona Jurídica (S/ 350):</strong> Empresas, múltiples usuarios</div>
          <div><strong>Sistema Facturación (S/ 50/mes):</strong> Complemento para cualquier certificado</div>
        </div>
        <p class="text-xs text-gray-600 mt-2">💡 <em>Todos incluyen soporte técnico y tienen validez legal completa</em></p>
      </div>
    `,
    instalacion: `
      <div class="bg-blue-50 p-3 rounded-lg">
        <h4 class="font-bold text-blue-800 mb-2">💻 Ayuda con Instalación</h4>
        <p class="text-sm text-blue-700 mb-2">Te ayudamos paso a paso:</p>
        <ul class="text-xs text-blue-600 ml-4 list-disc space-y-1">
          <li>Instalación en Windows, Mac o Linux</li>
          <li>Configuración en navegadores</li>
          <li>Instalación en dispositivos móviles</li>
          <li>Verificación de funcionamiento</li>
        </ul>
        <p class="text-xs text-blue-600 mt-2">📞 <strong>Soporte directo:</strong> +51 999 888 777</p>
      </div>
    `,
    problemas: `
      <div class="bg-red-50 p-3 rounded-lg">
        <h4 class="font-bold text-red-800 mb-2">🔧 Resolver Problemas</h4>
        <p class="text-sm text-red-700 mb-2">Problemas comunes que resolvemos:</p>
        <ul class="text-xs text-red-600 ml-4 list-disc space-y-1">
          <li>Certificado no reconocido</li>
          <li>Error al firmar documentos</li>
          <li>Problemas de compatibilidad</li>
          <li>Renovación de certificados</li>
        </ul>
        <p class="text-xs text-red-600 mt-2">🚨 <strong>Soporte urgente 24/7:</strong> soporte@proinvestec.com</p>
      </div>
    `,
    manuales: `
      <div class="bg-green-50 p-3 rounded-lg">
        <h4 class="font-bold text-green-800 mb-2">📚 Manuales Disponibles</h4>
        <ul class="text-xs text-green-600 ml-4 list-disc space-y-1">
          <li>Manual de Instalación Windows/Mac</li>
          <li>Guía de uso Adobe Reader</li>
          <li>Manual Microsoft Office</li>
          <li>Configuración móvil Android/iOS</li>
        </ul>
        <p class="text-xs text-green-600 mt-2">📥 <strong>Descargar:</strong> <a href="manuales.php" class="underline">Ver todos los manuales</a></p>
      </div>
    `,
    "contacto-soporte": `
      <div class="bg-purple-50 p-3 rounded-lg">
        <h4 class="font-bold text-purple-800 mb-2">📞 Contactar Soporte</h4>
        <div class="text-xs text-purple-700 space-y-1">
          <div><strong>Teléfono:</strong> +51 999 888 777</div>
          <div><strong>Email:</strong> soporte@proinvestec.com</div>
          <div><strong>WhatsApp:</strong> +51 999 888 777</div>
          <div><strong>Chat en línea:</strong> Disponible en la web</div>
        </div>
        <p class="text-xs text-purple-600 mt-2">⏰ <strong>Disponible 24/7</strong></p>
      </div>
    `,
    horarios: `
      <div class="bg-yellow-50 p-3 rounded-lg">
        <h4 class="font-bold text-yellow-800 mb-2">🕐 Horarios de Atención</h4>
        <div class="text-xs text-yellow-700 space-y-1">
          <div><strong>Soporte Básico:</strong> 24 horas, 7 días</div>
          <div><strong>Soporte Especializado:</strong> L-V 8:00 AM - 6:00 PM</div>
          <div><strong>Ventas:</strong> L-V 8:00 AM - 6:00 PM, S 9:00 AM - 1:00 PM</div>
          <div><strong>Instalaciones:</strong> L-V 9:00 AM - 5:00 PM</div>
        </div>
      </div>
    `,
    "quienes-somos": `
      <div class="bg-blue-50 p-3 rounded-lg">
        <h4 class="font-bold text-blue-800 mb-2">ℹ️ PROINVESTEC SA</h4>
        <p class="text-xs text-blue-700 mb-2">Empresa líder en certificación digital en Perú, especializada en firmas electrónicas y facturación electrónica.</p>
        <div class="text-xs text-blue-600 space-y-1">
          <div><strong>Fundada:</strong> 2015</div>
          <div><strong>Clientes:</strong> +10,000 satisfechos</div>
          <div><strong>Certificados emitidos:</strong> +15,000</div>
        </div>
      </div>
    `,
    certificaciones: `
      <div class="bg-green-50 p-3 rounded-lg">
        <h4 class="font-bold text-green-800 mb-2">🏆 Nuestras Certificaciones</h4>
        <ul class="text-xs text-green-600 ml-4 list-disc space-y-1">
          <li>Entidad Certificadora autorizada por INDECOPI</li>
          <li>Cumplimiento normativa Ley N° 27269</li>
          <li>Certificación ISO 27001 (Seguridad)</li>
          <li>Homologado por SUNAT</li>
        </ul>
        <p class="text-xs text-green-600 mt-2">✅ <strong>Validez legal completa</strong> en todo el Perú</p>
      </div>
    `,
    experiencia: `
      <div class="bg-purple-50 p-3 rounded-lg">
        <h4 class="font-bold text-purple-800 mb-2">📈 Nuestra Experiencia</h4>
        <div class="text-xs text-purple-700 space-y-1">
          <div><strong>9 años</strong> en el mercado peruano</div>
          <div><strong>99.9%</strong> de tiempo de actividad</div>
          <div><strong>24/7</strong> soporte técnico</div>
          <div><strong>100%</strong> de clientes satisfechos</div>
        </div>
        <p class="text-xs text-purple-600 mt-2">🌟 Líderes en innovación y calidad de servicio</p>
      </div>
    `,
    ubicacion: `
      <div class="bg-yellow-50 p-3 rounded-lg">
        <h4 class="font-bold text-yellow-800 mb-2">📍 Nuestra Ubicación</h4>
        <div class="text-xs text-yellow-700 space-y-1">
          <div><strong>Dirección:</strong> Av. Javier Prado Este 4200, Oficina 501</div>
          <div><strong>Distrito:</strong> Surquillo, Lima</div>
          <div><strong>Referencia:</strong> Frente al Centro Comercial Jockey Plaza</div>
          <div><strong>Estacionamiento:</strong> Disponible</div>
        </div>
      </div>
    `,
    telefono: `
      <div class="bg-blue-50 p-3 rounded-lg">
        <h4 class="font-bold text-blue-800 mb-2">📞 Nuestros Teléfonos</h4>
        <div class="text-xs text-blue-700 space-y-1">
          <div><strong>Oficina Principal:</strong> (01) 234-5678</div>
          <div><strong>Móvil/WhatsApp:</strong> +51 999 888 777</div>
          <div><strong>Soporte Técnico:</strong> +51 999 888 777</div>
          <div><strong>Ventas:</strong> +51 999 888 777</div>
        </div>
        <p class="text-xs text-blue-600 mt-2">📱 También disponible por WhatsApp</p>
      </div>
    `,
    email: `
      <div class="bg-green-50 p-3 rounded-lg">
        <h4 class="font-bold text-green-800 mb-2">📧 Correos Electrónicos</h4>
        <div class="text-xs text-green-700 space-y-1">
          <div><strong>General:</strong> info@proinvestec.com</div>
          <div><strong>Ventas:</strong> ventas@proinvestec.com</div>
          <div><strong>Soporte:</strong> soporte@proinvestec.com</div>
          <div><strong>Administración:</strong> admin@proinvestec.com</div>
        </div>
        <p class="text-xs text-green-600 mt-2">⚡ Respuesta en menos de 2 horas</p>
      </div>
    `,
    direccion: `
      <div class="bg-purple-50 p-3 rounded-lg">
        <h4 class="font-bold text-purple-800 mb-2">📍 Visítanos</h4>
        <div class="text-xs text-purple-700 space-y-1">
          <div><strong>Dirección completa:</strong></div>
          <div>Av. Javier Prado Este 4200, Oficina 501</div>
          <div>Surquillo, Lima 15038 - Perú</div>
          <div><strong>Horario de atención:</strong> L-V 8:00 AM - 6:00 PM</div>
        </div>
        <p class="text-xs text-purple-600 mt-2">🚗 Estacionamiento disponible</p>
      </div>
    `,
    redes: `
      <div class="bg-yellow-50 p-3 rounded-lg">
        <h4 class="font-bold text-yellow-800 mb-2">🌐 Síguenos</h4>
        <div class="text-xs text-yellow-700 space-y-1">
          <div><strong>Facebook:</strong> @proinvestecsa</div>
          <div><strong>LinkedIn:</strong> PROINVESTEC SA</div>
          <div><strong>Twitter:</strong> @proinvestecsa</div>
          <div><strong>Instagram:</strong> @proinvestecsa</div>
        </div>
        <p class="text-xs text-yellow-600 mt-2">📢 Noticias y actualizaciones diarias</p>
      </div>
    `,
    formulario: `
      <div class="bg-red-50 p-3 rounded-lg">
        <h4 class="font-bold text-red-800 mb-2">📝 Enviar Mensaje</h4>
        <p class="text-xs text-red-700 mb-2">Para consultas detalladas, usa nuestro formulario de contacto:</p>
        <p class="text-xs text-red-600 mt-2">👉 <a href="contacto.php" class="underline font-semibold">Ir al formulario de contacto</a></p>
        <p class="text-xs text-red-600">📧 Respuesta garantizada en 24 horas</p>
      </div>
    `,
  }

  // Función para mostrar opciones del chatbot
  function showChatbotOptions(categoryId = "main") {
    const category = chatbotData[categoryId]
    if (!category) return

    chatbotState.currentCategory = categoryId

    const optionsHtml = `
      <div class="space-y-3">
        <div class="bg-primary text-white p-2 rounded-lg text-center">
          <p class="text-sm font-semibold">${category.title}</p>
        </div>
        <div class="space-y-2">
          ${category.options
            .map(
              (option) => `
            <button class="chatbot-option w-full text-left p-2 bg-gray-50 hover:bg-primary hover:text-white rounded transition-colors text-sm" 
                    data-option-id="${option.id}" 
                    data-response="${option.response || ""}">
              ${option.text}
            </button>
          `,
            )
            .join("")}
        </div>
        ${
          categoryId !== "main"
            ? `
          <div class="pt-2 border-t border-gray-200">
            <button id="back-to-main" class="w-full text-center p-2 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded transition-colors text-sm">
              ⬅️ Volver al menú principal
            </button>
          </div>
        `
            : ""
        }
      </div>
    `

    addChatMessage(optionsHtml, "options")
    attachOptionListeners()
  }

  // Función para adjuntar event listeners a las opciones
  function attachOptionListeners() {
    // Opciones del chatbot
    const options = document.querySelectorAll(".chatbot-option")
    options.forEach((option) => {
      option.addEventListener("click", function () {
        const optionId = this.dataset.optionId
        const responseId = this.dataset.response
        const optionText = this.textContent.trim()

        // Añadir mensaje del usuario
        addChatMessage(optionText, "user")

        // Manejar la opción
        if (responseId && chatbotResponses[responseId]) {
          // Mostrar respuesta específica
          setTimeout(() => {
            addChatMessage(chatbotResponses[responseId], "bot")
            // Volver a mostrar opciones del menú principal después de la respuesta
            setTimeout(() => {
              showChatbotOptions("main")
            }, 5000)
          }, 800)
        } else if (chatbotData[optionId]) {
          // Navegar a subcategoría
          setTimeout(() => {
            showChatbotOptions(optionId)
          }, 500)
        }
      })
    })

    // Botón volver al menú principal
    const backButton = document.getElementById("back-to-main")
    if (backButton) {
      backButton.addEventListener("click", (e) => {
        e.preventDefault()
        addChatMessage("⬅️ Volver al menú principal", "user")
        setTimeout(() => {
          showChatbotOptions("main")
        }, 500)
      })
    }
  }

  // Función para añadir mensajes al chat
  function addChatMessage(message, sender) {
    if (!chatbotMessages) return

    const messageDiv = document.createElement("div")

    if (sender === "options") {
      messageDiv.innerHTML = message
    } else {
      messageDiv.className = `mb-3 ${sender === "user" ? "text-right" : "text-left"}`

      const messageContent = document.createElement("div")
      messageContent.className = `inline-block p-3 rounded-lg max-w-xs ${
        sender === "user" ? "bg-primary text-white" : "bg-gray-100 text-gray-800"
      }`

      if (sender === "bot") {
        messageContent.innerHTML = message
      } else {
        messageContent.textContent = message
      }

      messageDiv.appendChild(messageContent)
    }

    chatbotMessages.appendChild(messageDiv)

    // Scroll al final
    chatbotMessages.scrollTop = chatbotMessages.scrollHeight
  }

  // Función para reiniciar el chat
  function resetChat() {
    if (!chatbotMessages) return

    chatbotMessages.innerHTML = `
      <div class="bg-gray-100 p-3 rounded-lg mb-4">
        <p class="text-sm">¡Hola! Soy el asistente virtual de PROINVESTEC SA. ¿En qué puedo ayudarte hoy?</p>
      </div>
    `

    chatbotState = {
      currentCategory: null,
      conversationHistory: [],
    }

    showChatbotOptions("main")
  }

  // Inicializar el chatbot
  if (chatbotMessages) {
    resetChat()
  }

  // Modal para testimonios
  const addTestimonialBtn = document.getElementById("add-testimonial-btn")
  const testimonialModal = document.getElementById("testimonial-modal")
  const closeModal = document.getElementById("close-modal")

  if (addTestimonialBtn && testimonialModal) {
    addTestimonialBtn.addEventListener("click", () => {
      testimonialModal.classList.remove("hidden")
    })
  }

  if (closeModal && testimonialModal) {
    closeModal.addEventListener("click", () => {
      testimonialModal.classList.add("hidden")
    })
  }

  // Cerrar modal al hacer clic fuera
  if (testimonialModal) {
    testimonialModal.addEventListener("click", (e) => {
      if (e.target === testimonialModal) {
        testimonialModal.classList.add("hidden")
      }
    })
  }

  // FAQ functionality
  const faqQuestions = document.querySelectorAll(".faq-question")
  faqQuestions.forEach((question) => {
    question.addEventListener("click", function () {
      const answer = this.nextElementSibling
      const icon = this.querySelector("i")

      if (answer.style.display === "none" || answer.style.display === "") {
        answer.style.display = "block"
        icon.classList.remove("fa-chevron-down")
        icon.classList.add("fa-chevron-up")
      } else {
        answer.style.display = "none"
        icon.classList.remove("fa-chevron-up")
        icon.classList.add("fa-chevron-down")
      }
    })
  })

  // Smooth scrolling para enlaces internos
  const smoothScrollLinks = document.querySelectorAll('a[href^="#"]')
  smoothScrollLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault()
      const targetId = this.getAttribute("href").substring(1)
      const targetElement = document.getElementById(targetId)

      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: "smooth",
          block: "start",
        })
      }
    })
  })

  // Animaciones al hacer scroll
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("animate-fadeInUp")
      }
    })
  }, observerOptions)

  // Observar elementos que deben animarse
  const animatedElements = document.querySelectorAll(".card, .product-card, .testimonial-card")
  animatedElements.forEach((el) => {
    observer.observe(el)
  })

  // Validación de formularios
  const forms = document.querySelectorAll("form")
  forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
      const requiredFields = form.querySelectorAll("[required]")
      let isValid = true

      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          isValid = false
          field.classList.add("border-red-500")

          // Remover clase de error después de que el usuario escriba
          field.addEventListener("input", function () {
            this.classList.remove("border-red-500")
          })
        }
      })

      if (!isValid) {
        e.preventDefault()
        alert("Por favor, completa todos los campos requeridos.")
      }
    })
  })

  // Auto-hide alerts después de 5 segundos
  const alerts = document.querySelectorAll(".bg-green-100, .bg-red-100")
  alerts.forEach((alert) => {
    setTimeout(() => {
      alert.style.opacity = "0"
      setTimeout(() => {
        alert.remove()
      }, 300)
    }, 5000)
  })
})

// Función para mostrar/ocultar elementos
function toggleElement(elementId) {
  const element = document.getElementById(elementId)
  if (element) {
    element.classList.toggle("hidden")
  }
}

// Función para scroll suave a un elemento
function scrollToElement(elementId) {
  const element = document.getElementById(elementId)
  if (element) {
    element.scrollIntoView({
      behavior: "smooth",
      block: "start",
    })
  }
}

// Función para validar email
function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  return re.test(email)
}

// Función para formatear números de teléfono
function formatPhone(phone) {
  const cleaned = phone.replace(/\D/g, "")
  const match = cleaned.match(/^(\d{3})(\d{3})(\d{3})$/)
  if (match) {
    return match[1] + " " + match[2] + " " + match[3]
  }
  return phone
}
