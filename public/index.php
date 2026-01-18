<?php

declare(strict_types=1);

// Démarrer la session
session_start();

require dirname(__DIR__) . '/vendor/autoload.php';

use Mini\Core\Router;

// Table des routes minimaliste
$routes = [
    ['GET', '/', [Mini\Controllers\HomeController::class, 'index']],
    ['GET', '/users', [Mini\Controllers\HomeController::class, 'users']],
    ['GET', '/produit/{id}', [Mini\Controllers\HomeController::class, 'product']],
    
    // Routes d'authentification
    ['GET', '/login', [Mini\Controllers\AuthController::class, 'login']],
    ['POST', '/login/do', [Mini\Controllers\AuthController::class, 'doLogin']],
    ['GET', '/register', [Mini\Controllers\AuthController::class, 'register']],
    ['POST', '/register/do', [Mini\Controllers\AuthController::class, 'doRegister']],
    ['GET', '/account', [Mini\Controllers\AuthController::class, 'account']],
    ['GET', '/logout', [Mini\Controllers\AuthController::class, 'logout']],
    
    // Routes du panier
    ['GET', '/panier', [Mini\Controllers\CartController::class, 'index']],
    ['POST', '/panier/add', [Mini\Controllers\CartController::class, 'add']],
    ['POST', '/panier/update', [Mini\Controllers\CartController::class, 'updateQuantity']],
    ['POST', '/panier/remove', [Mini\Controllers\CartController::class, 'remove']],
    ['POST', '/panier/clear', [Mini\Controllers\CartController::class, 'clear']],
];

// Bootstrap du router
$router = new Router($routes);
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);


