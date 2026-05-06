<?php

namespace App\Controller;

use App\Entity\Libro;
use App\Repository\LibroRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;




#[Route('/api', name: 'app_api_')]
final class ApiLibroController extends AbstractController
{
    const MIN_LEGNTH_TITULO = 2;
    const MAX_LENGTH_TITULO = 10;
    const MIN_LENGTH_DESC = 10;
    const MAX_LENGTH_DESC = 255;

    #[Route('/libros', name: 'libros', methods: ['GET'])]
    public function index(LibroRepository $repo): JsonResponse
    {
        return $this->json($repo->findAll());
    }

    //Obtener un libro por su id
    #[Route('/libros/{id}', name: 'libros_id', methods: ['GET'])]
    public function show(LibroRepository $repo, int $id): JsonResponse
    {
        $libro = $repo->find($id);
        if (!$libro) {
            return $this->json(['error' => 'Libro not found'], Response::HTTP_NOT_FOUND);
        }
        return $this->json($libro);
    }


    //Eliminar un libro por su id
    #[Route('/libros/{id}', name: 'libros_delete', methods: ['DELETE'])]
    public function delete(LibroRepository $repo, int $id, EntityManagerInterface $em): JsonResponse
    {
        $libro = $repo->find($id);
        if (!$libro) {
            return $this->json(['error' => 'Libro not found'], Response::HTTP_NOT_FOUND);
        }
        $em->remove($libro);
        $em->flush();


        return $this->json(null, 204);
    }

    //Crear libro
    #[Route('/libros', name: 'libros_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        if ($data === null) {
            return $this->json(['error' => 'Invalid JSON'], 400);
        }
        if (isset($data["titulo"]) && !empty(trim($data["titulo"]))) {
            $libro = new Libro();
            $libro->setTitulo($data["titulo"]);

            $em->persist($libro);
            $em->flush();

            return $this->json($libro, 201);
        } else {
            return $this->json(['error' => 'El campo titulo es obligatorio'], 400);
        }
    }
    #[Route('/libros/v', name: 'libros_create_v', methods: ['POST'])]
    public function createLibroValidacion(Request $request, ValidatorInterface $validator, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        if ($data == null) {
            return $this->json(["error" => "Invalid JSON"], 400);
        }
        if (!isset($data["titulo"])) {
            return $this->json(["error" => "Invalid JSON"], 400);
        }

        $libro = new Libro();
        $libro->setTitulo($data['titulo'] ?? null);

        $errors = $validator->validate($libro);

        if (count($errors) > 0) {
            $formattedErrors = [];
            foreach ($errors as $error) {
                $formattedErrors[$error->getPropertyPath()] = $error->getMessage();
            }
            return $this->json([
                'error' => 'Validation failed',
                'fields' => $formattedErrors
            ], 400);
        }

        $em->persist($libro);
        $em->flush();

        return $this->json($libro, 201);
    }

    //Update libro
    #[Route('/libros/{id}', name: 'libros_update', methods: ['PUT'])]
    public function update(Request $request, EntityManagerInterface $em, LibroRepository $repo, int $id, ValidatorInterface $validator): JsonResponse
    {
        $libro = $repo->find($id);
        if (!$libro) {
            return $this->json(['error' => 'Libro not found'], Response::HTTP_NOT_FOUND);
        }
        $data = json_decode($request->getContent(), true);
        if ($data == null) {
            return $this->json(["error" => "Invalid JSON"], 400);
        }
        if (!isset($data["titulo"])) {
            return $this->json(["error" => "Invalid JSON"], 400);
        }

        $libro->setTitulo($data['titulo'] ?? null);

        $errors = $validator->validate($libro);

        if (count($errors) > 0) {
            $formattedErrors = [];
            foreach ($errors as $error) {
                $formattedErrors[$error->getPropertyPath()] = $error->getMessage();
            }
            return $this->json([
                'error' => 'Validation failed',
                'fields' => $formattedErrors
            ], 400);
        }

        $em->flush();

        return $this->json($libro, 200);
    }
    //Patch libro
    #[Route('/libros/{id}', name: 'libros_update_partial', methods: ['PATCH'])]
    public function updateParcial(Request $request, EntityManagerInterface $em, LibroRepository $repo, int $id): JsonResponse
    {
        $libro = $repo->find($id);
        if (!$libro) {
            return $this->json(['error' => 'Libro not found'], Response::HTTP_NOT_FOUND);
        }
        $data = json_decode($request->getContent(), true);
        if ($data == null) {
            return $this->json(["error" => "Invalid JSON"], 400);
        }

        if (isset($data["titulo"])) {
            try {
                $titulo = $this->validateFieldString("titulo", self::MIN_LEGNTH_TITULO, self::MAX_LENGTH_TITULO, $data);
            } catch (\Exception $ex) {
                return $this->json(["error" => $ex->getMessage()], 400);
            }

            $libro->setTitulo($data['titulo'] ?? null);
        }
        if (isset($data["descripcion"])) {
            try {
                $descripcion = $this->validateFieldString("descripcion", self::MIN_LENGTH_DESC, self::MAX_LENGTH_DESC, $data);
            } catch (\Exception $ex) {
                return $this->json(["error" => $ex->getMessage()], 400);
            }

            $libro->setDescripcion($data['descripcion'] ?? null);
        }

        $em->flush();

        return $this->json($libro, 200);
    }

    private function validateFieldString(string $fieldName, int $min, int $max, $data): string
    {
        if (isset($data[$fieldName])) {
            if (!empty(trim($data[$fieldName]))) {
                $value = trim($data[$fieldName]);
                if (strlen($value) >= $min && strlen($value) <= $max) {
                    return $value;
                } else {
                    throw new \Exception("El " . $fieldName . " debe tener al menos " . self::MIN_LEGNTH_TITULO . " caracteres y El título no puede tener más de " . self::MAX_LENGTH_TITULO . " caracteres");
                }
            }
        }

        throw new \Exception("El campo " . $fieldName . " es obligatorio.");
    }
}
