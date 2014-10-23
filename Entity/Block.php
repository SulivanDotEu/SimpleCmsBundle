<?php

namespace Walva\SimpleCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Walva\SimpleCmsBundle\Interfaces\Entity\ContentRequestInterface;
use Walva\SimpleCmsBundle\Interfaces\View\TreeViewConfigurator;
use Walva\SimpleCmsBundle\Interfaces\View\TreeViewInterface;
use Walva\SimpleCmsBundle\View\Label;

/**
 * Bloc
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\SimpleCmsBundle\Repository\BlockRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Block implements TreeViewConfigurator
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
     * @ORM\Column(name="editionDate", type="datetime", nullable=true)
     */
    private $editionDate;

    /*
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="Walva\SimpleCmsBundle\Entity\AuthorInterface")
     * @ORM\JoinColumn(nullable=true)
     */
    private $author;

    /*
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="Walva\SimpleCmsBundle\Entity\AuthorInterface")
     * @ORM\JoinColumn(nullable=true)
     */
    private $lastEditor;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Walva\SimpleCmsBundle\Entity\AbstractContentDeliverer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $deliverer;

    public function getContentForRequest(ContentRequestInterface $cr){
        return $this->getDeliverer()->getContentForRequest($cr);
    }

    // BUSINESS CODE
    public function configureView(TreeViewInterface $view)
    {
        $label = new Label();
        $label->setColor(Label::COLOR_BLUE);
        $label->setName("Block");
        $view->addLabel($label);
        $view->setName($this->getInternalName());
        return $view;
    }

    function __toString()
    {
        return $this->getInternalName();
    }


    /**
     * @ORM\PreUpdate()
     */
    public function preUpdate(){
        $this->setEditionDate(new \DateTime());
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersist(){
        $this->setCreationDate(new \DateTime());
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
     * Set deliverer
     *
     * @param \Walva\SimpleCmsBundle\Entity\AbstractContentDeliverer $deliverer
     * @return Block
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

    /**
     * Set author
     *
     * @param \BePark\UserBundle\Entity\User $author
     * @return Block
     */
    public function setAuthor(AuthorInterface $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \BePark\UserBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set lastEditor
     *
     * @param \BePark\UserBundle\Entity\User $lastEditor
     * @return Block
     */
    public function setLastEditor(AuthorInterface $lastEditor = null)
    {
        $this->lastEditor = $lastEditor;
    
        return $this;
    }

    /**
     * Get lastEditor
     *
     * @return \BePark\UserBundle\Entity\User 
     */
    public function getLastEditor()
    {
        return $this->lastEditor;
    }
}
