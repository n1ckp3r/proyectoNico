<?php
    /* 
    Vuelve a realizar el ejercicio 207, el de las monedas 
    (500, 200, 100, 50, 20, 10, 5, 2, 1), pero haciendo uso de arrays y un bucle. 
    Almacena el resultado en un array asociativo. 
    Muestra el resultado en una lista desordenada únicamente con las cantidades 
    que tienen algún valor.
    */
    if (!empty($_GET["dinero"])) {
        $dinero = $_GET["dinero"];
        
        $valores = [500, 200, 100, 50, 20, 10, 5, 2, 1];
        $resultado = [];
    
        
        foreach ($valores as $valor) {
            $cantidad = intdiv($dinero, $valor);
            if ($cantidad > 0) {
                $resultado[$valor] = $cantidad;
            }
            $dinero = $dinero % $valor;
        }
        
        echo "<ul>";
        foreach ($resultado as $valor => $cantidad) {
            echo "<li>$cantidad " . ($valor >= 5 ? "billete" : "moneda") . " de $valor</li>";
        }
        echo "</ul>";
    }

?>