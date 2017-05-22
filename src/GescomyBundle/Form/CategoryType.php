<?php

namespace GescomyBundle\Form;

use GescomyBundle\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Nom de la catégorie'
            ))
            ->add('description', TextareaType::class, array(
                'label' => 'description'
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'Ajouter'
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Category::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'gescomy_bundle_category_type';
    }
}
