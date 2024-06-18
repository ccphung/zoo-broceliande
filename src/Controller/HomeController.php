<?php

namespace App\Controller;

use App\Repository\HabitatRepository;
use App\Repository\ReviewRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ReviewRepository $reviews, ServiceRepository $services, HabitatRepository $habitats): Response
    {
        $lastFourHabitats = $habitats->findLastFour();

        return $this->render('home/index.html.twig', [
            'lastreview' => $reviews->findOneBy([], ['id' => 'desc']),
            'reviews' => $reviews->findAll(),
            'services' => $services->findAll(),
            'habitats' => $lastFourHabitats,
        ]);
    }
}
