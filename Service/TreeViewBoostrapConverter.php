<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 28/08/14
 * Time: 15:36
 */

namespace Walva\SimpleCmsBundle\Service;

use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\Service;
use Symfony\Bridge\Twig\Form\TwigRendererEngineInterface;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Walva\SimpleCmsBundle\Interfaces\View\TreeViewInterface;

/**
 * Class TreeViewBoostrapConverter
 * @package Walva\SimpleCmsBundle\Service
 * @Service("walva.simple_cms_bundle.view.tree.converter.boostrap")
 */
class TreeViewBoostrapConverter
{

    public $paddingLeft = 25;
    public $paddingTop = 5;

    /**
     * @var TwigEngine
     * @Inject("templating")
     */
    public $twigMachine;

    public function convert(TreeViewInterface $view)
    {
        $html = $this->twigMachine->render(
            '@WalvaSimpleCms/Components/TreeView/Bootstrap/tree_node.html.twig',
            array(
                'tree' => $view,
            )
        );

        $children = $view->getChildren();
        if(empty($children)) return $html;
        $html .= '<div style="padding-left: '.$this->paddingLeft.'px; " >';
        foreach($children as $child){
            $html .= $this->convert($child);
        }
        $html .= '</div>';
        return $html;
    }
}

