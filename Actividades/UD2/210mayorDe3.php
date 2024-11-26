<form action="" method="get">
    <p>
        <label for="a">Numero "a"</label>
        <input type="text" name="a" id="a">
    </p>
    <p>
        <label for="b">Numero "b"</label>
        <input type="text" name="b" id="b">
    </p>
    <p>
        <label for="b">Numero "b"</label>
        <input type="text" name="b" id="b">
    </p>
    <p>
        <input type="submit" name="mostrar" id="mostrar" value="Mostrar">
    </p>
</form>

<?php
    if (!empty($_GET["a"] && !empty ($_GET["b"]) && !empty($_GET["c"]))) {
        $a = $_GET["a"];
        $b = $_GET["b"];
        $c = $_GET["c"];

        if ($a > $c && $a > $b) {
            echo "El numero 'a':$a es el mayor";
        } if ($b > $c && $b < $a) {
            echo "El numero 'b':$b es el mayor";
        } if ($c>$a && $c>$b) {
            echo "El numero 'c':$c es el mayor";
        }
    }
?>