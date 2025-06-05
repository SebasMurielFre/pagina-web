<?php
// Script de descarga segura para manuales
session_start();

// Configuración de seguridad
$allowed_files = [
    '1' => [
        'filename' => 'ACTIVACIÓN SOLICITUD CERTIFICADO FIRMA ELECTRÓNICA_ECU.pdf',
        'display_name' => 'Manual de Activación de Contraseñas.pdf',
        'mime_type' => 'application/pdf'
    ],
    '2' => [
        'filename' => 'Descarga, Aspecto, Almacenamiento, Instalación y Uso de Certificado de Firma Electrónica.pdf',
        'display_name' => 'Manual de Descarga y Uso de la Firma Electrónica - Windows.pdf',
        'mime_type' => 'application/pdf'
    ],
    '3' => [
        'filename' => 'Manual ANF AC – Solución Estado de Validez de firma Desconocida en Adobe Reader.pdf',
        'display_name' => 'Manual para Identificar Firmas Desconocidas.pdf',
        'mime_type' => 'application/pdf'
    ],
    '4' => [
        'filename' => 'MANUAL CAMBIO DE EXTENSION .PFX A .P12.pdf',
        'display_name' => 'Manual para cambio de Extensión .PFX a .P12.pdf',
        'mime_type' => 'application/pdf'
    ],
    '5' => [
        'filename' => 'MANUAL DE CONFIGURACION FIRMA EC EN  MAC.pdf',
        'display_name' => 'Manual Configuración de Firma EC en iOS.pdf',
        'mime_type' => 'application/pdf'
    ],
    '6' => [
        'filename' => 'MANUAL DESBLOQUEO CONTRASEÑA PIN.pdf',
        'display_name' => 'Manual para Desbloquear Contraseña PIN.pdf',
        'mime_type' => 'application/pdf'
    ],
    '7' => [
        'filename' => 'MANUAL FIRMA EC.pdf',
        'display_name' => 'Manual Uso Firma EC.pdf',
        'mime_type' => 'application/pdf'
    ],
    '8' => [
        'filename' => 'MANUAL RECUPERACION DE CLAVE PLATAFORMA.pdf',
        'display_name' => 'Manual Recuperación Contraseña Plataforma.pdf',
        'mime_type' => 'application/pdf'
    ]
];

// Directorio de manuales
$manuals_dir = __DIR__ . '/manuales/downloads/';

// Función para registrar descargas (opcional)
function logDownload($manual_id, $user_ip) {
    $log_file = __DIR__ . '/logs/downloads.log';
    $log_dir = dirname($log_file);
    
    // Crear directorio de logs si no existe
    if (!is_dir($log_dir)) {
        mkdir($log_dir, 0755, true);
    }
    
    $timestamp = date('Y-m-d H:i:s');
    $log_entry = "[$timestamp] Manual: $manual_id | IP: $user_ip" . PHP_EOL;
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
}

// Función para validar y descargar archivo
function downloadManual($manual_id) {
    global $allowed_files, $manuals_dir;
    
    // Validar que el manual existe en la lista permitida
    if (!isset($allowed_files[$manual_id])) {
        http_response_code(404);
        die('Manual no encontrado.');
    }
    
    $file_info = $allowed_files[$manual_id];
    $file_path = $manuals_dir . $file_info['filename'];
    
    // Verificar que el archivo existe físicamente
    if (!file_exists($file_path)) {
        http_response_code(404);
        die('Archivo no disponible temporalmente. Contacta a soporte.');
    }
    
    // Verificar que el archivo es legible
    if (!is_readable($file_path)) {
        http_response_code(500);
        die('Error al acceder al archivo.');
    }
    
    // Registrar la descarga
    logDownload($manual_id, $_SERVER['REMOTE_ADDR'] ?? 'unknown');
    
    // Configurar headers para descarga
    header('Content-Type: ' . $file_info['mime_type']);
    header('Content-Disposition: attachment; filename="' . $file_info['display_name'] . '"');
    header('Content-Length: ' . filesize($file_path));
    header('Cache-Control: no-cache, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
    
    // Limpiar buffer de salida
    if (ob_get_level()) {
        ob_end_clean();
    }
    
    // Enviar archivo
    readfile($file_path);
    exit;
}

// Procesar solicitud de descarga
if (isset($_GET['manual']) && !empty($_GET['manual'])) {
    $manual_id = trim($_GET['manual']);
    
    // Sanitizar entrada
    $manual_id = preg_replace('/[^a-zA-Z0-9\-_]/', '', $manual_id);
    
    if (!empty($manual_id)) {
        downloadManual($manual_id);
    }
}

// Si llegamos aquí, hay un error
http_response_code(400);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de Descarga - PROINVESTEC SA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full text-center">
            <i class="fas fa-exclamation-triangle text-6xl text-red-500 mb-4"></i>
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Error de Descarga</h1>
            <p class="text-gray-600 mb-6">
                No se pudo procesar tu solicitud de descarga. Por favor, intenta nuevamente o contacta a nuestro soporte técnico.
            </p>
            <div class="space-y-3">
                <a href="manuales.php" class="block bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition-colors">
                    Volver a Manuales
                </a>
                <a href="contacto.php" class="block bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded transition-colors">
                    Contactar Soporte
                </a>
            </div>
        </div>
    </div>
</body>
</html>
