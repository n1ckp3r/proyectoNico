<?php
    declare(strict_types=1);

    class Empleado{
        private int $telefonos;
        const SUELDO_TOPE = 3333;
        public function __construct(
            private string $nombre,
            private string $apellidos,
            private float $sueldo=1000)
        {

        }

        public function getTelefono() : int {
            return $this->telefonos;
        }

        public function setTelefono(int $telefono){
            $this->telefonos=$telefono;
        }


        public function getNombre(): string{
            return $this->nombre;
        }

        public function getApellidos() : string {
            return $this->apellidos;
        }

        public function getSueldo() : float {
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

        public static function toHtml(Empleado $emp): string{
            return "<p>".$emp->getNombre()."</p>".
                    "<p>".$emp->getApellidos()."</p>".
                    "<p>".$emp->getSueldo()."</p>".
                    "<ol><li>".$emp->getTelefono()."</li></ol>";
        }
    }
    
    $empleado1 = new Empleado("Nicolás","Pérez",3000);
    echo $empleado1->getNombreCompleto();
    echo $empleado1->debePagarImpuestos() ? "Si pagará impuestos" : "No pagará impuestos";
    $empleado1->setTelefono(633143181);
    echo $empleado1->toHtml($empleado1);
    
?>