<form action="" method="get">
    <p>
        <label for="num1">Primer numero</label>
        <input type="text" id="num1" name="num1">
    </p>

    <p>
        <label for="num2">Segundo numero</label>
        <input type="text" id="num2" name="num2">
    </p>
    <p>
        <input type="submit">
    </p>

</form>

<?php
    if (!empty($_GET["num1"])&&!empty($_GET["num2"])) {
        $num1 = $_GET["num1"];
        $num2 = $_GET["num2"];

        for ($i=$num1; $i <= $num2; $i++) { 
            for ($j=$num1; $j <= $num2; $j++) { 
                $suma = $i+$j;
                echo "$i+$j= $suma<br>";
            }
        }
    }
?>