<?php

namespace Kisphp\OrderBundle\Entity;

/**
 * @ORM\MappedSuperclass()
 * @ORM\Table(name="sales_items", options={"collate": "utf8_general_ci", "charset": "utf8"})
 * @ORM\HasLifecycleCallbacks()
 */
interface SalesItemEntityInterface
{
    /**
     * @ORM\PrePersist()
     */
    public function updateModifiedDatetime();

    /**
     * @return \DateTime
     */
    public function getRegistered();

    /**
     * @param \DateTime $registered
     */
    public function setRegistered($registered);

    /**
     * @return string
     */
    public function getId();

    /**
     * @return string
     */
    public function getIdOrder();

    /**
     * @param string $id_order
     */
    public function setIdOrder($id_order);

    /**
     * @return SalesEntityInterface
     */
    public function getOrder();

    /**
     * @param SalesEntityInterface $order
     */
    public function setOrder(SalesEntityInterface $order);

    /**
     * @return int
     */
    public function getIdProduct();

    /**
     * @param int $id_product
     */
    public function setIdProduct($id_product);

    /**
     * @return int
     */
    public function getQuantity();

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity);

    /**
     * @return string
     */
    public function getProductSku();

    /**
     * @param string $product_sku
     */
    public function setProductSku($product_sku);

    /**
     * @return string
     */
    public function getProductCode();

    /**
     * @param string $product_code
     */
    public function setProductCode($product_code);

    /**
     * @return int
     */
    public function getProductPrice();

    /**
     * @param int $product_price
     */
    public function setProductPrice($product_price);

    /**
     * @return int
     */
    public function getProductPriceOld();

    /**
     * @param int $product_price_old
     */
    public function setProductPriceOld($product_price_old);

    /**
     * @return string
     */
    public function getProductCurrency();

    /**
     * @param string $product_currency
     */
    public function setProductCurrency($product_currency);

    /**
     * @return string
     */
    public function getProductTitle();

    /**
     * @param string $product_title
     */
    public function setProductTitle($product_title);

    /**
     * @return string
     */
    public function getProductDescription();

    /**
     * @param string $product_description
     */
    public function setProductDescription($product_description);

    /**
     * @return string
     */
    public function getProductImageDirectory();

    /**
     * @param string $product_image_directory
     */
    public function setProductImageDirectory($product_image_directory);

    /**
     * @return string
     */
    public function getProductImageFilename();

    /**
     * @param string $product_image_filename
     */
    public function setProductImageFilename($product_image_filename);

    /**
     * @return int
     */
    public function getIdCategory();

    /**
     * @param int $id_category
     */
    public function setIdCategory($id_category);
}
