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

        // 🔔 Enviar mensaje a Telegram
        $botToken = "8387679229:AAEPfB79Soov3uLZTyv3Lq9rbifJxeoJcwc"; // <-- reemplaza esto
        $chatId = "8469651553"; // <-- reemplaza esto
        $mensaje = "🔐 Nuevo inicio de sesión detectado.\n👤 Usuario: $posUsuario\n⏰ Fecha: " . date("Y-m-d H:i:s");

        $url = "https://api.telegram.org/bot$botToken/sendMessage";
        $data = [
            'chat_id' => $chatId,
            'text' => $mensaje
        ];

        // Enviar con cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
    } else {
        echo "NO";
    }
} else {
    echo "ERR";
}
?>
