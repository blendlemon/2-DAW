<?php
namespace App\Model\Biblioteca;
use App\Service\Traits\Logger;
use App\Service\Exportador;
use App\Model\Biblioteca\Enum\EstadoRecurso;

abstract class Recurso
{
    use Logger;
    protected string $titulo;
    protected Exportador $exportador;
    static int $contador = 0;
    protected int $id;
    protected EstadoRecurso $estado;

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
        $this->log("Se ha creado el recurso: " . $titulo, "INFO");
        $this->id = self::$contador;
        self::$contador++;
    }

    abstract public function getTipo(): string;

    public abstract function getDescripcion(): string;

    public function exportar(): string
    {
        return $this->exportador->exportar($this);
    }


    /**
     * Set the value of exportador
     *
     * @param Exportador $exportador
     *
     * @return self
     */
    public function setExportador(Exportador $exportador): self
    {
        $this->exportador = $exportador;

        return $this;
    }

    /**
     * Get the value of titulo
     *
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function isDisponible(): bool{
        return $this->estado === EstadoRecurso::DISPONIBLE;
    }

    /**
     * Get the value of estado
     *
     * @return EstadoRecurso
     */
    public function getEstado(): EstadoRecurso
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @param EstadoRecurso $estado
     *
     * @return self
     */
    public function setEstado(EstadoRecurso $estado): self
    {
        $this->estado = $estado;

        return $this;
    }
}
