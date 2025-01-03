<?php

namespace App\Controller\Admin;

use App\Entity\Habitat;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bundle\SecurityBundle\Security;
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
    
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function configureCrud(Crud $crud) : Crud
    {
        return $crud
            ->setEntityLabelInPlural('Habitats')
            ->setEntityLabelInSingular('Habitat')

            ->setPageTitle("index", "Gestion des habitats")
            ->setPageTitle("edit", "Gestion d'un habitat");
    }

    public function configureActions(Actions $actions): Actions
    {

    return $actions
        
        ->setPermission(Action::NEW, 'ROLE_ADMIN')
        ->setPermission(Action::DELETE, 'ROLE_ADMIN')
    ;
    }

    public function configureFields(string $pageName): iterable
    {
        $isVet = $this->security->isGranted('ROLE_VET');
        $isAdmin = $this->security->isGranted('ROLE_ADMIN');

        return [
            TextField::new('name')
                ->setLabel('Nom')
                ->setDisabled($isVet),
            TextareaField::new('description')
                ->setLabel('Description')
                ->setDisabled($isVet),

            IntegerField::new('area')
                ->setLabel('Superficie (km²)')
                ->setDisabled($isVet),

            TextField::new('imageName')
                ->setLabel('Nom de l\'image')
                ->hideOnIndex()
                ->setDisabled($isVet),

            TextField::new('imageFile')
                ->setLabel('Image')
                ->setFormType(VichFileType::class)
                ->hideOnIndex()
                ->setDisabled($isVet),

            TextareaField::new('habitatRemark')
                ->setLabel('Remarque sur l\'habitat')
                ->setDisabled($isAdmin),
        ];
    }
}
