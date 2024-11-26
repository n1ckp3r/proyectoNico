<?php
    if (!empty($_POST["cantidad"])) {
        $cantidad=$_POST["cantidad"];
        echo "<form action='225sumarDatos.php' method='post'>";
        for ($i=1; $i <= $cantidad; $i++) { 
            
            echo "<label for=$i>Numero $i</label>
                  <input type='number' name=$i>
                  <br/>";
            
        }
        echo "<input type='submit' name='enviar' value='sumar'>";
        echo "</form>";
    }

?>