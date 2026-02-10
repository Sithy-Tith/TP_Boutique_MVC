<?php

namespace App\models;

use PDO;
use PDOException;

class ProductModel
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Récupérer tous les produits avec le fournisseur
     */
    public function getAll(): array
    {
        try {
            $stmt = $this->pdo->query("
                SELECT 
                    p.id,
                    p.name,
                    p.price,
                    p.stock,
                    s.name AS supplier_name
                FROM products p
                INNER JOIN suppliers s ON p.fk_supplier = s.id
                ORDER BY p.name
            ");

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            throw new PDOException("Erreur SQL (getAll) : " . $e->getMessage());
        }
    }

    /**
     * Récupérer un produit par son ID
     */
    public function getById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("
            SELECT * FROM products WHERE id = ?
        ");
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    /**
     * Ajouter un produit
     */
    public function add(array $data): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO products (name, description, fk_supplier, price, stock)
            VALUES (:name, :description, :fk_supplier, :price, :stock)
        ");

        return $stmt->execute([
            ':name'        => $data['name'],
            ':description' => $data['description'],
            ':fk_supplier' => $data['fk_supplier'],
            ':price'       => $data['price'],
            ':stock'       => $data['stock'],
        ]);
    }

    /**
     * Mettre à jour un produit
     */
    public function update(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE products
            SET name = :name,
                fk_supplier = :fk_supplier,
                price = :price,
                stock = :stock
            WHERE id = :id
        ");

        return $stmt->execute([
            ':name'        => $data['name'],
            ':description' => $data['description'],
            ':fk_supplier' => $data['fk_supplier'],
            ':price'       => $data['price'],
            ':stock'       => $data['stock'],
            ':id'          => $id,
        ]);
    }

    /**
     * Supprimer un produit
     */
    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM products WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }
}
