<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 26/08/14
 * Time: 11:17
 */

namespace Walva\SimpleCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractContentDeliverer
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class CountryStrategyDelivererRelation {

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
     * @ORM\ManyToOne(targetEntity="Walva\SimpleCmsBundle\Entity\CountryStrategyDeliverer", inversedBy="delivererRelations")
     */
    private $owner;

    /**
     * @var ContentDelivererInterface
     * @ORM\ManyToOne(targetEntity="Walva\SimpleCmsBundle\Entity\AbstractContentDeliverer")
     */
    private $deliverer;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $country;


    /**
     * Set country
     *
     * @param string $country
     * @return CountryStrategyDelivererRelation
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
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
     * Set owner
     *
     * @param \Walva\SimpleCmsBundle\Entity\CountryStrategyDeliverer $owner
     * @return CountryStrategyDelivererRelation
     */
    public function setOwner(\Walva\SimpleCmsBundle\Entity\CountryStrategyDeliverer $owner = null)
    {
        if($owner == null) return;
        if($owner->equals($this->getOwner())) return;
        $this->owner = $owner;
        $owner->addDelivererRelation($this);
    
        return $this;
    }

    /**
     * Get owner
     *
     * @return \Walva\SimpleCmsBundle\Entity\CountryStrategyDeliverer 
     */
    public function getOwner()
    {
        return $this->owner;
    }


    /**
     * Set deliverer
     *
     * @param \Walva\SimpleCmsBundle\Entity\AbstractContentDeliverer $deliverer
     * @return CountryStrategyDelivererRelation
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
