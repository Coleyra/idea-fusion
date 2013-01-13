<?php

namespace IdeaFusion\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormError;

use IdeaFusion\Bundle\CoreBundle\Entity\Idea;

class IdeaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array(
            	'label' => 'Title',
            	'attr' => array('size' => 15, 'placeholder' => 'Title')
            ))
            ->add('description', 'textarea', array(
            	'label' => 'Description',
            	'attr' => array('placeholder' => 'Description'),
            ))
        ;
	}

    public function getName()
    {
        return 'create_idea';
    }
}
