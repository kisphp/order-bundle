<?php

namespace tests\Cart\Data;

use Kisphp\Entity\KisphpEntityInterface;

class ProductEntity implements KisphpEntityInterface
{
    protected $id;

    protected $price = 0;

    protected $images = [];

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param KisphpEntityInterface $image
     */
    public function addImage(KisphpEntityInterface $image)
    {
        $this->images[] = $image;
    }
}
