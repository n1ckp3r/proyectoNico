<?php
    include "./config/database.inc.php";
  
    if ($_SERVER["REQUEST_METHOD"]==="POST" && !empty($_POST["nombre"]) && 
        !empty($_POST["equipo"]) && !empty($_POST["posicion"]) && isset($_POST["id"])) {
        $nombre = $_POST["nombre"];
        $equipo = $_POST["equipo"];
        $posicion = $_POST["posicion"];
        $id = intval($_POST["id"]);
        
        $con = null;
        try {
            $con = new PDO(DSN,USER,PASSWORD);
            $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE jugadores 
                    SET nombre = :nom, equipo = :equ, posicion = :pos
                    WHERE id = :id";
            $sentencia = $con->prepare($sql);
            $sentencia->bindParam(":nom", $nombre, PDO::PARAM_STR);
            $sentencia->bindParam(":equ", $equipo, PDO::PARAM_STR);
            $sentencia->bindParam(":pos", $posicion, PDO::PARAM_STR);
            $sentencia->bindParam(":id", $id, PDO::PARAM_INT);

            $sentencia->execute();

            header("Location: jugadores.php");
        } catch (PDOException $e) {
            "ERROR: ".$e->getMessage();
        } finally {
            $con = null;
        }
    }
?>

<!-- <p>Jugador editado con exito</p>
<a href="./jugadores.php">Volver al inicio</a> -->