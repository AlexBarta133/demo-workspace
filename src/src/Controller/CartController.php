<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(SessionInterface $session): Response
    {
        // Získání obsahu košíku ze session
        $cart = $session->get('cart', []);

        return $this->render('cart/cart.html.twig', [
            'cart' => $cart,
        ]);
    }

    #[Route('/cart/add/{id}', name: 'app_cart_add')]
    public function add(int $id, SessionInterface $session): Response
    {
        // Získání aktuálního obsahu košíku
        $cart = $session->get('cart', []);

        // Přidání produktu do košíku
        if (!isset($cart[$id])) {
            $cart[$id] = ['quantity' => 1];
        } else {
            $cart[$id]['quantity']++;
        }

        // Uložení zpět do session
        $session->set('cart', $cart);

        // Přesměrování zpět na košík
        return $this->redirectToRoute('app_cart');
    }

    #[Route('/cart/remove/{id}', name: 'app_cart_remove')]
    public function remove(int $id, SessionInterface $session): Response
    {
        // Získání aktuálního obsahu košíku
        $cart = $session->get('cart', []);

        // Odebrání produktu z košíku
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        // Uložení zpět do session
        $session->set('cart', $cart);

        // Přesměrování zpět na košík
        return $this->redirectToRoute('app_cart');
    }
}
