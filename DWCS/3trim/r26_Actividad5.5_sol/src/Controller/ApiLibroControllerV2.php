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
use Symfony\Component\Validator\Constraints\Json;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use OpenApi\Attributes as OA;

#[Route('/api/v2', name: 'app_api_v2')]
final class ApiLibroControllerV2 extends AbstractController
{

    const MIN_LENGTH_TITULO = 2;
    const MAX_LENGTH_TITULO = 10;

    const MIN_LENGTH_DESC = 10;
    const MAX_LENGTH_DESC = 255;

    #[Route('/libros', name: 'libros', methods: ['GET'])]
    #[OA\Get(
        path: '/api/v2/libros',
        summary: 'Lista de libros',
        description: 'Devuelve un listado completo de libros',
        tags: ['Libros'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Listado de libros',
                content: new OA\JsonContent(
                    type: 'array',
                    items: new OA\Items(
                        type: 'object',
                        properties: [
                            new OA\Property(property: 'id', type: 'integer'),
                            new OA\Property(property: 'titulo', type: 'string'),
                            new OA\Property(property: 'descripcion', type: 'string')
                        ]
                    )
                )
            )
        ]
    )]
    /**
     * Obtiene el listado completo de libros.
     *
     * @param LibroRepository $repo Repositorio de libros.
     *
     * @return JsonResponse Respuesta JSON con la coleccion de libros.
     */
    public function index(LibroRepository $repo): JsonResponse
    {
        return $this->json($repo->findAll());
    }

    //Obtener un libro por su id
    #[Route('/libros/{id}', name: 'libros_id', methods: ['GET'])]
    /**
     * Obtiene un libro por su identificador.
     *
     * @param LibroRepository $repo Repositorio de libros.
     * @param int $id Identificador del libro.
     *
     * @return JsonResponse Respuesta JSON con el libro o error 404.
     */
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
    /**
     * Elimina un libro por su identificador.
     *
     * @param LibroRepository $repo Repositorio de libros.
     * @param int $id Identificador del libro.
     * @param EntityManagerInterface $em Gestor de entidades para eliminar y confirmar cambios.
     *
     * @return JsonResponse Respuesta vacia 204 o error 404.
     */
    public function delete(LibroRepository $repo, int $id, EntityManagerInterface $em): JsonResponse
    {
        $libro = $repo->find($id);
        if (!$libro) {
            return $this->json(['error' => 'Libro not found'], Response::HTTP_NOT_FOUND);
        }
        $em->remove($libro);
        $em->flush();


        return $this->json(null, Response::HTTP_NO_CONTENT);
    }



    #[Route('/libros', name: 'libro_create_validacion_symf', methods: ['POST'])]
    #[OA\Post(
        path: '/api/v2/libros',
        summary: 'Crea un nuevo libro',
        tags: ['Libros'],

        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['titulo'],
                properties: [
                    new OA\Property(property: 'titulo', type: 'string'),
                    new OA\Property(property: 'descripcion', type: 'string')
                ]
            )
        ),

        responses: [
            new OA\Response(
                response: 201,
                description: 'Libro creado',
                content: new OA\JsonContent(
                    type: 'object',
                    properties: [
                        new OA\Property(property: 'id', type: 'integer'),
                        new OA\Property(property: 'titulo', type: 'string'),
                        new OA\Property(property: 'descripcion', type: 'string')
                    ]
                )
            )
        ]
    )]
    /**
     * Crea un nuevo libro validando sus datos de entrada.
     *
     * @param Request $request Peticion HTTP con JSON de entrada.
     * @param ValidatorInterface $validator Validador para el grupo "create".
     * @param EntityManagerInterface $em Gestor de entidades para persistir el libro.
     *
     * @return JsonResponse Respuesta con el libro creado o errores de validacion.
     */
    public function createLibroConValidacion(
        Request $request,
        ValidatorInterface $validator,
        EntityManagerInterface $em
    ): JsonResponse {

        $data = json_decode($request->getContent(), true);
        if ($data === null) {
            return $this->json(["error" => 'Invalid JSON'], Response::HTTP_BAD_REQUEST);
        }
        // $error = $this->formatResponseOnInvalidFields($data, "titulo", 'Invalid JSON');
        // if ($error) {
        //     return $this->json($error, Response::HTTP_BAD_REQUEST);
        // }

        // $error = $this->formatResponseOnInvalidFields($data, "descripcion", 'Invalid JSON');
        // if ($error) {
        //     return $this->json($error, Response::HTTP_BAD_REQUEST);
        // }




        $libro = new Libro();
        //Vamos a forzar que en el POST vengan todos los atributos (salvo el id)

        $libro->setTitulo($this->trimOrNull($data['titulo'] ?? null));
        $libro->setDescripcion($this->trimOrNull($data['descripcion'] ?? null));



        $errors = $validator->validate($libro, null, ["create"]);

        if (count($errors) > 0) {
            $formatArray = $this->formatInvalidErrorList($errors);
            return $this->json($formatArray, Response::HTTP_BAD_REQUEST);
        }


        $em->persist($libro);
        $em->flush();

        return $this->json($libro, Response::HTTP_CREATED);
    }


    #[Route('/libros/{id}', name: 'libro_update', methods: ['PUT'])]
    /**
     * Reemplaza completamente un libro por su identificador.
     *
     * @param int $id Identificador del libro.
     * @param LibroRepository $repo Repositorio de libros.
     * @param Request $request Peticion HTTP con el cuerpo JSON completo.
     * @param ValidatorInterface $validator Validador para el grupo "replace".
     * @param EntityManagerInterface $em Gestor de entidades para confirmar cambios.
     *
     * @return JsonResponse Respuesta con el libro actualizado o error.
     */
    public function updateLibro(
        int $id,
        LibroRepository $repo,
        Request $request,
        ValidatorInterface $validator,
        EntityManagerInterface $em
    ): JsonResponse {

        $libro = $repo->find($id);

        if (!$libro) {
            return $this->json(['error' => 'Libro not found'], Response::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);
        if ($data === null) {
            return $this->json(["error" => 'Invalid JSON'], Response::HTTP_BAD_REQUEST);
        }

        // $error = $this->formatResponseOnInvalidFields($data, "titulo", 'Invalid JSON');
        // if ($error) {
        //     return $this->json($error, Response::HTTP_BAD_REQUEST);
        // }

        $error = $this->formatResponseOnInvalidFields($data, "descripcion", 'Invalid JSON');
        if ($error) {
            return $this->json($error, Response::HTTP_BAD_REQUEST);
        }


        //Aplicamos trim() a los campos string para evitar que se envíen valores con espacios en blanco al inicio o al final
        // Si el valor es null, se asigna null directamente al campo correspondiente.
        // trim(null) ="" (cadena vacía), lo que podría causar problemas de validación si el campo permite valores nulos.
        $libro->setTitulo($this->trimOrNull($data['titulo'] ?? null));

        $libro->setDescripcion($this->trimOrNull($data['descripcion'] ?? null));

        $errors = $validator->validate($libro, null, ["replace"]);

        if (count($errors) > 0) {
            $formatArray = $this->formatInvalidErrorList($errors);
            return $this->json($formatArray, Response::HTTP_BAD_REQUEST);
        }







        $em->flush();

        return $this->json($libro, Response::HTTP_OK);
    }




    #[Route('/libros/{id}', name: 'libro_update_partial_validacion', methods: ['PATCH'])]
    /**
     * Actualiza parcialmente un libro por su id.
     *
     * Permite modificar de forma parcial los campos titulo y/o descripcion.
     * Solo se actualizan los campos presentes en el cuerpo JSON.
     *
     * Respuestas posibles:
     * - 200: Libro actualizado correctamente.
     * - 400: JSON invalido o errores de validacion.
     * - 404: Libro no encontrado.
     *
     * @param int $id Identificador del libro a actualizar.
     * @param LibroRepository $repo Repositorio para localizar la entidad.
     * @param Request $request Peticion HTTP con el cuerpo JSON parcial.
     * @param ValidatorInterface $validator Validador para el grupo "update".
     * @param EntityManagerInterface $em Gestor de entidades para persistir cambios.
     *
     * @return JsonResponse Respuesta JSON con el libro actualizado o con el error correspondiente.
     */
    #[OA\Patch(
        tags: ['Libros'],
        description: 'Permite actualizar parcialmente los campos titulo y descripcion de un libro',
        requestBody: new OA\RequestBody(
            required: false,
            content: new OA\JsonContent(
                type: 'object',
                properties: [
                    new OA\Property(property: 'titulo', type: 'string', nullable: true),
                    new OA\Property(property: 'descripcion', type: 'string', nullable: true)
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'Libro actualizado parcialmente',
                content: new OA\JsonContent(
                    type: 'object',
                    properties: [
                        new OA\Property(property: 'id', type: 'integer'),
                        new OA\Property(property: 'titulo', type: 'string', nullable: true),
                        new OA\Property(property: 'descripcion', type: 'string', nullable: true)
                    ]
                )
            ),
            new OA\Response(
                response: 400,
                description: 'JSON invalido o error de validacion',
                content: new OA\JsonContent(
                    type: 'object',
                    properties: [
                        new OA\Property(property: 'error', type: 'string'),
                        new OA\Property(
                            property: 'fields',
                            type: 'object',
                            additionalProperties: new OA\AdditionalProperties(type: 'string')
                        )
                    ]
                )
            ),
            new OA\Response(
                response: 404,
                description: 'Libro no encontrado',
                content: new OA\JsonContent(
                    type: 'object',
                    properties: [
                        new OA\Property(property: 'error', type: 'string')
                    ]
                )
            )
        ]
    )]

    public function updateParcialLibroConValidacion(
        int $id,
        LibroRepository $repo,
        Request $request,
        ValidatorInterface $validator,
        EntityManagerInterface $em
    ): JsonResponse {





        $libro = $repo->find($id);

        if (!$libro) {
            return $this->json(['error' => 'Libro not found'], Response::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);
        if ($data === null) {
            return $this->json(["error" => 'Invalid JSON'], Response::HTTP_BAD_REQUEST);
        }



        if (array_key_exists("titulo", $data)) {
            $libro->setTitulo($this->trimOrNull($data['titulo'] ?? null));
        }

        if (array_key_exists("descripcion", $data)) {
            $libro->setDescripcion($this->trimOrNull($data['descripcion'] ?? null));
        }

        $errors = $validator->validate($libro, null, ["update"]);

        if (count($errors) > 0) {
            $formatArray = $this->formatInvalidErrorList($errors);
            return $this->json($formatArray, Response::HTTP_BAD_REQUEST);
        }


        $em->flush();

        return $this->json($libro, Response::HTTP_OK);
    }


    /**
     * Formatea la lista de violaciones en una estructura JSON legible.
     *
     * @param ConstraintViolationListInterface $errors Lista de errores de validacion.
     *
     * @return array Estructura con clave "error" y mapa de campos en "fields".
     */
    private function formatInvalidErrorList(ConstraintViolationListInterface $errors): array
    {
        if (count($errors) > 0) {
            $formattedErrors = [];
            foreach ($errors as $error) {
                $formattedErrors[$error->getPropertyPath()] = $error->getMessage();
            }
            $formatArray = [
                'error' => 'Validation failed',
                'fields' => $formattedErrors
            ];
            return $formatArray;
        }
        return [];
    }

    /**
     * Devuelve un error si falta un campo obligatorio en el array recibido.
     *
     * @param array $data Datos decodificados del cuerpo JSON.
     * @param string $fieldName Nombre del campo a comprobar.
     * @param string $message Mensaje de error a devolver cuando el campo no existe.
     *
     * @return array|null Array con el error o null si el campo existe.
     */
    private function formatResponseOnInvalidFields(array $data, string $fieldName, string $message)
    {
        //Para permitir que un campo exista y su valor sea null, en lugar de  !isset($data[$fieldName])  se puede usar array_key_exists para validar solo la existencia de la clave en el array, sin importar su valor (null, vacío, etc.)
        //if (!isset($data[$fieldName])) {
        if (!array_key_exists($fieldName, $data)) {
            return ["error" => $message];
        }
    }

    /**
     * Aplica trim a cadenas y conserva null cuando no hay valor.
     *
     * @param mixed $value Valor de entrada a normalizar.
     *
     * @return string|null Cadena recortada o null.
     */
    private function trimOrNull(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return trim($value);
    }
}
