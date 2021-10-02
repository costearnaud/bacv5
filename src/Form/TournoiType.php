<?php

namespace App\Form;

use App\Entity\Tournoi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TournoiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('lieu')
            ->add('lienInscription')
            ->add('classements')
            ->add('categories')
            ->add('tableaux')
            ->add('dateInscription')
            ->add('lienConvocation')
            ->add('lienDescription')
            ->add('slug')
            ->add('club')
            ->add('saison')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tournoi::class,
        ]);
    }
}
