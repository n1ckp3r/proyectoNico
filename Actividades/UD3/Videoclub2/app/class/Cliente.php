<?php 
    declare(strict_types=1);
    namespace Dwes\ProyectoVideoclub;
    //use Videoclub\Resumible as VideoclubResumible;
    use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;
    use Dwes\ProyectoVideoclub\Util\CupoSuperadoException;
    use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
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

        public function alquilar(Soporte $s): self {
            if ($this->tieneAlquilado($s)) {
                throw new SoporteYaAlquiladoException("El soporte ya está alquilado por este cliente.");
            }
    
            if ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
                throw new CupoSuperadoException("No se pueden alquilar más soportes, se ha alcanzado el límite de alquileres.");
            }
    
            $this->soportesAlquilados[] = $s;
            $this->numSoportesAlquilados++;
            return $this;
        }
    
        public function devolver(int $numSoporte): self {
            foreach ($this->soportesAlquilados as $key => $item) {
                if ($item->getNumero() === $numSoporte) {
                    unset($this->soportesAlquilados[$key]);
                    $this->numSoportesAlquilados--;
                    return $this;
                }
            }
    
            throw new SoporteNoEncontradoException("El soporte no se encuentra entre los alquilados por este cliente.");
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