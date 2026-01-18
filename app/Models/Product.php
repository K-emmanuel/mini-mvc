<?php

declare(strict_types=1);

namespace Mini\Models;

use Mini\Core\Model;
use Mini\Core\Database;

final class Product extends Model
{
    protected static string $table = 'produit';

    public static function getAll(): array
    {
        $sql = "SELECT * FROM " . static::$table;
        $stmt = Database::getPDO()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getById(int $id): ?array
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id = :id";
        $stmt = Database::getPDO()->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public static function create(array $data): bool
    {
        $sql = "INSERT INTO " . static::$table . " (titre, prix, image) VALUES (:titre, :prix, :image)";
        $stmt = Database::getPDO()->prepare($sql);
        return $stmt->execute([
            'titre' => $data['titre'],
            'prix' => $data['prix'],
            'image' => $data['image']
        ]);
    }

    public static function update(int $id, array $data): bool
    {
        $sql = "UPDATE " . static::$table . " SET titre = :titre, prix = :prix, image = :image WHERE id = :id";
        $stmt = Database::getPDO()->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'titre' => $data['titre'],
            'prix' => $data['prix'],
            'image' => $data['image']
        ]);
    }

    public static function delete(int $id): bool
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id = :id";
        $stmt = Database::getPDO()->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
