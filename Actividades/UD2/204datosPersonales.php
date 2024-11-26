<?php
    if (!empty($_GET["nombre"])){    
        $nombre = $_GET["nombre"];
        $apellidos = $_GET["apellidos"];
        $email = $_GET["email"];
        $anyo = $_GET["anyo"];
        $telf = $_GET["telf"];
        
        $table = "<table border='1' cellpadding='10'>";

        $table .= "<tr><td>Nombre</td><td>". htmlspecialchars($nombre)."</td></tr>";
        $table .= "<tr><td>Apellidos</td><td>". htmlspecialchars($apellidos)."</td></tr>";
        $table .= "<tr><td>Email</td><td>". htmlspecialchars($email)."</td></tr>";
        $table .= "<tr><td>Año</td><td>". htmlspecialchars($anyo)."</td></tr>";
        $table .= "<tr><td>Telefono</td><td>". htmlspecialchars($telf)."</td></tr>";

        $table .= "</table>";

        echo $table;
    }
?>