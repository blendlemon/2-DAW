<?php
class Video extends Recurso {
    private string $duracion;

    public function __construct(
        string $titulo,
        int $duracion
    ) {
        parent::__construct($titulo);
        $this->duracion = $duracion;
    }

    public function getTipo(): string {
        return "Video";
    }

    public function getDescripcion()
    {
        return "Titulo: $this->titulo Duracion: $this->duracion";
    }
}