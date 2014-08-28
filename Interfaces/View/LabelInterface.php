<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 28/08/14
 * Time: 15:08
 */
namespace Walva\SimpleCmsBundle\Interfaces\View;

interface LabelInterface
{
    /**
     * @param int $color
     */
    public function setColor($color);

    /**
     * @return int
     */
    public function getColor();

    /**
     * @param integer $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

}