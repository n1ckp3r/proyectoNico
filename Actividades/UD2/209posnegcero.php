<form action="" method="get">
    <label for="num">Numero</label>
    <input type="text" name="num" id="num">
    <input type="submit" value="Mostrar">
</form>

<?php
    if (!empty($_GET["num"])) {
        $num = $_GET["num"];

        if ($num > 0) {
            print("El numero $num es positivo");
        } else if ($num < 0) {
            print("El numero $num es negativo");
        } else if ($num = 0){
            print("El numero es $num");
        }
    }
?>