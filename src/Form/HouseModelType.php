<?php

namespace App\Form;

use App\Entity\HouseModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HouseModelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name', TextType::class, array(
                'label' => 'Nom du modèle',
                'attr' => array(
                    'name' => 'modelName'
                )
            )
        );
        
        $builder->add(
            'price', MoneyType::class, array(
                'label' => 'Prix minimum du modèle',
                'attr' => array(
                    'name' => 'modelPrice'
                )
            )
        );

        $builder->add(
            'description', TextareaType::class, array(
                'label' => 'Description du modèle',
                'attr' => array(
                    'name' => 'modelDescription'
                )
            )
        );
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => HouseModel::class
        ));
    }
}