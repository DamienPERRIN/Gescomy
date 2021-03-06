<?php

namespace GescomyBundle\Form;

use GescomyBundle\Entity\Supplier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SupplierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Nom du fournisseur'
            ))
            ->add('adress', TextType::class, array(
                'label' => 'Adresse'
            ))
            ->add('postCode', TextType::class, [
                'label' => 'Code postal'
            ])
            ->add('town', TextType::class, [
                'label' => 'Ville'
            ])
            ->add('siret', TextType::class, [
                'label' => 'SIRET'
            ])
            ->add('email', TextType::class, [
                'label' => 'Email'
            ])
            ->add('webSite', TextType::class, [
                'label' => 'Site Web'
            ])
            ->add('deliveryTime', TextType::class, [
                'label' => 'Délai de livraison'
            ])
            ->add('score', TextType::class, [
                'label' => 'Score'
            ])
            ->add('submit', SubmitType::class, array(
                'label' => 'Ajouter'
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Supplier::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'gescomy_bundle_supplier_type';
    }
}
