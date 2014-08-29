<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 26/08/14
 * Time: 10:34
 */

namespace Walva\SimpleCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Walva\SimpleCmsBundle\Interfaces\Entity\ContentDelivererInterface;
use Walva\SimpleCmsBundle\Interfaces\Entity\ContentRequestInterface;
use Walva\SimpleCmsBundle\Interfaces\Entity\StrategyDeliverer;
use Walva\SimpleCmsBundle\Interfaces\View\TreeViewInterface;
use Walva\SimpleCmsBundle\View\Label;

/**
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class CountryStrategy extends AbstractContentDeliverer implements StrategyDeliverer {

    /**
     * @var ContentDelivererInterface
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(
     *      targetEntity="Walva\SimpleCmsBundle\Entity\CountryStrategyRelation",
     *      mappedBy="owner",
     *      cascade="all",
     *      fetch="LAZY",
     *      orphanRemoval=true)
     */
    private $delivererRelations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->delivererRelations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getContentForRequest(ContentRequestInterface $cr){
        $country = strtoupper($cr->getCountry());
        $relations = $this->getDelivererRelations();
        foreach ($relations as $relation) {

            /** @var relation CountryStrategyRelation */
            if($relation->getCountry() == $country){
                return $relation->getContentForRequest($cr);
            }
        }

    }

    public function configureView(TreeViewInterface $view)
    {
        $view->setName($this->getInternalName());
        $label = new Label();
        $label->setName("Strategy:Country");
        $label->setColor(Label::COLOR_YELLOW);
        $view->addLabel($label);
        return $view;
    }

    public function equals($object){
        if($object == null) return false;
        if(!$object instanceof CountryStrategy) return false;
        if($object->getId() != $this->getId()) return false;
        return true;
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

    /**
     * Add delivererRelations
     *
     * @param \Walva\SimpleCmsBundle\Entity\CountryStrategyRelation $delivererRelations
     * @return CountryStrategy
     */
    public function addDelivererRelation(\Walva\SimpleCmsBundle\Entity\CountryStrategyRelation $delivererRelations)
    {
        if($this->delivererRelations->contains($delivererRelations)) return;
        $this->delivererRelations[] = $delivererRelations;
        $delivererRelations->setOwner($this);
    
        return $this;
    }

    /**
     * Remove delivererRelations
     *
     * @param \Walva\SimpleCmsBundle\Entity\CountryStrategyRelation $delivererRelations
     */
    public function removeDelivererRelation(\Walva\SimpleCmsBundle\Entity\CountryStrategyRelation $delivererRelations)
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
