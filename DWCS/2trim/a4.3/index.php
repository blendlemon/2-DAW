<?php
require_once "alumno.php";
require_once "baile.php";
require_once "profesor.php";
require_once "academia.php";

$academia = new Academia();

// Engadir profesor con 4 bailes (AFRO incluído, un duplicado)
$profesor = new Profesor("Juan", "García", "612345678", "12345678A");
$profesor->engadirBaile(new Baile("AFRO"));
$profesor->engadirBaile(new Baile("Salsa"));
$profesor->engadirBaile(new Baile("AFRO")); // duplicado
$profesor->engadirBaile(new Baile("Tango"));
$academia->anadirProfesor($profesor);

// Engadir 2 alumnos
$alumno1 = new Alumno("María", "López", "698765432");
$alumno2 = new Alumno("Carlos", "Rodríguez", "687654321");
$academia->anadirAlumno($alumno1);
$academia->anadirAlumno($alumno2);

// Mostrar información inicial
echo "=== INFORMACIÓN INICIAL ===\n";
echo $profesor->verInformacion();
echo $alumno1->verInformacion();
echo $alumno2->verInformacion();

// O profesor deixa de dar clase de AFRO
$profesor->eliminarBaile("AFRO");

// Mostrar información actualizada do profesor
echo "\n=== DESPUÉS DE ELIMINAR AFRO ===\n";
echo $profesor->verInformacion();
