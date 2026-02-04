<?php
namespace App\Exception;

use Exception;

class RecursoNoDisponibleException extends Exception
{
    public function __construct($mensaje = "El recurso no está disponible para préstamo.", $codigo = 0)
    {
        parent::__construct($mensaje, $codigo);
    }
} 