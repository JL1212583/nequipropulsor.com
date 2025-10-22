<?php
// Mostrar errores (solo para pruebas)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configura tu token y chat ID
$botToken = "8387679229:AAEPfB79Soov3uLZTyv3Lq9rbifJxeoJcwc";
$chatId = "8469651553";

// Mensaje a enviar
$msg = "🔔 Alguien entró en la página verifying.";

// Enviar mensaje a Telegram
$url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($msg);

// Ejecutar la petición
$response = file_get_contents($url);

// Mostrar respuesta (para depuración)
echo $response ? "✅ Enviado correctamente" : "❌ Error al enviar";
?>
