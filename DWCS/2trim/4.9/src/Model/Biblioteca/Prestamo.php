<?php
namespace App\Model\Biblioteca;

use DateTimeImmutable;

class Prestamo {
    private Usuario $usuario;
    private Recurso $recurso;
    private DateTimeImmutable $fechaPrestamo;
    private ?DateTimeImmutable $fechaDevolucion = null;

    public function __construct(Usuario $usuario, Recurso $recurso, DateTimeImmutable $fechaPrestamo)
    {
        $this->usuario = $usuario;
        $this->recurso = $recurso;
        $this->fechaPrestamo = $fechaPrestamo;
    }

    /**
     * Get the value of recurso
     *
     * @return Recurso
     */
    public function getRecurso(): Recurso
    {
        return $this->recurso;
    }

    /**
     * Get the value of fechaPrestamo
     *
     * @return DateTimeImmutable
     */
    public function getFechaPrestamo(): DateTimeImmutable
    {
        return $this->fechaPrestamo;
    }

    /**
     * Get the value of fechaDevolucion
     *
     * @return ?DateTimeImmutable
     */
    public function getFechaDevolucion(): ?DateTimeImmutable
    {
        return $this->fechaDevolucion;
    }
}