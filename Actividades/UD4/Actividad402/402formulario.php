<?php
    /*
        Ejercicio 402¶
        402formulario.html y 402formulario.php: Crea un formulario que solicite:

        Nombre y apellidos.
        Email.
        URL página personal.
        Sexo (radio).
        Número de convivientes en el domicilio.
        Aficiones (checkboxes) – poner mínimo 4 valores.
        Menú favorito (lista selección múltiple) – poner mínimo 4 valores.
        Muestra los valores cargados en una tabla-resumen.
    */
    if (!empty($_POST["nomApell"])&&
        !empty($_POST["email"])&&
        !empty($_POST["urlPers"])&&
        !empty($_POST["genero"])&&
        isset($_POST["numConv"])&&
        !empty($_POST["aficiones"])&&
        !empty($_POST["menuFav"])) 
    {
        $nombreApellido = $_POST["nomApell"]; 
        $email = $_POST["email"]; 
        $urlPers = $_POST["urlPers"]; 
        $genero = $_POST["genero"]; 
        $numConv = $_POST["numConv"]; 
        $aficiones = $_POST["aficiones"]; 
        $menuFav = $_POST["menuFav"];   
        
        echo "<p>Nombres y apellidos: $nombreApellido</p>";
        echo "<p>Email: $email</p>";
        echo "<p>URL Página Personal: $urlPers</p>";
        echo "<p>Sexo: $genero</p>";
        echo "<p>Numero de convivientes en el domicilio: $numConv</p>";
        
        echo "<p>Aficiones:</p>";
        echo "<ul>";
        foreach ($aficiones as $element) {
            echo "<li>$element</li>";
        }
        echo "</ul>";

        echo "<p>Menús Favoritos: $menuFav</p>";

    }else{
        echo "faltan campos por rellenar";
    }
?>