<?php
namespace App\Service;
use App\Model\Biblioteca\Usuario;
use App\Model\Biblioteca\Recurso;
use App\Model\Biblioteca\Prestamo;
use App\Service\Traits\Logger;
use DateTimeImmutable;
use App\Model\Biblioteca\Enum\EstadoRecurso;

class PrestamoService{
    use Logger;
    private array $usuarios = [];
    private array $recursos = [];

    public function registrarUsuario(Usuario $usuario){
        $this->usuarios[$usuario->getEmail()] = $usuario;
    }

    public function registrarRecurso(Recurso $recurso){
        $this->recursos[$recurso->getId()] = $recurso;
    }

    public function prestar(string $emailUsuario, int $idRecurso)
    {
        if (!isset($this->usuarios[$emailUsuario])) {
            $this->log("El email indicado: {$emailUsuario}, no se corresponde con ningún usuario", null, "prestamoservice.log");
            throw new \Exception("Usuario no encontrado");
        }
        if (!isset($this->recursos[$idRecurso])) {
            $this->log("El id de recurso indicado: {$idRecurso}, no se corresponde con ningún recurso", null, "prestamoservice.log");
            throw new \Exception("Recurso inexistente");
        }
        if (!$this->recursos[$idRecurso]->isDisponible()) {
            $this->log("El recurso con id: {$idRecurso}, no se encuentra disponible", null, "prestamoservice.log");
            throw new \Exception("Recurso no disponible");
        }

        if (count($this->usuarios[$emailUsuario]->getPrestamos()) < 3) {
            $prestamo = new Prestamo($this->usuarios[$emailUsuario], $this->recursos[$idRecurso], new DateTimeImmutable("now"));
            $this->recursos[$idRecurso]->setEstado(EstadoRecurso::PRESTADO);
            $this->usuarios[$emailUsuario]->addPrestamo($prestamo);
        }
        else {
            $this->log("El email indicado: {$emailUsuario}, tiene ya registrados 3 prestamos", null, "prestamoservice.log");
            throw new \Exception("El usuario, tiene ya registrados 3 prestamos");
        }
        return $prestamo;
    }

    public function devolverPrestamo(Prestamo $prestamo){
        $prestamo->setFechaDevolucion(new DateTimeImmutable("now"));
        $prestamo->getRecurso()->setEstado(EstadoRecurso::DISPONIBLE);
        $prestamo->getUsuario()->removePrestamo($prestamo->getRecurso()->getId());
    }
}