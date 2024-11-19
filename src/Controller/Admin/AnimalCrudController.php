<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Vich\UploaderBundle\Form\Type\VichFileType;

#[IsGranted('ROLE_ADMIN')]

class AnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animal::class;
    }
    public function configureCrud(Crud $crud) : Crud
    {
        return $crud
            ->setEntityLabelInPlural('Animaux')
            ->setEntityLabelInSingular('Animal')

            ->setPageTitle("index", "Gestion des Animaux")
            ->setPageTitle("edit", "Gestion d'un animal");
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Nom'),
            AssociationField::new('habitat'),
            AssociationField::new('species')->setLabel('Espèce'),
            TextareaField::new('detail')
                ->setLabel('Description')
                ->hideOnIndex(),
            TextField::new('imageName')
                ->setLabel('Nom de l\'image')
                ->hideOnIndex(),
            TextField::new('imageFile')
                ->setLabel('Fichier')
                ->setFormType(VichFileType::class)
                ->hideOnIndex(),
        ];
    }
}
