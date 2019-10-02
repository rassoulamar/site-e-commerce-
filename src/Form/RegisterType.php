<?php

namespace App\Form;

use App\Entity\AdressBilling;
use App\Entity\AdressDelivery;
use App\Entity\User;
use App\Entity\Ville;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvents;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sameAdressDB', ChoiceType::class, [
                'choices' => [
                    'oui' => false,
                    'non' => true,
                ]
            ])
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('password', PasswordType::class)
            ->add('confirm_password', PasswordType::class)
            ->add('adressDelivery', AdressDeliveryType::class)
            ->add('adressBilling', AdressBillingType::class)
            ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

