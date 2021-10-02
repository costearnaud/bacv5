<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
            ->add('roles')
            ->add('password')
            ->add('email')
            ->add('firstName')
            ->add('lastName')
            ->add('fullName')
            ->add('resetToken')
            ->add('mobile')
            ->add('birthDate')
            ->add('license')
            ->add('classementSimple')
            ->add('classementDouble')
            ->add('classementMixte')
            ->add('codePostal')
            ->add('mobileParent')
            ->add('rue')
            ->add('ville')
            ->add('category')
            ->add('updateDate')
            ->add('createdDate')
            ->add('gender')
            ->add('active')
            ->add('team')
            ->add('club')
            ->add('teamVeteran')
            ->add('status')
            ->add('ageCategory')
            ->add('population')
            ->add('sondage')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
