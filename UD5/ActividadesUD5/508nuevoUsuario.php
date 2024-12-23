<?php
        include "./config/database.inc.php";
        $con = null;
            if (isset($_POST["registrarse"])) {
                $nombre = $_POST["nombre"];
                $usuario= $_POST["usuario"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $passwordHash = password_hash($password,PASSWORD_BCRYPT);
                
                $error = [];
                if (empty($nombre)) {
                    $error[] = "Introduzca un nombre con mas de 3 caracteres";
                }
                if (empty($usuario)) {
                    $error[] = "Introduzca un nombre de usuario";
                }
                if (empty($password) && strlen($password)<=3) {
                    $error[] = "Introduzca una contraseña con mas de 3 caracteres";
                }
                if (empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)) {
                    $error[] = "Introduzca un email valido";
                }
                if (count($error)>0) {
                    echo "<ul>";
                    foreach ($error as $item) {
                        echo "<li>";
                        echo htmlspecialchars($item);
                        echo "</li>";
                    }
                    echo "</ul>";
                    echo '<a href="./508registro.php">Volver al registro</a>';
                } else{
                    try {
                        $con = new PDO(DSN,USER,PASSWORD);
                        $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        $sql = "INSERT INTO usuario (nombre, usuario, password, email)
                                VALUES (:nom, :usu, :pass, :ema);";
                        $sentencia = $con->prepare($sql);
                        $sentencia ->bindParam(":nom",$nombre);
                        $sentencia ->bindParam(":usu",$usuario);
                        $sentencia ->bindParam(":pass",$passwordHash);
                        $sentencia ->bindParam(":ema",$email);
                        $sentencia ->execute();
                        echo "El usuario $usuario ha sido introducido en el sistema con la contraseña $password";

                    } catch (PDOException $th) {
                        echo "ERROR: ".$th->getMessage();
                    } finally{
                        $con = null;
                    }
                }
            }    
        
?>
