<?php
namespace App\Model\Biblioteca;

use DateTimeImmutable;

class Prestamo {
    private Usuario $usuario;
    private Recurso $recurso;
    private DateTimeImmutable $fechaPrestamo;
    private ?DateTimeImmutable $fechaDevolucion = null;
}