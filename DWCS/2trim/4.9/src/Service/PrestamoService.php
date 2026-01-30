<?php
namespace App\Service;
use App\Model\Biblioteca\Usuario;
use App\Model\Biblioteca\Recurso;
use App\Model\Biblioteca\Prestamo;
use App\Exception\RecursoNoDisponibleException;

class PrestamoService{
    private static array $usuarios;
    private static array $recursos;

    public function registraUsuario(Usuario $usuario){
        self::$usuarios[$usuario->getEmail()] = $usuario;
    }

    public function registraRecurso(Recurso $recurso){
        self::$recursos[$recurso->getId()] = $recurso;
    }

    public function prestar(string $emailUsuario, int $idRecurso){
        if(!isset(self::$usuarios[$emailUsuario])){
            throw new RecursoNoDisponibleException();
        }
        if(!isset(self::$recursos[$idRecurso])){
            throw new RecursoNoDisponibleException();
        }
        if(self::$recursos[$idRecurso]->estado !== 'disponible'){
            throw new RecursoNoDisponibleException();
        }

        try{
            if()
        }catch{

        }

    }
}