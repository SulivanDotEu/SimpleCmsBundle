<?php

namespace Walva\SimpleCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Walva\SimpleCmsBundle\Interfaces\Entity\ContentRequestInterface;
use Walva\SimpleCmsBundle\Interfaces\Entity\StrategyDelivererRelation as StrategyDelivererRelationInterface;
use Walva\SimpleCmsBundle\Interfaces\View\TreeViewInterface;
use Walva\SimpleCmsBundle\View\Label;

/**
 * LanguageStrategyDelivererRelation
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class LanguageStrategyRelation implements StrategyDelivererRelationInterface
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
     * @var ContentDelivererInterface
     * @ORM\ManyToOne(targetEntity="Walva\SimpleCmsBundle\Entity\LanguageStrategy", inversedBy="delivererRelations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @var ContentDelivererInterface
     * @ORM\ManyToOne(targetEntity="Walva\SimpleCmsBundle\Entity\AbstractContentDeliverer")
     */
    private $deliverer;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;

    public function configureView(TreeViewInterface $view)
    {
        $label = new Label();
        $label->setName($this->getLanguage());
        $label->setColor(Label::COLOR_YELLOW);
        $view->addLabel($label);
    }

    public function getContentForRequest(ContentRequestInterface $cr){
        return $this->getDeliverer()->getContentForRequest($cr);
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return LanguageStrategyDelivererRelation
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    
        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set owner
     *
     * @param \Walva\SimpleCmsBundle\Entity\LanguageStrategy $owner
     * @return LanguageStrategyRelation
     */
    public function setOwner(\Walva\SimpleCmsBundle\Entity\LanguageStrategy $owner = null)
    {
        $this->owner = $owner;
    
        return $this;
    }

    /**
     * Get owner
     *
     * @return \Walva\SimpleCmsBundle\Entity\LanguageStrategy 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set deliverer
     *
     * @param \Walva\SimpleCmsBundle\Entity\AbstractContentDeliverer $deliverer
     * @return LanguageStrategyRelation
     */
    public function setDeliverer(\Walva\SimpleCmsBundle\Entity\AbstractContentDeliverer $deliverer = null)
    {
        $this->deliverer = $deliverer;
    
        return $this;
    }

    /**
     * Get deliverer
     *
     * @return \Walva\SimpleCmsBundle\Entity\AbstractContentDeliverer 
     */
    public function getDeliverer()
    {
        return $this->deliverer;
    }
}
