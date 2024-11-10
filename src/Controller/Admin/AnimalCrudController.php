<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Validator\Constraints\NotBlank;
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
        $message = "Ce champ ne peut pas être vide";

        return [
            TextField::new('name')
                ->setLabel('Nom')
                ->setFormTypeOption('constraints', [
                    new NotBlank(['message' => $message])
                ]),
            AssociationField::new('habitat')
                ->setFormTypeOption('constraints', [
                    new NotBlank(['message' => $message]),
                ]),
            AssociationField::new('species')
                ->setLabel('Espèce')
                ->setFormTypeOption('constraints', [
                    new NotBlank(['message' => $message]),
                ]),
            TextareaField::new('detail')
                ->setLabel('Description')
                ->setFormTypeOption('constraints', [
                    new NotBlank(['message' => $message]),
                ])
                ->hideOnIndex(),
            TextField::new('imageName')
                ->setLabel('Nom de l\'image')
                ->hideOnIndex(),
            TextField::new('imageFile')
                ->setLabel('Fichier')
                ->setFormType(VichFileType::class)
                ->setFormTypeOption('constraints', [
                    new NotBlank(['message' => 'Veuillez ajouter une image'])
                ])
                ->hideOnIndex(),
        ];
    }
}
