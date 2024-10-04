<?php
    if (isset($_POST["enviar"])) {
        $suma = 0;
        $enviar = $_POST["enviar"];
        foreach ($_POST as $key => $value) {
            if ($value != $enviar) {
                $suma += (int)$value;    
            }
        }
        echo "La suma de todo los numeros es $suma";
    }

?>