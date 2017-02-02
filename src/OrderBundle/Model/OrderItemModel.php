<?php

namespace Kisphp\OrderBundle\Model;

use Kisphp\Admin\MainBundle\Entity\ArticlesAttached;
use Kisphp\Admin\MainBundle\Entity\ArticlesEntity;
use Kisphp\Model\AbstractModel;
use Kisphp\OrderBundle\Entity\OrderEntity;
use Kisphp\OrderBundle\Entity\OrderItemEntity;

class OrderItemModel extends AbstractModel
{
    const REPOSITORY = 'OrderBundle:OrderItemEntity';

    /**
     * @param ArticlesEntity $entity
     * @param OrderEntity $order
     *
     * @return OrderItemEntity
     */
    public function createFromProduct(ArticlesEntity $entity, OrderEntity $order)
    {
        $orderItem = $this->createOrderItem();
        $orderItem->setIdProduct($entity->getId());
        $orderItem->setIdCategory($entity->getIdCategory());
        $orderItem->setOrder($order);
        $orderItem->setProductCode($entity->getProductCode());
        $orderItem->setProductSku($entity->getProductCode());
        $orderItem->setProductPrice($entity->getPrice());
        $orderItem->setProductPriceOld($entity->getPriceOld());
        $orderItem->setProductCurrency($entity->getCurrency());
        $orderItem->setProductTitle($entity->getTitle());
        $orderItem->setProductDescription($entity->getDescription());

        /** @var ArticlesAttached[] $images */
        $images = $entity->getImages();
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
