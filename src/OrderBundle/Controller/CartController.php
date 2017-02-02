<?php

namespace Kisphp\OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CartController extends Controller
{
    public function addAction(Request $request)
    {
        $idProduct = $request->request->getInt('idProduct');
        $quantity = $request->request->getInt('quantity');

        $product = $this->get('model.articles')->getArticleById($idProduct);

        $this->get('model.order_sale')->addProductToCart($product, $quantity);
    }
}
