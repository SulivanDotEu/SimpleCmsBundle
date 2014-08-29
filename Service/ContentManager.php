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
use Symfony\Component\Security\Core\SecurityContextInterface;
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
        $block = $repository->findByInternalName($cr->getBlockName())[0];
        /** @var block Block */
        if($block === null) return "no block found, try again";
        $response = $block->getContentForRequest($cr);
        $response = $this->beforeSendResponse($response);
        return $response;
        //return $this->container->get('templating')->renderResponse($view, $parameters, $response);
    }

    public function beforeSendResponse($response){
        $response = $this->activateEdition($response);
        return $response;
    }

    public function activateEdition($response){
        if($this->security->isGranted('ROLE_ADMIN'));
        $temp = '<div class="edition-enabled" contenteditable="true" >';
        $temp .= $response;
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