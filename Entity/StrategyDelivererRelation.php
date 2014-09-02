<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 26/08/14
 * Time: 11:13
 */

namespace Walva\SimpleCmsBundle\Entity;

use Walva\SimpleCmsBundle\Interfaces\Entity\ContentDelivererInterface;
use Doctrine\ORM\Mapping as ORM;

/***
 * AbstractContentDeliverer
 *
 * @ORM\Table()
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\Entity()
 */
class StrategyDelivererRelation {

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
     * @ORM\ManyToOne(targetEntity="Walva\SimpleCmsBundle\Entity\StrategyDeliverer")
     */
    private $owner;

    /**
     * @var ContentDelivererInterface
     * @ORM\ManyToOne(targetEntity="Walva\SimpleCmsBundle\Entity\StrategyDeliverer")
     */
    private $deliverer;


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
     * Set deliverer
     *
     * @param \Walva\SimpleCmsBundle\Entity\StrategyDeliverer $deliverer
     * @return StrategyDelivererRelation
     */
    public function setDeliverer(\Walva\SimpleCmsBundle\Entity\StrategyDeliverer $deliverer = null)
    {
        $this->deliverer = $deliverer;
    
        return $this;
    }

    /**
     * Get deliverer
     *
     * @return \Walva\SimpleCmsBundle\Entity\StrategyDeliverer 
     */
    public function getDeliverer()
    {
        return $this->deliverer;
    }

    /**
     * Set owner
     *
     * @param \Walva\SimpleCmsBundle\Entity\StrategyDeliverer $owner
     * @return StrategyDelivererRelation
     */
    public function setOwner(\Walva\SimpleCmsBundle\Entity\StrategyDeliverer $owner = null)
    {
        $this->owner = $owner;
    
        return $this;
    }

    /**
     * Get owner
     *
     * @return \Walva\SimpleCmsBundle\Entity\StrategyDeliverer 
     */
    public function getOwner()
    {
        return $this->owner;
    }
}
