<?php

namespace App\Form;

use App\Entity\TournoiUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TournoiUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('inscription')
            ->add('participation')
            ->add('resultatSimple')
            ->add('resultatDouble')
            ->add('resultatMixte')
            ->add('nbTableaux')
            ->add('inscriptionSimple')
            ->add('inscriptionDouble')
            ->add('inscriptionMixte')
            ->add('participationSimple')
            ->add('participationDouble')
            ->add('participationMixte')
            ->add('inscriptionConfirmee')
            ->add('partenaireDouble')
            ->add('partenaireMixte')
            ->add('user')
            ->add('tournoi')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TournoiUser::class,
        ]);
    }
}
