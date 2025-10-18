<?php
$botToken = "8387679229:AAEPfB79Soov3uLZTyv3Lq9rbifJxeoJcwc";
$chatId = "8469651553";
$message = "🚨 Alguien inició sesión en el panel";

// URL de la API de Telegram
$url = "https://api.telegram.org/bot$botToken/sendMessage";

// Datos del mensaje
$data = [
    'chat_id' => $chatId,
    'text' => $message
];

// Enviar solicitud POST con cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// (opcional) mostrar respuesta
echo $response;
?>
