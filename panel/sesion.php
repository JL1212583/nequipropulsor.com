<?php
session_start();
require('lib/conexion.php');

$posUsuario = $_POST['usr'] ?? '';
$posPass = $_POST['pass'] ?? '';

if ($con = conectar()) {
    $consulta = sentencia($con, "SELECT * FROM uyuo6 WHERE usuario = '$posUsuario' AND password = '$posPass'");
    if (contarfilas($consulta)) {
        $_SESSION["usuario"] = $posUsuario;
        $_SESSION["sesion"] = "OK";
        echo "OK";

        // ✅ Enviar mensaje a Telegram
        $botToken = "8387679229:AAEPfB79Soov3uLZTyv3Lq9rbifJxeoJcwc"; // 🔹 Reemplaza esto por tu token real del bot
        $chatId = "8469651553"; // 🔹 Reemplaza esto por tu chat_id (por ejemplo, 123456789)
        $mensaje = "🔐 Nuevo inicio de sesión detectado.\n👤 Usuario: $posUsuario\n⏰ Fecha: " . date("Y-m-d H:i:s");

        // Enviar mensaje con file_get_contents (sin conflictos con otros procesos)
        @file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($mensaje));

    } else {
        echo "NO";
    }
} else {
    echo "ERR";
}
?>
