<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 19/08/14
 * Time: 17:03
 */

namespace Walva\SimpleCmsBundle\Interfaces\Service;


use Walva\LegacyApiBundle\Interfaces\Entity\ContentRequestInterface;

interface ContentManagerInterface {

    public function getContentForRequest(ContentRequestInterface $cr);

    /**
     * @param $blockName
     * @return ContentRequestInterface
     */
    public function createEmptyContentRequest($blockName);


} 