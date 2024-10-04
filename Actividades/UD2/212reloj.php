<form action="" method="get">
    <label for="reloj">Dinero</label>
    <input type="text" name="horas" id="horas" maxlength="2" size="2">:
    <input type="text" name="minutos" id="munutos" maxlength="2" size="1">:
    <input type="text" name="segundos" id="segundos" maxlength="2" size="2">
    <input type="submit" value="calcular">
</form>



<?php
    if (!empty($_GET["horas"])&& !empty($_GET["minutos"] && !empty($_GET["segundos"]))) {
        $horas = $_GET["horas"];
        $minutos= $_GET["minutos"];
        $segundos= $_GET["segundos"];

        $segundos++;
        if ($segundos === 60) {
            $segundos = 0;
            $minutos++;
        } if ($minutos === 60) {
            $minutos = 0;
            $horas++;
        } if ($horas === 24) {
            $horas = 0;
        }
        echo "Hora+1 => $horas:$minutos:$segundos";

    }
?>