<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Cart;
use Mini\Models\Product;

final class CartController extends Controller
{
    /**
     * Affiche le panier
     */
    public function index(): void
    {
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $cartItems = Cart::getByUserId($userId);
        $total = Cart::getTotal($userId);

        $this->render('cart/index', params: [
            'title' => 'Panier - 6 7 LABUBU',
            'cartItems' => $cartItems,
            'total' => $total
        ]);
    }

    /**
     * Ajoute un produit au panier
     */
    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /');
            exit;
        }

        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['cart_error'] = 'Vous devez être connecté pour ajouter au panier';
            header('Location: /login');
            exit;
        }

        $productId = (int)($_POST['product_id'] ?? 0);
        $quantity = (int)($_POST['quantity'] ?? 1);
        $userId = $_SESSION['user_id'];

        if ($productId <= 0 || $quantity <= 0) {
            $_SESSION['cart_error'] = 'Données invalides';
            header('Location: /');
            exit;
        }

        // Vérifier que le produit existe
        $product = Product::getById($productId);
        if (!$product) {
            $_SESSION['cart_error'] = 'Produit introuvable';
            header('Location: /');
            exit;
        }

        // Ajouter au panier
        if (Cart::add($userId, $productId, $quantity)) {
            $_SESSION['cart_success'] = 'Produit ajouté au panier';
            header('Location: /panier');
        } else {
            $_SESSION['cart_error'] = 'Erreur lors de l\'ajout au panier';
            header('Location: /produit/' . $productId);
        }
        exit;
    }

    /**
     * Met à jour la quantité d'un article
     */
    public function updateQuantity(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /panier');
            exit;
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $cartId = (int)($_POST['cart_id'] ?? 0);
        $quantity = (int)($_POST['quantity'] ?? 1);
        $userId = $_SESSION['user_id'];

        if (Cart::updateQuantity($cartId, $userId, $quantity)) {
            $_SESSION['cart_success'] = 'Quantité mise à jour';
        } else {
            $_SESSION['cart_error'] = 'Erreur lors de la mise à jour';
        }

        header('Location: /panier');
        exit;
    }

    /**
     * Supprime un article du panier
     */
    public function remove(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /panier');
            exit;
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $cartId = (int)($_POST['cart_id'] ?? 0);
        $userId = $_SESSION['user_id'];

        if (Cart::remove($cartId, $userId)) {
            $_SESSION['cart_success'] = 'Article retiré du panier';
        } else {
            $_SESSION['cart_error'] = 'Erreur lors de la suppression';
        }

        header('Location: /panier');
        exit;
    }

    /**
     * Vide le panier
     */
    public function clear(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /panier');
            exit;
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];

        if (Cart::clear($userId)) {
            $_SESSION['cart_success'] = 'Panier vidé';
        } else {
            $_SESSION['cart_error'] = 'Erreur lors du vidage du panier';
        }

        header('Location: /panier');
        exit;
    }
}
