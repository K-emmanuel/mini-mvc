<?php

declare(strict_types=1);

namespace Mini\Models;

use Mini\Core\Model;
use Mini\Core\Database;

final class Cart extends Model
{
    /**
     * Récupère tous les articles du panier d'un utilisateur
     */
    public static function getByUserId(int $userId): array
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("
            SELECT c.*, p.titre, p.prix, p.image 
            FROM cart c
            JOIN produit p ON c.id_produit = p.id
            WHERE c.id_user = ?
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    /**
     * Ajoute un produit au panier
     */
    public static function add(int $userId, int $productId, int $quantity = 1): bool
    {
        $pdo = Database::getPDO();
        
        // Vérifier si le produit existe déjà dans le panier
        $stmt = $pdo->prepare("SELECT id FROM cart WHERE id_user = ? AND id_produit = ?");
        $stmt->execute([$userId, $productId]);
        $existing = $stmt->fetch();
        
        if ($existing) {
            // Si le produit existe déjà, on ne fait rien (ou on pourrait incrémenter)
            return true;
        } else {
            // Ajouter au panier
            $stmt = $pdo->prepare("INSERT INTO cart (id_user, id_produit) VALUES (?, ?)");
            return $stmt->execute([$userId, $productId]);
        }
    }

    /**
     * Supprime un article du panier
     */
    public static function remove(int $cartId, int $userId): bool
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("DELETE FROM cart WHERE id = ? AND id_user = ?");
        return $stmt->execute([$cartId, $userId]);
    }

    /**
     * Met à jour la quantité d'un article
     */
    public static function updateQuantity(int $cartId, int $userId, int $quantity): bool
    {
        // La table cart n'a pas de colonne quantity, cette méthode ne fait rien
        return true;
    }

    /**
     * Vide le panier d'un utilisateur
     */
    public static function clear(int $userId): bool
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("DELETE FROM cart WHERE id_user = ?");
        return $stmt->execute([$userId]);
    }

    /**
     * Calcule le total du panier
     */
    public static function getTotal(int $userId): float
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("
            SELECT SUM(p.prix) as total
            FROM cart c
            JOIN produit p ON c.id_produit = p.id
            WHERE c.id_user = ?
        ");
        $stmt->execute([$userId]);
        $result = $stmt->fetch();
        return (float)($result['total'] ?? 0);
    }

    /**
     * Compte le nombre d'articles dans le panier
     */
    public static function getCount(int $userId): int
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM cart WHERE id_user = ?");
        $stmt->execute([$userId]);
        $result = $stmt->fetch();
        return (int)($result['count'] ?? 0);
    }
}
