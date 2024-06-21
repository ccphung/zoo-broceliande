<?php

namespace App\Controller;

use App\Entity\Animal;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnimalController extends AbstractController
{
    #[Route('/animal/{slug}', name: 'app_animal')]
    public function index(
        #[MapEntity(mapping: ['slug' => 'name'])] Animal $animal
    ): Response
    {
        return $this->render('animal/index.html.twig', [
            'animal' => $animal
        ]);
    }
}
