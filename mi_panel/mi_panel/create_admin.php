<?php
// Este archivo es temporal. Ejecútalo una vez y elimínalo por seguridad.
require 'config.php';
$conn = conectar();

// Crear tabla si no existe
$create_sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";
sentencia($conn, $create_sql);

$user = 'admin';
$plain = 'Camilo2012$'; // contraseña inicial segura que pediste
$hash = password_hash($plain, PASSWORD_DEFAULT);

// Insertar o actualizar el admin
$user_esc = mysqli_real_escape_string($conn, $user);
$hash_esc = mysqli_real_escape_string($conn, $hash);

$sql = "INSERT INTO users (username, password) VALUES ('" . $user_esc . "', '" . $hash_esc . "')
        ON DUPLICATE KEY UPDATE password='" . $hash_esc . "'";

if (sentencia($conn, $sql)) {
    echo "Admin creado/actualizado: " . $user . " / " . $plain;
} else {
    echo "Error al crear admin: " . mysqli_error($conn);
}

desconectar($conn);
?>
