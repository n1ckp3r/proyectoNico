<?php
    use Dwes\ProyectoVideoclub\Cliente;
    use Dwes\ProyectoVideoclub\Dvd;
    use Dwes\ProyectoVideoclub\CintaVideo;
    use Dwes\ProyectoVideoclub\Juego;
    use Dwes\ProyectoVideoclub\Soporte;
    include_once ("../app/Soporte.php");
    include_once ("../app/CintaVideo.php");
    include_once ("../app/Dvd.php");
    include_once ("../app/Juego.php");
    include_once ("../app/Cliente.php");

    //instanciamos un par de objetos cliente
    $cliente1 = new Cliente("Bruce Wayne", 23);
    $cliente2 = new Cliente("Clark Kent", 33);

    //mostramos el número de cada cliente creado 
    echo "<br>El identificador del cliente 1 es: " . $cliente1->getNumero();
    echo "<br>El identificador del cliente 2 es: " . $cliente2->getNumero();

    //instancio algunos soportes 
    $soporte1 = new CintaVideo("Los cazafantasmas", 3.5, 107);
    $soporte2 = new Juego("The Last of Us Part II", 49.99, "PS4", 1, 1);  
    $soporte3 = new Dvd("Origen", 24, "es,en,fr", "16:9");
    $soporte4 = new Dvd("El Imperio Contraataca", 4, "es,en","16:9");
    echo "<br>";
    //alquilo algunos soportes
    $cliente1->alquilar($soporte1);
    $cliente1->alquilar($soporte2);
    $cliente1->alquilar($soporte3);

    //voy a intentar alquilar de nuevo un soporte que ya tiene alquilado
    $cliente1->alquilar($soporte1);
    echo "<br>";
    //el cliente tiene 3 soportes en alquiler como máximo
    //este soporte no lo va a poder alquilar
    $cliente1->alquilar($soporte4);
    echo "<br>";
    //este soporte no lo tiene alquilado
    $cliente1->devolver(4);
    echo "<br>";
    //devuelvo un soporte que sí que tiene alquilado
    $cliente1->devolver(2);
    echo "<br>";
    //alquilo otro soporte
    $cliente1->alquilar($soporte4);
    echo "<br>";
    //listo los elementos alquilados
    $cliente1->listaAlquileres();
    echo "<br>";
    //este cliente no tiene alquileres
    $cliente2->devolver(2);
    echo "<br>";
?>