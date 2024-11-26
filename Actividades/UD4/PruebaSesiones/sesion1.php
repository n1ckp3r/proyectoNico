<?php
    session_start(); // inicializamos

    $_SESSION["ies"] = "IES Mestre Ramon Esteve"; // asignación

    $instituto = $_SESSION["ies"]; // recuperación
    echo "Estamos en el $instituto";
?>
<br />
<a href="sesion2.php">Y luego</a>