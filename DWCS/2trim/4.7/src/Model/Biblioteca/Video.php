<?php
namespace App\Model\Biblioteca;
use App\Model\Biblioteca\Recurso;
use App\Model\Infraestructura\Recurso as RecursoInfra;
class Video extends Recurso
{
    private int $duracion; // Duración en minutos
    private array $recursos;
    public function __construct(
        string $titulo,
        int $duracion
    ) {
        parent::__construct($titulo);
        $this->duracion = $duracion;
        $this->log("Video creado: $titulo, duración $duracion min", null,
         "video.log");
    }

    public function getTipo(): string
    {
        return "Video";
    }

    public function getDescripcion(): string
    {
        return "Tipo: " . $this->getTipo() . ", Título: " . $this->titulo . ", Duración: " . $this->duracion . " minutos";
    }

    public function agregarRecurso(RecursoInfra $recurso): void
    {
        $this->recursos[] = $recurso;
        $this->log("Recurso agregado al video '{$this->titulo}': {$recurso->getDescripcion()}");
    }
}
