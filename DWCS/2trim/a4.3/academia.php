<?php 
class Academia{
    private const NOME = "Academia";
    private $profesores = [];
    private $alumnos = [];

    public function anadirProfesor($profesor){
        $this->profesores [] = $profesor;
    }
    public function anadirAlumno($alumno){
        $this->alumnos [] = $alumno;
    }

}