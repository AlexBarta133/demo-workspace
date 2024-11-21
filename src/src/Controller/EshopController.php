<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EshopController extends AbstractController
{
    #[Route('/eshop', name: 'app_eshop')]
    public function index(): Response
    {
        $cart_right = [
            [
                'name' => 'Cart',
                'image' => 'onlineshopping.png',
                'link' => 'app_cart',
            ],
        ];
        
        $products = [
            ['id' => 1, 'name' => 'Nike1', 'price' => 2999, 'image' => 'product1.png'],
            ['id' => 2, 'name' => 'Nike2', 'price' => 3050, 'image' => 'product2.png'],
            ['id' => 3, 'name' => 'Nike3', 'price' => 3499, 'image' => 'product3.png'],
        ];

        return $this->render('eshop/main.html.twig', [
            'products' => $products,
        ]);
    }
}
