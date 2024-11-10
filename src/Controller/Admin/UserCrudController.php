<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\{Action, Actions, Crud, KeyValueStore};
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Validator\Constraints\NotBlank;

#[IsGranted('ROLE_ADMIN')]

class UserCrudController extends AbstractCrudController
{
    private $userPasswordHasher;
    private $mailer;
    private $urlGenerator;


    public function __construct(UserPasswordHasherInterface $userPasswordHasher, MailerInterface $mailer)
    {
        $this->userPasswordHasher = $userPasswordHasher;
        $this->mailer = $mailer;
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    // Send email
    public function configureActions(Actions $actions): Actions
    {
        $sendEmail = Action::new('sendEmail', 'Envoyer un email')
            ->linkToCrudAction('sendEmail')
            ->addCssClass('btn btn-secondary');

        return $actions
            ->add(Crud::PAGE_INDEX, $sendEmail)
            ->add(Crud::PAGE_EDIT, $sendEmail)
            ->add(Crud::PAGE_NEW, $sendEmail);
    }

    public function sendEmail(AdminContext $context, UrlGeneratorInterface $urlGenerator): RedirectResponse
    {
        $user = $context->getEntity()->getInstance();
        $username = $user->getUsername();
        $url = $urlGenerator->generate('admin', [
            'crudAction' => 'index',
            'crudControllerFqcn' => 'App\Controller\Admin\UserCrudController',
        ]);

        $email = (new Email())
            ->from('admin@arcadia.com')
            ->to($user->getUsername())
            ->subject("Votre compte utilisateur: $username")
            ->text("Bonjour,\n\nVotre compte a été créé avec succès. Vous pouvez maintenant vous connecter avec le nom d'utilisateur suivant : $username.")
            ->html("<p>Bonjour,<p>Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter avec le  nom d'utilisateur suivant : $username.</p>");


        $this->mailer->send($email);

        $this->addFlash('success', 'Email envoyé avec succès');

        return $this->redirect($url);
    }


    // Configure Crud
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Employés/Vétérinaires')
            ->setEntityLabelInSingular('Employé/Vétérinaire')
            ->setPageTitle('index', 'Gestion des employés/vétérinaires')
            ->setPageTitle('edit', "Gestion de l'employé/vétérinaire")
            ->setPaginatorPageSize(10);
    }


    // Configure Fields
    public function configureFields(string $pageName): iterable
    {
        $roles = [
            'Employé' => 'ROLE_EMPLOYE',
            'Vétérinaire' => 'ROLE_VET',
        ];

        $fields = [
            TextField::new('firstName')
                ->setLabel('Prénom')
                ->setFormTypeOption('constraints', [
                    new NotBlank(['message' => 'Ce champ ne peut pas être vide'])
                ]),
            TextField::new('lastname')
                ->setLabel('Nom de famille')
                ->setFormTypeOption('constraints', [
                    new NotBlank(['message' => 'Ce champ ne peut pas être vide'])
                ]),
            EmailField::new('username')
                ->setLabel('Email')
                ->setFormTypeOption('constraints', [
                    new NotBlank(['message' => 'Ce champ ne peut pas être vide'])
                ]),
            ChoiceField::new('roles', 'Rôles')
                ->setChoices($roles)
                ->allowMultipleChoices(true)
                ->renderExpanded(true) 
                ->onlyOnForms()
                ->setFormTypeOptions([
                    'constraints' => [
                        new NotBlank(['message' => 'Veuillez choisir au moins une option'])
                    ]
                ]),
        ];

        if ($pageName === Crud::PAGE_NEW || $pageName === Crud::PAGE_EDIT) {
            $password = TextField::new('password')
                ->setFormType(RepeatedType::class)
                ->setFormTypeOptions([
                    'type' => PasswordType::class,
                    'first_options' => ['label' => 'Mot de passe'],
                    'second_options' => ['label' => 'Entrez à nouveau le mot de passe'],
                    'mapped' => false,
                    'constraints' => [
                        new Regex([
                            'pattern' => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/",
                            'message' => "Le mot de passe doit contenir au moins 12 caractères, dont 1 majuscule, 1 minuscule, 1 caractère spécial et 1 chiffre",
                        ]),
                    ],
                ])
                ->setRequired($pageName === Crud::PAGE_NEW)
                ->onlyOnForms();
            
            $fields[] = $password;
        }

        return $fields;
    }

    public function createNewFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        $formBuilder = parent::createNewFormBuilder($entityDto, $formOptions, $context);
        return $this->addPasswordEventListener($formBuilder);
    }

    public function createEditFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        $formBuilder = parent::createEditFormBuilder($entityDto, $formOptions, $context);
        return $this->addPasswordEventListener($formBuilder);
    }

    private function addPasswordEventListener(FormBuilderInterface $formBuilder): FormBuilderInterface
    {
        return $formBuilder->addEventListener(FormEvents::POST_SUBMIT, $this->hashPassword());
    }

    private function hashPassword()
    {
        return function ($event) {
            $form = $event->getForm();
            if (!$form->isValid()) {
                return 'Un problème est survenu';
            }
            $password = $form->get('password')->getData();
            if ($password === null) {
                return 'Le mot de passe ne peut pas être nul';
            }

            $hash = $this->userPasswordHasher->hashPassword($this->getUser(), $password);
            $form->getData()->setPassword($hash);
        };
    }
}