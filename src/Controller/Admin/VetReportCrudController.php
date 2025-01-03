<?php

namespace App\Controller\Admin;

use App\Entity\VetReport;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_VET')]
class VetReportCrudController extends AbstractCrudController implements EventSubscriberInterface
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public static function getEntityFqcn(): string
    {
        return VetReport::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Rapports vétérinaire')
            ->setEntityLabelInSingular('Rapport vétérinaire')
            ->setPageTitle("index", "Gestion des rapports")
            ->setPageTitle("edit", "Gestion d'un rapport");
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('animal')
                ->setLabel('Animal')
                ->setColumns(3),
            TextField::new('animal.species', 'Species')
                ->setLabel('Espèce de l\'animal')
                ->onlyOnIndex()
                ->setRequired(false),
            FormField::addRow(),
            TextField::new('animalCondition')
                ->setLabel('Etat de l\'animal')
                ->setColumns(6)
                ->hideOnIndex(),
            FormField::addRow(),
            AssociationField::new('suggestedFood')
                ->setLabel('Nourriture proposée')
                ->setColumns(3),
            IntegerField::new('FoodQuantity')
                ->setLabel('Quantité (en grammes)')
                ->setColumns(3),
            FormField::addRow(),
            TextareaField::new('animalConditionDetail')
                ->setLabel('Détail de l\'état de l\'animal')
                ->onlyOnForms()
                ->hideOnIndex(),
            DateTimeField::new('visitDate')
                ->setLabel('Date de la visite')
                ->setColumns(3),
            AssociationField::new('user')
                ->setLabel('Par')
                ->setColumns(3)
                ->onlyOnIndex(),
        ];
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => 'setUserOnVetReport',
        ];
    }

    public function setUserOnVetReport(BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof VetReport)) {
            return;
        }

        $user = $this->security->getUser();
        $entity->setUser($user);
    }
}
