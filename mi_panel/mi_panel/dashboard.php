<?php
require 'config.php';
if(!isset($_SESSION['username'])){
    header('Location: index.php');
    exit;
}
?>
<h2>Bienvenido al Panel, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
<p>Este es el contenido protegido del panel.</p>
<a href="logout.php">Cerrar sesión</a>
