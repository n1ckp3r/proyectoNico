<?php
    declare(strict_types=1);
    namespace Dwes\ProyectoVideoclub;
    //use Videoclub\Resumible as VideoclubResumible;

    include_once("Soporte.php");
    
    
    class Juego extends Soporte /*implements VideoclubResumible*/{
        public string $consola;
        private int $minNumJugadores;
        private int $maxNumJugadores;

        public function __construct($titulo, $precio, $consola, $minNum, $maxNum){
            parent::__construct($titulo, $precio);
            $this->consola = $consola;
            $this->minNumJugadores=$minNum;
            $this->maxNumJugadores = $maxNum;
        }

        // public function __construct($titulo, $precio, $consola, $minNum, $maxNum){
        //     parent::__construct($titulo, $precio);
        //     $this->consola = $consola;
        //     $this->minNumJugadores=$minNum;
        //     $this->maxNumJugadores = $maxNum;
        // }
        public function muestraJugadoresPosibles(): string{
            
            if ($this->maxNumJugadores==1) {
                return "Para un jugador<br>";
            } elseif ($this->maxNumJugadores == $this->minNumJugadores) {
                return "Para ".$this->minNumJugadores . " jugadores";
            } else {
                return "De ".$this->minNumJugadores. " a " . $this->maxNumJugadores. " jugadores<br>";
            }
        }

        public function muestraResumen(): string{
            return parent::muestraResumen()."<br>Consola: ".$this->consola.
                    "<br>Maximo Numero de Jugadores: ".$this->minNumJugadores."<br>Minimo Numero de Jugadores: ".$this->maxNumJugadores."<br>".
                    $this->muestraJugadoresPosibles()."<br>"; 
        }
    }
?>