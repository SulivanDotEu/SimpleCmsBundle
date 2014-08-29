<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 19/08/14
 * Time: 17:28
 */

namespace Walva\SimpleCmsBundle\Service;


use Walva\SimpleCmsBundle\Interfaces\Entity\ContentRequestInterface;
use Walva\SimpleCmsBundle\Exception\InvalidRequestException;

class ContentRequest implements ContentRequestInterface{

    public $blockName;
    public $parameters = array();

    const INDEX_LANGUAGE = "language";
    const INDEX_COUNTRY = "country";


    public function getBlockName()
    {
        return $this->blockName;
    }

    public function setBlockName($name)
    {
        $this->blockName = $name;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function setParameters($parameters)
    {
        if($parameters == null) return;
        $initial = $this->getParameters();
        $this->parameters = array_merge($initial, $parameters);
    }

    public function getParameter($key)
    {
        if(isset($this->parameters[$key])){
            return $this->parameters[$key];
        }
    }

    public function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    public function getLanguage()
    {
        return $this->getParameter(self::INDEX_LANGUAGE);
    }

    public function setLanguage($value)
    {
        $this->setParameter(self::INDEX_LANGUAGE, $value);
    }

    public function getCountry()
    {
        return $this->getParameter(self::INDEX_COUNTRY);
    }

    public function setCountry($value)
    {
        $this->setParameter(self::INDEX_COUNTRY, $value);
    }

    public function validate()
    {
        if(empty($this->blockName)){
            throw new InvalidRequestException("block name can't be empty");
        }
    }

    public function clearParameters()
    {
        unset($this->parameters);
        $this->parameters = array();
    }


} 