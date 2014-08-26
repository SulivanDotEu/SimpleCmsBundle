<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 19/08/14
 * Time: 17:11
 */

namespace Walva\SimpleCmsBundle\Service;



use JMS\DiExtraBundle\Annotation\Service;
use Walva\SimpleCmsBundle\Interfaces\Entity\ContentRequestInterface;
use Walva\SimpleCmsBundle\Exception\InvalidRequestException;
use Walva\SimpleCmsBundle\Interfaces\Service\ContentManagerInterface;
use JMS\DiExtraBundle\Annotation\Inject;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class ContentManager
 * @package BePark\SimpleCmsBundle\Service
 * @Service("simplecms.manager.content")
 */
class ContentManager implements ContentManagerInterface {


    public function getContentForRequest(ContentRequestInterface $cr)
    {
        if(!$cr->validate()){
            throw new InvalidRequestException();
        }

        //return $this->container->get('templating')->renderResponse($view, $parameters, $response);

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