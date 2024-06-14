<?php

namespace App\Controller\Admin;

use App\Entity\OpeningHours;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OpeningHoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpeningHours::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Horaire')
            ->setEntityLabelInPlural('Horaires')
            ->setPageTitle('index', 'Gestion des horaires')
            ->setPageTitle('edit', 'Modifier l\'horaire')
            ->setPageTitle('new', 'Ajouter un horaire');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Day')->setLabel('Jour'),
            TextField::new('Open')->setLabel('Ouverture'),
            TextField::new('Close')->setLabel('Fermeture'),
        ];
    }
}
