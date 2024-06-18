<?php

namespace App\Controller;

use App\Repository\HabitatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

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
}
