<?php
    declare(strict_types=1);
    include_once ("Soporte.php");
    //namespace Videoclub;

    //use Videoclub\Resumible as VideoclubResumible;

    class CintaVideo extends Soporte /*implements VideoclubResumible*/{
        private int $duracion;
        // public function __construct($titulo, $numero, $precio, $duracion){
        //     parent::__construct($titulo, $numero, $precio);
        //     $this->duracion = $duracion;
        // }

        public function __construct($titulo, $precio, $duracion){
            parent::__construct($titulo, $precio);
            $this->duracion = $duracion;
        }
        public function muestraResumen(): string{
            return parent::muestraResumen()." Duracion: ".$this->duracion." minutos<br>";
        }
    }
?>