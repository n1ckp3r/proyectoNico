<?php
    declare(strict_types=1);
    namespace Dwes\ProyectoVideoclub;

    include_once("Juego.php");
    include_once("Dvd.php");
    include_once("CintaVideo.php");
    include_once("Cliente.php");


    use Dwes\ProyectoVideoclub\Cliente;
    use Dwes\ProyectoVideoclub\Dvd;
    use Dwes\ProyectoVideoclub\CintaVideo;
    use Dwes\ProyectoVideoclub\Juego;
    use Dwes\ProyectoVideoclub\Soporte;
    
    class Videoclub{
        private string $nombre;
        private array $productos; //array de clase Soporte
        private int $numProductos = 0;
        private array $socios; //Array de Cliente
        private int $numSocios = 0;
        private int $numProductosAlquilados;
        private int $numTotalAlquileres;

        public function getNumProductosAlquilados(): int{
            return $this->numProductosAlquilados;
        }

        
        public function getNumTotalAlquileres(): int{
            return $this->numTotalAlquileres;
        }

        public function __construct($nombre){
            $this->nombre=$nombre;
        }
         

        private function incluirProducto(Soporte $s){
            $this->productos[]=$s;
            $this->numProductos++;
        }

        public function incluirCintaVideo(string $titulo, float $precio, int $duracion): Videoclub{
            $cv = new CintaVideo($titulo, $precio, $duracion, "");
            //self::incluirProducto($cv);
            $this->incluirProducto($cv);
            return $this;
        }

        public function incluirDVD(string $titulo, float $precio, string $idiomas, string $pantalla): Videoclub{
            $dvd = new Dvd($titulo, $precio, $idiomas, $pantalla);
            //self::incluirProducto($dvd);
            $this->incluirProducto($dvd);
            return $this;
        }

        public function incluirJuego(string $titulo, float $precio, string $consola, int $minJ, int $maxJ): Videoclub{
            $juego = new Juego($titulo, $precio, $consola, $minJ, $maxJ);
            $this->incluirProducto($juego);
            return $this;
        }

        public function incluirSocio($nombre, $maxAlquileresConcurrentes=3): Videoclub{
            $cliente = new Cliente($nombre, $maxAlquileresConcurrentes);
            $this->socios[]=$cliente;
            // if (in_array($cliente, $this->socios)) {
            //     # code...
            // }
            return $this;
        }

        public function listarProductos(): Videoclub{
            echo "Lista de productos<br>";
            foreach ($this->productos as $producto) {
                echo $producto->muestraResumen() . "<br>";
            }
            return $this;
        }
        

        public function listarSocios(): Videoclub{
            echo "Lista de Socios<br>";
            foreach ($this->socios as $socio) {
                echo $socio->muestraResumen() . "<br>";
            }
            return $this;
        }
        

        public function alquilarSocioProducto(int $numeroCliente, int $numeroSoporte): Videoclub{
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
            return $this;
        }
    }
?>