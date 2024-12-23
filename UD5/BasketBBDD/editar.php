<?php
    include "./config/database.inc.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["id"])) {
        $id = intval($_POST["id"]);
        $con = null;
        try {
            $con = new PDO(DSN,USER,PASSWORD);
            $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM jugadores WHERE id = :id";

            $sentencia = $con->prepare($sql);
            $sentencia ->bindParam(":id",$id,PDO::PARAM_INT);
            $sentencia -> execute();
            $jugador = $sentencia -> fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "ERROR en base de datos $dbname: ".$e->getMessage();
        } finally {
            $con = null;
        }
    }    
?>

<form action="editando.php" method="post">
    <input type="hidden" name="id" value="<?php echo $jugador ? htmlspecialchars($jugador["id"]) : ""?>">
    <p>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value=" <?php echo $jugador ? htmlspecialchars($jugador["nombre"]) : "" ?>">
    </p>
    <p>
        <label for="equipo">Equipo</label>
        <input type="text" name="equipo" id="equipo" value="<?php echo $jugador ? htmlspecialchars($jugador["equipo"]) : "" ?>">
    </p>
    <p>
        Posicion: <select name="posicion" id="posicion">
            <option value="<?php echo $jugador ? htmlspecialchars($jugador["posicion"]) : "" ?>">Base</option>
            <option value="<?php echo $jugador ? htmlspecialchars($jugador["posicion"]) : "" ?>">Escolta</option>
            <option value="<?php echo $jugador ? htmlspecialchars($jugador["posicion"]) : "" ?>">Ala pivot</option>
            <option value="<?php echo $jugador ? htmlspecialchars($jugador["posicion"]) : "" ?>">Pivot</option>
            <option value="<?php echo $jugador ? htmlspecialchars($jugador["posicion"]) : "" ?>">Alero</option>
        </select>
    </p>
    <p>
        <button type="submit" name="guardar">Editar</button>
    </p>
</form>