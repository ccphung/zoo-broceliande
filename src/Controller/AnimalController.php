<?php

namespace App\Controller;

use App\Entity\Animal;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnimalController extends AbstractController
{
    
    #[Route('/animal', name: 'app_animal')]
    public function index(Animal $animal): Response
    {
        return $this->render('animal/index.html.twig', [
            'animal' => $animal
        ]);
    }


    #[Route('/animal/{slug}', name: 'app_animal_detail')]
    public function detail (
        #[MapEntity(mapping: ['slug' => 'name'])] Animal $animal
    ): Response
    {
        return $this->render('animal/detail.html.twig', [
            'animal' => $animal
        ]);
    }
}
