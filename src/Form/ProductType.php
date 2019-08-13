<?php

namespace App\Form;

use App\Entity\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $builder->add(
//            'name', TextType::class, array(
//                'label' => 'Nom du modèle',
//            )
//        );
//
//        $builder->add(
//            'category', ChoiceType::class, array(
//                'label' => 'Associé à la catégorie',
//                'expanded' => false,
//                'multiple' => false
//            )
//        );
//
//        $builder->add(
//            'price', MoneyType::class, array(
//                'label' => 'Prix minimum du modèle',
//            )
//        );
//
//        $builder->add(
//            'description', TextareaType::class, array(
//                'label' => 'Description de l\'option',
//            )
//        );
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Product::class
        ));
    }
}