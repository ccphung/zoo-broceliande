<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            $email = (new TemplatedEmail())
                ->from($formData['email'])
                ->to('jose@arcadia.fr')
                ->subject('Nouveau message depuis le formulaire de contact')
                ->html('Nom: ' . htmlspecialchars($formData['lastName']) . '<br>' .
                       'Prénom: ' . htmlspecialchars($formData['firstName']) . '<br>' .
                       'Email: ' . htmlspecialchars($formData['email']) . '<br>' .
                       'Sujet: ' . htmlspecialchars($formData['subject']) . '<br>' .
                       'Message: ' . nl2br(htmlspecialchars($formData['message'])));

            $mailer->send($email);

            $this->addFlash('success', 'Votre message a été envoyé avec succès.');

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
