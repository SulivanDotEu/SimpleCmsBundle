<?php

namespace Walva\SimpleCmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LanguageStrategyRelationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('language', 'language')
//            ->add('owner')
            ->add('deliverer')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\SimpleCmsBundle\Entity\LanguageStrategyRelation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'walva_simplecmsbundle_languagestrategyrelation';
    }
}
