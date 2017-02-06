<?php

namespace Kisphp\OrderBundle\Model;

use Kisphp\Admin\MainBundle\Entity\ArticlesAttached;
use Kisphp\Entity\KisphpEntityInterface;
use Kisphp\Model\AbstractModel;
use Kisphp\OrderBundle\Entity\SalesEntity;
use Kisphp\OrderBundle\Entity\SalesItemEntity;

class SalesItemModel extends AbstractModel
{
    const REPOSITORY = 'OrderBundle:SalesItemEntity';

    /**
     * @param KisphpEntityInterface $product
     * @param SalesEntity $order
     *
     * @return SalesItemEntity
     */
    public function createFromProduct(KisphpEntityInterface $product, SalesEntity $order)
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

        /** @var ArticlesAttached[] $images */
        $images = $product->getImages();
        if (count($images) > 0) {
            $orderItem->setProductImageFilename($images[0]->getFilename());
            $orderItem->setProductImageDirectory($images[0]->getDirectory());
        }

        return $orderItem;
    }

    /**
     * @return SalesItemEntity
     */
    public function createSalesItem()
    {
        return new SalesItemEntity();
    }
}
