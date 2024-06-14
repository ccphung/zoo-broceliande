<?php

namespace App\Controller;

use App\Repository\ReviewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ReviewRepository $reviews ): Response
    {
        return $this->render('home/index.html.twig', [
            'lastreview' => $reviews->findOneBy([], ['id' => 'desc']),
            'reviews' => $reviews->findAll()
        ]);
    }
}
