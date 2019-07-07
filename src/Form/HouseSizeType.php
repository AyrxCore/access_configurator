<?php

namespace App\Form;

use App\Entity\HouseSize;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HouseSizeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name', TextType::class, array(
                'label' => 'Nom du modèle',
            )
        );

        $builder->add(
            'price', MoneyType::class, array(
                'label' => 'Prix minimum du modèle',
            )
        );

        $builder->add(
            'description', TextareaType::class, array(
                'label' => 'Description',
            )
        );

        $builder->add(
            'surface', NumberType::class, array(
                'label' => 'Surface en m²',
            )
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => HouseSize::class
        ));
    }
}