<?php

namespace App\Controller;

use App\Entity\Nota;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NotaController extends AbstractController
{
    #[Route('/nota/new', name: 'app_nota')]
    public function createNota(\Doctrine\ORM\EntityManagerInterface $entityManager): Response
    {
        $nota = new Nota();
        $nota->setTitulo('Mi primera nota');
        $nota->setDescripcion('Esta es la descripción de mi primera nota');
        $nota->setFechaModificacion(new \DateTimeImmutable());

        $entityManager->persist($nota);

        $entityManager->flush();

        return new Response('Saved new nota with id ' . $nota->getId());
    }
}
