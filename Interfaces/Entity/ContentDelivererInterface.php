<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 19/08/14
 * Time: 16:57
 */

namespace Walva\SimpleCmsBundle\Interfaces\Business;



use Walva\SimpleCmsBundle\Interfaces\Entity\ContentRequestInterface;

interface ContentDelivererInterface {

    public function getContentForRequest(ContentRequestInterface $cr);

} 