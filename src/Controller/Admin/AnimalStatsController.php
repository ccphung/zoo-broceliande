<?php

namespace App\Controller\Admin;

use App\Document\AnimalMongoDocument;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class AnimalStatsController extends AbstractController
{
    #[Route('/admin/animal-stats', name: 'animal_stats')]
    public function index(DocumentManager $documentManager): Response
    {
        $animals = $documentManager->getRepository(AnimalMongoDocument::class)
            ->createQueryBuilder()
            ->sort('clickCount', 'desc')
            ->getQuery()
            ->execute();

        return $this->render('admin/animalStats.html.twig', [
            'animals' => $animals,
        ]);
    }
}
