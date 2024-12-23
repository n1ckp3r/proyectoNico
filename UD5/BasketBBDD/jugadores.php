<?php
    // echo "Contraseña de Juanma: ". password_hash("maricoh",PASSWORD_BCRYPT). "<br>";
    // echo "Contraseña de Gabriel: ". password_hash("weon",PASSWORD_BCRYPT). "<br>";
    // echo "Contraseña de Nico: ". password_hash("tio",PASSWORD_BCRYPT). "<br>";

    include "./config/database.inc.php";

    $con = null;
    try {
        session_start();
        $con = new PDO(DSN, USER, PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT * FROM jugadores";
        
        $sentencia = $con->prepare($sql);
        $sentencia -> execute();
        
        $jugadores = $sentencia -> fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        echo "ERROR: ".$e->getMessage();
    } finally{
        $con = null;
    }

?>

<?php

   echo "<h1>Jugadores(".$_SESSION["almacen"].")</h1>";
?>


<!-- <ul> -->
    
    <?php foreach ($jugadores as $item):?>
    <fieldset>
    <legend>Jugador <?php echo htmlspecialchars($item["id"])?></legend>
    <p>
        ID: <?php echo htmlspecialchars($item["id"]) ?> <br>
        Nombre: <?php echo htmlspecialchars($item["nombre"]) ?> <br>
        Equipo: <?php echo htmlspecialchars($item["equipo"]) ?> <br>
        Posición: <?php echo htmlspecialchars($item["posicion"]) ?><br>
        <form style='display: inline;' action="editar.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($item["id"]) ?>">
            <button type="submit" name="subir">Editar</button>
        </form>
        <form style='display: inline;' action="borrar.php" method="post" onsubmit="return confirmar(<?php echo htmlspecialchars($item['id']) ?>)">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($item["id"]) ?>">
            <button type="submit" name="borrar">Borrar</button>
        </form>
        <br>
        <br>
    </p>
    </fieldset>
    <?php endforeach;?>
    <form action="cerrarSesion.php" method="post">
        Cerrar Sesion <button name="salir" type="submit">Salir</button>
    </form>
    <form action="crearJugador.html" method="post">
        Crear Jugador <button type="submit" name="crearJugador">Crear</button>
    </form>
    
<!-- </ul> -->
<script>
    function confirmar(borrar){
        return confirm("¿Desea borrar el usuario seleccionado?");
    }
</script>