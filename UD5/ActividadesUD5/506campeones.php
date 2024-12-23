<?php
    /*
Modifica el archivo 504campeones.php y guárdalo como 506campeones.php para que se muestre como una tabla con las columnas de la propia tabla de la base de datos; es decir; id, nombre, rol, dificultad, descripción. Al lado de cada nombre de cada columna, pon 2 iconos que sean ˄ ˅ y que cada uno de ellos ordene el listado en función de cuál se haya pinchado.

Si se ha pulsado en Nombre el icono de ˄, el listado debe aparecer ordenado por nombre ascendente. Si por el contrario se ha pulsado ˅ tendrá que ordenarse por nombre descendente.
Ten en cuenta que cada icono debe llevar consigo un enlace al listado que contenga parámetros en la URL que satisfagan las opciones seleccionadas así que haced uso de $_GET para poder capturarlos y escribid las consultas SQL que sean necesarias para hacer cada uno de los filtros.
    */
    include "./config/database.inc.php";
    $conexion = null;
    if (isset($_POST["restablecer"])) {
        try {
            $conexion = new PDO(DSN, USER, PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = 'SELECT * FROM campeon';
    
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
    
            $campeones = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
            // echo "<h1>Lista de Campeones</h1>";
            // echo "<table border='1'>";
            // foreach ($campeones as $fila) {
            //     echo "<li>";
            //     echo "ID: ". htmlspecialchars($fila["id"]) ."<br>" ;
            //     echo "Nombre: ". htmlspecialchars($fila["nombre"]) ."<br>" ;
            //     echo "Rol: ". htmlspecialchars($fila["rol"]). "<br>";
            //     echo "Dificultad: ". htmlspecialchars($fila["dificultad"]) ."<br>" ;
            //     echo "Descripcion: ". htmlspecialchars($fila["descripcion"]) ."<br>" ;
            //     echo "</li><br>";
            // }
            // echo "</table>";        
    } catch (PDOException $e) {
            echo "Fallo en la conexión con la base de datos $dbname: " . htmlspecialchars($e->getMessage());
    }finally{
            $conexion = null;
        }
        
    }

    if (isset($_POST["ascID"])) {
        try {
            $conexion = new PDO(DSN, USER, PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = 'SELECT * FROM campeon order by id asc';
    
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
    
            $campeones = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
            // echo "<h1>Lista de Campeones</h1>";
            // echo "<table border='1'>";
            // foreach ($campeones as $fila) {
            //     echo "<li>";
            //     echo "ID: ". htmlspecialchars($fila["id"]) ."<br>" ;
            //     echo "Nombre: ". htmlspecialchars($fila["nombre"]) ."<br>" ;
            //     echo "Rol: ". htmlspecialchars($fila["rol"]). "<br>";
            //     echo "Dificultad: ". htmlspecialchars($fila["dificultad"]) ."<br>" ;
            //     echo "Descripcion: ". htmlspecialchars($fila["descripcion"]) ."<br>" ;
            //     echo "</li><br>";
            // }
            // echo "</table>";        
       } catch (PDOException $e) {
            echo "Fallo en la conexión con la base de datos $dbname: " . htmlspecialchars($e->getMessage());
       }finally{
            $conexion = null;
        }
    }
        if (isset($_POST["descID"])) {
            try {
                $conexion = new PDO(DSN, USER, PASSWORD);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = 'SELECT * FROM campeon order by id desc';
        
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
        
                $campeones = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
                // echo "<h1>Lista de Campeones</h1>";
                // echo "<table border='1'>";
                // foreach ($campeones as $fila) {
                //     echo "<li>";
                //     echo "ID: ". htmlspecialchars($fila["id"]) ."<br>" ;
                //     echo "Nombre: ". htmlspecialchars($fila["nombre"]) ."<br>" ;
                //     echo "Rol: ". htmlspecialchars($fila["rol"]). "<br>";
                //     echo "Dificultad: ". htmlspecialchars($fila["dificultad"]) ."<br>" ;
                //     echo "Descripcion: ". htmlspecialchars($fila["descripcion"]) ."<br>" ;
                //     echo "</li><br>";
                // }
                // echo "</table>";        
           } catch (PDOException $e) {
                echo "Fallo en la conexión con la base de datos $dbname: " . htmlspecialchars($e->getMessage());
           }finally{
                $conexion = null;
            }
    }

    if (isset($_POST["ascNom"])) {
        try {
            $conexion = new PDO(DSN, USER, PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = 'SELECT * FROM campeon order by nombre asc';
    
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> execute();
    
            $campeones = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
            // echo "<h1>Lista de Campeones</h1>";
            // echo "<table border='1'>";
            // foreach ($campeones as $fila) {
            //     echo "<li>";
            //     echo "ID: ". htmlspecialchars($fila["id"]) ."<br>" ;
            //     echo "Nombre: ". htmlspecialchars($fila["nombre"]) ."<br>" ;
            //     echo "Rol: ". htmlspecialchars($fila["rol"]). "<br>";
            //     echo "Dificultad: ". htmlspecialchars($fila["dificultad"]) ."<br>" ;
            //     echo "Descripcion: ". htmlspecialchars($fila["descripcion"]) ."<br>" ;
            //     echo "</li><br>";
            // }
            // echo "</table>";        
       } catch (PDOException $e) {
            echo "Fallo en la conexión con la base de datos $dbname: " . htmlspecialchars($e->getMessage());
       }finally{
            $conexion = null;
        }
}

if (isset($_POST["descNom"])) {
    try {
        $conexion = new PDO(DSN, USER, PASSWORD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'SELECT * FROM campeon order by nombre desc';

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> execute();

        $campeones = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
        // echo "<h1>Lista de Campeones</h1>";
        // echo "<table border='1'>";
        // foreach ($campeones as $fila) {
        //     echo "<li>";
        //     echo "ID: ". htmlspecialchars($fila["id"]) ."<br>" ;
        //     echo "Nombre: ". htmlspecialchars($fila["nombre"]) ."<br>" ;
        //     echo "Rol: ". htmlspecialchars($fila["rol"]). "<br>";
        //     echo "Dificultad: ". htmlspecialchars($fila["dificultad"]) ."<br>" ;
        //     echo "Descripcion: ". htmlspecialchars($fila["descripcion"]) ."<br>" ;
        //     echo "</li><br>";
        // }
        // echo "</table>";        
   } catch (PDOException $e) {
        echo "Fallo en la conexión con la base de datos $dbname: " . htmlspecialchars($e->getMessage());
   }finally{
        $conexion = null;
    }
}

if (isset($_POST["descRol"])) {
    try {
        $conexion = new PDO(DSN, USER, PASSWORD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'SELECT * FROM campeon order by rol desc';

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> execute();

        $campeones = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
        // echo "<h1>Lista de Campeones</h1>";
        // echo "<table border='1'>";
        // foreach ($campeones as $fila) {
        //     echo "<li>";
        //     echo "ID: ". htmlspecialchars($fila["id"]) ."<br>" ;
        //     echo "Nombre: ". htmlspecialchars($fila["nombre"]) ."<br>" ;
        //     echo "Rol: ". htmlspecialchars($fila["rol"]). "<br>";
        //     echo "Dificultad: ". htmlspecialchars($fila["dificultad"]) ."<br>" ;
        //     echo "Descripcion: ". htmlspecialchars($fila["descripcion"]) ."<br>" ;
        //     echo "</li><br>";
        // }
        // echo "</table>";        
   } catch (PDOException $e) {
        echo "Fallo en la conexión con la base de datos $dbname: " . htmlspecialchars($e->getMessage());
   }finally{
        $conexion = null;
    }
}

if (isset($_POST["ascRol"])) {
    try {
        $conexion = new PDO(DSN, USER, PASSWORD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'SELECT * FROM campeon order by rol asc';

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> execute();

        $campeones = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
        // echo "<h1>Lista de Campeones</h1>";
        // echo "<table border='1'>";
        // foreach ($campeones as $fila) {
        //     echo "<li>";
        //     echo "ID: ". htmlspecialchars($fila["id"]) ."<br>" ;
        //     echo "Nombre: ". htmlspecialchars($fila["nombre"]) ."<br>" ;
        //     echo "Rol: ". htmlspecialchars($fila["rol"]). "<br>";
        //     echo "Dificultad: ". htmlspecialchars($fila["dificultad"]) ."<br>" ;
        //     echo "Descripcion: ". htmlspecialchars($fila["descripcion"]) ."<br>" ;
        //     echo "</li><br>";
        // }
        // echo "</table>";        
   } catch (PDOException $e) {
        echo "Fallo en la conexión con la base de datos $dbname: " . htmlspecialchars($e->getMessage());
   }finally{
        $conexion = null;
    }
}

if (isset($_POST["descDif"])) {
    try {
        $conexion = new PDO(DSN, USER, PASSWORD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'SELECT * FROM campeon order by dificultad desc';

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> execute();

        $campeones = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
        // echo "<h1>Lista de Campeones</h1>";
        // echo "<table border='1'>";
        // foreach ($campeones as $fila) {
        //     echo "<li>";
        //     echo "ID: ". htmlspecialchars($fila["id"]) ."<br>" ;
        //     echo "Nombre: ". htmlspecialchars($fila["nombre"]) ."<br>" ;
        //     echo "Rol: ". htmlspecialchars($fila["rol"]). "<br>";
        //     echo "Dificultad: ". htmlspecialchars($fila["dificultad"]) ."<br>" ;
        //     echo "Descripcion: ". htmlspecialchars($fila["descripcion"]) ."<br>" ;
        //     echo "</li><br>";
        // }
        // echo "</table>";        
   } catch (PDOException $e) {
        echo "Fallo en la conexión con la base de datos $dbname: " . htmlspecialchars($e->getMessage());
   }finally{
        $conexion = null;
    }
}

if (isset($_POST["ascDif"])) {
    try {
        $conexion = new PDO(DSN, USER, PASSWORD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'SELECT * FROM campeon order by dificultad asc';

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> execute();

        $campeones = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
        // echo "<h1>Lista de Campeones</h1>";
        // echo "<table border='1'>";
        // foreach ($campeones as $fila) {
        //     echo "<li>";
        //     echo "ID: ". htmlspecialchars($fila["id"]) ."<br>" ;
        //     echo "Nombre: ". htmlspecialchars($fila["nombre"]) ."<br>" ;
        //     echo "Rol: ". htmlspecialchars($fila["rol"]). "<br>";
        //     echo "Dificultad: ". htmlspecialchars($fila["dificultad"]) ."<br>" ;
        //     echo "Descripcion: ". htmlspecialchars($fila["descripcion"]) ."<br>" ;
        //     echo "</li><br>";
        // }
        // echo "</table>";        
   } catch (PDOException $e) {
        echo "Fallo en la conexión con la base de datos $dbname: " . htmlspecialchars($e->getMessage());
   }finally{
        $conexion = null;
    }
}
if (isset($_POST["descDesc"])) {
    try {
        $conexion = new PDO(DSN, USER, PASSWORD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'SELECT * FROM campeon order by descripcion desc';

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> execute();

        $campeones = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
        // echo "<h1>Lista de Campeones</h1>";
        // echo "<table border='1'>";
        // foreach ($campeones as $fila) {
        //     echo "<li>";
        //     echo "ID: ". htmlspecialchars($fila["id"]) ."<br>" ;
        //     echo "Nombre: ". htmlspecialchars($fila["nombre"]) ."<br>" ;
        //     echo "Rol: ". htmlspecialchars($fila["rol"]). "<br>";
        //     echo "Dificultad: ". htmlspecialchars($fila["dificultad"]) ."<br>" ;
        //     echo "Descripcion: ". htmlspecialchars($fila["descripcion"]) ."<br>" ;
        //     echo "</li><br>";
        // }
        // echo "</table>";        
   } catch (PDOException $e) {
        echo "Fallo en la conexión con la base de datos $dbname: " . htmlspecialchars($e->getMessage());
   }finally{
        $conexion = null;
    }
}

if (isset($_POST["ascDesc"])) {
    try {
        $conexion = new PDO(DSN, USER, PASSWORD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'SELECT * FROM campeon order by descripcion asc';

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> execute();

        $campeones = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
        // echo "<h1>Lista de Campeones</h1>";
        // echo "<table border='1'>";
        // foreach ($campeones as $fila) {
        //     echo "<li>";
        //     echo "ID: ". htmlspecialchars($fila["id"]) ."<br>" ;
        //     echo "Nombre: ". htmlspecialchars($fila["nombre"]) ."<br>" ;
        //     echo "Rol: ". htmlspecialchars($fila["rol"]). "<br>";
        //     echo "Dificultad: ". htmlspecialchars($fila["dificultad"]) ."<br>" ;
        //     echo "Descripcion: ". htmlspecialchars($fila["descripcion"]) ."<br>" ;
        //     echo "</li><br>";
        // }
        // echo "</table>";        
   } catch (PDOException $e) {
        echo "Fallo en la conexión con la base de datos $dbname: " . htmlspecialchars($e->getMessage());
   }finally{
        $conexion = null;
    }
}
?>

<h1>Lista de campeones</h1>
<form action="" method="POST">
    <button type="submit" name="restablecer">Restablecer</button>
</form>
<table border="1">
    <tr>
        <td>
            ID
            <form action="" method="POST">
                <button type="submit" name="ascID">˄</button>
                <button type="submit" name="descID">˅</button>
            </form>
        </td>
        <td>
            Nombre
            <form action="" method="POST">
                <button type="submit" name="ascNom">˄</button>
                <button type="submit" name="descNom">˅</button>
            </form>
        </td>
        <td>
            Rol
            <form action="" method="POST">
                <button type="submit" name="ascRol">˄</button>
                <button type="submit" name="descRol">˅</button>
            </form>
        </td>
        <td>
            Dificultad
            <form action="" method="POST">
                <button type="submit" name="ascDif">˄</button>
                <button type="submit" name="descDif">˅</button>
            </form>
        </td>
        <td>
            Descripcion
            <form action="" method="POST">
                <button type="submit" name="ascDesc">˄</button>
                <button type="submit" name="descDesc">˅</button>
            </form>
        </td>
    </tr>
    <?php foreach($campeones as $item):?>
        <tr>
            <td><?php echo htmlspecialchars($item["id"]) ?></td>
            <td><?php echo htmlspecialchars($item["nombre"]) ?></td>
            <td><?php echo htmlspecialchars($item["rol"]) ?></td>
            <td><?php echo htmlspecialchars($item["dificultad"]) ?></td>
            <td><?php echo htmlspecialchars($item["descripcion"]) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<style>
    body {
        background-color: aqua;
        color: black;
    }
    
    button {
        background-color: black;
        color: white;
        cursor: pointer;
        border: none;

    }
    button:hover {
        background-color: white;
        color: black;
        border: 1px solid black; /* Agrega un borde opcional al pasar el cursor */
    }
</style>