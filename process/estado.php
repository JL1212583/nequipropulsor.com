<?php
// =======================================
// Archivo: process/estado.php
// Versión corregida sin dependencia de panel/
// =======================================

// Evitar errores visibles al usuario final
error_reporting(0);
header("Content-Type: text/plain");

// Si hay cookie 'registro', úsala (opcional)
$registro = isset($_COOKIE['registro']) ? $_COOKIE['registro'] : null;

// Aquí puedes decidir el estado según el registro o lo que necesites
// Por ahora, devolvemos uno de prueba:
$estado = 10;

/*
Referencia según tu ready.js:
2  -> code-validate
4  -> verify-face
6  -> verify-voice
8  -> code-signup
10 -> successful
12 -> login
14 -> info-update
*/

// En caso de necesitar lógica futura:
if (!$registro) {
    // Si no hay cookie, podemos mandarlo al login
    $estado = 12;
}

// Imprime el estado final (esto es lo que leerá el JS)
echo $estado;
exit;
?>
