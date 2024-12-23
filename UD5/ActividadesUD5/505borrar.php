<?php
    include "./config/database.inc.php";
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["id"])) {
        $id = intval($_POST["id"]);
        $conexion = null;
        try {
            $conexion = new PDO(DSN,USER,PASSWORD);
            $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE FROM campeon WHERE id = :id";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':id',$id, PDO::PARAM_INT);
            $sentencia->execute();

            // echo "<p>Campeon eliminado correctamente</p>";
            // echo '<form action="505campeones.php" method="post">';
            // echo '<button type="submit" name="volver" value="volver">Volver</button>';
            // echo '</form>';


        } catch (PDOException $e) {
            echo "Error en la base de datos $dbname". $e->getMessage();
        }finally{
            $conexion = null;
        }

    }
?>


            <p>Campeon eliminado correctamente</p>
            <form action="505campeones.php" method="post">
                <button type="submit" name="volver" value="volver">Volver</button>
            </form>