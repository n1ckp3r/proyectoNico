<?php
    include "./config/database.inc.php";

   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["id"])) {
        $id= intval($_POST["id"]);
        $con = null;
        try {
            $con = new PDO(DSN,USER,PASSWORD);
            $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE FROM jugadores where id = :id";
            $sentencia = $con ->prepare($sql);

            $sentencia -> bindParam(":id",$id,PDO::PARAM_INT);
            $sentencia->execute();

            //header("Location: jugadores.php");

        } catch (PDOException $e) {
            echo "ERROR: ". $e->getMessage();
        } finally {
            $con = null;
        }
   }
?>

    <p>Jugador eliminado correctamente</p>
    <form action="jugadores.php" method="post">
        <button type="submit" name="volver" value="volver">Volver</button>
    </form>