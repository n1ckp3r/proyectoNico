<?php
    declare(strict_types=1);
    //namespace Videoclub; 

    include_once("Juego.php");
    include_once("Dvd.php");
    include_once("CintaVideo.php");
    include_once("Cliente.php");
    //include_once("Soporte.php");


    // use Videoclub\Cliente;
    // use Videoclub\Dvd;
    // use Videoclub\CintaVideo;
    // use Videoclub\Juego;
    // use Videoclub\Soporte;
    
    class Videoclub{
        private string $nombre;
        private array $productos; //array de clase Soporte
        private int $numProductos = 0;
        private array $socios; //Array de Cliente
        private int $numSocios = 0;

        public function __construct($nombre){
            $this->nombre=$nombre;
        }
         

        private function incluirProducto(Soporte $s){
            $this->productos[]=$s;
            $this->numProductos++;
        }

        public function incluirCintaVideo(string $titulo, float $precio, int $duracion){
            $cv = new CintaVideo($titulo, $precio, $duracion, "");
            //self::incluirProducto($cv);
            $this->incluirProducto($cv);
        }

        public function incluirDVD(string $titulo, float $precio, string $idiomas, string $pantalla){
            $dvd = new Dvd($titulo, $precio, $idiomas, $pantalla);
            //self::incluirProducto($dvd);
            $this->incluirProducto($dvd);
        }

        public function incluirJuego(string $titulo, float $precio, string $consola, int $minJ, int $maxJ){
            $juego = new Juego($titulo, $precio, $consola, $minJ, $maxJ);
            $this->incluirProducto($juego);
        }

        public function incluirSocio($nombre, $maxAlquileresConcurrentes=3){
            $cliente = new Cliente($nombre, $maxAlquileresConcurrentes);
            $this->socios[]=$cliente;
            // if (in_array($cliente, $this->socios)) {
            //     # code...
            // }
        }

        public function listarProductos(){
            echo "Lista de productos<br>";
            foreach ($this->productos as $producto) {
                echo $producto->muestraResumen() . "<br>";
            }
        }
        

        public function listarSocios(){
            echo "Lista de Socios<br>";
            foreach ($this->socios as $socio) {
                echo $socio->muestraResumen() . "<br>";
            }
        }
        

        public function alquilaSocioProducto(int $numeroCliente, int $numeroSoporte){
            $cliente = null;
            $soporte = null;
        
       
            foreach ($this->socios as $item) {
                if ($item->getNumero() === $numeroCliente) {
                    $cliente = $item;
                    break;
                }
            }
        
  
            foreach ($this->productos as $item) {
                if ($item->getNumero() === $numeroSoporte) {
                    $soporte = $item;
                    break;
                }
            }
        
            if ($cliente && $soporte) {
                $cliente->alquilar($soporte);
            } else {
                echo "Cliente o Producto no encontrado.<br>";
            }
        }
    }
?>