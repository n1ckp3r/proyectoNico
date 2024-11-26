<?php
    declare(strict_types=1);
    include_once("Resumible.php");
    //namespace Videoclub;
    //use Videoclub\Resumible as VideoclubResumible;

    abstract class Soporte implements Resumible{
        public string $titulo;
        protected static $numero=1;
        private float $precio;
        private int $numID;
        private const IVA = 0.21;
        // private const IVA2 = 21;

        public function __construct($titulo, $precio){
            $this->titulo = $titulo;
            $this->precio=$precio; 
            $this->numID=self::$numero++;
        }

        // public function __construct($titulo, $precio){
        //     $this->titulo = $titulo;
        //     $this->precio=$precio;
        // }

        public function getPrecio(): float{
            return $this->precio;
        }

        public function getPrecioIVA(): float{
            return $this->precio * (1+self::IVA);
        }

        public function getID() :int{
            return $this->numID;
        }

        // public function getPrecioIVA2(): float{
        //     return ($this->precio*self::IVA2/100)+$this->precio;
        // }

        public function getNumero(): int{
            return $this->numID;
        }
    
        public function muestraResumen() : string{
            return "<strong>Resumen</strong>: ".$this->titulo."<br>Precio: ". $this->getPrecio()." €(IVA no incluido)<br>";
        }
        
        
    }
?>