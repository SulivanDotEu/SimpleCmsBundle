<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 26/08/14
 * Time: 11:20
 */

namespace Walva\SimpleCmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Walva\SimpleCmsBundle\Interfaces\Entity\ContentDelivererInterface;

/**
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class StrategyDeliverer extends AbstractContentDeliverer {

    /**
     * @var ContentDelivererInterface
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        parent::getId();
    }
}
