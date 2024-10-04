<form action="" method="get">
    <label for="base">Base</label>
    <input type="text" name="base" id="base">

    <label for="exponente">Exponente</label>
    <input type="text" name="exponente" id="exponente">
    <input type="submit" name="boton" id="boton">
    
</form>

<?php
    if (!empty($_GET["base"] && !empty($_GET["exponente"]))) {
        $base = $_GET["base"];
        $exponente = $_GET["exponente"];
        $array = [count($exponente)];

        for ($i=0; $i < count($array); $i++) {
            $array[$i] = $base;
            echo $resPotencia;
        }
    }
?>