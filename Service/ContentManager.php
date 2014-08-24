<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 19/08/14
 * Time: 17:11
 */

namespace BePark\SimpleCmsBundle\Service;



use BePark\LegacyApiBundle\Interfaces\Entity\ContentRequestInterface;
use BePark\SimpleCmsBundle\Exception\InvalidRequestException;
use BePark\SimpleCmsBundle\Interfaces\Service\ContentManagerInterface;
use JMS\DiExtraBundle\Annotation\Inject;
use Symfony\Component\HttpFoundation\Request;

class ContentManager implements ContentManagerInterface {


    public function getContentForRequest(ContentRequestInterface $cr)
    {
        if(!$cr->validate()){
            throw new InvalidRequestException();
        }
    }

    /**
     * @inheritdoc
     */
    public function createEmptyContentRequest($blockName)
    {
        $request =  new ContentRequest();
        $request->setBlockName($blockName);
    }

    public function createEmptyContentRequestFromRequest($blockName, Request $request){
        $locale = $request->getLocale();

        $contentRequest = $this->createEmptyContentRequest($blockName);
        $contentRequest->setLanguage($locale);
    }


} 