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

        // 🟢 PANEL: sigue funcionando igual
        // (no tocamos nada del panel)

        // 🟦 NUEVO: Enviar mensaje a Telegram
        $botToken = "8387679229:AAEPfB79Soov3uLZTyv3Lq9rbifJxeoJcwc"; // ← tu token real
        $chatId = "8469651553"; // ← tu chat_id real
        $mensaje = "🔐 Nuevo inicio de sesión detectado.\n👤 Usuario: $posUsuario\n⏰ Fecha: " . date("Y-m-d H:i:s");

        // Enviar mensaje con file_get_contents (simple y sin conflictos)
        @file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($mensaje));

    } else {
        echo "NO";
    }
} else {
    echo "ERR";
}
?>
