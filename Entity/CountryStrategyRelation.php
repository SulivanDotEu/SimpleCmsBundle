<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 26/08/14
 * Time: 11:17
 */

namespace Walva\SimpleCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Walva\SimpleCmsBundle\Interfaces\Entity\ContentRequestInterface;
use Walva\SimpleCmsBundle\Interfaces\View\TreeViewConfigurator;
use Walva\SimpleCmsBundle\Interfaces\View\TreeViewInterface;
use Walva\SimpleCmsBundle\View\Label;

/**
 * AbstractContentDeliverer
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class CountryStrategyRelation implements \Walva\SimpleCmsBundle\Interfaces\Entity\StrategyDelivererRelation, TreeViewConfigurator
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
     * @ORM\ManyToOne(targetEntity="Walva\SimpleCmsBundle\Entity\CountryStrategy", inversedBy="delivererRelations")
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

    public function configureView(TreeViewInterface $view)
    {
        $label = new Label();
        $label->setName($this->getCountry());
        $label->setColor(Label::COLOR_YELLOW);
        $view->addLabel($label);
    }

    public function getContentForRequest(ContentRequestInterface $cr){
        return $this->getDeliverer()->getContentForRequest($cr);
    }


    /**
     * Set country
     *
     * @param string $country
     * @return CountryStrategyRelation
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
     * @param \Walva\SimpleCmsBundle\Entity\CountryStrategy $owner
     * @return CountryStrategyRelation
     */
    public function setOwner(\Walva\SimpleCmsBundle\Entity\CountryStrategy $owner = null)
    {
        if ($owner == null) {
            $this->owner = $owner;

            return;
        }
        if ($owner->equals($this->getOwner())) {
            return;
        }
        $this->owner = $owner;
        $owner->addDelivererRelation($this);

        return $this;
    }

    /**
     * Get owner
     *
     * @return \Walva\SimpleCmsBundle\Entity\CountryStrategy
     */
    public function getOwner()
    {
        return $this->owner;
    }


    /**
     * Set deliverer
     *
     * @param \Walva\SimpleCmsBundle\Entity\AbstractContentDeliverer $deliverer
     * @return CountryStrategyRelation
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
