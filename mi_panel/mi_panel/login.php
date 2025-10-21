<?php
require 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $conn = conectar();

    // Crear la tabla si no existe (en caso create_admin no se ejecutó)
    $create_sql = """
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )
    """;
    sentencia($conn, $create_sql);

    // Preparar consulta segura evitando inyección (simple escaping)
    $username_esc = mysqli_real_escape_string($conn, $username);
    $sql = "SELECT * FROM users WHERE username='" . $username_esc . "' LIMIT 1";
    $result = sentencia($conn, $sql);

    if(contarfilas($result) > 0){
        $user = traerdatos($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header('Location: dashboard.php');
            exit;
        } else {
            echo 'Contraseña incorrecta.';
        }
    } else {
        echo 'Usuario no encontrado.';
    }

    desconectar($conn);
} else {
    header('Location: index.php');
    exit;
}
?>
