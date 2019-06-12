<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'mail', EmailType::class, array(
                'label' => 'Votre adresse e-mail',
                'attr' => [
                    'autocomplete' => 'off'
                ]
            )
        );
        
        $builder->add(
            'password', PasswordType::class, array(
                'label' => 'Votre mot de passe',
                'attr' => [
                    'autocomplete' => 'off'
                ]
            )
        );
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class
        ));
    }
}