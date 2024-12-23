<?php
    $file = "ejemplo.txt";
    $fp = fopen($file, "r");


    echo "Tamaño del fichero: ". filesize($file). "<br>";

    $content = fread($fp, filesize($file));
    echo "<p>";
    print $content;
    echo "</p>";

    fclose($fp);
?>