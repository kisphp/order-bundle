<?php

namespace Kisphp\OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kisphp\Entity\KisphpEntityInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sales_items", options={"collate": "utf8_general_ci", "charset": "utf8"})
 * @ORM\HasLifecycleCallbacks()
 */
class SalesItemEntity implements KisphpEntityInterface, SalesItemEntityInterface
{
    /**
     * @var string
     *
     * @ORM\Column(type="integer", options={"unsigned": true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="integer", options={"unsigned": true})
     */
    protected $id_order;

    /**
     * @var SalesEntityInterface
     *
     * @ORM\ManyToOne(targetEntity="SalesEntity", inversedBy="items")
     * @ORM\JoinColumn(name="id_order", referencedColumnName="id")
     */
    protected $order;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $id_product;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $id_category;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"unsigned": true, "default": 0})
     */
    protected $quantity = 0;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $registered;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $product_sku;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $product_code;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"unsigned": true, "default": 0})
     */
    protected $product_price;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"unsigned": true, "default": 0})
     */
    protected $product_price_old;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $product_currency;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $product_title;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $product_description;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $product_image_directory;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $product_image_filename;

    /**
     * @ORM\PrePersist()
     */
    public function updateModifiedDatetime()
    {
        if ($this->registered === null) {
            $this->setRegistered(new \DateTime());
        }
    }

    /**
     * @return \DateTime
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * @param \DateTime $registered
     */
    public function setRegistered($registered)
    {
        $this->registered = $registered;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getIdOrder()
    {
        return $this->id_order;
    }

    /**
     * @param string $id_order
     */
    public function setIdOrder($id_order)
    {
        $this->id_order = $id_order;
    }

    /**
     * @return SalesEntityInterface
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param SalesEntityInterface $order
     */
    public function setOrder(SalesEntityInterface $order)
    {
        $this->order = $order;
        $this->setIdOrder($order->getId());
    }

    /**
     * @return int
     */
    public function getIdProduct()
    {
        return $this->id_product;
    }

    /**
     * @param int $id_product
     */
    public function setIdProduct($id_product)
    {
        $this->id_product = $id_product;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getProductSku()
    {
        return $this->product_sku;
    }

    /**
     * @param string $product_sku
     */
    public function setProductSku($product_sku)
    {
        $this->product_sku = $product_sku;
    }

    /**
     * @return string
     */
    public function getProductCode()
    {
        return $this->product_code;
    }

    /**
     * @param string $product_code
     */
    public function setProductCode($product_code)
    {
        $this->product_code = $product_code;
    }

    /**
     * @return int
     */
    public function getProductPrice()
    {
        return $this->product_price;
    }

    /**
     * @param int $product_price
     */
    public function setProductPrice($product_price)
    {
        $this->product_price = $product_price;
    }

    /**
     * @return int
     */
    public function getProductPriceOld()
    {
        return $this->product_price_old;
    }

    /**
     * @param int $product_price_old
     */
    public function setProductPriceOld($product_price_old)
    {
        $this->product_price_old = $product_price_old;
    }

    /**
     * @return string
     */
    public function getProductCurrency()
    {
        return $this->product_currency;
    }

    /**
     * @param string $product_currency
     */
    public function setProductCurrency($product_currency)
    {
        $this->product_currency = $product_currency;
    }

    /**
     * @return string
     */
    public function getProductTitle()
    {
        return $this->product_title;
    }

    /**
     * @param string $product_title
     */
    public function setProductTitle($product_title)
    {
        $this->product_title = $product_title;
    }

    /**
     * @return string
     */
    public function getProductDescription()
    {
        return $this->product_description;
    }

    /**
     * @param string $product_description
     */
    public function setProductDescription($product_description)
    {
        $this->product_description = $product_description;
    }

    /**
     * @return string
     */
    public function getProductImageDirectory()
    {
        return $this->product_image_directory;
    }

    /**
     * @param string $product_image_directory
     */
    public function setProductImageDirectory($product_image_directory)
    {
        $this->product_image_directory = $product_image_directory;
    }

    /**
     * @return string
     */
    public function getProductImageFilename()
    {
        return $this->product_image_filename;
    }

    /**
     * @param string $product_image_filename
     */
    public function setProductImageFilename($product_image_filename)
    {
        $this->product_image_filename = $product_image_filename;
    }

    /**
     * @return int
     */
    public function getIdCategory()
    {
        return $this->id_category;
    }

    /**
     * @param int $id_category
     */
    public function setIdCategory($id_category)
    {
        $this->id_category = $id_category;
    }
}
