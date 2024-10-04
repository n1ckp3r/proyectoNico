<?php
    if (!empty($_POST['nombre']) && !empty($_POST['altura']) && !empty($_POST['email'])) {
        $nombres = $_POST['nombre'];
        $alturas = $_POST['altura'];
        $emails = $_POST['email'];
    
        $cantidad = count($nombres);
    
        echo "<h2>Datos de las personas:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Altura (metros)</th><th>Correo electrónico</th></tr>";
    
        for ($i = 0; $i < $cantidad; $i++) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($nombres[$i]) . "</td>";
            echo "<td>" . htmlspecialchars($alturas[$i]) . "</td>";
            echo "<td>" . htmlspecialchars($emails[$i]) . "</td>";
            echo "</tr>";
        }
    
        echo "</table>";
     }
?>