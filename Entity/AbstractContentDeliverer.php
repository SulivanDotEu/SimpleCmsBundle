<?php

namespace Walva\SimpleCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Walva\SimpleCmsBundle\Interfaces\Entity\ContentDelivererInterface;
use Walva\SimpleCmsBundle\Interfaces\Entity\ContentRequestInterface;

/**
 * AbstractContentDeliverer
 *
 * @ORM\Table()
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\Entity(repositoryClass="Walva\SimpleCmsBundle\Repository\AbstractContentDelivererRepository")
 */
class AbstractContentDeliverer implements ContentDelivererInterface
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
     * @ORM\Column(name="internalName", type="string", length=255)
     */
    private $internalName;

    function __toString()
    {
        return $this->getInternalName();
    }


    public function getContentForRequest(ContentRequestInterface $cr)
    {
        throw new \RuntimeException();
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
     * Set internalName
     *
     * @param string $internalName
     * @return AbstractContentDeliverer
     */
    public function setInternalName($internalName)
    {
        $this->internalName = $internalName;
    
        return $this;
    }

    /**
     * Get internalName
     *
     * @return string 
     */
    public function getInternalName()
    {
        return $this->internalName;
    }
}
