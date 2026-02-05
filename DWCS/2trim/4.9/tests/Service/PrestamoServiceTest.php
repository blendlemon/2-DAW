<?php

namespace App\Tests\Service;

use Exception;
use App\Model\Biblioteca\Libro;
use PHPUnit\Framework\TestCase;
use App\Service\PrestamoService;
use App\Model\Biblioteca\Usuario;
use App\Model\Biblioteca\Enum\EstadoRecurso;


class PrestamoServiceTest extends TestCase
{

    private PrestamoService $service;

    protected function setUp(): void
    {
        // Resetear el contador estático de Recurso
        $reflection = new \ReflectionClass(Libro::class);
        $property = $reflection->getParentClass()->getProperty('contador');
        $property->setValue(null, 1);

        $this->service = new PrestamoService();
        $usuario = new Usuario("juan", "juan@example.com");
        $libro = new Libro("Libro de prueba", "Autor de prueba");
        $libro2 = new Libro("Libro de prueba", "Autor de prueba");
        $libro3 = new Libro("Libro de prueba", "Autor de prueba");
        $libro4 = new Libro("Libro de prueba", "Autor de prueba");

        $this->service->registrarUsuario($usuario);
        $this->service->registrarRecurso($libro);
        $this->service->registrarRecurso($libro2);
        $this->service->registrarRecurso($libro3);
        $this->service->registrarRecurso($libro4);
    }

    public function testPrestarRecursoDisponible(): void
    {
        $prestamo = $this->service->prestar("juan@example.com", 1);
        $this->assertEquals(EstadoRecurso::PRESTADO, $prestamo->getRecurso()->getEstado());
        $this->assertEquals(1, count($prestamo->getUsuario()->getPrestamos()));
    }

    public function testUsuarioNoEncontradoLanzaExcepcion(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Usuario no encontrado");

        $this->service->prestar("inexistente", 1);
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

    public function testDevolverPrestamoLanzaExcepcion(): void {
        $this->service->prestar("juan@example.com", 1);
        $prestamo = $this->service->prestar("juan@example.com", 2);
        $this->service->prestar("juan@example.com", 3);

        $this->service->devolverPrestamo($prestamo);
        $this->assertEquals(EstadoRecurso::DISPONIBLE, $prestamo->getRecurso()->getEstado());
        $this->assertEquals(2, count($prestamo->getUsuario()->getPrestamos()));
    }
}
