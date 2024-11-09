<?php 

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(ServiceRepository $services, CategoryRepository $categories, Request $request): Response
    {
        $categoryFilter = $request->get('category');
        
        if ($request->isXmlHttpRequest()) {
            // Requête Ajax
            if ($categoryFilter === "all") {
                $servicesFiltered = $services->findAll();
            } else {
                $servicesFiltered = $services->findByFilter($categoryFilter);
            }
            
            return new JsonResponse([
                'content' => $this->renderView('service/_content.html.twig', [
                    'services' => $servicesFiltered,
                    'categories' => $categories->findAll()
                ])
            ]);
        } else {
            // Requête normale 
            return $this->render('service/index.html.twig', [
                'services' => $services->findAll(),
                'categories' => $categories->findAll()
            ]);
        }
    }
}
