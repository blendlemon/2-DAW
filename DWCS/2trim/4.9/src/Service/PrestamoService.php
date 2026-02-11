<?php

namespace App\Service;

use DateTimeImmutable;
use App\Service\Traits\Logger;
use App\Model\Biblioteca\Recurso;
use App\Model\Biblioteca\Usuario;
use App\Model\Biblioteca\Prestamo;
use App\Repository\UsuarioRepository;
use App\Model\Biblioteca\Enum\EstadoRecurso;

class PrestamoService
{
    use Logger;
    private UsuarioRepository $usuarioRepository;
    //private array $usuarios = [];
    private array $recursos = [];

    public function __construct(UsuarioRepository $usuarioRepository) {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function registrarUsuario(Usuario $usuario)
    {
        $this->usuarioRepository->create($usuario);
    }

    public function registrarRecurso(Recurso $recurso)
    {
        $this->recursos[$recurso->getId()] = $recurso;
    }

    public function prestar(string $emailUsuario, int $idRecurso)
    {
        $usuario = $this->usuarioRepository->findByEmail($emailUsuario);
        if ($usuario === null) {
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

        if (count($usuario->getPrestamos()) < 3) {
            $prestamo = new Prestamo($usuario, $this->recursos[$idRecurso], new DateTimeImmutable("now"));
            $this->recursos[$idRecurso]->setEstado(EstadoRecurso::PRESTADO);
            $usuario->addPrestamo($prestamo);
        } else {
            $this->log("El email indicado: {$emailUsuario}, tiene ya registrados 3 prestamos", null, "prestamoservice.log");
            throw new \Exception("El usuario, tiene ya registrados 3 prestamos");
        }
        return $prestamo;
    }

    public function devolverPrestamo(Prestamo $prestamo)
    {
        $prestamo->setFechaDevolucion(new DateTimeImmutable("now"));
        $prestamo->getRecurso()->setEstado(EstadoRecurso::DISPONIBLE);
        $prestamo->getUsuario()->removePrestamo($prestamo->getRecurso()->getId());
    }

    public function getUsuarioByEmail(string $emailUsuario): ?Usuario
    {
        return $this->usuarioRepository->findByEmail($emailUsuario);
    }
}
