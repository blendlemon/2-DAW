<?php
class Persona
{
    private $nif;
    private $nombre;
    private $apellidos;
    private $mobil;

    public function __construct( $nombre, $apellidos, $mobil, $nif=null) {
        $this->nif = $nif;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->mobil = $mobil;
    }

    public function verInformacion(){
        return "{$this->nombre} {$this->apellidos} ({$this->mobil})";
    }
}
