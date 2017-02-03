<?php

namespace Kisphp\OrderBundle\Model;

use Kisphp\Admin\MainBundle\Entity\ArticlesAttached;
use Kisphp\Admin\MainBundle\Entity\ArticlesEntity;
use Kisphp\Entity\KisphpEntityInterface;
use Kisphp\Model\AbstractModel;
use Kisphp\OrderBundle\Entity\OrderEntity;
use Kisphp\OrderBundle\Entity\OrderItemEntity;

class OrderItemModel extends AbstractModel
{
    const REPOSITORY = 'OrderBundle:OrderItemEntity';

    /**
     * @param KisphpEntityInterface $product
     * @param OrderEntity $order
     *
     * @return OrderItemEntity
     */
    public function createFromProduct(KisphpEntityInterface $product, OrderEntity $order)
    {
        $orderItem = $this->createOrderItem();
        $orderItem->setIdProduct($product->getId());
        $orderItem->setIdCategory($product->getIdCategory());
        $orderItem->setOrder($order);
        $orderItem->setProductCode($product->getProductCode());
        $orderItem->setProductSku($product->getProductCode());
        $orderItem->setProductPrice($product->getPrice());
        $orderItem->setProductPriceOld($product->getPriceOld());
        $orderItem->setProductCurrency($product->getCurrency());
        $orderItem->setProductTitle($product->getTitle());
        $orderItem->setProductDescription($product->getDescription());

        /** @var ArticlesAttached[] $images */
        $images = $product->getImages();
        if (count($images) > 0) {
            $orderItem->setProductImageFilename($images[0]->getFilename());
            $orderItem->setProductImageDirectory($images[0]->getDirectory());
        }

        return $orderItem;
    }

    /**
     * @return OrderItemEntity
     */
    public function createOrderItem()
    {
        return new OrderItemEntity();
    }
}
