<?php

// Active le mode strict pour la vérification des types
declare(strict_types=1);
// Déclare l'espace de noms pour ce contrôleur
namespace Mini\Controllers;
// Importe la classe de base Controller du noyau
use Mini\Core\Controller;
use Mini\Models\User;
use Mini\Models\Product;

// Déclare la classe finale HomeController qui hérite de Controller
final class HomeController extends Controller
{
    // Déclare la méthode d'action par défaut qui ne retourne rien
    public function index(): void
    {
        // Récupère tous les produits de la base de données
        $products = Product::getAll();
        
        // Appelle le moteur de rendu avec la vue et ses paramètres
        $this->render('home/index', params: [
            // Définit le titre transmis à la vue
            'title' => '6 7 LABUBU',
            'products' => $products,
        ]);
    }

    public function users(): void
    {
        // Appelle le moteur de rendu avec la vue et ses paramètres
        $this->render('home/users', params: [
            // Définit le titre transmis à la vue
            'users' => $users = User::getAll(),
        ]);
    }

    public function product(int $id): void
    {
        // Récupère le produit par son ID
        $product = Product::getById($id);
        
        // Si le produit n'existe pas, rediriger vers l'accueil
        if (!$product) {
            header('Location: /');
            exit;
        }
        
        // Affiche la page produit
        $this->render('home/product', params: [
            'title' => htmlspecialchars($product['titre']) . ' - 6 7 LABUBU',
            'product' => $product,
        ]);
    }
}