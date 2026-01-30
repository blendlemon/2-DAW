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
}