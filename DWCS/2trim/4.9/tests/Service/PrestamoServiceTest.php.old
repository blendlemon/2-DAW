<?php

namespace App\Tests\Service;

use Exception;
use App\Model\Biblioteca\Libro;
use App\Model\Biblioteca\Video;
use PHPUnit\Framework\TestCase;
use App\Service\PrestamoService;
use App\Model\Biblioteca\Revista;
use App\Model\Biblioteca\Usuario;
use App\Model\Biblioteca\Enum\EstadoRecurso;


class PrestamoServiceTest extends TestCase
{

    private PrestamoService $service;

    protected function setUp(): void
    {
        $reflection = new \ReflectionClass(Libro::class);
        $property = $reflection->getParentClass()->getProperty('contador');
        $property->setValue(null, 1);

        $this->service = new PrestamoService();
        $usuario = new Usuario("juan", "juan@example.com");
        $libro = new Libro("Libro de prueba", "Autor de prueba");
        $revista = new Revista("Libro de prueba", 1);
        $video = new Video("Libro de prueba", 30);
        $libro2 = new Libro("Libro de prueba", "Autor de prueba");

        $this->service->registrarUsuario($usuario);
        $this->service->registrarRecurso($libro);
        $this->service->registrarRecurso($revista);
        $this->service->registrarRecurso($video);
        $this->service->registrarRecurso($libro2);
    }

    public function testPrestarRecursoDisponible(): void
    {
        $antes = count($this->service->getUsuarioByEmail("juan@example.com")->getPrestamos());
        $prestamo = $this->service->prestar("juan@example.com", 1);
        $this->assertEquals(EstadoRecurso::PRESTADO, $prestamo->getRecurso()->getEstado());
        $this->assertEquals($antes + 1, count($prestamo->getUsuario()->getPrestamos()));
    }

    public function testUsuarioNoEncontradoLanzaExcepcion(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Usuario no encontrado");

        $this->service->prestar("inexistente", 1);
    }

    public function testUsuariosByEmail(){
        $this->assertNull($this->service->getUsuarioByEmail("Inexistente"));
    }

    public function testRecursoNoEncontradoLanzaExcepcion(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Recurso inexistente");

        $this->service->prestar("juan@example.com", 0);
    }

    public function testRecursoNoDisponibleLanzaExcepcion(): void
    {
        $this->service->prestar("juan@example.com", 1);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Recurso no disponible");

        $this->service->prestar("juan@example.com", 1);
    }

    public function testMaximoPrestamosLanzaExcepcion(): void
    {
        $this->service->prestar("juan@example.com", 1);
        $this->service->prestar("juan@example.com", 2);
        $this->service->prestar("juan@example.com", 3);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("El usuario, tiene ya registrados 3 prestamos");

        $this->service->prestar("juan@example.com", 4);
    }

    public function testDevolverPrestamo(): void {
        $this->service->prestar("juan@example.com", 1);
        $prestamo = $this->service->prestar("juan@example.com", 2);
        $this->service->prestar("juan@example.com", 3);

        $antes = count($this->service->getUsuarioByEmail("juan@example.com")->getPrestamos());

        $this->service->devolverPrestamo($prestamo);
        $this->assertEquals(EstadoRecurso::DISPONIBLE, $prestamo->getRecurso()->getEstado());
        $this->assertEquals($antes-1, count($prestamo->getUsuario()->getPrestamos()));
    }
}
