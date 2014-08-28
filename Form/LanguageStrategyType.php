<?php

namespace Walva\SimpleCmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LanguageStrategyType extends AbstractType
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
                    'type' => new LanguageStrategyRelationType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\SimpleCmsBundle\Entity\LanguageStrategy'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'walva_simplecmsbundle_languagestrategy';
    }
}
