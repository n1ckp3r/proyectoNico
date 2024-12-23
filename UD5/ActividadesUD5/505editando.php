<?php
    include "./config/database.inc.php";
    if ($_SERVER['REQUEST_METHOD'] === 'post' 
        && !empty($_POST["nombre"]) && !empty($_POST["rol"]) && !empty($_POST["dificultad"])
        && !empty($_POST["descripcion"]) && isset($_POST["id"])) {
        
        $nombre = $_POST["nombre"];
        $rol = $_POST["rol"];
        $dificultad = $_POST["dificultad"];
        $descripcion = $_POST["descripcion"];
        $id = intval($_POST["id"]);

        $con = null;
        try {
            $con = new PDO(DSN,USER,PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = "UPDATE campeon
                    SET descripcion = :descr, dificultad = :dif, nombre = :nom, rol = :rol
                    WHERE id = :id";
            $sentencia = $con->prepare($sql);
            $sentencia -> bindParam(":descr", $descripcion, PDO::PARAM_STR);
            $sentencia -> bindParam(":dif", $dificultad, PDO::PARAM_STR);
            $sentencia -> bindParam(":nom", $nombre, PDO::PARAM_STR);
            $sentencia -> bindParam(":rol", $rol, PDO::PARAM_STR);
            $sentencia -> bindParam(":id", $id, PDO::PARAM_INT);
            $sentencia->execute();

            header("Location: 505campeones.php");
        } catch (PDOException $e) {
            echo "Error al conectar con la BBDD".$e->getMessage();
        } finally{
            $con = null;
        }
    }
?>