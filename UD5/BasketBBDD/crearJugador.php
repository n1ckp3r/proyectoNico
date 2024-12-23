<?php
    include "./config/database.inc.php";
    if ($_SERVER["REQUEST_METHOD"]==='POST' && isset($_POST["id"])) {
        $nombre = $_POST["nombre"];
        $equipo = $_POST["equipo"];
        $posicion = $_POST["posicion"];
        $id = isset($_POST["id"]) ? intval($_POST["id"]) : null;
        
        $con = null;
        try {
            $con = new PDO(DSN,USER,PASSWORD);
            $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $sql = "INSERT INTO jugadores 
            //         VALUES (:id, :nom, :equ, :pos)";
            $sql = "INSERT INTO jugadores (id, nombre, equipo, posicion) 
                    VALUES (:id, :nom, :equ, :pos)";

            $sentencia = $con ->prepare($sql);
            $sentencia->bindParam(":id", $id);
            $sentencia->bindParam(":nom", $nombre);
            $sentencia->bindParam(":equ", $equipo);
            $sentencia->bindParam(":pos", $posicion);
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "ERROR: ".$e->getMessage();
        } finally{
            $con = null;
        }
    }
?>

<p>Se ha creado el jugador</p>
<a href="jugadores.php">Volver a inicio</a>