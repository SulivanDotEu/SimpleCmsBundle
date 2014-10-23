<?php

namespace Walva\SimpleCmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlockType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('internalName')
            ->add('deliverer')
           ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Walva\SimpleCmsBundle\Entity\Block'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'walva_simplecmsbundle_block';
    }
}
