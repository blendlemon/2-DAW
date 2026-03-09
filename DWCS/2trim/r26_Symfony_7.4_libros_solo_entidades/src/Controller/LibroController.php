<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\LibroRepository;

final class LibroController extends AbstractController
{
    #[Route('/libros/buscar', name: 'libro_buscar')]
    public function buscar(Request $request, LibroRepository $libroRepository): Response
    {
        // Obtenemos los parámetros de la query
        $titulo   = $request->query->get('titulo');   // devuelve string o null
        $unidades = $request->query->get('unidades'); // siempre string si se pasa
        $autor    = $request->query->get('autor');    // string o null

        // Manejar cadenas vacías o parámetros no enviados
        $titulo   = !empty($titulo) ? $titulo : null;
        $unidades = !empty($unidades) ? (int) $unidades : null; // convertimos a int
        $autor    = !empty($autor) ? $autor : null;

        $libros = $libroRepository->buscarLibros($titulo, $unidades, $autor);

        return $this->render('libro/busqueda.html.twig', [
            'libros' => $libros,
            'titulo' => $titulo,
            'unidades' => $unidades,
            'autor' => $autor,
        ]);
    }
}
