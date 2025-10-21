<?php
session_start();
require('lib/conexion.php'); // ✅ ruta corregida

$posUsuario = $_POST['usr'] ?? '';
$posPass = $_POST['pas'] ?? '';

if ($con = conectar()) {
    $consulta = sentencia($con, "SELECT * FROM uyuo6 WHERE usuario = '$posUsuario' AND password = '$posPass'");
    if (contarfilas($consulta)) {
        $_SESSION["usuario"] = $posUsuario;
        $_SESSION["sesion"] = "OK";
        echo "OK";

        // 🟦 Enviar mensaje a Telegram
        $botToken = "8387679229:AAEPfB79Soov3uLZTyv3Lq9rbifJxeoJcwc";
        $chatId = "8469651553";
        $mensaje = "🔐 Nuevo inicio de sesión detectado.\n👤 Usuario: $posUsuario\n⏰ Fecha: " . date("Y-m-d H:i:s");

        @file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($mensaje));

    } else {
        echo "NO";
    }
} else {
    echo "ERR";
}
?>
