<?php

namespace App\Controller;

use App\Repository\AnimalRepository;
use App\Repository\VetReportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VetReportController extends AbstractController
{
    #[Route('/vetreport', name: 'app_vet_report')]
    public function index(VetReportRepository $vetreports, AnimalRepository $animals, Request $request): Response
    {
        $filterDate = $request->get('date');
        $filterAnimal = $request->get('animal');
        $filterMinYear = $request->get('yearmin');
        $filterMaxYear = $request->get('yearmax');
        $filterVet = $request->get('vet');

        if($request->isXmlHttpRequest()){
            
            return new JsonResponse([
                'content' => $this->renderView('vet_report/_content.html.twig', [
                    'reports' => $vetreports->findByFilter($filterAnimal, $filterDate, $filterMinYear, $filterMaxYear, $filterVet)
                ])
            ]);
        } else {
            return $this->render('vet_report/index.html.twig', [
                'reports' => $vetreports->findall(),
                'animals' => $animals->findall()
            ]);
        }
    }
}
