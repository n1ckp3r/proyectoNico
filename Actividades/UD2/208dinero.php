<?php
   //EJercicio 207
   if (!empty($_GET["dinero"])) {
        $dinero = $_GET["dinero"];

        $billete500 = intdiv($dinero, 500);
        $dinero = $dinero % 500;

        $billete200 = intdiv($dinero, 200);
        $dinero = $dinero % 200;

        $billete100 = intdiv($dinero, 100);
        $dinero = $dinero % 100;

        $billete50 = intdiv($dinero, 50);
        $dinero = $dinero % 50;

        $billete20 = intdiv($dinero, 20);
        $dinero = $dinero % 20;

        $billete10 = intdiv($dinero, 10);
        $dinero = $dinero % 10;

        $billete5 = intdiv($dinero, 5);
        $dinero = $dinero % 5;

        $moneda2 = intdiv($dinero, 2);
        $dinero = $dinero % 2;

        $moneda1 = intdiv($dinero, 1);

        echo "$billete500 billete de 500 <br>";
        echo "$billete200 billete de 200 <br>";
        echo "$billete100 billete de 100 <br>";
        echo "$billete50 billete de 50 <br>";
        echo "$billete20 billete de 20 <br>";
        echo "$billete10 billete de 10 <br>";
        echo "$billete5 billete de 5 <br>";
        echo "$moneda2 moneda de 2 <br>";
        echo "$moneda1 moneda de 1 <br>";
   }
?>