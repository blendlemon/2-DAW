<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TableController extends AbstractController
{
    #[Route('/table/{filas}/{cols}', name: 'app_table', requirements:["filas" => "[1-9]\d*", "cols" => "[1-9]\d*"])]
    public function index(int $filas = 4, int $cols = 4): Response
    {
        $arr = [];
        for ($i = 0; $i < $filas; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $arr[$i][$j] = random_int(0, 100);
            }
        }
        return $this->render('table/index.html.twig', [
            'controller_name' => 'TableController',
            'filas_tabla' => $filas,
            'cols_tabla' => $cols,
            'arr' => $arr
        ]);
    }
}
