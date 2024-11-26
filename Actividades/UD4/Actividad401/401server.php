<?php
    echo "<h1>Información Server</h1>";
    print_r($_SERVER);

    if (!empty($_GET["nomApell"])) {
        echo "<h1>Nombre y Apellidos Formulario GET</h1>";
        print($_GET["nomApell"]);
    } else {
        echo "<p>Está vacío</p>";
    }

    if (!empty($_POST["nomApell"])) {
        echo "<h1>Nombre y Apellidos Formulario POST</h1>";
        print($_POST["nomApell"]);
    } else{
        echo "<p>Está vacío</p>";
    }

    if (isset($_POST["boton"])) {
        echo "<h2>Link</h2>";
        print_r($_SERVER['HTTP_REFERER']);
    } else {
        echo "<p>Está vacío</p>";
    }

?>