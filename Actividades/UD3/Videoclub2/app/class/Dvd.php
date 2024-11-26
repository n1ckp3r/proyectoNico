<?php  
    declare(strict_types=1);
    namespace Dwes\ProyectoVideoclub;
    include_once("Soporte.php");
    
    //use Videoclub\Resumible as VideoclubResumible;

    class Dvd extends Soporte /*implements VideoclubResumible*/{
        public string $idiomas;
        private string $formatPantalla;

        public function __construct($titulo, $precio, $idiomas, $formatPantalla){
            parent::__construct($titulo, $precio);
            $this->idiomas = $idiomas;
            $this->formatPantalla = $formatPantalla;
        }

        public function muestraResumen(): string {
            return parent::muestraResumen()."Idiomas: ".$this->idiomas. 
                                            "<br>Formato Pantalla: ". $this->formatPantalla."<br>";
        }
    }
?>