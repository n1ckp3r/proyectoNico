<?php
    const DSN = "mysql:host=mysql; dbname=basket";
    const USER = "dwes";
    const PASSWORD = "dwes";
    
    $host = 'localhost';
    $dbname = 'basket';
    $usuario = 'dwes';
    $password = 'dwes';

    //Hasheo de contraseñas
    //echo password_hash("root",PASSWORD_BCRYPT);

    // try {
    //     $conexion = new PDO(DSN, USER, PASSWORD);
    //     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     echo "Conexión exitosa a la base de datos.";
    // } catch (PDOException $e) {
    //     echo "Error de conexión: " . $e->getMessage();
    // }

    //select:
    //$sql = "SELECT * FROM jugadores WHERE id = :id";

    //insert:
    // $sql = "INSERT INTO usuarios
    //         VALUES (:nom , :user, :email, :pass);";

    //Update
    // $sql = "UPDATE jugadores 
    // SET nombre = :nom, equipo = :equ, posicion = :pos
    // WHERE id = :id";

    // Delete
    // $sql = "DELETE FROM jugadores where id = :id";
?>