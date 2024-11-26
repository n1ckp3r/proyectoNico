<?php
/*
    Copia las clases del ejercicio anterior y modifícalas. Añade nuevos métodos
    que hagan una representación de todas las propiedades de las clases
    Persona y Empleado, de forma similar a los realizados en HTML, pero sin que
    sean estáticos, de manera que obtenga los datos mediante $this.

    function public __toString(): string
*/
declare(strict_types=1);

class Persona {
    protected string $nombre;
    protected string $apellidos;
    protected int $edad;
    
    public function __construct(string $nombre, string $apellidos, int $edad) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }

    public function getEdad(): int {
        return $this->edad;
    }

    public function getNombreCompleto(): string {
        return $this->nombre . " " . $this->apellidos;
    }

    public static function toHtml(Persona $p): string {
        if ($p instanceof Empleado) {
            return "<p>Nombre: " . $p->getNombre() . "</p>" .
           "<p>Apellidos: " . $p->getApellidos() . "</p>";
        }
    }
    
    public function __toString(): string{
        return "Nombre completo: ". $this->getNombreCompleto(). "\nEdad: ". $this->getEdad();
    }
}

class Empleado extends Persona {
    private array $telefonos = [];
    private float $sueldo;
    const SUELDO_TOPE = 3333;
    
    public function __construct(string $nombre, string $apellidos, int $edad, float $sueldo = 1000) {
        parent::__construct($nombre, $apellidos, $edad);
        $this->sueldo = $sueldo;
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


    public static function toHtml(Persona $p): string {
    $html = parent::toHtml($p);

    if ($p instanceof Empleado) {
        $telefonosHtml = "<ol>";
        foreach ($p->telefonos as $telefono) {
            $telefonosHtml .= "<li>" . $telefono . "</li>";
        }
        $telefonosHtml .= "</ol>";

        $html .= "<p>Sueldo: " . $p->getSueldo() . "€</p>" .
                 "<p>Teléfonos:</p>" . $telefonosHtml;
    }

    return $html;
    }
}


$empleado1 = new Empleado("Nicolás", "Pérez", 3000);


echo $empleado1->getNombreCompleto();
echo $empleado1->debePagarImpuestos() ? "Sí pagará impuestos<br>" : "No pagará impuestos<br>";


$empleado1->anyadirTelefono(633143181);
$empleado1->anyadirTelefono(987654321);


echo Empleado::toHtml($empleado1);

?>