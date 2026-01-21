<?php
require_once "recurso.php";
class Revista extends Recurso {
    private int $numero;

    public function __construct(
        string $titulo,
        int $numero
    ) {
        parent::__construct($titulo);
        $this->numero = $numero;
    }

    public function getTipo(): string {
        return "Revista";
    }

    public function getDescripcion()
    {
        return "Titulo: $this->titulo Numero: $this->numero";
    }
}