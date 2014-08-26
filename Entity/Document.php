<?php

namespace Walva\SimpleCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Walva\SimpleCmsBundle\Interfaces\Entity\ContentRequestInterface;

/**
 * Document
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\SimpleCmsBundle\Entity\DocumentRepository")
 */
class Document extends AbstractContentDeliverer
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    public function getContentForRequest(ContentRequestInterface $cr)
    {
        return $this->getContent();
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
