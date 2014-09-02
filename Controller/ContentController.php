<?php
/**
 * Created by PhpStorm.
 * User: Benjamin Ellis
 * Date: 24/08/14
 * Time: 17:46
 */

namespace Walva\SimpleCmsBundle\Controller;


use JMS\DiExtraBundle\Annotation\Inject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\SimpleCmsBundle\Interfaces\Service\ContentManagerInterface;

/**
 * Ads controller.
 *
 * @Route("/content")
 */
class ContentController extends Controller {

    /**
     * @var ContentManagerInterface;
     * @Inject("simplecms.manager.content")
     */
    public $contentManager;

    public function getAction(Request $request, $blockName){

        $contentManager = $this->getContentManager();
        $contentRequest = $contentManager->createEmptyContentRequest($blockName);
        $contentRequest->setLanguage($request->getLocale());
        $result = $contentManager->getContentForRequest($contentRequest);

        return $result;

    }

    /**
     * @return ContentManagerInterface
     */
    public function getContentManager(){
        return $this->contentManager;
    }

} 