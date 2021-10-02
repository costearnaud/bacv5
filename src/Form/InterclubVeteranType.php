<?php

namespace App\Form;

use App\Entity\InterclubVeteran;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterclubVeteranType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('dateRencontre')
            ->add('score')
            ->add('location')
            ->add('teamExt')
            ->add('lieu')
            ->add('teamHome')
            ->add('saison')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InterclubVeteran::class,
        ]);
    }
}
