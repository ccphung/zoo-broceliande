<?php

namespace App\Controller\Admin;

use App\Entity\Habitat;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Vich\UploaderBundle\Form\Type\VichFileType;

#[IsGranted(new Expression('is_granted("ROLE_ADMIN") or is_granted("ROLE_VET")'))]

class HabitatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Habitat::class;
    }

    public function configureCrud(Crud $crud) : Crud
    {
        return $crud
            ->setEntityLabelInPlural('Habitats')
            ->setEntityLabelInSingular('Habitat')

            ->setPageTitle("index", "Gestion des habitats")
            ->setPageTitle("edit", "Gestion d'un habitat");
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')
                ->setLabel('Nom'),
            TextareaField::new('description')
                ->setLabel('Description'),
            TextField::new('imageName')
                ->setLabel('Nom de l\'image'),
            TextField::new('imageFile')
                ->setFormType(VichFileType::class),
        ];
    }
}
