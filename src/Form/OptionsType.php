<?php

namespace App\Form;

use App\Entity\Options;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OptionsType extends AbstractType
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
                'label' => 'Description de l\'option',
            )
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Options::class
        ));
    }
}