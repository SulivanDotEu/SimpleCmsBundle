<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 28/08/14
 * Time: 14:57
 */
namespace Walva\SimpleCmsBundle\Interfaces\View;

use Walva\SimpleCmsBundle\View\Label;

interface TreeViewInterface
{
    /**
     * @param array $childs
     */
    public function setChildren($children);

    public function addLabel(LabelInterface $label);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param array $labels
     */
    public function setLabels($labels);

    /**
     * @return array
     */
    public function getChildren();

    /**
     * @return array
     */
    public function getLabels();

    public function addChild(TreeViewInterface $child);

    /**
     * @param string $name
     */
    public function setName($name);
}