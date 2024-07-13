<?php

namespace App\Form;

use App\Entity\Review;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('pseudo', TextType::class, [
            'attr' => [
                'class' => 'form-control',
            ],
            'label' => 'Pseudonyme',
            'label_attr' => [
                'class' => 'form-label mt-2 fw-bold small-font'
            ],
            'constraints' => [
                new NotBlank(['message' => 'Veuillez indiquer un pseudo.']),
                new Length([
                    'max' => 50,
                    'maxMessage' => 'Le pseudo ne peut pas dépasser {{ limit }} caractères.',
                ]),
            ],
        ])
            ->add('comment', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Commentaire',
                'label_attr' => [
                    'class' => 'form-label mt-2 fw-bold small-font'
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez ajouter un commentaire']),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-yellow mt-3'
                ],
                'label' => 'Envoyer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
