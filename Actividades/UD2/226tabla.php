<?php
    if (!empty($_GET["filas"]) && !empty($_GET["columnas"])) {
        $filas = $_GET["filas"];
        $columnas = $_GET["columnas"];

        echo "<table border=1>";
        for ($i=0; $i < $columnas; $i++) { 
            echo "<tr>";
            for ($j=0; $j < $filas; $j++) { 
                echo "<td>";
                echo "($i,$j)";
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
?>