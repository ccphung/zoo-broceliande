<?php

namespace App\Controller\Admin;

use App\Entity\Feed;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class FeedCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Feed::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('animal')
                ->setLabel('Animal'),
            AssociationField::new('food')
                ->setLabel('Nourriture'),
            IntegerField::new('quantity')
                ->setLabel('Quantité (en grammes)'),
            DateTimeField::new('date', 'Date et Heure')
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Nourritures données')
            ->setEntityLabelInSingular('Nourriture donnée')
            ->setPageTitle('index', 'Gestion des nourritures données')
            ->setPageTitle('edit', 'Modifier une nourriture donnée')
            ->setPaginatorPageSize(10);
    }
}
