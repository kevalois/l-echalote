<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom', TextType::class, [
            'label' => 'Nom :',
            'attr' => [
                'placeholder' => 'Veuillez entrer votre Nom',
                ]
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email :',
            'attr' => [
                'placeholder' => 'Veuillez entrer votre Email pour vous contacter',
                ]
        ])
        ->add('message', TextareaType::class, [
            'label' => 'Message complémentaire :',
            'attr' => [
                'placeholder' => 'Veuillez nous expliquer se que vous souhaitez pour cette évenement (repas, demande particulière, autres)',
                'rows' => 12,
                ]
        ])
        ->add('donne', CheckboxType::class, [
            'label' => 'En cochant cette case vous acceptez l\'utilisitation de vos données pour que nous puissions vous répondre dans les plus bref délai.'
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
