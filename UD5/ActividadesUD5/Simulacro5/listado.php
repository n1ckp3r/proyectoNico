<?php
    session_start();
    if (isset($_SESSION['exam'])){
        echo "hola ".$_SESSION["exam"];

        
    }
?>

<a href="logout.php">cerrar sesion</a>