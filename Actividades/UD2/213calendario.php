<!-- <form action="" method="get">
        <label for="dia">Dia</label>/
        <input type="text" id="dia" name="dia">

        <label for="mes">Mes</label>/
        <input type="text" id="mes" name="mes">

        <label for="anyo">Año</label>
        <input type="text" id="anyo" name="anyo">

        <input type="submit" value="Sumar 1 dia">
</form> -->

<?php
    if (!empty($_GET["dia"]) && !empty($_GET["mes"]) && !empty($_GET["anyo"])) {
        $dia = $_GET["dia"];
        $mes = $_GET["mes"];
        $anyo = $_GET["anyo"];


        $dia++;
        if ($dia > 31) {
            echo "Introduce una fecha real<br>";
            $dia=1;
            $mes++;
        } if ($mes > 12) {
            $mes = 1;
            $dia = 1;
            $anyo++;
        } 

        echo "$dia/$mes/$anyo";

        
    }
?>