<?php

namespace App\Form;

use App\Entity\Interclub;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterclubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('dateRencontre')
            ->add('score')
            ->add('location')
            ->add('teamExt')
            ->add('dmxjoueuse')
            ->add('sh1')
            ->add('sd')
            ->add('sh2')
            ->add('dmxjoueur')
            ->add('dh1joueur2')
            ->add('lieu')
            ->add('sh4')
            ->add('dh1joueur1')
            ->add('teamBacv')
            ->add('teamHome')
            ->add('ddjoueuse1')
            ->add('dh2joueur1')
            ->add('sh3')
            ->add('saison')
            ->add('ddjoueuse2')
            ->add('dh2joueur2')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Interclub::class,
        ]);
    }
}
