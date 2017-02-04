<?php

namespace Kisphp\OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function addAction(Request $request)
    {
        $idProduct = $request->request->getInt('idProduct');
        $quantity = $request->request->getInt('quantity');

        $product = $this->get('model.articles')->getArticleById($idProduct);

        $cart = $this->get('cart.factory')->getCart();

        $cart->addProduct($product, $quantity);

        $data = [
            'code' => Response::HTTP_OK,
            'cart' => [
                'totalPrice' => $cart->getTotalPrice(),
                'totalQuantity' => $cart->getCartItemsCount(),
            ],
        ];

        return new JsonResponse($data);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function updateAction(Request $request)
    {
        $idProduct = $request->request->getInt('idProduct');
        $quantity = $request->request->getInt('quantity');

        $product = $this->get('model.articles')->getArticleById($idProduct);

        $cart = $this->get('cart.factory')->getCart();

        $cart->substractQuantity($product, $quantity);

        $data = [
            'code' => Response::HTTP_OK,
            'cart' => [
                'totalPrice' => $cart->getTotalPrice(),
                'totalQuantity' => $cart->getCartItemsCount(),
            ],
        ];

        return new JsonResponse($data);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function removeAction(Request $request)
    {
        $idProduct = $request->request->getInt('idProduct');

        $product = $this->get('model.articles')->getArticleById($idProduct);

        $cart = $this->get('cart.factory')->getCart();

        $cart->removeProduct($product);

        $data = [
            'code' => Response::HTTP_OK,
            'cart' => [
                'totalPrice' => $cart->getTotalPrice(),
                'totalQuantity' => $cart->getCartItemsCount(),
            ],
        ];

        return new JsonResponse($data);
    }
}
