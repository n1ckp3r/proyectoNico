<?php
    ob_start(); 
    include "./config/database.inc.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["id"])) {
        $id = intval($_POST["id"]);
        $conexion = null;
        try {
            $conexion = new PDO(DSN,USER,PASSWORD);
            $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM campeon WHERE id = :id";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':id',$id, PDO::PARAM_INT);
            $sentencia->execute();
            $campeon = $sentencia->fetch(PDO::FETCH_ASSOC);

            // if ($campeon) {
            //     echo "<h1>Editando Campeón</h1>";
            //     echo "<form method='post' action='505editando.php'>";
            //     echo "<input type='hidden' name='id' value='" . htmlspecialchars($campeon["id"]) . "'>";
            //     echo "Nombre: <input type='text' name='nombre' value='" . htmlspecialchars($campeon["nombre"]) . "'><br>";
            //     echo "Rol: <input type='text' name='rol' value='" . htmlspecialchars($campeon["rol"]) . "'><br>";
            //     //echo "Dificultad: <input type='text' name='dificultad' value='" . htmlspecialchars($campeon["dificultad"]) . "'><br>";
            //     echo "Dificultad: <select name='dificultad'>
            //                 <option value='".htmlspecialchars($campeon["dificultad"]) ."'>Baja</option>
            //                 <option value='".htmlspecialchars($campeon["dificultad"]) ."'>Media</option>
            //                 <option value='".htmlspecialchars($campeon["dificultad"]) ."'>Alta</option>
            //             </select><br>";
            //     echo "Descripcion: <textarea name='descripcion'>" . htmlspecialchars($campeon["descripcion"]) . "</textarea><br>";
            //     echo "<button name='guardar' type='submit'>Guardar</button>";
            //     echo "</form>";
            // } else {
            //     echo "Campeon no encontrado";
            //     exit;
            // }
        } catch (PDOException $e) {
            echo "Error en la base de datos $dbname". $e->getMessage();
        } finally{
            $conexion = null;
        }
    }
?>

<h1>Editando Campeón</h1>
    <form method='post' action='505editando.php'>
        <input type='hidden' name='id' value=' <?php echo $campeon ? htmlspecialchars($campeon["id"]) : '' ?>'>
        Nombre: <input type='text' name='nombre' value='<?php echo $campeon ? htmlspecialchars($campeon["nombre"]) : ""?>'><br>
        Rol: <input type='text' name='rol' value="<?php echo $campeon ? htmlspecialchars($campeon["rol"]):""?>"><br>
        Dificultad: 
            <select name='dificultad'>
                <option value='<?php echo $campeon ? htmlspecialchars($campeon["dificultad"]): ""?>'>Baja</option>
                <option value='<?php echo $campeon ? htmlspecialchars($campeon["dificultad"]): ""?>'>Media</option>
                <option value='<?php echo $campeon ? htmlspecialchars($campeon["dificultad"]): ""?>'>Alta</option>
            </select><br>
        Descripcion: <textarea name='descripcion'> <?php echo $campeon ? htmlspecialchars($campeon["descripcion"]): ""?></textarea><br>
        <button name='guardar' type='submit'>Guardar</button>
    </form>