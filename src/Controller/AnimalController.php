<?php

namespace App\Controller;

use App\Entity\Animal;
use App\EventListener\AnimalEventListener;
use App\Repository\AnimalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnimalController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private AnimalEventListener $animalEventListener;
    
    public function __construct(EntityManagerInterface $entityManager, AnimalEventListener $animalEventListener)
    {
        $this->entityManager = $entityManager;
        $this->animalEventListener = $animalEventListener;
    }
    
    #[Route('/animal', name: 'app_animal')]
    public function index(AnimalRepository $animals): Response
    {
        return $this->render('animal/index.html.twig', [
            'animals' => $animals->findAll()
        ]);
    }


    #[Route('/animal/{slug}', name: 'app_animal_detail')]
    public function detail (
        #[MapEntity(mapping: ['slug' => 'name'])] Animal $animal
    ): Response
    {
        $this->animalEventListener->incrementClickCount($animal);

        return $this->render('animal/detail.html.twig', [
            'animal' => $animal
        ]);
    }
}
