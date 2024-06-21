<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use App\Entity\Habitat;
use App\Entity\OpeningHours;
use App\Entity\Review;
use App\Entity\Service;
use App\Entity\User;
use App\Repository\ReviewRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    private $reviewRepository;
    
    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Arcadia Zoo')
            ->generateRelativeUrls();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Employés/Vétérinaires', 'fa-solid fa-person-digging', User::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Animal', 'fa-solid fa-otter', Animal::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Services', 'fa-solid fa-train', Service::class)
        ->setPermission(new Expression('"ROLE_ADMIN" or "ROLE_EMPLOYE"'));
        yield MenuItem::linkToCrud('Habitat', 'fa-solid fa-solid fa-house', Habitat::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Horaires', 'fa-regular fa-clock', OpeningHours::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Avis', 'fa-regular fa-comment', Review::class)
        ->setPermission('ROLE_EMPLOYE')
        ->setBadge(
            $this->reviewRepository->findUnapprovedReviewsCount(),
            'primary'
        );
    }
}
