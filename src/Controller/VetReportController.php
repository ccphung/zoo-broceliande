<?php

namespace App\Controller;

use App\Repository\VetReportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VetReportController extends AbstractController
{
    #[Route('/vetreport', name: 'app_vet_report')]
    public function index(VetReportRepository $vetreports): Response
    {
        return $this->render('vet_report/index.html.twig', [
            'reports' => $vetreports->findall()
        ]);
    }
}
