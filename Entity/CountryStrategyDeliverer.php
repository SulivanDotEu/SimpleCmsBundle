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

/**
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class CountryStrategyDeliverer extends AbstractContentDeliverer {

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
     *      targetEntity="Walva\SimpleCmsBundle\Entity\CountryStrategyDelivererRelation",
     *      mappedBy="owner",
     *      cascade="all",
     *      fetch="LAZY")
     */
    private $delivererRelations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->delivererRelations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function equals($object){
        if($object == null) return false;
        if(!$object instanceof CountryStrategyDeliverer) return false;
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
     * @param \Walva\SimpleCmsBundle\Entity\CountryStrategyDelivererRelation $delivererRelations
     * @return CountryStrategyDeliverer
     */
    public function addDelivererRelation(\Walva\SimpleCmsBundle\Entity\CountryStrategyDelivererRelation $delivererRelations)
    {
        if($this->delivererRelations->contains($delivererRelations)) return;
        $this->delivererRelations[] = $delivererRelations;
        $delivererRelations->setOwner($this);
    
        return $this;
    }

    /**
     * Remove delivererRelations
     *
     * @param \Walva\SimpleCmsBundle\Entity\CountryStrategyDelivererRelation $delivererRelations
     */
    public function removeDelivererRelation(\Walva\SimpleCmsBundle\Entity\CountryStrategyDelivererRelation $delivererRelations)
    {
        $this->delivererRelations->removeElement($delivererRelations);
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
