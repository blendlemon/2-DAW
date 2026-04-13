<?php

namespace App\Tests\Controller;

use App\Repository\LibroRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiLibroControllerTest extends WebTestCase
{

    private ?KernelBrowser $client;

    protected function setUp(): void
    {

        $this->client = static::createClient();

        // 2. Accede al contenedor para obtener el repositorio
        // Usamos self::getContainer() porque permite acceder a servicios privados
        $libroRepository = self::getContainer()->get(LibroRepository::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        // Opcional: liberar memoria de objetos pesados
        $this->client = null;
    }




    public function testCreateLibroSoloTituloOk(): void
    {
        $this->client->request(
            'POST',
            '/api/libros',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'titulo' => 'Libro test'
            ])
        );

        $this->assertResponseStatusCodeSame(201);

        $content = json_decode($this->client->getResponse()->getContent(), true);

        $this->assertArrayHasKey('id', $content);
        $this->assertEquals('Libro test', $content['titulo']);
    }
    public function testCreateLibroConDescripcionNullOk(): void
    {
        $this->client->request(
            'POST',
            '/api/libros',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'titulo' => 'Libro test',
                'descripcion' => null
            ])
        );

        $this->assertResponseStatusCodeSame(201);

        $content = json_decode($this->client->getResponse()->getContent(), true);

        $this->assertArrayHasKey('id', $content);
        $this->assertEquals('Libro test', $content['titulo']);
        $this->assertNull($content['descripcion']);
    }
    public function testCreateLibroOk(): void
    {
        $this->client->request(
            'POST',
            '/api/libros',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'titulo' => 'Libro test',
                'descripcion' => 'Descripcion válida de prueba'
            ])
        );

        $this->assertResponseStatusCodeSame(201);

        $content = json_decode($this->client->getResponse()->getContent(), true);

        $this->assertArrayHasKey('id', $content);
        $this->assertEquals('Libro test', $content['titulo']);
        $this->assertEquals('Descripcion válida de prueba', $content['descripcion']);
    }

    public function testCreateLibroBadRequest(): void
    {


        $this->client->request(
            'POST',
            '/api/libros',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([])
        );

        $this->assertResponseStatusCodeSame(400);
    }

    public function testGetLibros(): void
    {


        $this->client->request('GET', '/api/libros');

        $this->assertResponseIsSuccessful();
    }

    public function testPatchLibro(): void
    {


        // primero crear uno
        $this->client->request(
            'POST',
            '/api/libros',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'titulo' => 'Original',
                'descripcion' => 'Descripcion válida para test'
            ])
        );

        $this->assertResponseStatusCodeSame(201);

        $content = json_decode($this->client->getResponse()->getContent(), true);
        $id = $content['id'];

        // PATCH
        $this->client->request(
            'PATCH',
            "/api/libros/$id",
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'titulo' => 'Modificado'
            ])
        );

        $this->assertResponseIsSuccessful();
    }

    public function testDeleteLibro(): void
    {


        $this->client->request(
            'POST',
            '/api/libros',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'titulo' => 'A borrar',
                'descripcion' => 'Descripcion válida de prueba'
            ])
        );

        $content = json_decode($this->client->getResponse()->getContent(), true);
        $id = $content['id'];

        $this->client->request('DELETE', "/api/libros/$id");

        $this->assertResponseStatusCodeSame(204);
    }

}
