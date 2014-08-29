<?php

namespace Walva\SimpleCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Walva\SimpleCmsBundle\Interfaces\Entity\ContentRequestInterface;
use Walva\SimpleCmsBundle\Interfaces\Entity\StrategyDeliverer;
use Walva\SimpleCmsBundle\Interfaces\View\TreeViewInterface;
use Walva\SimpleCmsBundle\View\Label;

/**
 * LanguageStrategyDeliverer
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class LanguageStrategy extends AbstractContentDeliverer implements StrategyDeliverer
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
     * @var
     *
     * @ORM\OneToMany(
     *      targetEntity="Walva\SimpleCmsBundle\Entity\LanguageStrategyRelation",
     *      mappedBy="owner",
     *      cascade="all",
     *      fetch="LAZY",
     *      orphanRemoval=true)
     *
     */
    private $delivererRelations;

    public function __construct()
    {
        $this->delivererRelations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getContentForRequest(ContentRequestInterface $cr){
        $language = $cr->getLanguage();
        $relations = $this->getDelivererRelations();
        foreach ($relations as $relation) {

            /** @var relation */
            if($relation->getLanguage() == $language){
                return $relation->getContentForRequest($cr);
            }
        }

    }

    public function configureView(TreeViewInterface $view)
    {
        $view->setName($this->getInternalName());
        $label = new Label();
        $label->setName("Strategy:Language");
        $label->setColor(Label::COLOR_YELLOW);
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


    public function equals($object){
        if($object == null) return false;
        if(!$object instanceof LanguageStrategy) return false;
        if($object->getId() != $this->getId()) return false;
        return true;
    }


    /**
     * Add delivererRelations
     *
     * @param \Walva\SimpleCmsBundle\Entity\LanguageStrategyRelation $delivererRelations
     * @return LanguageStrategy
     */
    public function addDelivererRelation(\Walva\SimpleCmsBundle\Entity\LanguageStrategyRelation $delivererRelations)
    {
        if($this->delivererRelations->contains($delivererRelations)) return;
        $this->delivererRelations[] = $delivererRelations;
        $delivererRelations->setOwner($this);

        return $this;
    }

    /**
     * Remove delivererRelations
     *
     * @param \Walva\SimpleCmsBundle\Entity\LanguageStrategyRelation $delivererRelations
     */
    public function removeDelivererRelation(\Walva\SimpleCmsBundle\Entity\LanguageStrategyRelation $delivererRelations)
    {
        if(!$this->delivererRelations->contains($delivererRelations)) return;
        $this->delivererRelations->removeElement($delivererRelations);
        $delivererRelations->setOwner(null);
    }

    /**
     * Get delivererRelations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDelivererRelations()
    {
        return $this->delivererRelations;
    }
}
