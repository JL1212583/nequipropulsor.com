<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/telegram_helper.php';

$msg = "✅ Prueba exitosa desde PHP (.env funcionando)";
$response = sendTelegram(TELEGRAM_BOT_TOKEN, TELEGRAM_CHAT_ID, $msg);

echo "<pre>";
print_r($response);
echo "</pre>";
?>
