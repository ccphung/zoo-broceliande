<?php

namespace App\Controller\Admin;

use App\Entity\Review;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;

#[IsGranted('ROLE_EMPLOYE')]

class ReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Review::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW);
    }

    public function configureCrud(Crud $crud) : Crud 
    {
        return $crud
            ->setEntityLabelInPlural('Avis')
            ->setEntityLabelInSingular('Avis')

            ->setPageTitle("index", "Gestion des avis")
            ->setPageTitle("edit", "Gestion d'un avis")

            ->setPaginatorPageSize(10);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('pseudo')
                ->setLabel('Pseudo')
                ->setFormTypeOption('constraints', [
                    new NotBlank(['message' => 'Ce champ ne peut pas être vide'])
                ]),
            TextareaField::new('comment')
                ->setLabel('Commentaire')
                ->setFormTypeOption('constraints', [
                    new NotBlank(['message' => 'Ce champ ne peut pas être vide'])
                ]),
            DateField::new('date')
                ->setLabel('Date')
                ->setFormTypeOption('constraints', [
                    new LessThanOrEqual([
                        'value' => 'today',
                        'message' => 'La date et l\'heure doivent être antérieures ou égales à la date actuelle'
                    ])
                ]),
            BooleanField::new('isVisible')
                ->setLabel('Approuvé'),
        ];
    }

}
