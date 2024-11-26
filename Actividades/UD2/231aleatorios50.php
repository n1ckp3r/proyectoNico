<?php
    $vec = [];
    for ($i=0; $i < 50; $i++) { 
        $num = rand(0,99);
        $vec[$i] = $num;
        echo "Posicion array $i: ".$vec[$i]."<br>";
    }
?>