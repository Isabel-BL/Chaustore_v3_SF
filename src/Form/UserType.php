<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;



class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, ['required'=>false])
            ->add('prenom', TextType::class, ['required'=>false])
            ->add('email', EmailType::class, ['required'=>false])
            ->add('password', PasswordType::class, ['required'=>false])
            ->add('confirm_password', PasswordType::class)
            ->add('submit', SubmitType::class);
    }

}
