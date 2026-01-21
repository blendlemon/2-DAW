<?php
require_once "persona.php";
require_once "baile.php";

class Profesor extends Persona
{
    private $bailes = [];
    public function __construct($nombre, $apellidos, $mobil, $nif)
    {
        parent::__construct($nombre, $apellidos, $mobil, $nif);
    }

    public function calcularSoldo($horas, $importe = 16)
    {
        return $horas * $importe;
    }
    public function engadirBaile($baile)
    {
        $existe = false;
        foreach ($this->bailes as $bailExistente) {
            if ($bailExistente->nome == $baile->nome && $bailExistente->idadeMinima == $baile->idadeMinima) {
                $existe = true;
                break;
            }
        }
        if ($existe == false) {
            $this->bailes[] = $baile;
        }
    }
    
    public function eliminarBaile($baile)
    {
        foreach ($this->bailes as $key => $bailExistente) {
            if ($bailExistente->nome == $baile->nome && $bailExistente->idadeMinima == $baile->idadeMinima) {
                unset($this->bailes[$key]);
                break;
            }
        }
    }

    public function mostrarBailes(){
        $resultado = "";
        foreach ($this->bailes as $key=>$value){
            $resultado .= "$value->nome (idade min: $value->idadeMinima anos)\n";
        }
        return $resultado;
    }
}
