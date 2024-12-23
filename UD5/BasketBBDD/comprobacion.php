<?php
include "./config/database.inc.php";
if ($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST["user"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];
    try {
        $con = new PDO(DSN, USER, PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT * FROM usuarios WHERE user = :user";
        
        $sentencia = $con->prepare($sql);
        $sentencia->bindParam(":user", $user);
        $sentencia->execute();
        
        $usuarios = $sentencia->fetch(PDO::FETCH_ASSOC);

        if ($usuarios && isset($usuarios["password"]) && password_verify($password, $usuarios["password"])) {
            session_start();
            $_SESSION["almacen"] = $usuarios["nombre"];
            header("Location: ./jugadores.php");
            exit;
        } else {
            echo "El usuario no está registrado o la contraseña es incorrecta<br>";
            echo '<a href="registro.html">Registrarse</a>';
            echo '<a href ="Volver a intentar"></a>';
        }
    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    } finally {
        $con = null;
    }
}
?>