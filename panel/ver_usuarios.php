<?php
require('lib/conexion.php'); // usa la misma conexión que tu app

if ($con = conectar()) {
    $resultado = sentencia($con, "SELECT * FROM uyuo6");
    echo "<h2>Usuarios registrados:</h2>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Usuario</th><th>Password</th></tr>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr><td>{$fila['usuario']}</td><td>{$fila['password']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "❌ Error: No se pudo conectar a la base de datos.";
}
?>
