<?php

namespace IdeaFusion\Bundle\UsersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormError;

use IdeaFusion\Bundle\UsersBundle\Entity\User;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', 'text', array(
            	'label' => 'First name',
            	'attr' => array('size' => 15, 'placeholder' => 'First name')
            ))
            ->add('lastname', 'text', array(
            	'label' => 'Last name',
            	'attr' => array('size' => 15, 'placeholder' => 'Last name'),
            ))
            ->add('email', 'email', array(
            	'label' => 'Email',
            	'attr' => array('size' => 40, 'placeholder' => 'Email')
            ))
            ->add('login', 'text', array(
            	'label' => 'Login',
            	'attr' => array('size' => 15, 'placeholder' => 'Login')
            ))
            ->add('password', 'repeated', array(
            	'type' => 'password',
            	'first_name' => 'password',
            	'second_name' => 'confirmation',
                'first_options' => array
                (
                    'label' => 'Password' 
                )
            ))
        ;
	}

    public function getName()
    {
        return 'registration';
    }
}
