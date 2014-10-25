<?php

namespace Walva\SimpleCmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocumentType extends AbstractType
{

	// purified_textarea
	private $_contentFormType;

	function __construct($_contentFormType)
	{
		$this->_contentFormType = $_contentFormType;
	}

	/**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('internalName');
	    // if the project is configured with a custom form type
	    if(isset($this->_contentFormType) AND !is_null($this->_contentFormType)){
		    $builder->add('content', $this->_contentFormType);
	    }else {
		    $builder->add('content');
	    }
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\SimpleCmsBundle\Entity\Document'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'walva_simplecmsbundle_document';
    }
}
