<?php

namespace App\Form;

use App\Entity\TypeEvenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class DevisType extends AbstractType
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
        ->add('telephone', TelType::class, [
            'label' => 'Numéro de téléphone :',
            'attr' => [
                'placeholder' => 'Veuillez entrer votre numéro de téléphone pour vous contacter',
                ]
        ])
        ->add('nombrePersonne', IntegerType::class, [
            'label' => 'Nombre de personne présente pour cet évenement :',
            'attr' => [
                'placeholder' => 'Veuillez entrer le nombre personnes présente',
                ]
        ])
        ->add('date', DateTimeType::class, [
            'label' => 'Date et heure de votre évenement :',
            'widget' => 'single_text',
        ])
        ->add('typeEvenement', EntityType::class, [
            'label' => 'Type d\'évenement :',
            'required'    => false,
            'class' => TypeEvenement::class,

            'attr' => [
                'placeholder' => 'Veuillez Choisir le type d\'évenement que vous souhaitez',
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
