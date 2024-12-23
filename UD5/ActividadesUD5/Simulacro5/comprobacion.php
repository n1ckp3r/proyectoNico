<?php
    include "./config/database.inc.php";
    $con = null;

    if ($_SERVER["REQUEST_METHOD"]==="post" && isset($_POST["usuario"])) {
        $user = $_POST["usuario"];
        $passwd = $_POST["password"];
        try {
            $con = new PDO(DSN,USER,PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $sql = "SELECT * FROM usuario WHERE user = :usu";
                $sentencia = $con->prepare($sql);
                $sentencia->bindParam(':usu', $user);
                $sentencia->execute();
                
                $result = $sentencia->fetch(PDO::FETCH_ASSOC);
            
                if ($result && password_verify($passwd, $result["password"])) {
                    session_start();
                    $_SESSION['exam'] = $result['nombre'];
                    header("Location: ./listado.php");
                } else {
                    header("Location: ./index.html");   
                }
            
        } catch (PDOException $e) {
            echo "ERROR: ".$e->getMessage();
        } finally{
            $con = null;
        }
    }
?>