<?php
    include "./config/database.inc.php";
    // if (!empty($_POST["nombre"]) && !empty($_POST["user"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
    if ($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
        $user = $_POST["user"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $passwordHash = password_hash($password,PASSWORD_BCRYPT);

        $con = null;
        try {
            $con = new PDO(DSN,USER,PASSWORD);
            $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO usuarios
                    VALUES (:nom , :user, :email, :pass);";
                    // INSERT INTO usuarios
                    // VALUES ('Hector', 'frector', 'contrasenya', 'messi@centro.fake');
            $sentencia = $con->prepare($sql);
            $sentencia->bindParam(":nom", $nombre);
            $sentencia->bindParam(":user", $user);
            $sentencia->bindParam(":email", $nombre);
            $sentencia->bindParam(":pass", $passwordHash);
            $sentencia->execute();

            //header("Location: login.html");
        } catch (PDOException $e) {
            echo "ERROR" . $e->getMessage();
        } finally{
            $con = null;
        }
    }
?>
<p>Se ha creado el usuario</p>
<a href="login.html">Iniciar sesion</a>