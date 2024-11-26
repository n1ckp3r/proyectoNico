<?php
    declare(strict_types=1);

    class Persona {
        protected string $nombre;
        protected string $apellidos;

        public function getNombre(): string {
            return $this->nombre;
        }

        public function getApellidos(): string {
            return $this->apellidos;
        }
    }

    class Empleado extends Persona {
        private array $telefonos = [];
        const SUELDO_TOPE = 3333;
        
        public function __construct(
            string $nombre,
            string $apellidos,
            private float $sueldo = 1000
        ) {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
        }


        public function getSueldo(): float {
            return $this->sueldo;
        }

        public function setSueldo(float $sueldo): void {
            $this->sueldo = $sueldo;
        }


        public function anyadirTelefono(int $telefono): void {
            $this->telefonos[] = $telefono;
        }

        public function listarTelefonos(): string {
            return implode(', ', $this->telefonos);
        }

        public function vaciarTelefonos(): void {
            $this->telefonos = [];
        }


        public function debePagarImpuestos(): bool {
            return $this->sueldo >= self::SUELDO_TOPE;
        }

        public function getNombreCompleto(): string {
            return $this->nombre . " " . $this->apellidos . " cobra este sueldo: " . $this->sueldo . "€<br>";
        }


        public static function toHtml(Empleado $emp): string {
            $telefonosHtml = "<ol>";
            foreach ($emp->telefonos as $telefono) {
                $telefonosHtml .= "<li>" . $telefono . "</li>";
            }
            $telefonosHtml .= "</ol>";

            return "<p>Nombre: " . $emp->getNombre() . "</p>" .
                "<p>Apellidos: " . $emp->getApellidos() . "</p>" .
                "<p>Sueldo: " . $emp->getSueldo() . "€</p>" .
                "<p>Teléfonos:</p>" . $telefonosHtml;
        }
    }


    $empleado1 = new Empleado("Nicolás", "Pérez", 3000);


    echo $empleado1->getNombreCompleto();
    echo $empleado1->debePagarImpuestos() ? "Sí pagará impuestos<br>" : "No pagará impuestos<br>";


    $empleado1->anyadirTelefono(633143181);
    $empleado1->anyadirTelefono(987654321);


    echo Empleado::toHtml($empleado1);
?>
