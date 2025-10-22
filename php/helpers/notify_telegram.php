<?php
// Archivo: php/helpers/notify_telegram.php

// Tu token y chat ID (solo de ejemplo — verifica que estén correctos)
$botToken = "8387679229:AAEPfB79Soov3uLZTyv3Lq9rbifJxeoJcwc";
$chatId   = "8469651553";

// Capturamos datos básicos del visitante
$ip = $_SERVER['REMOTE_ADDR'];
$agente = $_SERVER['HTTP_USER_AGENT'];
$fecha = date("Y-m-d H:i:s");

// Texto del mensaje
$mensaje = "🟣 Nueva visita a /verifying/\n".
           "📅 Fecha: $fecha\n".
           "🌐 IP: $ip\n".
           "🧠 Navegador: $agente";

// Enviar mensaje a Telegram
$url = "https://api.telegram.org/bot$botToken/sendMessage";
$data = [
    'chat_id' => $chatId,
    'text' => $mensaje
];

$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    ]
];

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

// Puedes activar esto para depuración
// echo $result;
?>
