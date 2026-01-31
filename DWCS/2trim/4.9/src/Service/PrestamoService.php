<?php
namespace App\Service;
use App\Model\Biblioteca\Usuario;
use App\Model\Biblioteca\Recurso;
use App\Model\Biblioteca\Prestamo;
use App\Exception\RecursoNoDisponibleException;
use DateTimeImmutable;

class PrestamoService{
    private static array $usuarios;
    private static array $recursos;

    public function registrarUsuario(Usuario $usuario){
        self::$usuarios[$usuario->getEmail()] = $usuario;
    }

    public function registrarRecurso(Recurso $recurso){
        self::$recursos[$recurso->getId()] = $recurso;
    }

    public function prestar(string $emailUsuario, int $idRecurso){
        if(!isset(self::$usuarios[$emailUsuario])){
            throw new RecursoNoDisponibleException("El email no se encuentra en el registro");
        }
        if(!isset(self::$recursos[$idRecurso])){
            throw new RecursoNoDisponibleException("El recurso no se encuentra en el registro");
        }
        if(!self::$recursos[$idRecurso]->isDisponible()){
            throw new RecursoNoDisponibleException("El recurso no se encuentra actualmente disponible");
        }

        try{
            if(count(self::$usuarios[$emailUsuario]->getPrestamos())<3){
                $prestamo = new Prestamo(self::$usuarios[$emailUsuario], self::$recursos[$idRecurso], new DateTimeImmutable());
                self::$recursos[$idRecurso]->setEstado(\App\Model\Biblioteca\Enum\EstadoRecurso::PRESTADO);
                self::$usuarios[$emailUsuario]->addPrestamo($prestamo);
                return $prestamo;
            }
        }catch (RecursoNoDisponibleException $e){
            echo "Otro error: " . $e->getMessage();
        }

    }
}