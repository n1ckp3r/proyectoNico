<?php
    if (!empty($_GET["filas"]) && !empty($_GET["columnas"])) {
        $filas = $_GET["filas"];
        $columnas = $_GET["columnas"];

        echo "<table border=1>";
        for ($i=0; $i < $columnas; $i++) { 
            echo "<tr>";
            for ($j=0; $j < $filas; $j++) { 
                echo "<td>";
                    if ($i == 0 || $i == $filas - 1 || $j == 0 || $j == $columnas - 1) {
                        echo "($i,$j)";
                    }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
?>