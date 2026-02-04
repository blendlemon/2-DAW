<?php
require_once "persona.php";
require_once "baile.php";

final class Profesor extends Persona
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
    public function engadirBaile($nombre, $edad = 8)
    {
        $existe = false;
        foreach ($this->bailes as $bailExistente) {
            if ($bailExistente->nome == $nombre && $bailExistente->idadeMinima == $edad) {
                $existe = true;
                break;
            }
        }
        if ($existe == false) {
            $this->bailes[] = $nombre;
        }
    }
    
    public function eliminarBaile($nombre, $edad = 8)
    {
        foreach ($this->bailes as $key => $bailExistente) {
            if ($bailExistente->nome == $nombre && $bailExistente->idadeMinima == $edad) {
                unset($this->bailes[$key]);
                break;
            }
        }
    }

    public function mostrarBailes(){
        $resultado = "";
        foreach ($this->bailes as $value){
            $resultado .= "$value->nome (idade min: $value->idadeMinima anos)\n";
        }
        return $resultado;
    }
}
