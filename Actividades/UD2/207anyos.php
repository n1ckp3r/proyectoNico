<?php
    $anyoActual = date("Y");
    $edad = 33;
    $menos10 = $edad - 10;
    $mas10 = $edad + 10;
    $anyoJubilacion = 67 - $edad;
    echo "<h1>Edades</h2>";
    echo "<p>Año actual: $anyoActual</p>";
    echo "Edad actual: $edad";
    echo "<p>Hace 10 años esta persona tenía $menos10</p>";
    echo "<p>Dentro de 10 años esta persona tendrá $mas10</p>";
    if ($edad<67) {
        echo "Se jubilará en $anyoJubilacion años";
    } else {
        echo "Ya está jubilado";
    }
?>