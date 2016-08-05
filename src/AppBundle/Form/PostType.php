<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array(
                'attr' => array('autofocus' => true),
                'label' => 'label.title',
            ))
            ->add('summary', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array(
                'label' => 'label.summary',
            ))
            ->add('content', null, array(
                'attr' => array('rows' => 20),
                'label' => 'label.content',
            ))
            ->add('authorEmail', null, array(
                'label' => 'label.author_email',
            ))
            ->add('publishedAt', 'AppBundle\Form\Type\DateTimePickerType', array(
                'label' => 'label.published_at',
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        return $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Post',
        ));
    }
}

