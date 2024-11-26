<?php 
    declare(strict_types=1);
    //namespace Videoclub;
    //use Videoclub\Resumible as VideoclubResumible;

    class Cliente {
        public string $nombre;
        private static $numero = 1;
        private array $soportesAlquilados;
        private int $numSoportesAlquilados=0;
        private int $maxAlquilerConcurrente;
        private int $numID;

        public function __construct($nombre, $maxAlquilerConcurrente=3){
            $this->nombre=$nombre;
            $this->numID=self::$numero++;
            $this->soportesAlquilados = [];
            $this->numSoportesAlquilados++;
            $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
        }

        // public function getSoporteAlquilados() : Soporte{
        //     return $this->soportesAlquilados;
        // }


        public function getNumero() : int{
            return $this->numID;
        }

        public function setNumero(int $numero) : void{
            $this->numero=$numero;
        } 
        public function getNumSoportesAlquilados() : int{
            if ($this->numSoportesAlquilados< $this->maxAlquilerConcurrente) {
                return $this->numSoportesAlquilados++;
            } else{
                return "No se pudo alquilar";
            }
            
            //return $this->numSoportesAlquilados;

        }

        public function getTitulo(): string{
            return $this->nombre;
        }

        // public function incrementarAlquiler(){
        //     if ($this->numSoportesAlquilados< $this->maxAlquilerConcurrente) {
        //         $this->numSoportesAlquilados++;
        //     } else{
        //         echo "No se pudo alquilar";
        //     }
        // }

        public function muestraResumen() : string{
            return "Nombre: ".$this->nombre."<br>Cantidad de alquileres " .count($this->soportesAlquilados);
        }

        public function tieneAlquilado(Soporte $s): bool{
            foreach ($this->soportesAlquilados as $key) {
                if ($key===$s) {
                    return true;
                }
            }
            return false;
        }

        public function alquilar(Soporte $s): bool{
            if ($this->tieneAlquilado($s)) {
                echo "El soporte ya está alquilado.<br>";
                return false;
            }

            if ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
                echo "No se pueden alquilar más soportes, has alcanzado el límite de " . 
                    $this->maxAlquilerConcurrente . " alquileres.<br>";
                return false;
            }

            $this->soportesAlquilados[] = $s; 
            $this->numSoportesAlquilados++; 
            echo "Soporte alquilado con éxito.<br>";
            return true; 
        }
        public function devolver(int $numSoporte): bool{
            foreach ($this->soportesAlquilados as $item) {
                if ($item === $numSoporte) {
                    unset($this->soportesAlquilados[$item]);
                    $this->numSoportesAlquilados--;
                    echo "Se ha devuelto";
                    return true;
                }
            }

            echo "No se ha devuelto";
            return false;
        }

        public function listaAlquileres(): void{
            $cantidadAlquileres = count($this->soportesAlquilados);
            echo "El cliente tiene ". $cantidadAlquileres . " soportes. Su nombre es ". $this->nombre."<br>";
            if ($cantidadAlquileres > 0) {
                foreach ($this->soportesAlquilados as $key) {
                    echo "Número: ". $key->getNumero()."<br>";
                }
            } else {
                echo "El cliente no tiene ningún soporte alquilado <br>";
            }

        }
    }
?>