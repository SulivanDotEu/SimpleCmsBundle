<?php

namespace Walva\SimpleCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Walva\SimpleCmsBundle\Interfaces\Entity\ContentRequestInterface;
use Walva\SimpleCmsBundle\Interfaces\View\TreeViewConfigurator;
use Walva\SimpleCmsBundle\Interfaces\View\TreeViewInterface;
use Walva\SimpleCmsBundle\View\Label;

/**
 * Document
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\SimpleCmsBundle\Repository\DocumentRepository")
 */
class Document extends AbstractContentDeliverer implements TreeViewConfigurator
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=65536)
     */
    private $content;

    public function getContentForRequest(ContentRequestInterface $cr)
    {
        return $this->getContent();
    }

    public function configureView(TreeViewInterface $view){
        $label = new Label();
        $label->setColor(Label::COLOR_GREEN);
        $view->setName($this->getInternalName());
        $view->addLabel($label);
        return $view;
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return parent::getId();
    }

    function __toString()
    {
        return 'Document "'.$this->getInternalName().'"';
    }


    /**
     * Set content
     *
     * @param string $content
     * @return Document
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
}
