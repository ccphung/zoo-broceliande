<?php

namespace App\Controller;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(ServiceRepository $services): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
            'services' => $services->findAll(),
        ]);
    }
}
