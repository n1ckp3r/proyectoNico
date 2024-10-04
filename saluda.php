

<form action="saluda.php" method="get">
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>
            <label for="apellido1">Primer apellido:</label>
            <input type="text" name="apellido1" id="apellido1">
        </p>
        <p>
            <input type="submit" value="enviar">
        </p> 
  </form>
<?php
    $nombre = $_GET["nombre"];
    $apellido1 = $_GET["apellido1"];

    echo "Hola $nombre $apellido1";
?>