<?php
    declare(strict_types=1);

    class Empleado{
        public function __construct(
            private string $nombre,
            private string $apellidos,
            private float $sueldo)
        {}

        public function getNombre(string $nombre): string{
            return $this->nombre;
        }

        public function getApellidos(string $apellidos) : string {
            return $this->apellidos;
        }

        public function getSueldo(float $sueldo) : float {
            return $this->sueldo;
        }

        public function setNombre(string $nombre){
            $this->nombre=$nombre;
        }

        public function setApellidos(string $apellidos){
            $this->apellidos=$apellidos;
        }

        public function setSueldo(string $sueldo){
            $this->sueldo=$sueldo;
        }

        public function getNombreCompleto(){
            return $this->nombre." ".$this->apellidos." cobra este sueldo: ".$this->sueldo."€<br>";
        }       
        
        public function debePagarImpuestos(): bool{
            return $this->sueldo >= 3333;
        }
    }
    $persona = new Empleado("Nicolás","Pérez",3000);
    echo $persona->getNombreCompleto();
    echo $persona->debePagarImpuestos() ? "Si pagará impuestos" : "No pagará impuestos";
?>