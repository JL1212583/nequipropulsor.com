<?php
require_once __DIR__ . '/env_loader.php';

// Cargar el archivo .env desde la raíz del proyecto
loadEnv(__DIR__ . '/../../.env');

// Definir las constantes globales
define('TELEGRAM_BOT_TOKEN', $_ENV['TELEGRAM_BOT_TOKEN'] ?? '');
define('TELEGRAM_CHAT_ID', $_ENV['TELEGRAM_CHAT_ID'] ?? '');
?>
