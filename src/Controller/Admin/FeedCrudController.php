<?php

namespace App\Controller\Admin;

use App\Entity\Feed;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

#[IsGranted('ROLE_EMPLOYE')]

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
                ->setLabel('Animal')
                ->setFormTypeOption('constraints', [
                    new NotBlank(['message' => 'Ce champ ne peut pas être vide'])
                ]),
            AssociationField::new('food')
                ->setLabel('Nourriture'),
            IntegerField::new('quantity')
                ->setLabel('Quantité (en grammes)')
                ->setFormTypeOption('constraints', [
                    new Positive(['message' => 'Veuillez entrer un nombre positif'])
                ]),
            DateTimeField::new('date', 'Date et Heure')
                ->setFormTypeOption('constraints', [
                    new LessThanOrEqual([
                        'value' => 'today',
                        'message' => 'La date et l\'heure doivent être antérieures ou égales à la date actuelle'
                    ])
                ]),
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
