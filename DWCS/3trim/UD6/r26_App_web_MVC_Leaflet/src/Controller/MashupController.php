<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MashupController extends AbstractController
{
    #[Route('/mashup', name: 'app_mashup')]
    public function index(): Response
    {
        return $this->render('mashup/index.html.twig', [
            'controller_name' => 'MashupController',
        ]);
    }
}
