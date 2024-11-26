<?php
    declare(strict_types=1);

    class Empleado{
        private int $telefonos = [];
        const SUELDO_TOPE = 3333;
        public function __construct(
            private string $nombre,
            private string $apellidos,
            private float $sueldo=1000)
        {}

        public function getTelefono(float $telefono) : float {
            return $this->telefonos;
        }

        public function setTelefono(string $telefono){
            $this->telefonos=$telefono;
        }


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
            return $this->sueldo >= "SUELDO_TOPE";
        }

        public function anyadirTelefono(int $telefono) : void{
            $this->telefonos[] = $telefono;
        }
        public function listarTelefonos(): string {
            return implode(', '.$this->telefonos);
        }
        public function vaciarTelefonos(): void{
            $this->telefonos = [];
        }
    }
    
    $empleado1 = new Empleado("Nicolás","Pérez",3000,676143181);
    echo $empleado1->getNombreCompleto();
    echo $empleado1->debePagarImpuestos() ? "Si pagará impuestos" : "No pagará impuestos";
    
?>