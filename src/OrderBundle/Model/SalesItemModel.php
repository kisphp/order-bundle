<?php

namespace Kisphp\OrderBundle\Model;

use Kisphp\Entity\AttachedInterface;
use Kisphp\Model\AbstractModel;
use Kisphp\OrderBundle\Entity\ProductInterface;
use Kisphp\OrderBundle\Entity\SalesEntityInterface;
use Kisphp\OrderBundle\Entity\SalesItemEntity;
use Kisphp\OrderBundle\Entity\SalesItemEntityInterface;

abstract class SalesItemModel extends AbstractModel implements SalesItemModelInterface
{
    const REPOSITORY = 'OrderBundle:SalesItemEntity';

    /**
     * @param ProductInterface $product
     * @param SalesEntityInterface $order
     *
     * @return SalesItemEntityInterface
     */
    public function createFromProduct(ProductInterface $product, SalesEntityInterface $order)
    {
        $orderItem = $this->createSalesItem();
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

        /** @var AttachedInterface[] $images */
        $images = $product->getImages();
        if (count($images) > 0) {
            $orderItem->setProductImageFilename($images[0]->getFilename());
            $orderItem->setProductImageDirectory($images[0]->getDirectory());
        }

        return $orderItem;
    }

    /**
     * @return SalesItemEntityInterface
     */
    public function createSalesItem()
    {
        return new SalesItemEntity();
    }
}
