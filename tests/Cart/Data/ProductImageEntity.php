<?php

namespace tests\Cart\Data;

use Kisphp\Entity\KisphpEntityInterface;

class ProductImageEntity implements KisphpEntityInterface
{
    protected $id;

    protected $filename;



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
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param mixed $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }
}
