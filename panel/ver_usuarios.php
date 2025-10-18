<?php
require('lib/conexion.php'); // usa tu conexión actual

if ($con = conectar()) {
    $sql = "SELECT * FROM uyuo6"; // nombre de tu tabla
    $resultado = sentencia($con, $sql);

    echo "<h2>Usuarios registrados en la base de datos</h2>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Usuario</th><th>Password</th></tr>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr><td>{$fila['usuario']}</td><td>{$fila['password']}</td></tr>";
    }

    echo "</table>";
    desconectar($con);
} else {
    echo "❌ Error: no se pudo conectar a la base de datos.";
}
?>
