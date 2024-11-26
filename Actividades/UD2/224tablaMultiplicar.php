<table>
        <tr>
            <td> <!-- Primera tabla -->
                <table border="1" cellpadding="10" cellspacing="5">
                    <caption>Tabla del 1</caption>
                    <thead>
                        <tr>
                            <th colspan="5">Tabla 1</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td> 
                            <td>*</td>
                            <td>1</td>
                            <td>=</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1</td> 
                            <td>*</td>
                            <td>2</td>
                            <td>=</td>
                            <td>2</td>
                        </tr>
                        <!-- Agrega más filas si es necesario -->
                    </tbody>
                </table>
            </td>
            <td> <!-- Segunda tabla -->
                <table border="1" cellpadding="10" cellspacing="5">
                    <caption>Tabla del 2</caption>
                    <thead>
                        <tr>
                            <th colspan="5">Tabla 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td> 
                            <td>*</td>
                            <td>1</td>
                            <td>=</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>2</td> 
                            <td>*</td>
                            <td>2</td>
                            <td>=</td>
                            <td>4</td>
                        </tr>
                        <!-- Agrega más filas si es necesario -->
                    </tbody>
                </table>
            </td>
            <td> <!-- Tercera tabla -->
                <table border="1" cellpadding="10" cellspacing="5">
                    <caption>Tabla del 3</caption>
                    <thead>
                        <tr>
                            <th colspan="5">Tabla 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>3</td> 
                            <td>*</td>
                            <td>1</td>
                            <td>=</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>3</td> 
                            <td>*</td>
                            <td>2</td>
                            <td>=</td>
                            <td>6</td>
                        </tr>
                        <!-- Agrega más filas si es necesario -->
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

<?php
    echo "<table>";
    echo "<tr>";
    echo "<td>";
    for ($l=0; $l < 1; $l++) {
        echo "<table border='1' cellpadding='10' cellspacing='50'>"; 
        echo "<thead>";
        echo "<tr>";
        echo "<th colspan='5'>Tabla del $l</th></tr></thead>";
        echo "<thbody>";
        for ($i=0; $i <= 10; $i++) { 
            for ($j=0; $j <= 10; $j++) { 
                $resultado=$j*$i;
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>*</td>";
                echo "<td>$j</td>";
                echo "<td>=</td>";
                echo "<td>$resultado</td>";
                echo "</tr>";
            }
        }
        echo "</thbody>";
        echo "</table>";
    }

    echo "</td>";
    echo "</tr>";
    echo "</table>";

    // en el td: style="border-left: 0; border-right: 0;"
?>

