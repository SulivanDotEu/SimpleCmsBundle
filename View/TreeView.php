<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 28/08/14
 * Time: 14:39
 */

namespace Walva\SimpleCmsBundle\View;


use Walva\SimpleCmsBundle\Interfaces\View\LabelInterface;
use Walva\SimpleCmsBundle\Interfaces\View\TreeViewInterface;

class TreeView implements TreeViewInterface
{

    /**
     * @var array
     */
    private $children = array();

    /**
     * @var string
     */
    private $name = "empty";

    /**
     * @var array
     */
    private $labels = array();

    /**
     * @param TreeView $child
     */
    public function addChild(TreeViewInterface $child = null){
        if($child == null) return;
        if(in_array($child, $this->children)) return;
        $this->children[] = $child;
    }

    public function addLabel(LabelInterface $label = null){
        if($label == null) return;
        if(in_array($label, $this->labels)) return;
        $this->labels[] = $label;
    }


    /**
     * @param array $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param array $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @return array
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }




} 