<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use App\Entity\Feed;
use App\Entity\Habitat;
use App\Entity\OpeningHours;
use App\Entity\Review;
use App\Entity\Service;
use App\Entity\User;
use App\Entity\VetReport;
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
        yield MenuItem::linkToCrud('Employé/Vétérinaire', 'fa-solid fa-person-digging', User::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Animal', 'fa-solid fa-otter', Animal::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Service', 'fa-solid fa-train', Service::class)
            ->setPermission(new Expression('is_granted("ROLE_ADMIN") or is_granted("ROLE_EMPLOYE")'));
        yield MenuItem::linkToCrud('Habitat', 'fa-solid fa-igloo', Habitat::class)
            ->setPermission(new Expression('is_granted("ROLE_ADMIN") or is_granted("ROLE_VET")'));
        yield MenuItem::linkToCrud('Horaires', 'fa-regular fa-clock', OpeningHours::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Nourriture donnée', 'fa-solid fa-utensils', Feed::class)
            ->setPermission('ROLE_EMPLOYE');
        yield MenuItem::linkToCrud('Rapport vétérinaire', 'fas fa-file-medical', VetReport::class)
            ->setPermission('ROLE_VET');
        yield MenuItem::linkToCrud('Avis', 'fa-regular fa-comment', Review::class)
            ->setPermission('ROLE_EMPLOYE')
            ->setBadge(
                $this->reviewRepository->findUnapprovedReviewsCount(),
                'primary'
            );
    }
}
