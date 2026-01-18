<?php
require 'vendor/autoload.php';

use Mini\Core\Database;

try {
    $pdo = Database::getPDO();
    
    // Vérifier les tables
    echo "=== Tables existantes ===\n";
    $stmt = $pdo->query('SHOW TABLES');
    while ($row = $stmt->fetch()) {
        echo "- " . $row[0] . "\n";
    }
    
    // Vérifier la structure de la table cart
    echo "\n=== Structure de la table cart ===\n";
    $stmt = $pdo->query('DESCRIBE cart');
    while ($row = $stmt->fetch()) {
        echo "- " . $row['Field'] . " (" . $row['Type'] . ")\n";
    }
    
    // Vérifier les données
    echo "\n=== Données dans cart ===\n";
    $stmt = $pdo->query('SELECT * FROM cart');
    $carts = $stmt->fetchAll();
    if (empty($carts)) {
        echo "Aucune donnée\n";
    } else {
        foreach ($carts as $cart) {
            print_r($cart);
        }
    }
    
} catch (Exception $e) {
    echo "ERREUR: " . $e->getMessage() . "\n";
}
