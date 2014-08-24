<?php
/**
 * Created by PhpStorm.
 * User: bel
 * Date: 19/08/14
 * Time: 16:58
 */

namespace Walva\SimpleCmsBundle\Interfaces\Entity;


interface ContentRequestInterface {

    public function getBlockName();
    public function setBlockName($name);

    public function getParameters();
    public function setParameters($parameters);
    public function clearParameters();
    public function getParameter($key);
    public function setParameter($key, $value);

    public function getLanguage();
    public function setLanguage($value);

    public function getCountry();
    public function setCountry($value);

    public function validate();

} 