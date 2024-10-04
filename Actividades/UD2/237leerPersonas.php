<?php
    if (!empty($_POST["cantidad"])) {
        $cantidad = $_POST["cantidad"];

        echo "<form action='238gestionarPersonas.php' method='post'>";
            for ($i=0; $i < $cantidad; $i++) { 
                echo "<fieldset>";
                echo "<legend>Persona " . ($i + 1) . "</legend>";
                
                echo "<label for='nombre_$i'>Nombre:</label>";
                echo "<input type='text' name='nombre[]' id='nombre_$i' required><br>";
        
                echo "<label for='altura_$i'>Altura (metros):</label>";
                echo "<input type='number' name='altura[]' id='altura_$i' step='0.01' min='0' max='3' required><br>";
        
                echo "<label for='email_$i'>Correo electrónico:</label>";
                echo "<input type='email' name='email[]' id='email_$i' required><br>";
        
                echo "</fieldset><br>";
            }
        echo "<input type='submit' value='Mostrar' name='boton'>";
        echo "</form>";
    }
?>