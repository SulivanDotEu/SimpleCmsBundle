<?php

namespace Walva\SimpleCmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CountryStrategyDelivererType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('internalName')
            ->add('delivererRelations', 'collection', array(
                    'type' => new CountryStrategyDelivererRelationType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\SimpleCmsBundle\Entity\CountryStrategyDeliverer'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'walva_simplecmsbundle_countrystrategydeliverer';
    }
}
