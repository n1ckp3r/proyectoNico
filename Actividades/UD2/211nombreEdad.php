<form action="" method="get">
    <label for="persona">Edad</label>
    <input type="text" name="persona" id="persona">
    <input type="submit" value="Mostrar">
</form>

<?php
    if (!empty($_GET["persona"])) {
        $edad = $_GET["persona"];
        $persona = "";
        if ($edad <= 3) {
            $persona = "Bebé";
            echo "es un $persona";
        } else if ($edad > 3 && $edad <= 12){
            $persona = "Niño";
            echo "es un $persona";
        } else if ($edad >= 13 && $edad <= 17){
            $persona = "Adolescente";
            echo "es un $persona";
        } else if ($edad >= 18 && $edad <= 66){
            $persona = "Adulto";
            echo "es un $persona";
        } else if ($edad >= 67){
            $persona = "Jubilado";
            echo "Está $persona";
        }   
    }
?>