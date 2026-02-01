<?php
namespace App\Service;
use App\Model\Biblioteca\Usuario;
use App\Model\Biblioteca\Recurso;
use App\Model\Biblioteca\Prestamo;
use App\Exception\RecursoNoDisponibleException;
use App\Service\Traits\Logger;
use DateTimeImmutable;
use App\Model\Biblioteca\Enum\EstadoRecurso;

class PrestamoService{
    use Logger;
    private static array $usuarios;
    private static array $recursos;

    public function registrarUsuario(Usuario $usuario){
        self::$usuarios[$usuario->getEmail()] = $usuario;
    }

    public function registrarRecurso(Recurso $recurso){
        self::$recursos[$recurso->getId()] = $recurso;
    }

    public function prestar(string $emailUsuario, int $idRecurso)
    {
        if (!isset(self::$usuarios[$emailUsuario])) {
            $this->log("El email indicado: {$emailUsuario}, no se corresponde con ningún usuario", null, "prestamoservice.log");
            throw new RecursoNoDisponibleException("El email no se encuentra en el registro");
        }
        if (!isset(self::$recursos[$idRecurso])) {
            $this->log("El id de recurso indicado: {$idRecurso}, no se corresponde con ningún recurso", null, "prestamoservice.log");
            throw new RecursoNoDisponibleException("El recurso no se encuentra en el registro");
        }
        if (!self::$recursos[$idRecurso]->isDisponible()) {
            $this->log("El recurso con id: {$idRecurso}, no se encuentra disponible", null, "prestamoservice.log");
            throw new RecursoNoDisponibleException("El recurso no se encuentra actualmente disponible");
        }

        if (count(self::$usuarios[$emailUsuario]->getPrestamos()) < 3) {
            $prestamo = new Prestamo(self::$usuarios[$emailUsuario], self::$recursos[$idRecurso], new DateTimeImmutable("now"));
            self::$recursos[$idRecurso]->setEstado(EstadoRecurso::PRESTADO);
            self::$usuarios[$emailUsuario]->addPrestamo($prestamo);
        }
        else {
            $this->log("El email indicado: {$emailUsuario}, tiene ya registrados 3 prestamos", null, "prestamoservice.log");
            $prestamo = false;
        }
        return $prestamo;
    }

    public function devolverPrestamo(Prestamo $prestamo){
        $prestamo->setFechaDevolucion(new DateTimeImmutable("now"));
        $prestamo->getRecurso()->setEstado(EstadoRecurso::DISPONIBLE);
        $prestamo->getUsuario()->removePrestamo($prestamo->getRecurso()->getId());
    }
}