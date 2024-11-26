<?php
    //namespace Videoclub;
    
    //Soporte:

    // include ("Soporte.php"); 
    include ("CintaVideo.php");
    echo "<p>";
    //la clase Soporte es Abstracta, en su lugar voy a crear un objeto de CintaVideo
    $soporte1 = new CintaVideo("Tenet", 22, 3); 
    echo "<strong>" . $soporte1->titulo . "</strong>"; 
    echo "<br>Precio: " . $soporte1->getPrecio() . " €"; 
    echo "<br>Precio con IVA: " . $soporte1->getPrecioIVA() . " €<br>";

    echo $soporte1->muestraResumen();
    echo "</p>";


    //CintaVideo
   
    echo "<p>";
    $miCinta = new CintaVideo("Los cazafantasmas", 3.5, 107); 
    echo "<strong>" . $miCinta->titulo . "</strong><br>"; 
    echo "<br>Precio: " . $miCinta->getPrecio() . " €<br>"; 
    echo "<br>Precio con IVA: " . $miCinta->getPrecioIva() . " €<br>";

    echo $miCinta->muestraResumen();
    echo "</p>";

    //Dvd   
    include ("Dvd.php");
    echo "<p>";
    $miDvd = new Dvd("Origen", 15, "es,en,fr", "16:9"); 
    echo "<strong>" . $miDvd->titulo . "</strong>"; 
    echo "<br>Precio: " . $miDvd->getPrecio() . " €"; 
    echo "<br>Precio con IVA: " . $miDvd->getPrecioIva() . " €<br>";

    echo $miDvd->muestraResumen();
    echo "</p>";


    //Juego
    echo "<p>";
    include ("Juego.php");

    $miJuego = new Juego("The Last of Us Part II", 49.99, "PS4", 1, 3); 
    echo "<strong>" . $miJuego->titulo . "</strong>"; 
    echo "<br>Precio: " . $miJuego->getPrecio() . " €"; 
    echo "<br>Precio con IVA: " . $miJuego->getPrecioIva() . " €<br>";

    echo $miJuego->muestraResumen();
    echo "</p>";
?>