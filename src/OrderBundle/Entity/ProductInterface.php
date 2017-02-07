<?php

namespace Kisphp\OrderBundle\Entity;

interface ProductInterface
{
    /**
     * @return string UUID
     */
    public function getId();

    /**
     * @return int
     */
    public function getIdCategory();

    /**
     * @return string
     */
    public function getProductCode();

    /**
     * @return int
     */
    public function getPrice();

    /**
     * @return int
     */
    public function getPriceOld();

    /**
     * @return string
     */
    public function getCurrency();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return array
     */
    public function getImages();
}
