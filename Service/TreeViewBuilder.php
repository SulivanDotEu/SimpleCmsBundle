<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 28/08/14
 * Time: 14:36
 */

namespace Walva\SimpleCmsBundle\Service;


use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Tag;
use Walva\SimpleCmsBundle\Entity\AbstractContentDeliverer;
use Walva\SimpleCmsBundle\Entity\Block;
use Walva\SimpleCmsBundle\Entity\Document;
use Walva\SimpleCmsBundle\Interfaces\Entity\StrategyDeliverer;
use Walva\SimpleCmsBundle\Interfaces\Entity\StrategyDelivererRelation;
use Walva\SimpleCmsBundle\View\Label;
use Walva\SimpleCmsBundle\View\TreeView;

/**
 * Class TreeViewBuilder
 * @package Walva\SimpleCmsBundle\Service*
 * @Service();
 * @Tag("twig.extension")
 */
class TreeViewBuilder extends \Twig_Extension
{

    /**
     * @Inject("service_container")
     */
    public $container;

    public function renderBlock(Block $block)
    {
        $view = $this->createEmptyView($block);
        $block->configureView($view);
        $subView = $this->renderSubEntity($block->getDeliverer());
        $view->addChild($subView);


        return $this->container->get("walva.simple_cms_bundle.view.tree.converter.boostrap")
            ->convert($view);
//        return $view;
    }

    public function renderSubEntity($entity)
    {
        if ($entity === null)
        {
            return null;
        }
        if ($entity instanceof StrategyDeliverer)
        {
            return $this->renderStrategy($entity);
        }
        elseif ($entity instanceof StrategyDelivererRelation)
        {
            return $this->renderRelation($entity);
        }
        elseif ($entity instanceof Document)
        {
            return $this->renderDocument($entity);
        }
    }

    public function renderStrategy(StrategyDeliverer $e){
        $view = $this->createEmptyView($e);
        $e->configureView($view);
        foreach ($e->getDelivererRelations() as $relation) {
            $subView = $this->renderSubEntity($relation);
            $view->addChild($subView);
        }

        return $view;
    }

    public function renderRelation(StrategyDelivererRelation $e){
        $deliverer = $e->getDeliverer();
        $view = $this->renderSubEntity($deliverer);
        $e->configureView($view);
        return $view;
    }

    public function renderDocument(Document $e){
        $view = $this->createEmptyView($e);
        $e->configureView($view);
        return $view;
    }

    public function createEmptyView($object)
    {
        return new TreeView();
    }

    public function getName()
    {
        return 'cms_renderTree';
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction($this->getName(), array($this, 'renderBlock'), array()),
        );
    }

} 