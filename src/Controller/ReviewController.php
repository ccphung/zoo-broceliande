<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReviewController extends AbstractController
{
    #[Route('/review', name: 'app_review')]
    public function index(Request $request, EntityManagerInterface $manager ): Response
    {
        $review = new Review();
        $form = $this->createForm(ReviewType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $review = $form->getData();

            $manager->persist($review);
            $manager->flush();

            $this->addFlash(
                'success',
                'Merci pour votre avis !'
            );

            unset($form);
            $review = new Review();
            $form = $this->createForm(ReviewType::class);
        }

        return $this->render('review/index.html.twig', [
            'controller_name' => 'ReviewController',
            'form' => $form->createView(),
        ]);
    }
}
