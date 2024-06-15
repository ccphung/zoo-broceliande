<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    public function configureCrud(Crud $crud) : Crud
    {
        return $crud
            ->setEntityLabelInPlural('Services')
            ->setEntityLabelInSingular('Service')

            ->setPageTitle("index", "Gestion des services")
            ->setPageTitle("edit", "Gestion d'un service");
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')
                ->setLabel('Nom'),
            AssociationField::new('category'),
            TextareaField::new('description')
                ->setLabel('Description'),
            TextField::new('imageName')
                ->setLabel('Nom de l\'image'),
            TextField::new('imageFile')
                ->setFormType(VichFileType::class),
        ];
    }
}
