<?php
    /*
    Crea 504campeones.php y lista todos los campeones del LOL que has metido 
    en tu base de datos (1º conexión a BD y 2º foreach para cada 
    campeón que tengas en la tabla campeon).
    */
    include "./config/database.inc.php";
    $conexion = null;
    try {
        $conexion = new PDO(DSN, USER, PASSWORD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'SELECT * FROM campeon';

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> execute();

        $campeones = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
        echo "<h1>Lista de Campeones</h1>";
        echo "<ul>";
        foreach ($campeones as $fila) {
            echo "<li>";
            echo "ID: ". htmlspecialchars($fila["id"]) ."<br>" ;
            echo "Nombre: ". htmlspecialchars($fila["nombre"]) ."<br>" ;
            echo "Rol: ". htmlspecialchars($fila["rol"]). "<br>";
            echo "Dificultad: ". htmlspecialchars($fila["dificultad"]) ."<br>" ;
            echo "Descripcion: ". htmlspecialchars($fila["descripcion"]) ."<br>" ;
            echo "</li><br>";
        }
        echo "</ul>";        
   } catch (PDOException $e) {
        echo "Fallo en la conexión con la base de datos $dbname: " . htmlspecialchars($e->getMessage());
   }finally{
        $conexion = null;
    }
?>