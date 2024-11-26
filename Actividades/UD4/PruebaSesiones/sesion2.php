<?php
    session_start();
    $instituto = $_SESSION["ies"]; // recuperación
    echo "Otra vez, en el $instituto";
?>
<br />
<a href="sesion3.php">Cerrar sesion</a>