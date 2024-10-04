<?php
    echo "<table>";
    echo "<tr>";
    for ($i=1; $i <= 10; $i++) {
        echo "<td>";
        
        echo "<table border='1' cellpadding='10' cellspacing='50'>"; 
        echo "<thead>";
        echo "<tr>";
        echo "<th colspan='5'>Tabla del $i</th></tr></thead>";
        echo "<thbody>"; 
        for ($j=1; $j <= 10; $j++) { 
            $resultado=$j*$i;
            echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>*</td>";
                echo "<td>$j</td>";
                echo "<td>=</td>";
                echo "<td>$resultado</td>";
            echo "</tr>";
        }
        echo "</thbody>";
        echo "</table>";
        
        echo "</td>";
    }
    echo "</tr>";
    echo "</table>";

    // en el td: style='border-left: 0; border-right: 0;'
?>

