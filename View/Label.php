<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 28/08/14
 * Time: 15:00
 */

namespace Walva\SimpleCmsBundle\View;


use Walva\SimpleCmsBundle\Interfaces\View\LabelInterface;

class Label implements LabelInterface
{

    const COLOR_BLUE = "primary";
    const COLOR_RED = "danger";
    const COLOR_GREEN = "success";
    const COLOR_YELLOW = "warning";

    /**
     * @var string
     */
    private $name = "default";

    /**
     * @var int
     */
    private $color = self::COLOR_BLUE;

    /**
     * @param int $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return int
     */
    public function getColor()
    {
        return $this->color;
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