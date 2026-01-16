<?php
require_once "persona.php";

class Alumno extends Persona
{
    private $numClases;
    public function __construct($nombre, $apellidos, $mobil)
    {
        return parent::__construct($nombre, $apellidos, $mobil);
    }

    public function setNumClases(int $numero)
    {
        $this->numClases = $numero;
    }

    public function aPagar()
    {
        $resultado = "Debe indicar previamente o número de clases";
        switch ($this->numClases) {
            case null:
            case 0:
                break;
            case 1:
                $resultado = "20 euros";
                break;
            case 2:
                $resultado = "32 euros";
                break;
            default:
                $resultado = "40 euros";
        }
        return $resultado;
    }
}
