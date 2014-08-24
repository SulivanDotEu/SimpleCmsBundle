<?php

namespace Walva\SimpleCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bloc
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\SimpleCmsBundle\Entity\BlocRepository")
 */
class Bloc
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

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="editionDate", type="datetime")
     */
    private $editionDate;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="author", type="object")
     */
    private $author;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="lastEditor", type="object")
     */
    private $lastEditor;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="deliverers", type="object")
     */
    private $deliverers;


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
     * @return Bloc
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

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Bloc
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    
        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set editionDate
     *
     * @param \DateTime $editionDate
     * @return Bloc
     */
    public function setEditionDate($editionDate)
    {
        $this->editionDate = $editionDate;
    
        return $this;
    }

    /**
     * Get editionDate
     *
     * @return \DateTime 
     */
    public function getEditionDate()
    {
        return $this->editionDate;
    }

    /**
     * Set author
     *
     * @param \stdClass $author
     * @return Bloc
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \stdClass 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set lastEditor
     *
     * @param \stdClass $lastEditor
     * @return Bloc
     */
    public function setLastEditor($lastEditor)
    {
        $this->lastEditor = $lastEditor;
    
        return $this;
    }

    /**
     * Get lastEditor
     *
     * @return \stdClass 
     */
    public function getLastEditor()
    {
        return $this->lastEditor;
    }

    /**
     * Set deliverers
     *
     * @param \stdClass $deliverers
     * @return Bloc
     */
    public function setDeliverers($deliverers)
    {
        $this->deliverers = $deliverers;
    
        return $this;
    }

    /**
     * Get deliverers
     *
     * @return \stdClass 
     */
    public function getDeliverers()
    {
        return $this->deliverers;
    }
}
