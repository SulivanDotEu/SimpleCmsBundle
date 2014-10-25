<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 19/08/14
 * Time: 17:11
 */

namespace Walva\SimpleCmsBundle\Service;



use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Tag;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Walva\SimpleCmsBundle\Entity\Block;
use Walva\SimpleCmsBundle\Interfaces\Entity\ContentRequestInterface;
use Walva\SimpleCmsBundle\Exception\InvalidRequestException;
use Walva\SimpleCmsBundle\Interfaces\Service\ContentManagerInterface;
use JMS\DiExtraBundle\Annotation\Inject;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class ContentManager
 * @package BePark\SimpleCmsBundle\Service
 * @Service("simplecms.manager.content")
 * @Tag("twig.extension")
 */
class ContentManager extends \Twig_Extension implements ContentManagerInterface {

    /**
     * @var RegistryInterface
     * @Inject("doctrine")
     */
    public $doctrine;

    /**
     * @var RequestStack
     * @Inject("request_stack")
     */
    public $requestStack;

    /**
     * @var SecurityContextInterface
     * @Inject("security.context")
     */
    public $security;

    /**
     * @var Router
     * @Inject("router")
     */
    public $router;

    public function renderBlock($name, $options = null){
        $cr = $this->createEmptyContentRequest($name);
        $cr->setParameters($options);
        $content = $this->getContentForRequest($cr);
        return $content;

    }

    public function getContentForRequest(ContentRequestInterface $cr)
    {
        $cr->validate();
        $repository = $this->doctrine->getRepository("WalvaSimpleCmsBundle:Block");
        $results = $repository->findByInternalName($cr->getBlockName());
        if(count($results) == 0) return $this->noBlockFound($cr);
        $block = $results[0];
        /** @var block Block */
        if($block === null) throw new \Exception("Logical exception : block cannot be null");
        $response = $block->getContentForRequest($cr);
        $response = $this->beforeSendResponse($response, $block);
        return $response;
        //return $this->container->get('templating')->renderResponse($view, $parameters, $response);
    }

    public function noBlockFound(ContentRequestInterface $cr){
        if($this->security->isGranted('ROLE_ADMIN')) return $this->noBlockFoundForAdmin($cr);
        return '';
    }

    public function noBlockFoundForAdmin(ContentRequestInterface $cr){
        return "please create block ".$cr->getBlockName();
    }

    public function beforeSendResponse($response, Block $block){
        $response = $this->activateEdition($response, $block);
        return $response;
    }

    public function activateEdition($response, Block $block){
        if(!$this->security->isGranted('ROLE_ADMIN')) return $response;

        $url = $this->router->generate("walva_simplecms_block_show", array('id' => $block->getId()));

        $temp = '<div class="simplecms administration" ><a class="blockname" href="'.$url.'">'.$block->getInternalName()
            .' <span class="glyphicon glyphicon-chevron-right"></span></a>';
        $temp .= '<div class="edition-enabled" contenteditable="true" >';
        $temp .= $response;
        $temp .= '</div>';
        $temp .= '</div>';
        $response = $temp;
        return $response;
    }

    /**
     * @inheritdoc
     */
    public function createEmptyContentRequest($blockName)
    {
        $request =  new ContentRequest();
        $request->setBlockName($blockName);
        $request->setLanguage($this->requestStack->getCurrentRequest()->getLocale());
        return $request;
    }

    public function createEmptyContentRequestFromRequest($blockName, Request $request){
        $locale = $request->getLocale();

        $contentRequest = $this->createEmptyContentRequest($blockName);
        $contentRequest->setLanguage($locale);
    }

    public function getName()
    {
        return 'cms_inclodeBlock';
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction($this->getName(), array($this, 'renderBlock'), array()),
        );
    }


} 