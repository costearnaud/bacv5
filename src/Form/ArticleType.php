<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('picture')
            ->add('title')
            ->add('slug')
            ->add('content')
            ->add('publicationDate')
            ->add('lastUpdateDate')
            ->add('isPublished')
            ->add('excerpt')
            ->add('pictures')
            ->add('srcImages')
            ->add('imageFilename')
            ->add('image2filename')
            ->add('notif')
            ->add('recipients')
            ->add('auteur')
            ->add('category')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
