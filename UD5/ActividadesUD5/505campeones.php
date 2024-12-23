<?php
/*
Modifica el archivo 504campeones.php y guárdalo como 505campeones.php. 
Pon al lado de cada uno de los campeones listados un botón para editar 
y otro para borrar. Cada uno de esos botones hará la correspondiente 
función dependiendo del id del campeón seleccionado:

    Al clicar en el botón editar, el usuario será redirigido al archivo 
    505editando.php donde mostrará un formulario con los campos rellenos 
    por los datos del campeón seleccionado. Al darle al botón de guardar 
    los datos se guardarán en la base de datos y el usuario será redirigido 
    a la lista de campeones para poder ver los cambios.

    Al clicar en el botón borrar, el usuario será preguntado a través de un
    mensaje de JavaScript (prompt) si está seguro de que quiere borrar al
    campeón seleccionado. En el mensaje de confirmación debe aparecer el 
    nombre del campeón seleccionado. Si el usuario pincha en Aceptar 
    el campeón será eliminado de la base de datos y el usuario será 
    redirigido nuevamente al listado de campeones para comprobar que,
    efectivamente dicho campeón se ha eliminado de la lista.
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
    // echo "<h1>Lista de Campeones</h1>";
    // echo "<ul>";
    // foreach ($campeones as $fila) {
    //     echo "<li>";
    //     echo "ID: ". htmlspecialchars($fila["id"]) ."<br>" ;
    //     echo "Nombre: ". htmlspecialchars($fila["nombre"]) ."<br>" ;
    //     echo "Rol: ". htmlspecialchars($fila["rol"]). "<br>";
    //     echo "Dificultad: ". htmlspecialchars($fila["dificultad"]) ."<br>" ;
    //     echo "Descripcion: ". htmlspecialchars($fila["descripcion"]) ."<br>" ;
    //     // Botones Editar y Borrar
    //     echo "<form style='display: inline;' method='post' action='505editar.php'>";
    //     echo "  <input type='hidden' name='id' value='" . htmlspecialchars($fila["id"]) . "'>";
    //     echo "  <button type='submit'>Editar</button>";
    //     echo "</form>";

    //     echo "<form style='display: inline;' method='post' 
    //             onsubmit='return confirmarBorrado(\"" . htmlspecialchars($fila["nombre"]) . "\");' 
    //             action='505borrar.php'>";
    //     echo "<input type='hidden' name='id' value='" . htmlspecialchars($fila["id"]) . "'>";
    //     echo "<button type='submit'>Borrar</button>";
    //     echo "</form>";

    //     echo "</li><br>";
    // }
    // echo "</ul>";

} catch (PDOException $e) {
    echo "Fallo en la conexión con la base de datos $dbname: " . htmlspecialchars($e->getMessage());
} finally{
    $conexion = null;
}
?>



<h1>Lista de Campeones</h1>
    <ul>
        <?php foreach ($campeones as $fila):?>
        <li>
            ID: <?php echo htmlspecialchars($fila["id"])?> <br>
            Nombre: <?php echo htmlspecialchars($fila["nombre"]) ?> <br> 
            Rol: <?php echo htmlspecialchars($fila["rol"]) ?> <br>
            Dificultad: <?php echo htmlspecialchars($fila["dificultad"]) ?> <br>
            Descripcion: <?php echo htmlspecialchars($fila["descripcion"]) ?> <br>
        
            <form style='display: inline;' method='post' action='505editar.php'>
                <input type='hidden' name='id' value='<?php echo htmlspecialchars($fila["id"]) ?>'>
                <button type='submit'>Editar</button>
            </form>

            <form style='display: inline;' method='post' 
                    onsubmit='return confirmarBorrado(<?php echo htmlspecialchars($fila["nombre"])?>)' 
                    action='505borrar.php'>
                <input type='hidden' name='id' value=' <?php echo htmlspecialchars($fila["id"]) ?>'>
                <button type='submit'>Borrar</button>
            </form>

        </li><br>
        <?php endforeach;?>
    </ul>

    <script>
    // Confirmar borrado con el nombre del campeón
    function confirmarBorrado(nombre) {
        return confirm(`¿Estás seguro de que deseas borrar a ${nombre}?`);
    }
    </script>