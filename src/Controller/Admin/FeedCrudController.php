<?php

namespace App\Controller\Admin;

use App\Entity\Feed;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted(new Expression('is_granted("ROLE_EMPLOYE") or is_granted("ROLE_VET")'))]

class FeedCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Feed::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('animal')
            ->add('date');
    }

    public function configureActions(Actions $actions): Actions
    {
    
        return $actions
            
            ->setPermission(Action::NEW, 'ROLE_EMPLOYE')
            ->setPermission(Action::EDIT, 'ROLE_EMPLOYE')
            ->setPermission(Action::DELETE, 'ROLE_EMPLOYE')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('animal')
                ->setLabel('Animal'),
            TextField::new('animal.species', 'Species')
                ->setLabel('Espèce')
                ->onlyOnIndex()
                ->setRequired(false),
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
