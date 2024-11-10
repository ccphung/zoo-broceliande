<?php

namespace App\Controller;

use App\Repository\HabitatRepository;
use App\Entity\Habitat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;

class HabitatController extends AbstractController
{
    #[Route('/habitat', name: 'app_habitat')]
    public function index(HabitatRepository $habitats): Response
    {
        return $this->render('habitat/index.html.twig', [
            'controller_name' => 'HabitatController',
            'habitats' => $habitats->findAll()
        ]);
    }

    #[Route('/habitat/{slug}', name: 'habitat_details')]
    public function details(
        #[MapEntity(mapping: ['slug' => 'name'])] Habitat $habitat
    ): Response
    {
        return $this->render('habitat/details.html.twig', [
            'habitat' => $habitat
        ]);
    }
}
